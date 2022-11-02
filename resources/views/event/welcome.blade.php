@extends('layouts.structure')

@section('content')

@include('layouts.slider')    
    <script>
        var eventPrefixRoute = '{{ route('home') }}' + "/event";
    </script>
                @include('event.layouts.slider')
                @include('event.layouts.box', ['id' => 'latest_events_when_not_filled', 'title' => 'تازه ترین ها'])
                @include('event.layouts.box', ['id' => 'most_like_events_when_not_filled', 'title' => 'محبوب ترین ها'])
                @include('event.layouts.box', ['id' => 'most_seen_events_when_not_filled', 'title' => 'پر بازدید ترین ها'])
                
                @include('sections.top_events_slider', [
                    'id' => 'latest_events_when_filled', 
                    'searchKey' => 'createdAt', 'key' => 'latestEvent', 
                    'title' => 'تازه ترین ها', 'not_fill_id' => 'latest_events_when_not_filled'
                ])

                @include('sections.top_events_slider', ['id' => 'most_like_events_when_filled', 'searchKey' => 'rate', 
                    'key' => 'mostLikeEvent', 'title' => 'محبوب ترین ها', 'not_fill_id' => 'most_like_events_when_not_filled'])
                @include('sections.top_events_slider', ['id' => 'most_seen_events_when_filled', 'searchKey' => 'seen', 
                    'key' => 'mostSeenEvent', 'title' => 'پر بازدیدترین ها', 'not_fill_id' => 'most_seen_events_when_not_filled'])
                
                @include('layouts.banner')

                {{-- @include('sections.top_categories_events') --}}
            
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