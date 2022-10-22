@extends('layouts.structure')

@section('seo')
    <title>غذاهای محلی یا جاهای دیدنی کیش | تونل باد میکامال</title>
    <meta property="og:title" content="غذاهای محلی یا جاهای دیدنی کیش | تونل باد میکامال" />
    <meta name="twitter:title" content="غذاهای محلی یا جاهای دیدنی کیش | تونل باد میکامال" />
    <meta property="og:site_name" content="غذاهای محلی یا جاهای دیدنی کیش | تونل باد میکامال" />

    
    <meta property="og:image" content="{{ $product['img'] }}"/>
    <meta property="og:image:secure_url" content="{{ $product['img'] }}"/>
    <meta name="twitter:image" content="{{ $product['img'] }}"/>
    <meta property="og:description" content="{{ $product['digest'] }}" />
    <meta name="twitter:description" content="{{ $product['digest'] }}" />
    <meta name="description" content="{{ $product['digest'] }}"/>

    <meta name="keywords" content="{{ $product['keywords'] }}" />
    {{-- <meta property="article:tag" content="{{ $product['tags'] }}"/> --}}

    <script>var productPrefixRoute = '{{ route('home') }}' + "/product";</script>

@stop

@section('content')
<div class="container">
        <main class="page-content TopParentBannerMoveOnTop">
            <div class="container">
                <!-- start of product-detail-container -->
                <!-- start of breadcrumb -->
                <div class="product-detail-container mb-3">
                <nav aria-label="breadcrumb" style="display: flex;justify-content:space-between;">
                    <ol class="breadcrumb">
                        <?php $i = 1; ?>
                        @foreach($product['parentPath'] as $path)
                            <li>
                                @if($i != count($product['parentPath']))
                                    <a href="{{route('single-category', ['category' => $path['id'], 'slug' => $path['slug']])}}" class="colorBlack btnHover">{{ $path['name'] }}</a>
                                    <span> / </span>
                                @else
                                    <a class="colorBlack btnHover">{{ $path }}</a>
                                @endif
                            </li>
                            <?php $i++; ?>
                        @endforeach
                    </ol>
                    @include('product.bookmark', ['product' => $product])
                </nav>
                
                <!-- end of breadcrumb -->
                    <div class="row mb-5">
                        <div class="col-lg-4 col-md-5 mb-md-0 mb-4">
                            <div class="ui-sticky ui-sticky-top">
                                <!-- start of product-gallery -->
                                <div class="product-gallery">
                                    
                                    <div class="gallery-img-container">
                                        <div class="gallery-img m-0" id="galleryMain">
                                            <img class="zoom-img b-0" src="{{ $product['img'] }}" alt="{{ $product['alt'] }}" />
                                        </div>
                                        <div class="gallery-thumbs overflowHidden">
                                            <ul id="gallery">
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <!-- end of product-gallery -->
                            </div>
                        </div>
                        <div class="col-xl-5 col-lg-4 col-md-7 mb-lg-0 mb-4">
                            <!-- start of product-detail -->
                            <h2 id="productTitle" class="product-title">{{ $product['name'] }}</h2>
                            <div class="product-user-meta fa-num mb-4 spaceBetween">
                                <span class="product-users-rating" >
                                    <span class="rattingToStar"></span>
                                    <span class="fw-bold me-1 fontSize22 colorYellow">{{ $product['rate'] }}</span>
                                    <span class="text-muted fs-7">(از <span>{{ $product['all_rates_count'] }}</span> رای)</span>
                                </span>
                                <a href="#" class="link border-bottom-0 fs-7 me-1 text-muted"> دیدگاه کاربران <span class="mr-1">({{ $product['all_comments_count'] }})</span></a>
                            </div>
                            @if($product['seller'] !== '')
                                <div class="product-variant-selected-label bold mb-3 seller d-flex justify-content-center align-items-center pl-2 fontSize18">سازنده <div class="line mr-15"></div> </div>
                                <div  class="mb-3 fontSize16">{{ $product['seller'] }}</div>
                            @endif
                            <div id="color-div" class="product-variants-container mb-3 hidden">
                                <div class="product-variant-selected-container spaceBetween" >
                                    <div class="product-variant-selected-label bold mb-3 seller d-flex justify-content-center align-items-center pl-2 fontSize18">رنگ</div>
                                    <div class="line mr-15 ml-15"></div>
                                    <div id="product-color-variant-selected" class="product-variant-selected"></div> 
                                </div>
                                <div id="product-colors-variants" class="product-variants">
                                </div>
                            </div>
                            
                            <div id="dynamic_multi_choice_features">

                            </div>

                            <div class="expandable-text mb-3" style="height: 200px;">
                                <div class="expandable-text_text">
                                    <div class="product-params">
                                        <div class="product-variant-selected-label bold mb-3 seller d-flex justify-content-center align-items-center pl-2 fontSize18 whiteSpaceNoWrap">ویژگی ها
                                            <div class="line mr-15"></div> 
                                        </div>
                                        <ul id="property">
                                        </ul>
                                    </div>
                                </div>
                                <div class="mb-3 mt-3">
                                    <div class="product-variant-selected-label bold mb-3 seller d-flex justify-content-center align-items-center pl-2 fontSize18">توضیحات  
                                        <div class="line mr-15"></div> 
                                    </div>
                                </div>
                                <div class="product-additional-info-container mb-3">
                                    <span class="icon">
                                        <i class="ri-information-line"></i>
                                    </span>
                                    <div class="product-additional-info">
                                        <p>{{ $product['description'] }}</p>
                                    </div>
                                </div>
                                <div class="expandable-text-expand-btn d-flex justify-content-end">
                                    <span class="show-more">
                                        بیشتر <i class="ri-arrow-down-s-line"></i>
                                    </span>
                                    <span class="show-less d-none">
                                        بستن <i class="ri-arrow-up-s-line"></i>
                                    </span>
                                </div>
                            </div>
                            <!-- end of product-detail -->
                        </div>
                        <div class="col-xl-3 col-lg-4">
                            <!-- start of product-seller-info -->
                            @include('product.product_basket_card', ['product' => $product])
                            <!-- end of product-seller-info -->
                        </div>
                    </div>
                </div>
                  {{-- "is_bookmark" => false
                        "user_rate" => null
                        "has_comment" => false
                        "is_login" => true --}}
                <!-- end of product-detail-container -->
                @include('sections.top_products_slider', ['id' => 'most_seen_products_when_filled', 'api' => route('api.product.similars', ['product' => $product['id']]),
                    'key' => 'mostSeenProduct', 'title' => 'محصولات مشابه', 'not_fill_id' => 'most_seen_products_when_not_filled'])

                <div class="row">
                    <div class="col-xl-9 col-lg-8">
                        <div class="ui-sticky ui-sticky-top mb-4 StickyMenuMoveOnTop">
                            <!-- start of product-tabs -->
                            <div class="product-tabs overflowHidden">
                                <ul class="nav nav-pills">
                                    <li id="checkNavLink" class="nav-item">
                                        <a  class="nav-link active" href="#scrollspyHeading1"
                                            >نقد و بررسی </a>
                                    </li>
                                    <li id="propertyNavLink" class="nav-item">
                                        <a class="nav-link" href="#scrollspyHeading3"
                                            data-scroll="scrollspyHeading3">مشخصات</a>
                                    </li>
                                    <li id="commentNavLink" class="nav-item">
                                        <a class="nav-link" href="#scrollspyHeading4"
                                            data-scroll="scrollspyHeading4">دیدگاه کاربران</a>
                                    </li>
                                </ul>
                            </div>
                            <!-- end of product-tabs -->
                        </div>
                        <!-- start of product-content-expert-summary -->
                        <div class="details product-tab-content product-content-expert-summary tab-content border-bottom pb-2 mb-4"
                            id="scrollspyHeading1">
                            <div class="product-tab-title">
                                <div class="fontSize18 bold ">بررسی {{ $product['name'] }}</div>
                            </div>
                            <div class="expandable-text pt-1" style="height: 500px;">
                                <div class="expandable-text_text">
                                    <p>
                                        {!! $product['introduce'] !!}
                                    </p>
                                </div>
                                <div class="expandable-text-expand-btn justify-content-start text-sm d-flex justify-content-end">
                                    <span class="show-more active">
                                        ادامه مطلب <i class="ri-arrow-down-s-line ms-2"></i>
                                    </span>
                                    <span class="show-less d-none">
                                        مشاهده کمتر <i class="ri-arrow-up-s-line ms-2"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                        <!-- end of product-content-expert-summary -->
                        <!-- start of product-params -->
                        <div class="product-tab-content product-params tab-content border-bottom pb-2 mb-4"
                            id="scrollspyHeading3">
                            <div class="product-tab-title">
                                 <div class="fontSize18 bold">مشخصات {{ $product['name'] }}</div>
                            </div>
                            <div class="expandable-text pt-1" style="height: auto">
                                <div class="expandable-text_text fa-num">
                                    <!-- start of params-list -->
                                    <div class="params-list">
                                        {{-- <div class="params-list-title">مشخصات کلی</div> --}}
                                        <ul id="params-list-div"></ul>
                                    </div>
                                    <!-- end of params-list -->
                                </div>
                                {{-- <div class="expandable-text-expand-btn justify-content-start text-sm">
                                    <span class="show-more active">
                                        نمایش همه مشخصات کالا <i class="ri-arrow-down-s-line ms-2"></i>
                                    </span>
                                    <span class="show-less d-none">
                                        فقط نمایش مشخصات کلی کالا <i class="ri-arrow-up-s-line ms-2"></i>
                                    </span>
                                </div> --}}
                            </div>
                        </div>
                        <!-- end of product-params -->
                        <!-- start of product-comments -->
                        @include('product.write-comment', ['productId' => $product['id']])
                        @include('product.comments-show', ['productId' => $product['id']])
                        <!-- end of product-comments -->
                    </div>
                    <div class="col-xl-3 col-lg-4 d-lg-block d-none">
                        <div class="ui-sticky ui-sticky-top StickyMenuMoveOnTop">
                            <!-- start of product-seller-info -->
                            @include('product.product_basket_card', ['product' => $product])
                            <!-- end of product-seller-info -->
                        </div>
                    </div>
                </div>
            </div>
        </main>
            <div class="remodal remodal-xs remodal-is-initialized remodal-is-opened" data-remodal-id="share-modal" data-remodal-options="hashTracking: false" tabindex="-1">
                <div class="remodal-header">
                    <div class="remodal-title">اشتراک‌گذاری</div>
                    <button data-remodal-action="close" class="remodal-close"></button>
                </div>
                <div class="remodal-content">
                    <div class="text-muted fs-7 fw-bold mb-3">
                        با استفاده از روش‌های زیر می‌توانید این صفحه را با دوستان خود به اشتراک بگذارید.
                    </div>
                    <div class="d-flex align-items-center border-top border-bottom py-3 mb-3">
                        <div class="widget flex-grow-1 border-0 p-0 me-2">
                            <div class="widget-content widget-socials">
                                <ul class="align-items-center">
                                    <li><a href="#" class="d-inline-flex"><i class="ri-facebook-circle-fill"></i></a>
                                    </li>
                                    <li><a href="#" class="d-inline-flex"><i class="ri-instagram-fill"></i></a></li>
                                    <li><a href="#" class="d-inline-flex"><i class="ri-twitter-fill"></i></a></li>
                                    <li><a href="#" class="d-inline-flex"><i class="ri-telegram-fill"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="btn btn-sm btn-primary copy-url-btn" data-copy="https://www.google.com">کپی لینک
                        </div>
                    </div>
                </div>

