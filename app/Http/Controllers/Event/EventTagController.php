<?php

namespace App\Http\Controllers\Event;

use App\Http\Controllers\Controller;
use App\Http\Resources\EventTagResource;
use App\Models\EventTag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class EventTagController extends Controller
{


    public function search(Request $request) {

        //todo : uncomment
        $validator = [
            // 'key' => 'required|persian_alpha|min:2|max:15',
            'key' => 'required|min:2|max:15'
        ];

        if(self::hasAnyExcept(array_keys($validator), $request->keys()))
            return abort(401);

        $request->validate($validator);
        $categories = EventTag::where('label', 'like', '%' . $request['key'] . '%')
            ->get();
        
        return response()->json([
            'status' => 'ok',
            'data' => EventTagResource::collection($categories)->toArray($request)
        ]);
    }

    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('admin.eventTag.list', 
            ['items' => EventTagResource::collection(EventTag::all())->toArray($request)]
        );
        
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        return response()->json([
            'status' => 'ok',
            'data' => EventTagResource::collection(EventTag::all())->toArray($request)
        ]);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.eventTag.create');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = [
            'label' => 'required|string|min:2',
            'visibility' => 'required|boolean'
        ];
        
        if(self::hasAnyExcept(array_keys($validator), $request->keys()))
            abort(401);
        
        $request->validate($validator);

        EventTag::create($request->toArray());
        return Redirect::route('eventTags.index');
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function edit(EventTag $eventTag)
    {
        return view('admin.eventTag.create', ['item' => $eventTag]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  EventTag $eventTag
     * @return \Illuminate\Http\Response
     */
    public function update(EventTag $eventTag, Request $request)
    {
        $validator = [
            'label' => 'required|string|min:2',
            'visibility' => 'nullable|boolean'
        ];
        
        if(self::hasAnyExcept(array_keys($validator), $request->keys()))
            abort(401);
        
        $request->validate($validator);
        $eventTag->label = $request['label'];
        $eventTag->visibility = $request->has('visibility') ? $request['visibility'] : $eventTag->visibility;
        $eventTag->save();
        
        return Redirect::route('eventTags.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  EventTag  $eventTag
     * @return \Illuminate\Http\Response
     */
    public function destroy(EventTag $eventTag)
    {
        $deleted = $eventTag->delete();
        if($deleted)
            return response()->json(['status' => 'ok']);
            
        return response()->json([
            'status' => 'nok', 
            'msg' => 'رویدادی از این آیتم استفاده می کند و امکان حذف آن وجود ندارد.'
        ]);
    }


    public function list(EventTag $tag, Request $request) {
        
        if(!$tag->visibility)
            return Redirect::route('403');

        $label = $tag->label;
        $whereClause = "events.visibility = true and end_registry > " . time() . " and tags like '%" . $label . "%'";
        $attrs = DB::connection('mysql2')->select('select price, language, facilities, age_description, level_description from events where ' . $whereClause);
        $cities = DB::connection('mysql2')->select('select cities.id, cities.name from events, cities where city_id is not null and city_id = cities.id and ' . $whereClause . ' group by(cities.id)');
        $launchers = DB::connection('mysql2')->select('select distinct(launcher_id) as id, launchers.company_name from launchers, events where launcher_id = launchers.id and ' . $whereClause);

        $minPrice = null;
        $maxPrice = null;
        $langs = [];
        $facilities = [];
        $ages = [];
        $levels = [];

        foreach($attrs as $attr) {

            if($minPrice == null || $minPrice > $attr->price)
                $minPrice = $attr->price;

            if($maxPrice == null || $maxPrice < $attr->price)
                $maxPrice = $attr->price;

            if(array_search($attr->level_description, $levels) === false)
                array_push($levels, $attr->level_description);

            if(array_search($attr->age_description, $ages) === false)
                array_push($ages, $attr->age_description);

            $facils = explode('_', $attr->facilities);

            foreach($facils as $facil) {

                if(empty($facil))
                    continue;

                if(array_search($facil, $facilities) === false)
                    array_push($facilities, $facil);
            }

            $l = explode('_', $attr->language);
            foreach($l as $itr) {
                if(array_search($itr, $langs) === false)
                    array_push($langs, $itr);
            }
            
        }

        return view('event.list', [
            'name' => $label,
            'id' => $tag->id,
            'launchers' => $launchers,
            'maxPrice' => $maxPrice,
            'minPrice' => $minPrice,
            'cities' => $cities,
            'facilities' => $facilities,
            'langs' => $langs,
            'ages' => $ages,
            'levels' => $levels,
        ]);
    }

    
    public function allCategories(string $orderBy, Request $request) {
        
        $catId = null;
        $whereClause = $catId == null ? "products.visibility = true" : "products.visibility = true and category_id = " . $catId;
        $minMax = DB::select('select max(price) as maxPrice, min(price) as minPrice from products where ' . $whereClause);
        $categories = DB::select('select distinct(category_id) as id, categories.name from products, categories where category_id = categories.id and ' . $whereClause);
        $sellers = DB::select('select distinct(seller_id) as id, sellers.name from sellers, products where seller_id = sellers.id and ' . $whereClause);
        $brands = DB::select('select distinct(brand_id) as id, brands.name from products, brands where brand_id = brands.id and ' . $whereClause);
        
        
        return view('shop.list', [
            'path' => [],
            'orderBy' => $orderBy,
            'name' => 'تازه ترین ها',
            'features' => [],
            'has_sub' => false,
            'categories' => $categories,
            'sellers' => $sellers,
            'brands' => $brands,
            'maxPrice' => $minMax[0]->maxPrice,
            'minPrice' => $minMax[0]->minPrice,
        ]);

    }


}
