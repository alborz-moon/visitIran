
@extends('layouts.structure')
@section('content')
        <main class="page-content">
            <div class="container">
                <div class="row mb-5">
                    @include('shop.profile.layouts.profile_menu')
                                        <div class="col-xl-9 col-lg-8 col-md-7">
                        <div class="ui-box bg-white mb-5">
                            <div class="ui-box-title">کالاهای مورد علاقه</div>
                            <div class="ui-box-content">
                                <div class="product-list">
                                    <div id="favorites" class="row">
                                        <div class="col-md-6 mb-3">
                                            <!-- start of product-list-item -->
                                            <div class="product-list-item border-bottom pb-3">
                                                <div class="thumbnail">
                                                    <a href="#"><img src="./theme-assets/images/carts/01.jpg"
                                                            alt=""></a>
                                                </div>
                                                <div class="detail">
                                                    <a href="#" class="title fs-7 fw-bold mb-2">هدفون بی سیم سامسونگ مدل
                                                        Galaxy
                                                        Buds
                                                        Live
                                                    </a>
                                                    <div class="price fa-num">
                                                        <span class="fw-bold">2,110,000</span>
                                                        <span class="currency">تومان</span>
                                                    </div>
                                                    <div class="action">
                                                        <a href="#" class="btn btn-circle btn-outline-light"
                                                            data-remodal-target="remove-from-favorite-modal"><i
                                                                class="ri-close-line"></i></a>
                                                    </div>
                                                </div>
                                            </div>
                                            <!-- end of product-list-item -->
                                        </div>
                                        <!-- end -->
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
@stop

@section('footer')
    @parent
@stop

@section('extraJS')
    @parent
    <script src="{{ asset('theme-assets/js/theme.js') }}"></script>
    <script src="{{ asset('theme-assets/js/custom.js') }}"></script>
        
    <script>
        $.ajax({
            type: 'get',
            url: '{{ route('api.product.my') }}',
            headers: {
                'accept': 'application/json'
            },
            success: function(res) {
                var html= "";
                if(res.status === "ok") {
                    for(var i = 0; i < res.data.length; i++) {
                        html +='<div class="col-md-6 mb-3">';
                        html +='<div class="product-list-item border-bottom pb-3">';
                        html +='<div class="thumbnail">';
                        html +='<a href="#"><img src="./theme-assets/images/carts/01.jpg" alt=""></a>';
                        html +='</div>';
                        html +='<div class="detail">';
                        html +='<a href="#" class="title fs-7 fw-bold mb-2">هدفون بGalaxy</a>';
                        html +='<div class="price fa-num">';
                        html +='<span class="fw-bold">2,110,000</span>';
                        html +='<span class="currency">تومان</span>';
                        html +='</div>';
                        html +='<div class="action">';
                        html +='<a href="#" class="btn btn-circle btn-outline-light" data-remodal-target="remove-from-favorite-modal">';
                        html +='<i class="ri-close-line"></i>';
                        html +='</a>';
                        html +='</div>';
                        html +='</div>';
                        html +='</div>';
                        html +='</div>';
                    }
                }
            }
        });
    </script>
@stop
