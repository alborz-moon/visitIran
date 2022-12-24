@extends('layouts.structure')

@section('content')

    <script>
        var eventPrefixRoute = '{{ route('home') }}' + "/event";
    </script>
                @include('event.layouts.slider')
                @include('event.layouts.searchbar')
                @include('event.layouts.box', ['id' => 'most_seen_events_when_not_filled', 'title' => 'پر فروش ترین ها'])
                @include('event.layouts.box', ['id' => 'latest_events_when_not_filled', 'title' => 'درضمینه'])
                @include('event.layouts.box', ['id' => 'most_like_events_when_not_filled', 'title' => 'بهترین برگزار کننده'])
                
                @include('sections.top_events_slider', ['id' => 'most_seen_events_when_filled', 'searchKey' => 'seen', 
                    'key' => 'mostSeenEvent', 'title' => 'پر فروش ترین ها', 'not_fill_id' => 'most_seen_events_when_not_filled'])

                @include('layouts.banner')

                @include('sections.top_events_slider', ['id' => 'latest_events_when_filled', 'searchKey' => 'createdAt',
                 'key' => 'latestEvent', 'title' => 'درضمینه', 'not_fill_id' => 'latest_events_when_not_filled','fill_input' => 'eventType'])

                @include('sections.top_events_slider', ['id' => 'most_like_events_when_filled', 'searchKey' => 'rate', 
                    'key' => 'mostLikeEvent', 'title' => 'بهترین برگزار کننده', 'not_fill_id' => 'most_like_events_when_not_filled'])
                
                @include('layouts.news')

                {{-- @include('sections.top_categories_events') --}}
            
@stop

@section('footer')
    @include('layouts.faq')
    @parent
@stop

@section('extraJS')
    @parent
    <script src="{{ asset('theme-assets/js/home.js') }}"></script>
@stop