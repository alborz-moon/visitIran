<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use App\Http\Resources\BrandResource;
use App\Http\Resources\CategoryDigest;
use App\Http\Resources\OffResource;
use App\Http\Resources\SellerResource;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Off;
use App\Models\Seller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class OffController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $filter = Off::where('id', '>=', 1);
        
        $expired = $request->query('expired', null);
        $general = $request->query('general', null);
        $type = $request->query('type', null);
        $brand_id = $request->query('brand', null);
        $category_id = $request->query('category', null);
        $seller_id = $request->query('seller', null);
        $from_expiration = $request->query('from_expiration', null);
        $to_expiration = $request->query('to_expiration', null);

        $order_by = $request->query('order_by', null);
        $order_by_type = $request->query('order_by_type', null);

        $today = (int)self::getToday()['date'];

        if($expired == null || !$expired)
            $filter->where('off_expiration', '>=', $today);
        else
            $filter->where('off_expiration', '<', $today);

        if($type != null)
            $filter->where('off_type', $type);

        if($from_expiration != null) {
            $from_expiration = (int)self::convertDateToString($from_expiration);
            $filter->where('off_expiration', '>=', $from_expiration);
        }
        
        if($to_expiration != null) {
            $to_expiration = (int)self::convertDateToString($to_expiration);
            $filter->where('off_expiration', '<=', $to_expiration);
        }

        if($general != null && $general)
            $filter->whereNull('user_id');
        else if($general != null)
            $filter->whereNotNull('user_id');

        if($brand_id != null)
            $filter->where('brand_id', $brand_id);
            
        if($category_id != null)
            $filter->where('category_id', $category_id);
            
        if($seller_id != null)
            $filter->where('seller_id', $seller_id);

        if($order_by == null ||
            ($order_by != 'createdAt' && $order_by != 'expiredAt')
        ) {
            $order_by = 'createdAt';
            $order_by_type = 'asc';
            $filter->orderBy('id', 'desc');
        }
        else {
            if($order_by_type != 'asc' && $order_by_type != 'desc')
                $order_by_type = 'asc';

            if($order_by == 'createdAt')
                $filter->orderBy('id', $order_by_type);

            if($order_by == 'expiredAt')
                $filter->orderBy('off_expiration', $order_by_type);
        }

        $offs = $filter->paginate(20);

        return view('admin.off.list', [
            'items' => OffResource::collection($offs)->toArray($request),
            'links' => $offs->links(),
            'categories' => CategoryDigest::collection(Category::all())->toArray($request),
            'brands' => BrandResource::collection(Brand::all())->toArray($request),
            'sellers' => SellerResource::collection(Seller::all())->toArray($request),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request, $err=null)
    {
        return view('admin.off.create', [
            'categories' => CategoryDigest::collection(Category::all())->toArray($request),
            'brands' => Brand::all(),
            'sellers' => Seller::all(),
            'err' => $err
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
            
        if($request->has('category_id') && $request['category_id'] == -1)
            $request['category_id'] = null;
            
        if($request->has('brand_id') && $request['brand_id'] == -1)
            $request['brand_id'] = null;

        $validator = [
            'amount' => 'required|integer|min:0',
            'off_type' => ['required', Rule::in(['value', 'percent'])],
            'off_expiration' => 'required|date',
            'username' => 'nullable|exists:users,phone',
            'category_id' => 'nullable|exists:categories,id',
            'brand_id' => 'nullable|exists:brands,id',
            'seller_id' => 'nullable|exists:sellers,id',
            'code' => 'nullable|string|min:3'
        ];
        
        if(self::hasAnyExcept(array_keys($validator), $request->keys()))
            return abort(401);

        $validator = Validator::make($request->all(), $validator);

        if($request['off_type'] == 'percent' && ($request['amount'] > 100  || $request['amount'] < 1))
            return $this->create($request, 'میزان تخفیف باید بین 1 تا 100 باشد.');

        $today = (int)self::getToday()['date'];
        $expiration = (int)self::convertDateToString($request['off_expiration']);

        if($today >= $expiration)
            return $this->create($request, 'زمان انقضا باید از امروز بزرگ تر باشد');

        $request['off_expiration'] = $expiration;

        Off::create($request->toArray());
        return Redirect::route('off.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Off  $off
     * @return \Illuminate\Http\Response
     */
    public function edit(Off $off, Request $request, $err=null)
    {
        return view('admin.off.create', [
            'categories' => CategoryDigest::collection(Category::all())->toArray($request),
            'brands' => Brand::all(),
            'sellers' => Seller::all(),
            'item' => OffResource::make($off)->toArray($request),
            'err' => $err
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Off  $off
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Off $off)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Off  $off
     * @return \Illuminate\Http\Response
     */
    public function destroy(Off $off)
    {
        $off->delete();
        return response()->json(['status' => 'ok']);
    }
}
