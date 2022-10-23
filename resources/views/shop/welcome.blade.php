@extends('layouts.structure')

@section('content')

@include('layouts.slider')    
    <script>
        var productPrefixRoute = '{{ route('home') }}' + "/product";
    </script>
                @include('layouts.tiles', ['category' => null])

                @include('layouts.box', ['id' => 'latest_products_when_not_filled', 'title' => 'تازه ترین ها'])
                @include('layouts.box', ['id' => 'most_like_products_when_not_filled', 'title' => 'محبوب ترین ها'])
                @include('layouts.box', ['id' => 'most_seen_products_when_not_filled', 'title' => 'پر بازدید ترین ها'])
                
                @include('sections.top_products_slider', ['id' => 'latest_products_when_filled', 'searchKey' => 'createdAt', 
                    'key' => 'latestProduct', 'title' => 'تازه ترین ها', 'not_fill_id' => 'latest_products_when_not_filled'])
                @include('sections.top_products_slider', ['id' => 'most_like_products_when_filled', 'searchKey' => 'rate', 
                    'key' => 'mostLikeProduct', 'title' => 'محبوب ترین ها', 'not_fill_id' => 'most_like_products_when_not_filled'])
                @include('sections.top_products_slider', ['id' => 'most_seen_products_when_filled', 'searchKey' => 'seen', 
                    'key' => 'mostSeenProduct', 'title' => 'پر بازدیدترین ها', 'not_fill_id' => 'most_seen_products_when_not_filled'])
                
                @include('layouts.banner')

                @include('sections.top_categories_products')

                @include('layouts.news')
                <!-- end of box => categories-slider -->
                
            
@stop

@section('footer')
    @include('layouts.faq')
    @parent
@stop

@section('extraJS')
    @parent
    <script src="{{ asset('theme-assets/js/theme.js') }}"></script>
    <script src="{{ asset('theme-assets/js/custom.js') }}"></script>
    <script src="{{ asset('theme-assets/js/home.js') }}"></script>

@stop