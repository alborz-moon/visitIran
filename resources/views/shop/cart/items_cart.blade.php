
<!-- start of tab-content -->
<div class="tab-content" id="nav-tabContent">
    <!-- start of tab-pane -->
    <div class="tab-pane fade show active" id="nav-1" role="tabpanel"
        aria-labelledby="nav-1-tab">
        <div class="ui-box bg-white p-2">
            <div class="ui-box-content hoverBoxShadow">
                <!-- start of cart-items -->
                <div class="cart-items position-relative">
                    <!-- start of cart-item -->
                    <div class="cart-item">
                        <div class="cart-item--thumbnail">
                            <a class="position-relative" href="#">
                                <img id="full-basket-item-img">
                                    <span class="colorWhite customCartLabel fontSize11 position-absolute t-0 r-0">عنوان محصول</span>
                            </a>
                        </div>
                        <div class="cart-item--detail">
                            <h2 class="cart-item--title mb-2"><a id="full-basket-item-href" href="#"></a></h2>
                            <div class="cart-item--variant mb-2" style="margin-right: 50px">
                                <span class="color" style="background-color: #fad7c2;"></span>
                                <span class="ms-1">طلایی</span>
                            </div>
                            <div class="cart-item--data mb-1">
                                <ul>
                                    <li>
                                        <i class="icon-visit-store colorYellow d-flex productIcon"></i><span class="colorBlack fontSize13"> seller</span>
                                    </li>
                                    <li>
                                        <i class="icon-visit-verified colorYellow d-flex productIcon"></i><span class="colorBlack fontSize13">دارای 18 ماه گارانتی</span>
                                    </li>
                                    <li>
                                        <i class="icon-visit-original colorYellow d-flex productIcon"></i><span class="colorBlack fontSize13">تضمین اصالت</span>
                                    </li>
                                </ul>
                            </div>
                            <div class="cart-item--price--actions">
                                <div class="cart-item--actions">
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
                                    <button class="btn btn-link btn-sm text-secondary position-absolute t-0 l-0"><i
                                            class="ri-delete-bin-5-line me-1"></i><span>حذف</span></button>
                                </div>
                                <div class="product-seller-row product-seller-row--price pt-2">
                                    <div class="product-price fa-num">
                                        <div id="OffSection" class="d-flex align-items-center">
                                            <div class="fontSize15 pl-10 position-relative">
                                                <img src="{{ asset('theme-assets/images/svg/off.svg') }}" alt="" width="45">
                                                <span id="Off" class="position-absolute fontSize10 colorWhite r-0 customOff">
                                                        <span>%</span>
                                                </span>
                                            </div>
                                            <del id="PriceBeforeOff" class="customlineText textColor fontSize21 bold">15000</del>
                                        </div>
                                    </div>
                                    <div class="product-seller-row--price-now fa-num ">
                                        <span class="price fontSize21 bold">9000000</span>
                                        <span class="currency fontSize21 bold colorYellow">ت</span>
                                    </div>
                                    </div>
                            </div>
                        </div>
                    </div>
                    <!-- end of cart-item -->
                </div>
                <!-- end of cart-items -->
            </div>
        </div>
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
</script>