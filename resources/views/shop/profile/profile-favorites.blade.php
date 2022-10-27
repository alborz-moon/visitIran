
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
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
            <!-- start of remove-from-favorite-modal -->
            <div class="remodal remodal-xs" data-remodal-id="remove-from-favorite-modal"
                data-remodal-options="hashTracking: false">
                <div class="remodal-header">
                    <button data-remodal-action="close" class="remodal-close"></button>
                </div>
                <div class="remodal-content">
                    <div class="text-muted fs-7 fw-bold mb-3">
                        آیا مطمئنید که این محصول از لیست مورد علاقه شما حذف شود؟
                    </div>
                </div>
                <div class="remodal-footer">
                    <button data-remodal-action="cancel" class="btn btn-sm btn-outline-light px-3 me-2">خیر</button>
                    <button class="btn btn-sm btn-primary px-3">بله</button>
                </div>
            </div>
            <!-- end of remove-from-favorite-modal -->
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
                        html +='<a href="' + res.data[i].href + '"><img src="' + res.data[i].img + '" alt="' + res.data[i].alt + '"></a>';
                        html +='</div>';
                        html +='<div class="detail">';
                        html +='<a href="' + res.data[i].href + '" class="title fs-7 fw-bold mb-2">' + res.data[i].name + '</a>';
                        html +='<div class="d-flex justify-content-start align-items-center"';
                        if(res.data[i].rate != null) {
                            for(var j = 5; j >= 1; j--) {
                                if(j <= res.data[i].rate)
                                    html += '<i class="icon-visit-star me-1 fontSize21"></i>';
                                else
                                    html += '<i class="icon-visit-staroutline me-1 fontSize14"></i>';
                            }
                        }
                        html +='</div>';
                        html +='<div class="price fa-num">';
                        if (res.data[i].off != null){
                            html +='<div class="fw-bold fontSize15 colorRed">' + res.data[i].off + '</div>';
                        }
                        html +='<span class="fw-bold fontSize15">' + res.data[i].price + '</span>';
                        html +='<span class="currency colorYellow">ت</span>';
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
                    $("#favorites").empty().append(html);
                }
            }
        });
    </script>
@stop