<script>

    $(document).ready(function() {
        
        let productId;
        
        try {
            productId = location.pathname.split('/product/')[1].split('/')[0];
        }
        catch(e) {
            document.location.href = '{{ route('home') }}';
        }
        
        $.ajax({
            type: 'get',
            url: '{{ route('api.product.show') }}' + '/' + productId,
            headers: {
                'accept': 'application/json'
            },
            success: function(res) {
                
                let html = '';
                for(var i = 0; i < res.galleries.length; i++) {
                    html += '<li data-fancybox="gallery-a " data-src="' + res.galleries[i].img + '">'
                    html += '<img class="customBoxShadowGallery" src="' + res.galleries[i].img + '" alt="' + res.galleries[i].alt + '"></li>'
                }
                $("#gallery").empty().append(html);

                let options = '';
                let colors = '';
                let property = '';
                let params = '';
                for (var i = 0; i < res.features.length; i++) {

                    if(res.features[i].name === 'multicolor') {
                        
                        $("#color-div").removeClass('hidden');
                        let val_label = res.features[i].value.split('__');
                        let prices = res.features[i].price !== undefined && 
                            res.features[i].price !== null && res.features[i].price != '' ? 
                                res.features[i].price.split('$$') : [];

                        let colors_keys = val_label[0].split('$$');
                        let colors_labels = val_label[1].split('$$');

                        for(var j = 0; j < colors_keys.length; j++) {

                            colors += '<div class="product-variant-item"><div class="custom-radio-circle">';
                            colors += '<input data-label="' + colors_labels[j] + '" data-val="' + colors_keys[j] + '"" type="radio" class="custom-radio-circle-input" name="productColor"';
                            if(j == 0) {

                                if(prices.length > j)
                                    colors += 'data-price="' + prices[j] + '" id="productColor0' + j + '" checked>';
                                else
                                    colors += 'data-price="" id="productColor0' + j + '" checked>';
                                
                                let html = '<div class="product-option">';
                                html += '<span class="color" style="background-color: ' + colors_labels[j] + ';"></span>';
                                html += '<span class="color-label ms-2">' + colors_keys[j] + '</span>';
                                html += '</div>';

                                $("#product_options").empty().append(html);

                                $(".price").empty().append(prices[j]);
                                $("#product-color-variant-selected").empty().append(colors_keys[j]);
                            }
                            else {
                                
                                if(prices.length > j)
                                    colors += 'data-price="' + prices[j] + '" id="productColor0' + j + '">';
                                else
                                    colors += 'data-price="" id="productColor0' + j + '">';
                            }

                            colors += '<label for="productColor0' + j + '" class="custom-radio-circle-label"';
                            colors += 'data-variant-label="' + colors_keys[j] + '">';
                            colors += '<span class="color" style="background-color: ' + colors_labels[j] +';"';
                            colors += 'data-bs-toggle="tooltip" data-bs-placement="bottom"';
                            colors += 'title="' + colors_keys[j] + '" data-bs-original-title="' + colors_keys[j] + '" aria-label="' + colors_keys[j] + '"></span>';
                            colors += '</label></div></div></div>';
                        }

                    }
                    else if(res.features[i].available_count !== null || 
                        res.features[i].price !== null
                    ) {
                        
                        $("#dynamic_multi_choice_features").append(
                            '<div class="product-variant-selected-container spaceBetween hidden" >' +
                            '<div class="product-variant-selected-label bold mb-3 seller d-flex justify-content-center align-items-center pl-2 fontSize18">' + res.features[i].name + '</div>' +
                            '<div class="line mr-15 ml-15"></div>' +
                            '<div id="selected_option_for_feature_' + res.features[i].id + '"></div>' +
                            '</div>'
                        );

                        let vals = res.features[i].value.split('__')[0].split("$$");
                        
                        let prices = res.features[i].price == null ? null : res.features[i].price.split("$$");
                        let counts = res.features[i].available_count == null ? null : res.features[i].available_count.split("$$");

                        options = '<div class="flex">'
                        for(var j = 0; j < vals.length; j++) {

                            options += '<button data-id="' + res.features[i].id + '" data-val="' + vals[j] + '" name="productOption"';
                            if(j == 0) {

                                $('#selected_option_for_feature_' + res.features[i].id).empty().append(vals[0]);

                                if(prices != null) {
                                    options += 'data-price="' + prices[j] + '" id="productOption0' + j + '" class="selected">';
                                    $(".price").empty().append(prices[j]);
                                }
                                else {
                                    options += 'data-count="' + counts[j] + '" id="productOption0' + j + '" class="selected">';
                                    $("#availableCount").empty().append(counts[j]);
                                }
                                
                            }
                            else {
                                if(prices != null)
                                    options += 'data-price="' + prices[j] + '" id="productOption0' + j + '">';
                                else
                                    options += 'data-count="' + counts[j] + '" id="productOption0' + j + '">';
                            }

                            options += vals[j] + "</button>";

                        }

                        options += "</div>";

                    }
                    else {
                        if(res.features[i].show_in_top == 1) {
                            property += '<li><span class="label colorBlueWhite px-1">' + res.features[i].name + '</span><span> : </span>';
                            property += '<span class="title px-1">' + res.features[i].value + '</span></li>';
                        }
                        params += '<li>';
                        params += '<span class="param-title colorBlueWhite font600">' + res.features[i].name + '</span>';
                        params += '<span class="param-value fontSize16">' + res.features[i].value + '</span>';
                        params += '</li>';
                    }

                }
                $("#params-list-div").empty().append(params);
                $("#property").empty().append(property);

                if(colors != '')
                    $("#product-colors-variants").empty().append(colors);

                if(options !== '')
                    $("#property").append(options);
            }
        });

        $(document).on("click","input[name='productColor']", function() {
            

            if($(this).attr('data-price') !== undefined) {
                $(".price").empty().append($(this).attr('data-price'));
            }
            else {
                $("#availableCount").empty().append($(this).attr('data-count'));
            }

            let html = '<div class="product-option">';
            html += '<span class="color" style="background-color: ' + $(this).attr('data-label') + ';"></span>';
            html += '<span class="color-label ms-2">' + $(this).attr('data-val') + '</span>';
            html += '</div>';

            $("#product_options").empty().append(html);
            $(".price").empty().append($(this).attr('data-price'));
            $("#product-color-variant-selected").empty().append($(this).attr('data-val'));
        });

        $(document).on("click","button[name='productOption']", function() {

            if($(this).attr('data-price') !== undefined)
                $(".price").empty().append($(this).attr('data-price'));
            else
                $("#availableCount").empty().append($(this).attr('data-count'));
            
            $('#selected_option_for_feature_' + $(this).attr('data-id')).empty().append($(this).attr('data-val'));
        });
        
        // $.ajax({
        //     type: 'post',
        //     url: '{{ route('api.product.comment.store', ['product' => $product['id']]) }}',
        //     data: {
        //         'rate': 3,
        //         'is_bookmark': 1,
        //         'title': 'sample',
        //         'negative': 'asdwqdwqdqwqwd',
        //         'positive': 'sdffq',
        //         'msg': 'sasds'
        //     },  
        //     success: function(res) {
        //         alert(res);
        //     }
        // });

        let star="";
        let roundRatting=Math.floor('{{ $product['rate'] }}');
        for(var i = 5; i >= 1; i--) {
            if(i <= roundRatting)
                star += '<i class="icon-visit-star me-1 fontSize21"></i>';
            else
                star += '<i class="icon-visit-staroutline me-1 fontSize14"></i>';
        }
        $(".rattingToStar").empty().append(star);

        // if ('{{ $product['seller'] }}' !== ''){
        //     $('.seller').removeClass('hidden');
        // }
        // $(document).ready(function(){
        //     $('body').scrollspy({offset: 150});
        // });
        // $('#moveTopDetails').click(function(){
        //      $('html, body').stop().animate({
        //         'scrollTop': $('#scrollspyHeading1').offset().top
        //     });
        // });

        $('#commentNavLink').click(function(){
             $('html, body').animate({
                'scrollTop': $('#scrollspyHeading4').offset().top - 210
            });
        });
        
        $('#propertyNavLink').click(function(){
             $('html, body').animate({
                'scrollTop': $('#scrollspyHeading3').offset().top - 210
            });
        });
        
        $('#checkNavLink').click(function(){
             $('html, body').animate({
                'scrollTop': $('#scrollspyHeading1').offset().top - 210
            });
        });
        

function showHeight( element, height ) {
  $( "#moveTopDetails" ).text( "The height for the " + element + " is " + height + "px." );
}
$( "#scrollspyHeading1" ).click(function() {
  showHeight( "paragraph", $( "p" ).height() );
});
// $( "#getd" ).click(function() {
//   showHeight( "document", $( document ).height() );
// });
// $( "#getw" ).click(function() {
//   showHeight( "window", $( window ).height() );
// });

    });
</script>

@stop

@section('footer')
    @parent
@stop

@section('extraJS')
    @parent
    <script src="{{ asset('theme-assets/js/theme.js') }}"></script>
    <script src="{{ asset('theme-assets/js/custom.js') }}"></script>
    <script src="{{ asset('theme-assets/js/home.js') }}"></script>
@stop