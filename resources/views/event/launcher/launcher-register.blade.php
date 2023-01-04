
@extends('layouts.structure')
@section('header')
    @parent
    <script src="https://cdn.parsimap.ir/third-party/mapbox-gl-js/v1.13.0/mapbox-gl.js"></script>
    <link
      href="https://cdn.parsimap.ir/third-party/mapbox-gl-js/v1.13.0/mapbox-gl.css"
      rel="stylesheet"
    />
    <script src="{{asset('theme-assets/js/Utilities.js')}}"></script>
    <script>
        let GET_CITIES_URL = '{{ route('api.cities') }}';
    </script>
@stop
@section('content')
    <main class="page-content TopParentBannerMoveOnTop">
        <div class="container">
            <div class="row mb-5">
                <?php $isEditor = Auth::user()->isEditor(); ?>
                @if(!$isEditor)
                    @include('event.launcher.launcher-menu')
                @endif
                <div class="{{ $isEditor ? 'col-xl-12 col-lg-12 col-md-12' : 'col-xl-9 col-lg-8 col-md-7'}}">
                
                    <div class="alert alert-warning alert-dismissible fade show d-flex align-items-center spaceBetween" role="alert">
                        <div>
                            در خواست ارتقا به برگزار کننده پس از ارسال توسط ادمین بازبینی و تایید خواهد شد  .
                        </div>                       
                    </div>
                    <div class="alert alert-warning alert-dismissible fade show d-flex align-items-center spaceBetween" role="alert">
                        <div>
                            در حال حاضر حساب برگزار کننده شما غیر فعال است . پس از بررسی مدارک و تایید از سوی ادمین حساب شما فعال خواهد شد.
                        </div> 
                        <a href="#" class="btn btn-sm btn-primary mx-3 WhiteSpaceNoWrap">مشاهده سوابق</a> 
                    </div>
                    <div class="alert alert-warning alert-dismissible fade show d-flex align-items-center spaceBetween" role="alert">
                        <div>
                            تایید حساب برگزار کننده با مشکل مواجه شده است . برای جزئیات بیشتر به پشتیبانی مراجه کنید.
                        </div> 
                        <a href="#" class="btn btn-sm btn-primary mx-3 WhiteSpaceNoWrap">پشتیبانی</a>
                    </div>

                    @if($isEditor)                    
                        <div class="ui-box bg-white mb-5 boxShadow">
                            <div class="ui-box-title">کاربر مدنظر</div>
                            <div class="ui-box-content">
                                <div class="row">
                                    <div class=" py-1">
                                        <div  class="fs-7 text-dark">شماره تلفن همراه کاربر مدنظر</div>
                                        <div class="d-flex align-items-center justify-content-between position-relative">
                                            <input id="user-phone" data-editable="true" onkeypress="return isNumber(event)" type="tel" minlength="7"  maxlength="11" class="form-control" style="direction: rtl" placeholder="شماره تلفن همراه کاربر مدنظر">
                                            <button data-input-id="phone" class=" toggle-editable-btn btn btn-circle btn-outline-light">
                                                <i class="ri-ball-pen-fill"></i>
                                            </button>
                                        </div>
                                        <div class="fs-6 fw-bold text-muted"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif

                    <div class="ui-box bg-white mb-5 boxShadow">
                        <div class="ui-box-title">اطلاعات رابط</div>
                        <div class="ui-box-content">
                            <div class="row">
                                <div class="col-lg-6 mb-3">
                                    <div class=" py-1">
                                        <div  class="fs-7 text-dark">نام و نام خانوادگی</div>
                                        <div data-remodal-target="personal-info-fullname-modal" class="d-flex align-items-center justify-content-between position-relative">
                                            <input data-editable="true" id="nameLast" type="text" class="form-control setName" style="direction: rtl" placeholder="نام و نام خانوادگی" disabled>
                                            <button data-input-id="nameLast" class="toggle-editable-btn btn btn-circle btn-outline-light"
                                                data-remodal-target="personal-info-fullname-modal">
                                                <i class="ri-ball-pen-fill"></i>
                                            </button>
                                        </div>
                                        <div class="fs-6 fw-bold text-muted"></div>
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-3">
                                    <div class=" py-1">
                                        <div  class="fs-7 text-dark">شماره تلفن همراه</div>
                                        <div class="d-flex align-items-center justify-content-between position-relative">
                                            <input data-editable="true" onkeypress="return isNumber(event) " id="phone" type="tel" minlength="7"  maxlength="11" class="form-control" style="direction: rtl" placeholder="شماره تلفن همراه">
                                            <button data-input-id="phone" class=" toggle-editable-btn btn btn-circle btn-outline-light">
                                                <i class="ri-ball-pen-fill"></i>
                                            </button>
                                        </div>
                                        <div class="fs-6 fw-bold text-muted"></div>
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-3">
                                    <div class=" py-1">
                                        <div  class="fs-7 text-dark">پست الکترونیک</div>
                                        <div class="d-flex align-items-center justify-content-between position-relative">
                                            <input data-editable="true" onkeypress="return isEmail(event) || isNumber(event)" id="userEmail" type="email" class="form-control" style="direction: rtl" placeholder="پست الکترونیک">
                                            <button data-input-id="userEmail" class="toggle-editable-btn btn btn-circle btn-outline-light" >
                                                <i class="ri-ball-pen-fill"></i>
                                            </button>
                                        </div>
                                        <div class="fs-6 fw-bold text-muted"></div>
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-3">
                                    <div class=" py-1">
                                        <div  class="fs-7 text-dark">تاریخ تولد</div>
                                        <div data-remodal-target="personal-info-birth-modal" class="d-flex align-items-center justify-content-between position-relative">
                                            <input data-editable="true" id="mainBrithday" type="text" class="form-control userBirthDay" style="direction: rtl" placeholder="تاریخ تولد" disabled>
                                            <button data-input-id="mainBrithday" class="toggle-editable-btn btn btn-circle btn-outline-light"
                                                data-remodal-target="personal-info-birth-modal"><i
                                                    class="ri-ball-pen-fill"></i></button>
                                        </div>
                                        <div id="brithdayVal" class="fs-6 fw-bold text-muted"></div>
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-3">
                                    <div class=" py-1">
                                        <div  class="fs-7 text-dark">کد ملی</div>
                                        <div class="d-flex align-items-center justify-content-between position-relative">
                                            <input data-editable="true" onkeypress="return isNumber(event)" minlength="10" maxlength="10" id="nid" type="text" class="form-control" style="direction: rtl" placeholder="کد ملی">
                                            <button data-input-id="nid" class="toggle-editable-btn btn btn-circle btn-outline-light">
                                                <i class="ri-ball-pen-fill"></i>
                                            </button>
                                        </div>
                                        <div class="fs-6 fw-bold text-muted"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="ui-box bg-white mb-5 boxShadow">
                        <div class="ui-box-title">تصویر صفحه برگزار کننده</div>
                        <div class="ui-box-content">
                            <div class="row">
                                <div class="col-lg-12 mb-3">
                                    <div class=" py-2">
                                        <div style="visibility: hidden">
                                            <input class="b-1" type="file" id="file-ip-1" accept="image/*" onchange="showPreview(event)">
                                            <input class="b-1" type="file" id="file-ip-2" accept="image/*" onchange="showPreviewProfile(event)">
                                        </div>
                                        <div  class="producer position-relative">
                                            <img id="file-ip-1-preview" style="border: 2px solid white;boxshadow: 0 3px 6px #00000029;background-color: #e5e5e5" class="w-100 h-100 objectFitCover" style="opacity: .4" alt="">
                                            <div id="producer" class="position-absolute customTop center uploaderText">عکس را بارگذاری کنید</div>
                                            <div id="profileImg" class="profileImg">
                                                <img id="file-ip-2-preview" style="border: 2px solid white;boxshadow: 0 3px 6px #00000029" class="w-100 h-100 objectFitCover" accept="image/*" alt="">
                                                <div id="producer" class="position-absolute customTop2 center uploaderImg"><i class="icon-visit-open"></i></div>
                                            </div>
                                            <script>
                                                    function showPreviewProfile(event){
                                                    if (event.target.files.length > 0){
                                                        var src = URL.createObjectURL(event.target.files[0]);
                                                        var preview = document.getElementById("file-ip-2-preview");
                                                        preview.src = src;
                                                        preview.style.display = "flex";
                                                    }
                                                    }
                                                    function showPreview(event){
                                                    if(event.target.files.length > 0){
                                                        var src = URL.createObjectURL(event.target.files[0]);
                                                        var preview = document.getElementById("file-ip-1-preview");
                                                        preview.src = src;
                                                        preview.style.display = "flex";
                                                    }
                                                    }
                                                    $(document).ready(function(){

                                                    $('#producer').on('click',function(){
                                                        
                                                        $('#file-ip-1').click();
                                                        
                                                    });
                                                    $('#profileImg').on('click',function(){
                                                        
                                                        $('#file-ip-2').click();
                                                        
                                                    });
                                                    });
                                            </script>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="ui-box bg-white mb-5 boxShadow">
                        <div class="ui-box-title">نوع برگزار کننده</div>
                        <div class="ui-box-content">
                            <div class="row">
                                <div class="col-lg-6 mb-3">
                                    <div class=" py-2">
                                        <div  class="fs-7 text-dark">نوع شخصیت</div>
                                        <div class="d-flex align-items-center justify-content-between position-relative">
                                            <select id="launcherType" class="select2 selectStyle">
                                                <option value="0" selected>انتخاب کنید</option>
                                                <option value="haghighi">حقیقی</option>
                                                <option value="hoghoghi">حقوقی</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="ui-box bg-white mb-5 boxShadow hidden_all_fields hidden">
                        <div class="ui-box-title">اطلاعات برگزار کننده</div>
                        <div class="ui-box-content">
                            <div class="row">
                                <div class="col-lg-6 mb-3">
                                    <div class=" py-1">
                                        <div id="nameOfProducer" class="fs-7 text-dark"></div>
                                        <div class="d-flex align-items-center justify-content-between position-relative">
                                            <input data-editable="true" id="companyName" type="text" class="form-control" style="direction: rtl" placeholder="نام">
                                            <button data-input-id="companyName" class="toggle-editable-btn btn btn-circle btn-outline-light">
                                                <i class="ri-ball-pen-fill"></i>
                                            </button>
                                        </div>
                                        <div class="fs-6 fw-bold text-muted"></div>
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-3 hoghoghi_fields">
                                    <div class=" py-2">
                                        <div class="fs-7 text-dark">نوع شرکت</div>
                                        <div class="d-flex align-items-center justify-content-between">
                                            <select id="companyType" class="select2 selectStyle">
                                                <option value="0" selected>انتخاب کنید</option>
                                                <option value="art">موسسه فرهنگی و هنری</option>
                                                <option value="limit">مسئولیت محدود</option>
                                                <option value="agency">آژانس</option>
                                                <option value="spec">سهامی خاص</option>
                                                <option value="public">سهامی عام</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-3 hoghoghi_fields">
                                    <div class=" py-1">
                                        <div class="fs-7 text-dark">شماره اقتصادی</div>
                                        <div class="d-flex align-items-center justify-content-between position-relative">
                                            <input data-editable="true" onkeypress="return isNumber(event)" id="code" type="text" class="form-control" style="direction: rtl" placeholder="شماره اقتصادی">
                                            <button data-input-id="code" class="toggle-editable-btn btn btn-circle btn-outline-light">
                                                <i class="ri-ball-pen-fill"></i>
                                            </button>
                                        </div>
                                        <div class="fs-6 fw-bold text-muted"></div>
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-3">
                                    <div class=" py-1">
                                        <div  class="fs-7 text-dark">کد پستی</div>
                                        <div class="d-flex align-items-center justify-content-between position-relative">
                                            <input data-editable="true" onkeypress="return isNumber(event)" maxlength="10" id="postalCode" type="text" class="form-control" style="direction: rtl" placeholder="کد پستی">
                                            <button data-input-id="postalCode" class="toggle-editable-btn btn btn-circle btn-outline-light">
                                                <i class="ri-ball-pen-fill"></i>
                                            </button>
                                        </div>
                                        <div class="fs-6 fw-bold text-muted"></div>
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-3">
                                    <!-- start of form-element -->
                                    <div class="form-element-row">
                                        <label class="label fs-7">استان</label>
                                        
                                        <select onchange="getCities($(this).val())" class="select2" name="state02" id="state02">
                                            <option value="0">انتخاب کنید</option>
                                            @foreach ($states as $state)
                                                <option value="{{ $state->id }}">{{ $state->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <!-- end of form-element -->
                                </div>
                                <div id="ha" class="col-lg-6 mb-3">
                                    <!-- start of form-element -->
                                    <div class="form-element-row">
                                        <div class="form-element-row">
                                            <label class="label fs-7">شهر</label>
                                            <select class="select2 launcherCityID" name="city02" id="city02">
                                            </select>
                                        </div>
                                    </div>
                                    <!-- end of form-element -->
                                </div>
                                <div class="col-lg-12 mb-3">
                                    <div class=" py-1">
                                        <div  class="fs-7 text-dark">نقشه</div>
                                        <div id="launchermap" style="width: 100%; height: 250px"></div>
                                    </div>
                                </div>
                                
                            </div>
                        </div>
                    </div>
                                        <div class="ui-box bg-white mb-5 boxShadow">
                        <div class="ui-box-title">درباره برگزار کننده</div>
                        <div class="ui-box-content">
                            <div class="row">
                                <div class="col-lg-12 mb-3">
                                    <div class=" py-1">
                                        <div  class="fs-7 text-dark">درباره من</div>
                                        <div class="d-flex align-items-center justify-content-between position-relative">
                                            <textarea data-editable="true" id="aboutme" type="text" class="form-control" style="direction: rtl" placeholder="درباره من"></textarea>
                                            <button data-input-id="aboutme" class="toggle-editable-btn btn btn-circle btn-outline-light">
                                                <i class="ri-ball-pen-fill"></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="ui-box bg-white mb-5 boxShadow hidden_all_fields hidden">
                        <div class="ui-box-title">اطلاعات تماس</div>
                        <div class="ui-box-content">
                            <div class="row">
                                <div class="col-lg-6 mb-3">
                                    <div class=" py-1">
                                        <div  class="fs-7 text-dark">وب سایت</div>
                                        <div class="d-flex align-items-center justify-content-between position-relative">
                                            <input data-editable="true" id="launcherSite" type="url" class="form-control" style="direction: rtl" placeholder=" به عنوان مثال: http://www.site.ir حتما http را وارد کنید">
                                            <button data-input-id="launcherSite" class="toggle-editable-btn btn btn-circle btn-outline-light">
                                                <i class="ri-ball-pen-fill"></i>
                                            </button>
                                        </div>
                                        <div class="fs-6 fw-bold text-muted"></div>
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-3">
                                    <div class=" py-1">
                                        <div class="fs-7 text-dark">پست الکترونیک</div>
                                        <div class="d-flex align-items-center justify-content-between position-relative">
                                            <input data-editable="true" onkeypress="return isEmail(event) || isNumber(event)" id="launcherEmail" type="text" class="form-control" style="direction: rtl" placeholder="پست الکترونیک">
                                            <button data-input-id="launcherEmail" class="toggle-editable-btn btn btn-circle btn-outline-light">
                                                <i class="ri-ball-pen-fill"></i>
                                            </button>
                                        </div>
                                        <div class="fs-6 fw-bold text-muted"></div>
                                    </div>
                                </div>
                                <div class="col-lg-12 mb-3">
                                    <div class=" py-1">
                                        <div  class="fs-7 text-dark">تلفن</div>
                                        <div class="d-flex align-items-center justify-content-between position-relative">
                                            <input data-editable="true" onkeypress="return isNumber(event)" minlength="7" maxlength="11" id="launcherPhone" type="text" class="form-control setEnter" style="direction: rtl" placeholder="تلفن">
                                            <button class="btn btn-circle btn-outline-light hidden">
                                                <i class="ri-ball-pen-fill"></i>
                                            </button>
                                        </div>
                                        <div id="addTell" class="d-flex gap15 flexWrap mt-1"></div>
                                        <div class="fontSize14 colorBlack">در صورت وجود بیش از یک تلفن، آن ها را با فاصله از هم جدا نمایید.همچنین پیش شماره کشور و شهر نیز وارد شود. مانند +982111111111</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="spaceBetween mb-2">
                        <a href="" class="px-5 b-0 btnHover backColorWhite colorBlack fontSize18">انصراف</a>
                        @if($mode == 'edit')
                            <button data-remodal-target="modalAreYouSure" class="btn btn-sm btn-primary px-5">اعمال تغییرات</button>
                        @else
                            <button class="btn btn-sm btn-primary px-5 submit">ثبت اطلاعات</button>
                        @endif
                    </div>
                    @if($mode == 'edit')
                        <div class="d-flex justify-content-end">
                            <a href="{{ route('launcher-document', ['formId' => $formId]) }}" class="colorBlue fontSize14 ml-33">مشاهده مرحله بعد</a>
                        </div>
                    @endif
                </div>
        </div>
    </div>
    <div class="remodal remodal-xl" data-remodal-id="modalAreYouSure"
        data-remodal-options="hashTracking: false">
        <div class="remodal-header">
            <div class="remodal-title">آیا مطمئن هستید؟</div>
            <button data-remodal-action="close" class="remodal-close"></button>
        </div>
        <div class="remodal-content">
            <div class="form-element-row mb-3 fontSize14">
                با ثبت تغییرات اطلاعات شما دوباره برای بازبینی ارسال می گردد و رویداد تا زمان اعمال تغییرات نمایش داده نمی شود. آیا مطمئن هستید؟
            </div>
        </div>
        <div class="remodal-footer">
            <button data-remodal-action="close" class="btn btn-sm px-3">انصراف</button>
            <a target="_blank" class="btn btn-sm btn-primary px-3 submit">بله</a>
        </div>
        </div>
        <!-- start of personal-info-fullname-modal -->
        <div class="remodal remodal-xs" data-remodal-id="personal-info-fullname-modal"
            data-remodal-options="hashTracking: false">
            <div class="remodal-header">
                <div class="remodal-title">نام و نام خانوادگی</div>
                <button data-remodal-action="close" class="remodal-close"></button>
            </div>
            <div class="remodal-content">
                <div class="form-element-row mb-3">
                    <label class="label fs-7">نام</label>
                    <input data-editable="true" id="name" value="" type="text" class="form-control" placeholder="نام">
                </div>
                <div class="form-element-row">
                    <label class="label fs-7">نام خانوادگی</label>
                    <input data-editable="true" id="last" type="text" class="form-control" placeholder="نام خانوادگی">
                </div>
            </div>
            <div class="remodal-footer">
                <button id="getName" class="btn btn-sm btn-primary px-3">ثبت اطلاعات</button>
            </div>
        </div>
        <!-- end of personal-info-fullname-modal -->
        <!-- start of personal-info-birth-modal -->
            <div class="remodal remodal-xs" data-remodal-id="personal-info-birth-modal"
                data-remodal-options="hashTracking: false">
                <div class="remodal-header">
                    <div class="remodal-title">تولد</div>
                    <button data-remodal-action="close" class="remodal-close"></button>
                </div>
                <div class="remodal-content">
                    <div class="row d-flex flexDirectionRowReverse">
                        <div class="col-4">
                            <div class="form-element-row">
                                <label class="label fs-7">سال</label>
                                <input data-editable="true" onkeypress="return isNumber(event)" minlength="4" maxlength="4" value="" id="Brithday_year" type="text" minlength="4" maxlength="10" class="form-control" placeholder="">
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-element-row">
                                <label class="label fs-7">ماه</label>
                                <select class="select2" name="month" id="Brithday_month">
                                    <option value="0">ماه</option>
                                    <option value="1">فروردین</option>
                                    <option value="2">اردیبهشت</option>
                                    <option value="3">خرداد</option>
                                    <option value="4">تیر</option>
                                    <option value="5">مرداد</option>
                                    <option value="6">شهریور</option>
                                    <option value="7">مهر</option>
                                    <option value="8">آبان</option>
                                    <option value="9">آ‌ذر</option>
                                    <option value="10">دی</option>
                                    <option value="11">بهمن</option>
                                    <option value="12">اسفند</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-4">
                            <div class="form-element-row">
                                <label class="label fs-7">روز</label>
                                <input data-editable="true" onkeypress="return isNumber(event)" minlength="2" maxlength="2" id="Brithday_day" value="" type="text" class="form-control" placeholder="">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="remodal-footer">
                    <button id="setUserBirthDay" class="btn btn-sm btn-primary px-3">ثبت تاریخ تولد</button>
                </div>
            </div>
            <!-- end of personal-info-birth-modal -->
</main>
<script src="https://cdn.parsimap.ir/third-party/mapbox-gl-js/plugins/parsimap-geocoder/v1.0.0/parsimap-geocoder.js"></script>
<link
  href="https://cdn.parsimap.ir/third-party/mapbox-gl-js/plugins/parsimap-geocoder/v1.0.0/parsimap-geocoder.css"
  rel="stylesheet"
/>
    <script>

        var tels = [];
        let x;
        let y;
        var map = undefined;
     
        $(document).ready(function(){
            $('#launcherPhone').attr("data-editable", "true");
            $('input').attr("data-editable", "true");
            $('textarea').attr("data-editable", "true");
            $('.toggle-editable-btn').addClass('hidden');
            var idx = 1;
            $(document).on('click', '.remove-tel-btn', function () { 
                let id = $(this).attr('data-id');
                tels = tels.filter((elem, index) => {
                    return elem.id != id;
                });
                $("#tel-modal-" + id).remove();
             });

            $(".setEnter").keyup(function (e) {
                var html= '';
                if ($(".setEnter").is(":focus") && (e.keyCode == 13)) {
                    var launchPhone = $(".setEnter").val();
                    if(launchPhone.length < 7 || launchPhone.length > 11) {
                        showErr('شماره موردنظر معتبر نمی باشد.');
                        return;
                    }
                    idx++;
                    tels.push({
                        id: idx,
                        val: launchPhone
                    });
                    html += '<div id="tel-modal-' + idx + '" class="item-button spaceBetween colorBlack">' + launchPhone + '';
                    html += '<button class="btn btn-outline-light borderRadius50 marginLeft3">';
                    html += '<i data-id="' + idx + '" class="remove-tel-btn ri-close-line"></i>';
                    html += '</button>';
                    html += '</div>';
                    $("#addTell").append(html);
                    $('.setEnter').val('');
                }
            });

            $('#getName').on('click',function(){
                var name = $('#name').val();
                var last = $('#last').val();
                if (name.length == 0 || last.length == 0) {
                    showErr("لطفا نام و نام خانوادگی را وارد نمائید.");
                    return
                }else{
                    $('.setName').val(name +' ' + last );
                    $(".remodal-close").click();
                    $(".showPenEdit").removeClass('hidden');
                }
            });
            $('#setUserBirthDay').on('click',function(){
                var year = $('#Brithday_year').val();
                var month = $('#Brithday_month').val();
                var day =$('#Brithday_day').val();

                if (year.length == 0 || month.length == 0 || month == 0 || day.length == 0) {
                    showErr("لطفا تاریخ تولد را وارد کنید.");
                    return
                }else{
                    $('.userBirthDay').val(year + '/' + month + '/' + day);
                    $(".remodal-close").click();
                }
            })

            $('#launcherType').on('change',function(){
                var launcherType = $('#launcherType').val();
                if (launcherType === 'haghighi') {
                    // show or hide class for haghighi
                    $(".hoghoghi_fields").addClass('hidden');
                    $(".haghighi_fields").removeClass('hidden');
                    $(".hidden_all_fields").removeClass('hidden');
                    $("#nameOfProducer").text('نام برگزار کننده');
                } else if(launcherType === 'hoghoghi'){
                    // show or hide class for hoghoghi
                    $("#nameOfProducer").text('نام حقوقی');
                    $(".hoghoghi_fields").removeClass('hidden');
                    $(".haghighi_fields").addClass('hidden');
                    $(".hidden_all_fields").removeClass('hidden');
                } else if(launcherType === 'selectType'){
                    // hide All
                    $(".hidden_all_fields").addClass('hidden');           
                }

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

                    function addMarker(e){
                        if (marker !== undefined)
                            marker.remove();
                        //add marker
                        marker = new mapboxgl.Marker();
                        marker.setLngLat(e.lngLat).addTo(map);
                        x = e.lngLat.lat;
                        y = e.lngLat.lng;
                    }
                    map.on('click', addMarker);
                    const control = new ParsimapGeocoder();
                    map.addControl(control);

                }

            });

            $('.submit').on('click',function() { 

                var nameLast = $('#nameLast').val();
                var name = $('#name').val();
                var last = $('#last').val();
                var phone =$('#phone').val();
                var setName = $('.setName').val();
                var userEmail = $('#userEmail').val();
                var userBirthDay = $('.userBirthDay').val();
                var mainBrithday = $('#mainBrithday').val();
                var Brithday_day = $('#Brithday_day').val();
                var Brithday_year =$('#Brithday_year').val();
                var nid = $('#nid').val();
                var companyName = $('#companyName').val();
                var launcherType = $('#launcherType').val();
                var companyType = $('#companyType').val();
                var code = $('#code').val();
                var postalCode = $('#postalCode').val();
                var launcherCityID = $('.launcherCityID').val();
                var launcherSite = $('#launcherSite').val();
                var launcherEmail = $('#launcherEmail').val();
                var launcherPhone = $('#launcherPhone').val();
                var launcherAddress = $('#launcherAddress').val();
                var launcherType = $('#launcherType').val();
                var state02 = $('#state02').val()


                let required_list_Select = (launcherType == "hoghoghi") ? 
                    ['launcherType', 'state02', 'city02', 'companyType'] :
                    ['launcherType', 'state02', 'city02']
                ;
                
                let required_list = (launcherType == "hoghoghi") ? 
                    ['nameLast' ,'phone', 'userEmail', 'mainBrithday', 'nid', 'companyName', 'postalCode', 'launcherAddress', 'launcherSite', 'launcherEmail', 'code'] :
                    ['nameLast' ,'phone', 'userEmail', 'mainBrithday', 'nid', 'companyName', 'postalCode', 'launcherAddress', 'launcherSite', 'launcherEmail']
                ;

                let inputList = checkInputs(required_list);
                let selectList = checkSelect(required_list_Select);  
                
                if( !inputList || !selectList) {
                   return
                }
                
                $(".showPenEdit").removeClass('hidden')
                if (userEmail == null || userEmail == undefined){
                    $('#userEmail').css('backgroundColor','red')
                }
                if (launcherEmail == null || launcherEmail == undefined){
                    $('#launcherEmail').css('backgroundColor','red')
                }
                if(launcherPhone !== undefined && launcherPhone.length > 0)
                    tels.push({
                        id: 222222222,
                        val: launcherPhone
                    });
                
                if(x === undefined || y === undefined) {
                    showErr("لطفا مکان موردنظر خود را از روی نقضه انتخاب کنید");
                    return;
                }

                let data = {
                    first_name: name,
                    last_name: last,
                    phone: phone,
                    launcher_x: x,
                    launcher_y: y,
                    user_email: userEmail,
                    user_birth_day: userBirthDay,
                    user_NID: nid,
                    company_name : companyName,
                    postal_code: postalCode,
                    launcher_city_id: launcherCityID,
                    launcher_site: launcherSite,
                    launcher_email: launcherEmail,
                    launcher_type: launcherType,
                    launcher_address: launcherAddress,
                };

                if(launcherType == "hoghoghi") {
                    data.code = code;
                    data.company_type = companyType;
                }

                let formData = new FormData();

                for ( var key in data ) {
                   formData.append(key, data[key]);
                }

                tels.forEach((elem, index) => {
                    formData.append('launcher_phone[]', elem.val);
                });

                const inputFile = document.getElementById("file-ip-1");
                for (const file of inputFile.files) {
                    formData.append("back_img_file", file);
                }


                const inputFile2 = document.getElementById("file-ip-2");
                for (const file of inputFile2.files) {
                    formData.append("img_file", file);
                }

                // const userPhone = $("#user-phone").val();
                // if(userPhone !== undefined)
                //     formData.append("user_phone", userPhone);

                $.ajax({
                    type: 'post',
                    url: "{{ $mode == 'create' ? route('launcher.store') : route('launcher.update', ['launcher' => $formId]) }}",
                    data: formData,
                    processData : false,
                    contentType : false,
                    success: function(res) {
                        if(res.status === "ok") {
                            let launcher_id;                            
                            if('{{ $mode }}' === 'create'){
                                launcher_id = res.id;
                            }else{
                                launcher_id = '{{ isset($formId) ? $formId : -1 }}';
                            }
                            window.location.href = '{{ route('launcher-document') }}' + "/" + launcher_id;
                        }
                        else{
                            showErr(res.msg);
                        }
                    }
                });
            })
        })
    </script>
@stop

@section('footer')
    @parent
@stop

@section('extraJS')
    @parent

    @if($mode == 'edit')
        <script>
            $.ajax({
                type: 'get',
                url: '{{ route('launcher.show', ['launcher' => $formId]) }}',
                success: function (res) {
                    $('input').attr("data-editable", "false");
                    $('textarea').attr("data-editable", "false");
                    $('.toggle-editable-btn').removeClass('hidden');
                    $('#name').attr("data-editable", "true");
                    $('#last').attr("data-editable", "true");
                    $('#Brithday_year').attr("data-editable", "true");
                    $('#Brithday_day').attr("data-editable", "true");
                    $('#launcherPhone').attr("data-editable", "true");
                    x = res.data.launcher_x;
                    y = res.data.launcher_y;
                    $('#name').val(res.data.first_name);
                    $('#last').val(res.data.last_name);
                    $('.setName').val(res.data.first_name + ' ' + res.data.last_name)
                    $('#phone').val(res.data.phone);
                    $("#postalCode").val(res.data.postal_code);
                    if(res.data.launcher_type == "hoghoghi") {
                        $("#companyName").val(res.data.company_name);
                        $("#code").val(res.data.code);
                        $("#companyType").val(res.data.company_type).change();
                    }else if(launcherType == "haghighi") {
                        $("#companyName").val(res.data.company_name);
                    }
                    
                    if(res.data.back_img !== null && res.data.back_img !== undefined && res.data.back_img !== 'null' && res.data.back_img.length > 0)
                        $("#file-ip-1-preview").attr('src', res.data.back_img);

                    if(res.data.img !== null && res.data.img !== undefined && res.data.img !== 'null' && res.data.img.length > 0)
                        $("#file-ip-2-preview").attr('src', res.data.img);

                    $("#launcherAddress").val(res.data.launcher_address);
                    $(".launcherCityID").val(res.data.launcher_city_id);
                    $("#launcherEmail").val(res.data.launcher_email);


                    var showPhone = '';
                    for(i = 0 ; i < res.data.launcher_phone.length; i++){
                        showPhone += '<div id="tel-modal-' + i + '" class="item-button spaceBetween colorBlack">' + res.data.launcher_phone[i] + '';
                        showPhone += '<button class="btn btn-outline-light borderRadius50 marginLeft3">';
                        showPhone += '<i data-id="' + i + '" class="remove-tel-btn ri-close-line"></i>';
                        showPhone += '</button>';
                        showPhone += '</div>';
                        
                        tels.push({
                            id: i,
                            val: res.data.launcher_phone[i]
                        });
                    };

                    $("#addTell").append(showPhone);
                    $("#launcherSite").val(res.data.launcher_site);
                    $("#launcherType").val(res.data.launcher_type).change();
                    $("#nid").val(res.data.user_NID);
                    $("#userEmail").val(res.data.user_email);
                    $("#companyType").val(res.data.company_type);
                    $(".userBirthDay").val(res.data.user_birth_day);
                    $("#state02").val(res.data.launcher_state_id).change();
                    getCities(res.data.launcher_state_id, res.data.launcher_city_id);
                    $("input").each(function() {
                        if ($(this).attr('data-editable') != 'true' ){
                            $(this).attr('disabled', 'disabled');
                        }
                    });
                    $("textarea").each(function() {
                        if ($(this).attr('data-editable') != 'true' ){
                            $(this).attr('disabled', 'disabled');
                        }
                    });
                }
            })
        </script>
    @endif

@stop