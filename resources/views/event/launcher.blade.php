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
{{-- TopParentBannerMoveOnTop --}}
    <div class="TopParentBannerMoveOnTop">
        <div class="w-100 h-240">
            <img src="{{ $launcher['back_img']}}" class="w-100 h-100 objectFitCover backgroundYellow overFlowHidden"  alt="">
            <div class="container">
                <div class="row">
                    <div class="col-12 position-relative">
                        <div class="followImage position-absolute backgroundColorBlue">
                            <img class="w-100 h-100 objectFitCover" src="{{ $launcher['img']}}" alt="">
                        </div>
                        <div class="followLabel position-absolute p-2 px-4">
                            <div class="fontSize22 bold">{{ $launcher['company_name']}}</div>
                            <div class="spaceBetween gap15">
                                <div style="display: flex!important" class="align-items-center px-2 fontSize14 fontWight400 colorYellow">
                                    <i class=" fontSize14 fontWight400 icon-visit-star me-1 fontSize14 verticalAlign-2"></i> 
                                    {{ $launcher['rate']}}
                                    <span class="textColor mx-1">(از <span id="rate_count">{{ $launcher['rate_count']}}</span> رای)</span>
                                </div>
                                <div style="display: flex!important" class="align-items-center px-2 fontSize14 fontWight400 colorYellow">
                                    <i class=" fontSize14 fontWight400 icon-visit-person me-1 fontSize14 verticalAlign-2"></i>
                                    {{ $launcher['follower_count']}}
                                </div>
                            </div>
                        </div>
                        <div class="position-absolute zIndex2 followBtn">
                            {{-- <button class="" data-select="off" class="buttonBasketEvent">
                                <span class="colorWhiteGray fontSize13 paddingRight5 px-2">دنبال کردن</span>
                                <i class="icon-visit-person colorWhiteGray verticalAlign-2 px-2"></i>
                            </button> --}}
                            <button data-select="{{ $launcher['launcher_is_following'] ? 'on' : 'off' }}" class=" d-flex alignItemsCenter whiteSpaceNoWrap buttonBasketEvent followToggle {{ $launcher['launcher_is_following'] ? 'backgroundYellow' : '' }}">
                                <span class="colorWhiteGray fontSize13 px-2 d-flex folllowText">
                                    {{$launcher['launcher_is_following'] ? 'دنبال شده' : 'دنبال کردن' }}
                                </span>
                                <i class="icon-visit-person colorWhiteGray d-flex px-2"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="product-detail-container">
                <div class="row">
                    <div class="col-lg-9">
                        <!-- end of product-params -->
                           <div class="mt-5 pt-5">
                             @include('event.layouts.launcher',['launcher' => null, 'launcherId' => $launcher['id'], 'showLauncher' => true])
                           </div>
                        <!-- end of product-gallery -->
                        <!-- start of product-comments -->
                        <div class="fontSize18 bold mb-5">دیدگاه ها </div>
                            @include('shop.product.write-comment', 
                            ['itemId' => $launcher['id'],
                            'itemImg' => $launcher['img'],
                            'itemName' => $launcher['company_name'], 
                            'sendComment' => route('launcher.launcher_comment.store', 
                            ['launcher' => $launcher['id']])])

                            @include('shop.product.comments-show', [
                                'type' => 'launcher', 
                                'fetchUrl' => route('launcher.launcher_comment.list', 
                                ['launcher' => $launcher['id']]), 
                                'itemtId' => $launcher['id'],
                                'rate' => $launcher['rate'],
                                'rate_count' => $launcher['rate_count']
                            ])
                            <!-- end of product-comments -->
                    </div>
                    <div class="col-lg-3 p-2">
                        <!-- start of product-seller-info -->
                        <div class="ui-sticky ui-sticky-top StickyMenuMoveOnTop zIndex0">
                            {{-- <div class="product-seller-info ui-box p-0 backColorWhite">
                                <div class="seller-info-changeable">
                                    <div class="product-seller-row p-0 d-flex">
                                        <div class="product-seller-row-icon marginTop9">
                                            <!-- <i class="ri-store-3-fill"></i> -->
                                            <i class="icon-visit-location fontSize29 colorYellow"></i>
                                        </div>
                                        <div class="product-seller-row-detail">
                                            <div class="seller-final-score-container">
                                                <div class="seller-rate-container">
                                                    <span class="fontSize13 fontNormal colorBlack">{{ $launcher['launcher_address']}}،</span>
                                                </div>
                                            </div>
                                            <a href="#" class="seller-info-link"></a>
                                        </div>
                                    </div>
                                        <div class="d-flex spaceAround mt-1 mb-2">
                                            <button data-remodal-target="modal-map" class="mapModalBtn buttonBasketEvent whiteSpaceNoWrap btnEventHover">
                                                <span class="colorWhiteGray fontSize13 paddingRight5 px-2">مشاهده رو نقشه</span>
                                                <i class="icon-visit-eye colorWhiteGray verticalAlign-2 px-2"></i>
                                            </button>
                                            <button class="buttonBasketEvent whiteSpaceNoWrap btnEventHover">
                                                <a target="_blank" href="https://www.google.com/maps/dir/?api=1&destination={{ $launcher['x'] . ',' . $launcher['y'] }}" class="colorWhiteGray fontSize13 paddingRight5 px-2">مسیر یابی</a>
                                                <i class="icon-visit-location colorWhiteGray verticalAlign-2 px-2"></i>
                                            </button>
                                        </div>
                                    <hr>
                                    <div class="product-seller-row p-0 spaceBetween bold">
                                        <div class="product-seller-row-icon marginTop9">
                                            <i class="icon-visit-phone fontSize29  colorYellow"></i>
                                        </div>
                                        <div class="product-seller-row-detail d-flex align-items-center justifyContentEnd">
                                            <div class="seller-final-score-container p-2">
                                                <div class="seller-rate-container">
                                                    <div class="colorBlack fontSize12">
                                                        <?php $i = 0 ?>
                                                        @foreach ( $launcher['launcher_phone'] as $phone)
                                                            <a href="tel:{{$phone}}" class="colorBlack fontSize14 fontWight400">{{ $phone }}
                                                                @if($i < count($launcher['launcher_phone']) - 1)
                                                                    <span class="mx-1">-</span>
                                                                @endif
                                                            </a>
                                                            <?php $i++; ?>
                                                        @endforeach
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="product-seller-row p-0 d-flex spaceBetween bold">
                                         <div class="product-seller-row-icon marginTop9">
                                            <i class="icon-visit-mail fontSize29 colorYellow"></i>
                                        </div>
                                        <div class="product-seller-row-detail d-flex align-items-center justify-content-end">
                                            <div class="seller-final-score-container p-2">
                                                <div class="seller-rate-container ">
                                                    <a href="mailto:{{$launcher['launcher_email']}}" class="colorBlack fontSize14 fontWight400 px-2 d-flex justify-content-end">
                                                        {{$launcher['launcher_email']}}
                                                    </a>
                                                </div>
                                            </div>
                                            <a href="#" class="seller-info-link"></a>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="product-seller-row p-0 d-flex spaceBetween bold">
                                         <div class="product-seller-row-icon marginTop9">
                                            <i class="icon-visit-website fontSize29 colorYellow"></i>
                                        </div>
                                        <div class="product-seller-row-detail d-flex align-items-center justify-content-end">
                                            <div class="seller-final-score-container p-2">
                                                <div class="seller-rate-container ">
                                                    <a href="{{ $launcher['launcher_site']}}" class="h-20 overFlowHidden colorBlack fontSize14 fontWight400 px-2 d-flex justify-content-end ltr">{{ $launcher['launcher_site']}}</a>
                                                </div>
                                            </div>
                                            <a href="#" class="seller-info-link"></a>
                                        </div>
                                    </div>
                                </div>
                            </div> --}}
                            @include('event.layouts.infoBoxEvent',['event' => $launcher])
                            <!-- end of product-seller-info -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.parsimap.ir/third-party/mapbox-gl-js/plugins/parsimap-geocoder/v1.0.0/parsimap-geocoder.js"></script>
    <link
      href="https://cdn.parsimap.ir/third-party/mapbox-gl-js/plugins/parsimap-geocoder/v1.0.0/parsimap-geocoder.css"
      rel="stylesheet"
    />
