
@extends('layouts.structure')
@section('header')
    @parent
    <link rel="stylesheet" href="{{asset('theme-assets/bootstrap-datepicker.css?v=1')}}">
    <script src="{{asset("theme-assets//bootstrap-datepicker.js")}}"></script>

    <script src="{{asset('theme-assets/dropzone/dropzone.js?v=1.2')}}"></script>
    <link rel="stylesheet" href="{{asset("theme-assets/dropzone/dropzone.css")}}">
    <script>
        var myPreventionFlag = false;
    </script>
@stop
@section('content')
        <main class="page-content TopParentBannerMoveOnTop">
        <div class="container">
            <div class="row mb-5">
                @include('event.launcher.launcher-menu')     
                <div class="col-xl-9 col-lg-8 col-md-7">
                    <div class="d-flex spaceBetween align-items-center">
                        <span class="colorBlack  fontSize15 bold d-none d-md-block fontSize16 bold">ایجاد رویداد</span>
                        <ul class="checkout-steps mt-4 mb-3 w-100">
                            <li class="checkout-step-active">
                                <a href="{{ route('update-event', ['event' => $id]) }}"><span class="checkout-step-title" data-title="اطلاعات کلی"></span></a>
                            </li>
                            <li class="checkout-step-active">
                                <a href="{{ route('addSessionsInfo', ['event' => $id]) }}"><span class="checkout-step-title" data-title="زمان برگزاری"></span></a>
                            </li>
                            <li class="checkout-step-active">
                                <a href="{{ route('addPhase2Info', ['event' => $id]) }}"><span class="checkout-step-title" data-title="ثبت نام و تماس"></span></a>
                            </li>
                            <li class="checkout-step-active">
                                <a><span class="checkout-step-title" data-title="اطلاعات تکمیلی"></span></a>
                            </li>
                        </ul>
                        <a href="{{ route('addPhase2Info', ['event' => $id]) }}" class="px-3 b-0 btnHover backColorWhite colorBlack fontSize18">بازگشت</a>
                    </div>
                        <div class="ui-box bg-white mb-5 boxShadow">
                            <div class="ui-box-title">توضیحات</div>
                            <div class="ui-box-content">
                                <div class="row">
                                    <div class="col-lg-12 mb-3">
                                        <div class="py-2">
                                            <div class="d-flex align-items-center justify-content-between">
                                                <textarea type="text" class="form-control" style="direction: rtl" placeholder="توضیحات"></textarea>
                                                <button class="btn btn-circle btn-outline-light hidden">
                                                    <i class="ri-ball-pen-fill"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="ui-box bg-white mb-5 boxShadow">
                            <div class="ui-box-title">گالری عکس</div>
                                <div class="col-lg-12 mb-3 zIndex0">
                                    <div id="certifications" class="boxGallery">
                                    </div>
                                    <div class="uploadBody">
                                        <div class="uploadBorder">
                                            <div class="uploadBodyBox">
                                                <div class="uploadTitleText">بارگذاری فایل مجوز - در صورت وجود</div>
                                                <form id="gallery-form" action="{{route('event.galleries.store', ['event' => $id])}}" class="dropzone uploadBox">
                                                    {{csrf_field()}}
                                                </form>
                                                {{-- <div id="dropZoneErr" style="margin-top: 25px; font-size: 1.2em; color: red;" class="hidden">شما اجازه بارگذاری چنین فایلی را ندارید.</div>
                                                <div class="uploadّFileAllowed">حداکثر فایل مجاز: 100 مگابایت</div> --}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </div>
                        <div class="spaceBetween mb-2">
                            <button class="px-5 b-0 btnHover backColorWhite colorBlack fontSize18">انصراف</button>
                            <button onclick="window.location.href = '{{ route('show-events') }}';" class="btn btn-sm btn-primary px-5">مرحله بعد</button>
                        </div> 
                        <div class="d-flex justify-content-end">
                            <p class="colorBlue fontSize14">ذخیره و ادامه در زمانی دیگر</p>
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
    <script>
        var datePickerOptions = {
            numberOfMonths: 1,
            showButtonPanel: true,
            dateFormat: "yy/mm/dd"
        };
        $("#date_input_create_event_start").datepicker(datePickerOptions);
        var certifications="";

        Dropzone.options.galleryForm = {
                paramName: "img_file", // The name that will be used to transfer the file
                maxFilesize: 6, // MB
                timeout: 180000,
                parallelUploads: 1,
                chunking: false,
                forceChunking: false,
                uploadMultiple: false,
                maxFiles: 15,
                accept: function(file, done) {
                    done();
                },
                init: function () {
                    this.on('completemultiple', function () {
                        // if(myPreventionFlag)
                        //     $("#dropZoneErr").removeClass('hidden');
                        // else
                        //     location.reload();
                        // showSuccess('با موفقیت آپلود شد');
                    });
                    this.on("queuecomplete", function (file) {
                        // if(myPreventionFlag)
                        //     $("#dropZoneErr").removeClass('hidden');
                        // else
                        //     location.reload();
                    });
                    this.on("complete", function (file) {
                        // myDropzone.on("complete", function(file) {
                        //   myDropzone.removeFile(file);
                        // });
                        // if(myPreventionFlag)
                        //     $("#dropZoneErr").removeClass('hidden');
                        // else
                        //     location.reload();
                    });
                    this.on("success", function (file) {
                        // if(myPreventionFlag)
                        //     $("#dropZoneErr").removeClass('hidden');
                        // else
                        //     location.reload();
                    });
                    this.on("canceled", function (file) {
                        // if(myPreventionFlag)
                        //     $("#dropZoneErr").removeClass('hidden');
                        // else
                        //     location.reload();
                    });
                    this.on("error", function (file) {
                        // if(myPreventionFlag)
                        //     $("#dropZoneErr").removeClass('hidden');
                        // else
                        //     location.reload();
                    });
                }
            };
        function removeItem1(){
            $('#removeItem1').remove();
        }
        function removeItem2(){
            $('#removeItem2').remove();
        }
        function removeItem3(){
            $('#removeItem3').remove();
        }
        function removeItem4(){
            $('#removeItem4').remove();
        }
        function removeItem5(){
            $('#removeItem5').remove();
        }
        $('#onlineOrOffline').on('change',function(){
            onlineOrOffline = $('#onlineOrOffline').val();
            if (onlineOrOffline=== 'online'){
                // show or hide class for online
            }else if(onlineOrOffline=== 'offline'){
                // show or hide class for offline
            }else{
                // hide All
            }
        })
    </script>
@stop