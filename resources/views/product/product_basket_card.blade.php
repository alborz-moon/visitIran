<div class="product-seller-info ui-box" style="background-color: #fff">
    <div class="seller-info-changeable">
        @if($product['seller'] !== '')
            <div class="product-seller-row seller">
                <div class="product-seller-row-icon marginTop10">
                    <i class="icon-visit-store colorYellow  productIcon"></i>
                </div>
                <div class="product-seller-row-detail">
                    <div class="product-seller-row-detail-title">{{ $product['seller'] }}</div>
                </div>
            </div>
            
        @endif
        <hr>
        @if ($product['guarantee'] !== null)
            <div class="product-seller-row">
                <div class="product-seller-row-icon marginTop10">
                    <i class="icon-visit-verified colorYellow  productIcon"></i>
                </div>
                <div class="product-seller-row-detail">
                    <div class="product-seller-row-detail-title">گارانتی {{$product['guarantee']}} ماهه</div>
                </div>
            </div>
        @endif
        <hr>
        <div class="product-seller-row product-seller-row--clickable">
            <div class="product-seller-row-icon marginTop10">
                <i class="icon-visit-original colorYellow  productIcon"></i>
            </div>
            <div class="product-seller-row-detail">
                <div class="product-seller-row-detail-title">تضمین اصالت</div>                                        </div>
        </div>
        <hr>
        <div class="product-seller-row">
            <div class="product-seller-row-icon marginTop10">
                <i class="icon-visit-truck colorYellow  productIcon"></i>
            </div>
            <div class="product-seller-row-detail">
                <div class="product-seller-row-detail-title">
                    ارسال : <span class="fontNormal fontSize16"> 2 تا 7 روز کاری </span>
                </div>
            </div>
        </div>
        <hr>
        @if ($product['available_count'] != 0)
        <div class="product-seller-row product-seller-row--price pt-2 flexDirectionColumnR align-items-end">
            <div class="product-seller-row--price-now fa-num ">
                <span class="price">{{ $product['off'] != null ?  $product['priceAfterOff'] : $product['price'] }}</span>
                <span class="currency fontSize18 colorYellow">ت</span>
            </div>
            @if($product['off'] != null)
                <div class="product-price fa-num">
                    <div id="OffSection" class="d-flex align-items-center">
                        <div class="fontSize15 pl-10 position-relative">
                            <img src="{{ asset('theme-assets/images/svg/off.svg') }}" alt="" width="45">
                            <span id="Off" class="position-absolute fontSize10 colorWhite r-0 customOff">
                                @if ($product['off'] != null && $product['off']['type'] == 'percent')
                                    <span>%</span>{{ $product['off']['value'] }}
                                @elseif ($product['off']!= null && $product['off']['type'] == 'value') 
                                    {{ $product['off']['value'] }}
                                    {{-- <span class="fontSize10 px-1 colorYellow">ت</span> --}}
                                @endif
                            </span>
                        </div>
                        <del id="PriceBeforeOff" class="customlineText textColor fontSize15">{{ $product['price'] }}</del>
                    </div>
                </div>
            @endif
        </div>
        @endif
        @if ($product['available_count'] < 0)
            <div id="availableCount" class="product-seller-row product-remaining-in-stock">
                <span></span>
            </div>
        @endif
        @if($product['available_count']  > 0)
            <div id="availableCount" class="product-seller-row product-remaining-in-stock">
                <span>تنها <span class="mx-2">{{ $product['available_count'] }}</span> عدد در انبار باقیست - پیش از
                    اتمام بخرید</span>
            </div>
        @elseif($product['available_count'] == 0)
            <div id="availableCount" class="product-seller-row product-remaining-in-stock">
                <span>اتمام موجودی</span>
            </div>
        @endif
        <div class="product-seller-row product-remaining-in-stock spaceBetween">
            <div class="bold customColorBlack d-flex align-items-center ">
                <div>تعداد سفارش :</div>                                            
            </div>
            <div class="num-block fa-num me-3">
                <span class="num-in">
                    <span class="icon-visit-Exclusion1 countPlus customColorBlack d-contents"></span>
                    <input name="counter" type="text" value="1" readonly="">
                    <span class="icon-visit-Exclusion2 countMinus customColorBlack d-contents"></span>
                </span>
            </div>
        </div>
    <div class="product-seller--add-to-cart">
        <a id="addto-basket" href="#" class="btn btn-primary backgroundColorBlue w-100" data-toast data-toast-type="success"
            data-toast-color="green" data-toast-position="topRight"
            data-toast-icon="ri-check-fill" data-toast-title="موفق!"
            data-toast-message="به سبد اضافه شد!">
            افزودن به سبد خرید
        </a>
    </div>
</div>
<script>

    var count = 1;
    var lastChange = -1;
    
    $(".countPlus").on('click', function() {
        
        let now = Date.now();

        if(now - lastChange < 50)
            return;

        lastChange = now;
        
        count++;
        $("input[name='counter']").each(function() {
            $(this).val(count);
        });
    });

    $(".countMinus").on('click', function() {
                
        let now = Date.now();

        if(now - lastChange < 50)
            return;

        lastChange = now;

        if(count == 1)
            return;

        count--;
        $("input[name='counter']").each(function() {
            $(this).val(count);
        });

    });
    $(document).ready(function() {
                $("#addto-basket").on('click', function() {                    
                    
                });
            });
</script>