@stop


@section('extraJS')
    @parent
    <script>
        var map = undefined;
        
        // $('#followToggle').on('click',function(){
        //     if($(this).attr('data-select') === 'off')
        //     $('#followToggle').css('backgroundColor','#c59358').attr('data-select', 'on');
        //     else
        //     $('#followToggle').css('backgroundColor','transparent').attr('data-select', 'off');
        // });
        $(document).ready(function(){
            
            $('.followToggle').on('click',function() {

                @if(!$is_login)
                    showErr('لطفا ابتدا ورود کنید');
                    return;
                @endif
            
                let follow = $(this).attr('data-select') === 'off';
                $.ajax({
                    type: 'post',
                    url: '{{ route('launcher.follow.store', ['launcher' => $launcher['id']]) }}',
                    data: {
                        follow: follow ? 1 : 0
                    },
                    success: function(res) {
                    
                        if(res.status === 'ok') {
                        
                            if(follow) {
                                showSuccess("برگزارکننده دنبال شد !");
                                $('.followToggle').css('backgroundColor','#c59358').attr('data-select', 'on');
                                $(".folllowText").text("دنبال شده");
                            } else{
                                showSuccess("برگزارکننده دنبال نشد !");
                                $('.followToggle').css('backgroundColor','transparent').attr('data-select', 'off');
                                $(".folllowText").text("دنبال کردن");
                            }
                        
                        }

                    }
                });
            
            });

            let y = parseFloat('{{$launcher['y']}}');
            let x = parseFloat('{{$launcher['x']}}');

            $(document).on('click', '.mapModalBtn', function() {
                mapMaker();
            });
        
            function mapMaker(){
                if(map === undefined) {
                    mapboxgl.setRTLTextPlugin(
                        'https://cdn.parsimap.ir/third-party/mapbox-gl-js/plugins/mapbox-gl-rtl-text/v0.2.3/mapbox-gl-rtl-text.js',
                        null,
                    );
                    map = new mapboxgl.Map({
                        container: 'launchermap',
                        style: 'https://api.parsimap.ir/styles/parsimap-streets-v11?key=p1c7661f1a3a684079872cbca20c1fb8477a83a92f',
                        center: x !== undefined && y !== undefined ? [y, x] : [51.4, 35.7],
                        zoom: 13,
                    });
                    var marker = undefined;
                
                    if(x !== undefined && y !== undefined) {
                        marker = new mapboxgl.Marker();
                        marker.setLngLat({lng: y, lat: x}).addTo(map);
                    }
                }
            }
    })
    </script>
@stop