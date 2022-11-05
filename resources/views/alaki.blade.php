@extends('layouts.structure')

@section('header')

    @parent

    <script src="https://cdn.parsimap.ir/third-party/leaflet/v1.7.1/leaflet.js"></script>
    <link
        href="https://cdn.parsimap.ir/third-party/leaflet/v1.7.1/mapbox-gl.css"
        rel="stylesheet"
    />

@stop


@section('content')

    <script src="https://cdn.parsimap.ir/third-party/leaflet/plugins/parsimap-tile/v1.0.0/parsimap-tile.js"></script>

    <div class="col-md-12">
        <div id="map" style="width: 100%; height: 300px"></div>
    </div>

    <script>
        
        const map = new L.Map('map', {
            center: [35.7575, 51.41],
            zoom: 12,
        })

        L.parsimapTileLayer('parsimap-streets-v11-raster', {
            key: 'p1c7661f1a3a684079872cbca20c1fb8477a83a92f',
        }).addTo(map);

    </script>

@stop