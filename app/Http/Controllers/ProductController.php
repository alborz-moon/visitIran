<?php

namespace App\Http\Controllers;

use App\Exports\ProductExport;
use App\Http\Resources\BrandResource;
use App\Http\Resources\CategoryDigest;
use App\Http\Resources\GalleryResource;
use App\Http\Resources\ProductDigest;
use App\Http\Resources\ProductDigestUser;
use App\Http\Resources\ProductFeatureResource;
use App\Http\Resources\ProductResource;
use App\Http\Resources\ProductResourceForUsers;
use App\Http\Resources\SellerResource;
use App\Imports\ProductImport;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Comment;
use App\Models\Product;
use App\Models\PurchaseItems;
use App\Models\Seller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Validation\Rule;
use Maatwebsite\Excel\Facades\Excel;

class ProductController extends Controller
{

    private function build_filters($request) {
        
        $filters = Product::where('id', '>', '0');
        $cat = $request->query('category', null);
        $brand = $request->query('brand', null);
        $seller = $request->query('seller', null);
        $visibility = $request->query('visibility', null);
        $orderBy = $request->query('orderBy', null);
        $orderByType = $request->query('orderByType', null);
        $isInTopList = $request->query('isInTopList', null);
        $max = $request->query('max', null);
        $min = $request->query('min', null);

        if($cat != null)
            $filters->where('category_id', $cat);
            
        if($brand != null)
            $filters->where('brand_id', $brand);
            
        if($seller != null)
            $filters->where('seller_id', $seller);
            
        if($isInTopList != null)
            $filters->where('is_in_top_list', $isInTopList);

        $isAdmin = false;

        if($request->user() != null && (
            $request->user()->level == User::$ADMIN_LEVEL ||
            $request->user()->level == User::$EDITOR_LEVEL
        )) {
            
            $isAdmin = true;

            if($visibility != null)
                $filters->where('visibility', $visibility);
                
            if($max != null)
                $filters->where('available_count', '<=', $max);
                
            if($min != null)
                $filters->where('available_count', '>=', $min);

        }
        else
            $filters->where('visibility', true);

        if($orderByType == null || (
                $orderByType != 'asc' && 
                $orderByType != 'desc'
        ))
            $orderByType = 'desc';

        if($orderBy != null) {
            if($orderBy == 'createdAt')
                $filters->orderBy('id', $orderByType);
            else if($orderBy == 'rate')
                $filters->orderBy('rate', $orderByType);
            else if($orderBy == 'seen')
                $filters->orderBy('seen', $orderByType);
        }
        else {
            $orderBy = 'createAt';
            $orderByType = 'desc';
            if($isAdmin)
                $filters->orderBy('id', 'desc');
            else
                $filters->orderBy('priority', 'asc');
        }

        return $filters;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $limit = $request->query('limit', null);
        $cat = $request->query('category', null);
        $brand = $request->query('brand', null);
        $seller = $request->query('seller', null);
        $visibility = $request->query('visibility', null);
        $orderBy = $request->query('orderBy', null);
        $orderByType = $request->query('orderByType', null);
        $isInTopList = $request->query('isInTopList', null);
        $max = $request->query('max', null);
        $min = $request->query('min', null);
        
        $filters = $this->build_filters($request);
        $products = $filters->paginate($limit == null ? 30 : $limit);

        if($request->user() != null && (
            $request->user()->level == User::$ADMIN_LEVEL ||
            $request->user()->level == User::$EDITOR_LEVEL
        )) {
            
            $categories = Category::all();
            $arr = [];
            foreach($categories as $cat) {
                if($cat->sub()->count() > 0)
                    continue;
                array_push($arr, $cat);
            }

            $output = ProductDigest::collection($products);

            return view('admin.product.list', [
                'items' => $output->toArray($request),
                'links' => $output->links(),
                'visibilityFilter' => $visibility,
                'isInTopListFilter' => $isInTopList,
                'sellerFilter' => $seller,
                'brandFilter' => $brand,
                'maxFilter' => $max,
                'minFilter' => $min,
                'orderBy' => $orderBy,
                'orderByType' => $orderByType,
                'categories' => CategoryDigest::collection($arr)->toArray($request),
                'brands' => BrandResource::collection(Brand::all())->toArray($request),
                'sellers' => SellerResource::collection(Seller::all())->toArray($request),
            ]);
        }

        return response()->json([
            'status' => 'ok',
            'data' =>  ProductDigestUser::collection($products)->toArray($request)
        ]);
    }


