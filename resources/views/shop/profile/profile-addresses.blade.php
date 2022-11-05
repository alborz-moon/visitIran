
@extends('layouts.structure')

@section('content')

    <script>
        let mode = 'create';
        let selectedAddrId;
    </script>
    <main class="page-content">
        <div class="container">
            <div class="row mb-5">
                
                @include('shop.profile.layouts.profile_menu')     

                <div class="col-xl-9 col-lg-8 col-md-7">
                    <div class="ui-box bg-white mb-5">
                        <div class="ui-box-title">آدرس ها</div>
                        <div class="ui-box-content">
                            @include('shop.layouts.user-address-items')
                        </div>
                    </div>

                    <script src="https://cdn.parsimap.ir/third-party/leaflet/plugins/parsimap-tile/v1.0.0/parsimap-tile.js"></script>

                    <div class="col-md-12">
                        <div id="map" style="width: 100%; height: 300px"></div>
                    </div>
                
                </div>

                @include('shop.layouts.modal-address')

            </div>
        </div>
    </main>
@stop

@section('footer')
    @parent
@stop

@section('extraJS')
    @parent
@stop