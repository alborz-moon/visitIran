
@extends('layouts.structure')
    <script src="{{asset('theme-assets/dropzone/dropzone.js?v=1.2')}}"></script>
    <link rel="stylesheet" href="{{asset("theme-assets/dropzone/dropzone.css")}}">
    <script>
        var myPreventionFlag = false;
    </script>
@section('content')
        <main class="page-content">
        <div class="container">
            <div class="row mb-5">
                @include('event.launcher.launcher-menu')     
                    <div class="col-xl-9 col-lg-8 col-md-7">
                        <div class="alert alert-warning alert-dismissible fade show mb-5 d-flex align-items-center spaceBetween" role="alert">
                            <div>
                                در حال حاضر حساب کاربری شما غیر فعال است. پس از بررسی مدارک و تایید از سوی ادمین حساب شما فعال خواهد شد.
                            </div>
                            <a href="#" class="btn btn-sm btn-primary mx-3">تیکت ها</a>                        
                        </div>
                        <div class="ui-box bg-white mb-5 boxShadow">
                            <div class="ui-box-title">مدارک<span class="fontNormal fontSize12 mx-2">حداکثر 6 مگابایت و در فرمت های jpg, zip , pdf</span></div>
                            <div class="ui-box-content">
                                <div class="row">
                                    <div class="col-lg-6 mb-3">
                                        <div class="uploadBody">
                                            <div class="uploadBorder">
                                                <div class="uploadBodyBox">
                                                    <div class="uploadTitleText">بارگذاری فایل روزنامه تاسیس </div>
                                                    <form id="newspaper-form" action="{{ route('launcher.update',['launcher' => $formId]) }}" class="dropzone uploadBox">
                                                        {{csrf_field()}}
                                                    </form>
                                                    {{-- <div id="dropZoneNewspaper" style="margin-top: 25px; font-size: 1.2em; color: red;" class="hidden">شما اجازه بارگذاری چنین فایلی را ندارید.</div>
                                                    <div class="uploadّFileAllowed">حداکثر فایل مجاز: 100 مگابایت</div> --}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 mb-3">
                                        <div class="uploadBody">
                                            <div class="uploadBorder">
                                                <div class="uploadBodyBox">
                                                    <div class="uploadTitleText">بارگذاری فایل آخرین تغییرات</div>
                                                    <form id="last-files" action="{{ route('launcher.update',['launcher' => $formId])  }}" class="dropzone uploadBox">
                                                        {{csrf_field()}}
                                                    </form>
                                                    {{-- <div id="dropZoneErr" style="margin-top: 25px; font-size: 1.2em; color: red;" class="hidden">شما اجازه بارگذاری چنین فایلی را ندارید.</div>
                                                    <div class="uploadّFileAllowed">حداکثر فایل مجاز: 100 مگابایت</div> --}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 mb-3">
                                        <div class="uploadBody">
                                            <div class="uploadBorder">
                                                <div class="uploadBodyBox">
                                                    <div class="uploadTitleText">بارگذاری فایل مجوز - در صورت وجود</div>
                                                    <form id="permision-form" action="{{ route('launcher.launcher_certifications.store',['launcher' => $formId]) }}" class="dropzone uploadBox">
                                                        {{csrf_field()}}
                                                    </form>
                                                    {{-- <div id="dropZoneErr" style="margin-top: 25px; font-size: 1.2em; color: red;" class="hidden">شما اجازه بارگذاری چنین فایلی را ندارید.</div>
                                                    <div class="uploadّFileAllowed">حداکثر فایل مجاز: 100 مگابایت</div> --}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 mb-3">
                                        <div class="uploadBody">
                                            <div class="uploadBorder">
                                                <div class="uploadBodyBox">
                                                    <div class="uploadTitleText">بارگذاری فایل کارت ملی رابط</div>
                                                    <form action="{{ route('launcher.update',['launcher' => $formId]) }}" class="dropzone uploadBox" id="nid-form">
                                                        {{csrf_field()}}
                                                    </form>
                                                    {{-- <div id="dropZoneErr" style="margin-top: 25px; font-size: 1.2em; color: red;" class="hidden">شما اجازه بارگذاری چنین فایلی را ندارید.</div>
                                                    <div class="uploadّFileAllowed">حداکثر فایل مجاز: 100 مگابایت</div> --}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <div class="d-flex justify-content-end">
                            {{-- onclick="window.location.href = '{{ route('finance') }}';" --}}
                        </div>
                    </div>
                </div>
                <div class="spaceBetween mb-2">
                    <button class="px-5 b-0 btnHover backColorWhite colorBlack fontSize18">انصراف</button>
                    <button onclick="sendimg()" class="btn btn-sm btn-primary px-5">ارسال برای بازبینی</button>
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
            $(document).ready(function(){
                
            });
            Dropzone.options.newspaperForm = {
                paramName: "company_newspaper_file", // The name that will be used to transfer the file
                maxFilesize: 6, // MB
                timeout: 180000,
                parallelUploads: 1,
                chunking: false,
                forceChunking: false,
                uploadMultiple: false,
                maxFiles: 1,
                accept: function(file, done) {
                    done();
                },
                init: function () {
                    
                    this.on('completemultiple', function () {
                        if(myPreventionFlag)
                            $("#dropZoneNewspaper").removeClass('hidden');
                        else
                            location.reload();
                    });
                    this.on("queuecomplete", function (file) {
                        // if(myPreventionFlag)
                        //     $("#dropZoneErr").removeClass('hidden');
                        // else
                        //     location.reload();
                    });
                    this.on("complete", function (file) {
                        if(myPreventionFlag)
                            $("#dropZoneNewspaper").removeClass('hidden');
                            showSuccess('با موفقیت بارگذاری شد.');
                        else
                            location.reload();
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
            Dropzone.options.lastFiles = {
                paramName: "company_last_changes_file", // The name that will be used to transfer the file
                maxFilesize: 6, // MB
                timeout: 180000,
                parallelUploads: 1,
                chunking: false,
                forceChunking: false,
                uploadMultiple: true,
                maxFiles: 1,
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
            Dropzone.options.permisionForm = {
                paramName: "img_file", // The name that will be used to transfer the file
                maxFilesize: 6, // MB
                timeout: 180000,
                parallelUploads: 1,
                chunking: false,
                forceChunking: false,
                uploadMultiple: false,
                maxFiles: 5,
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
            Dropzone.options.nidForm = {
                    paramName: "user_NID_card_file", // The name that will be used to transfer the file
                    maxFilesize: 6, // MB
                    timeout: 180000,
                    parallelUploads: 1,
                    chunking: false,
                    forceChunking: false,
                    uploadMultiple: false,
                    maxFiles: 1,
                    accept: function(file, done) {
                        done();
                    },
                    init: function () {
                        
                        this.on('completemultiple', function () {
                            
                            // if(myPreventionFlag)
                            //     $("#dropZoneErr").removeClass('hidden');
                            // else
                            //     location.reload();
                            showSuccess('با موفقیت آپلود شد');
                        });
                        this.on("queuecomplete", function (file) {
                            
                            // if(myPreventionFlag)
                            //     $("#dropZoneErr").removeClass('hidden');
                            // else
                            //     location.reload();
                        });
                        this.on("complete", function (file) {
                            
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
    </script>
@stop