@extends('layouts.structure')

@section('header')

    @parent

    <script src="https://cdn.parsimap.ir/third-party/mapbox-gl-js/v1.13.0/mapbox-gl.js"></script>
    <link
      href="https://cdn.parsimap.ir/third-party/mapbox-gl-js/v1.13.0/mapbox-gl.css"
      rel="stylesheet"
    />

@stop


@section('content')

    <script src="https://cdn.parsimap.ir/third-party/leaflet/plugins/parsimap-tile/v1.0.0/parsimap-tile.js"></script>

    <div class="col-md-12">
        <div id="map" style="width: 100%; height: 300px"></div>
    </div>

    <script>
        


    </script>
@stop