    public function excel(Request $request) {
        $filters = $this->build_filters($request);
        $products = ProductDigest::collection($filters->get())->toArray($request);
        $export = new ProductExport($products);
        return Excel::download($export, 'products.xlsx');
    }

    public function addBatchProducts(Request $request)
    {
        $request->validate([
            'file' => 'required|file'
        ]);

        $import = new ProductImport;
        $import->import($request->file);
        $errors = [];

        foreach ($import->failures() as $failure) {
            array_push($errors, "row " . $failure->row() . ' ' . $failure->errors()[0]);
        }
        
        if(count($errors) > 0)
            return view('admin.product.list')->with(compact('errors'));

        return redirect()->route('product.index');
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        
        $categories = Category::all();
        $arr = [];
        foreach($categories as $cat) {
            if($cat->sub()->count() > 0)
                continue;
            array_push($arr, $cat);
        }

        return view('admin.product.create', [
            'brands' => BrandResource::collection(Brand::all())->toArray($request),
            'sellers' => SellerResource::collection(Seller::all())->toArray($request),
            'categories' => CategoryDigest::collection($arr)->toArray($request),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->has('seller_id') && $request['seller_id'] == -1)
            $request['seller_id'] = null;

        $validator = [
            'name' => 'required|string|min:2',
            'category_id' => 'required|exists:categories,id',
            'brand_id' => 'required|exists:brands,id',
            'seller_id' => 'nullable|exists:sellers,id',
            'description' => 'required|string|min:2',
            'digest' => 'nullable|string|min:2',
            'keywords' => 'nullable|string|min:2',
            'tags' => 'nullable|string|min:2',
            'price' => 'required|integer|min:0',
            'priority' => 'required|integer|min:0',
            'is_in_top_list' => 'required|boolean',
            'visibility' => 'required|boolean',
            'img_file' => 'required|image',
            'alt' => 'nullable|string|min:2',
        ];

        if(self::hasAnyExcept(array_keys($validator), $request->keys()))
            return abort(401);

        $request->validate($validator);

        $filename = $request->img_file->store('public/products');
        $filename = str_replace('public/products', '', $filename);

        $request['img'] = $filename;
        Product::create($request->toArray());

        return Redirect::route('product.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product, Request $request)
    {
        
        $categories = Category::all();
        $arr = [];
        foreach($categories as $cat) {
            if($cat->sub()->count() > 0)
                continue;
            array_push($arr, $cat);
        }

        return view('admin.product.create', [
            'item' => ProductResource::make($product)->toArray($request),
            'brands' => BrandResource::collection(Brand::all())->toArray($request),
            'sellers' => SellerResource::collection(Seller::all())->toArray($request),
            'categories' => CategoryDigest::collection($arr)->toArray($request),
        ]);   
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function editOff(Product $product, $err=null)
    {
        return view('admin.product.off', [
            'item' => [
                'off' => $product->off,
                'off_expiration' => $product->off_expiration == null ? '' : self::convertStringToDate($product->off_expiration),
                'off_type' => $product->off_type,
                'name' => $product->name,
                'id' => $product->id,
            ],
            'err' => $err
        ]);   
    }

    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function removeOff(Product $product)
    {
        $product->off = null;
        $product->off_type = null;
        $product->off_expiration = null; 
        $product->save();

        return response()->json([
            'status' => 'ok'
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        if($request->has('seller_id') && $request['seller_id'] == -1)
            $request['seller_id'] = null;

        $validator = [
            'name' => 'nullable|string|min:2',
            'category_id' => 'nullable|exists:categories,id',
            'seller_id' => 'nullable|exists:sellers,id',
            'digest' => 'nullable|string|min:2',
            'keywords' => 'nullable|string|min:2',
            'tags' => 'nullable|string|min:2',
            'brand_id' => 'nullable|exists:brands,id',
            'description' => 'nullable|string|min:2',
            'price' => 'nullable|integer|min:0',
            'off' => 'nullable|integer|min:0',
            'visibility' => 'nullable|boolean',
            'off_type' => ['nullable', Rule::in('value', 'percent')],
            'off_expiration' => 'nullable|date',
            'available_count' => 'nullable|integer|min:0',
            'priority' => 'nullable|integer|min:0',
            'is_in_top_list' => 'nullable|boolean',
            'img_file' => 'nullable|image',
            'alt' => 'nullable|string|min:2',
        ];

        if(self::hasAnyExcept(array_keys($validator), $request->keys()))
            return abort(401);

        $request->validate($validator);

        if($request->has('off_expiration')) {
            $today = self::getToday()['date'];
            $expiration = self::convertDateToString($request['off_expiration']);
            if((int)$today >= (int)$expiration)
                return $this->editOff($product, 'تاریخ انقضا باید از امروز بزرگتر باشد.');

            $request['off_expiration'] = $expiration;
        }

        if($request->has('off')) {
            
            if(!$request->has('off_type') && $product->off_type == null)
                return $this->editOff($product, 'لطفا نوع کد نخفیف را مشخص نمایید.');
            
            $product->off_type = $request->has('off_type') ? $request['off_type'] : $product->off_type;
            if($product->off_type == 'percent' && ($request['off'] > 100  || $request['off'] < 1))
                return $this->editOff($product, 'میزان تخفیف باید بین 1 تا 100 باشد.');
        }
        
        if($request->has('img_file')) {
         
            $filename = $request->img_file->store('public/products');
            $filename = str_replace('public/products', '', $filename);   
                
            if($product->img != null && !empty($product->img) && 
                file_exists(__DIR__ . '/../../../public/storage/products/' . $product->img))
                unlink(__DIR__ . '/../../../public/storage/products/' . $product->img);

            $product->img = $filename;
        }

        foreach($request->keys() as $key) {
            if($key == '_token' || $key == 'img_file')
                continue;
            $product[$key] = $request[$key];
        }

        $product->save();
        return Redirect::route('product.index');
    }
    
    /**
     * show the specified resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, Product $product)
    {
        if(!$product->visibility)
            return Redirect::route('home');

        return response()->json([
            'status' => 'ok', 
            'galleries' => GalleryResource::collection($product->galleries()->orderBy('priority', 'asc')->get())->toArray($request),
            'features' => ProductFeatureResource::collection($product->featuresWithValue())->toArray($request)
        ]);
    }

    
    /**
     * show the specified resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function showDetail(Request $request, Product $product, $productName) {

        if(!$product->visibility)
            return Redirect::route('home');

        $product->seen = $product->seen + 1;
        $product->save();
        
        $user = $request->user();
        

        // $comment = Comment::userComment($product->id, $user->id);
        // dd(array_merge(
        //         ProductResourceForUsers::make($product)->toArray($request), 
        //         [
        //             'is_bookmark' => $comment != null && $comment->is_bookmark != null ? $comment->is_bookmark : false,
        //             'user_rate' => $comment != null ? $comment->rate : null,
        //             'has_comment' => $comment != null && $comment->msg != null,
        //             'is_login' => true,
        //         ]));
        
        if($user == null)
            return view('product', [
                'product' => array_merge(
                    ProductResourceForUsers::make($product)->toArray($request), [
                    'is_bookmark' => false,
                    'user_rate' => null,
                    'has_comment' => false,
                    'is_login' => false,
                ])
            ]);
            
        $comment = Comment::userComment($product->id, $user->id);
        return view('product', [
            'product' => array_merge(
                ProductResourceForUsers::make($product)->toArray($request), 
                [
                    'is_bookmark' => $comment != null && $comment->is_bookmark != null ? $comment->is_bookmark : false,
                    'user_rate' => $comment != null ? $comment->rate : null,
                    'has_comment' => $comment != null && $comment->msg != null,
                    'is_login' => true,
                ])
        ]);
    }

    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function changeVisibility(Request $request, Product $product = null)
    {
        if($product == null)
            return;

        $validator = [
            'visibility' => 'required|boolean',
        ];
        
        if(self::hasAnyExcept(array_keys($validator), $request->keys()))
            return abort(401);

        $request->validate($validator);
        $product->visibility = $request['visibility'];

        $product->save();
        return response()->json(['status' => 'ok']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function updateAvailableCount(Request $request, Product $product = null)
    {
        if($product == null)
            return;

        $validator = [
            'available_count' => 'required|integer|min:0',
        ];
        
        if(self::hasAnyExcept(array_keys($validator), $request->keys()))
            return abort(401);

        $request->validate($validator);
        $product->available_count = $request['available_count'];

        $product->save();
        return response()->json(['status' => 'ok']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        if(PurchaseItems::where('product_id', $product->id)->count() > 0) {
            return response()->json(['status' => 'nok', 'msg' => 'فردی این محصول را خریداری کرده است و امکان حذف آن وجود ندارد.']);
        }

        $productGalleryController = new GalleryController();
        foreach($product->galleries as $gallery)
            $productGalleryController->destroy($gallery);

        $deleted = $product->delete();
        if($deleted) {
            if($product->img != null && 
                file_exists(__DIR__ . '/../../../public/storage/products/' . $product->img))
                unlink(__DIR__ . '/../../../public/storage/products/' . $product->img);
        }

        return response()->json(['status' => 'ok']);
    }
}
