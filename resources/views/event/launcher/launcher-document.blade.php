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
                        <div class="alert alert-warning alert-dismissible fade show mb-5 d-flex align-items-center spaceBetween" role="alert">
                            <div>
                                در حال حاضر حساب کاربری شما غیر فعال است. پس از بررسی مدارک و تایید از سوی ادمین حساب شما فعال خواهد شد.
                            </div>
                            <a href="#" class="btn btn-sm btn-primary mx-3">تیکت ها</a>                        
                        </div>
                        <div class="ui-box bg-white mb-5 boxShadow">
                            <div class="ui-box-title">مدارک<span class="fontNormal fontSize12 mx-2">حداکثر 2 مگابایت و در فرمت های jpg, jpeg , png</span></div>
                            <div class="ui-box-content">
                                <div class="row">
                                    <div class="col-lg-6 mb-3 zIndex0">
                                        <div id="companyNewspaper" class="boxGallery">
                                        </div>
                                        <div class="uploadBody">
                                            <div class="uploadBorder">
                                                <div class="uploadBodyBox">
                                                    <form id="newspaper-form" action="{{ route('launcher.update',['launcher' => $formId]) }}" class="dropzone uploadBox">
                                                        {{csrf_field()}}
                                                    </form>
                                                    {{-- <div id="dropZoneNewspaper" style="margin-top: 25px; font-size: 1.2em; color: red;" class="hidden">شما اجازه بارگذاری چنین فایلی را ندارید.</div> --}}
                                                    {{-- <div class="uploadّFileAllowed">حداکثر فایل مجاز: 100 مگابایت</div> --}}
                                                    <div class="d-flex spaceBetween justifyContentCenter">
                                                        <div class="uploadTitleText">بارگذاری فایل روزنامه تاسیس </div>
                                                        <button class="colorBlue b-0 backgroundColorTransparent">ویرایش</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 mb-3 zIndex0">
                                        
                                        <div id="companyLastChanges" class="boxGallery">
                                        </div>

                                        <div class="uploadBody">
                                            <div class="uploadBorder">
                                                <div class="uploadBodyBox">
                                                    <form id="last-files" action="{{ route('launcher.update',['launcher' => $formId])  }}" class="dropzone uploadBox">
                                                        {{csrf_field()}}
                                                    </form>
                                                    {{-- <div id="dropZoneErr" style="margin-top: 25px; font-size: 1.2em; color: red;" class="hidden">شما اجازه بارگذاری چنین فایلی را ندارید.</div>
                                                    <div class="uploadّFileAllowed">حداکثر فایل مجاز: 100 مگابایت</div> --}}
                                                    <div class="d-flex spaceBetween justifyContentCenter">    
                                                        <div class="uploadTitleText">بارگذاری فایل آخرین تغییرات</div>
                                                        <button class="colorBlue b-0 backgroundColorTransparent">ویرایش</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 mb-3 zIndex0">
                                        <div id="userNIDCard" class="boxGallery">
                                        </div>
                                        <div class="uploadBody">
                                            <div class="uploadBorder">
                                                <div class="uploadBodyBox">
                                                    
                                                    <form action="{{ route('launcher.update',['launcher' => $formId]) }}" class="dropzone uploadBox" id="nid-form">
                                                        {{csrf_field()}}
                                                    </form>
                                                    {{-- <div id="dropZoneErr" style="margin-top: 25px; font-size: 1.2em; color: red;" class="hidden">شما اجازه بارگذاری چنین فایلی را ندارید.</div>
                                                    <div class="uploadّFileAllowed">حداکثر فایل مجاز: 100 مگابایت</div> --}}
                                                    <div class="d-flex spaceBetween justifyContentCenter">
                                                        <div class="uploadTitleText">بارگذاری فایل کارت ملی رابط</div>
                                                        <button class="colorBlue b-0 backgroundColorTransparent backgroundColorTransparent">ویرایش</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="col-lg-12 mb-3 zIndex0">
                                        <div id="certifications" class="boxGallery">
                                        </div>
                                        <div class="uploadBody">
                                            <div class="uploadBorder">
                                                <div class="uploadBodyBox">
                                                    <form id="permision-form" action="{{ route('launcher.launcher_certifications.store',['launcher' => $formId]) }}" class="dropzone uploadBox">
                                                        {{csrf_field()}}
                                                    </form>
                                                    {{-- <div id="dropZoneErr" style="margin-top: 25px; font-size: 1.2em; color: red;" class="hidden">شما اجازه بارگذاری چنین فایلی را ندارید.</div>
                                                    <div class="uploadّFileAllowed">حداکثر فایل مجاز: 100 مگابایت</div> --}}
                                                    <div class="d-flex spaceBetween justifyContentCenter">
                                                        <div class="uploadTitleText">بارگذاری فایل مجوز - در صورت وجود</div>
                                                        <button class="colorBlue b-0 backgroundColorTransparent backgroundColorTransparent">ویرایش</ذ>
                                                    </div>
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
                    <button class="px-5 b-0 btnHover backColorWhite colorBlack fontSize18">بازگشت</button>
                    <button onclick="sendimg()" class="btn btn-sm btn-primary px-5">ارسال برای بازبینی</button>
                </div>
                </div>
            </div>
        </div>
        <!-- start of personal-info-fullname-modal -->
            <div class="remodal remodal-xl" data-remodal-id="companyLastChangesShow"
                data-remodal-options="hashTracking: false">
                <div class="remodal-header">
                    <div class="remodal-title">مشاهده عکس</div>
                    <button data-remodal-action="close" class="remodal-close"></button>
                </div>
                <div class="remodal-content">
                    <div class="form-element-row mb-3">
                        <div id="companyLastChangesImg">
                            
                        </div>
                    </div>
                </div>
                <div class="remodal-footer">
                    <button data-remodal-action="close" class="btn btn-sm btn-primary px-3">بستن</button>
                </div>
            </div>
        <!-- end of personal-info-fullname-modal -->

        <!-- start of personal-info-fullname-modal -->
            <div class="remodal remodal-xl" data-remodal-id="companyNewspaperShow"
                data-remodal-options="hashTracking: false">
                <div class="remodal-header">
                    <div class="remodal-title">مشاهده عکس</div>
                    <button data-remodal-action="close" class="remodal-close"></button>
                </div>
                <div class="remodal-content">
                    <div class="form-element-row mb-3">
                        <div id="companyNewspaperImg">
                            
                        </div>
                    </div>
                </div>
                <div class="remodal-footer">
                    <button data-remodal-action="close" class="btn btn-sm btn-primary px-3">بستن</button>
                </div>
            </div>
        <!-- end of personal-info-fullname-modal -->
        <!-- start of personal-info-fullname-modal -->
            <div class="remodal remodal-xl" data-remodal-id="userNIDCardShow"
                data-remodal-options="hashTracking: false">
                <div class="remodal-header">
                    <div class="remodal-title">مشاهده عکس</div>
                    <button data-remodal-action="close" class="remodal-close"></button>
                </div>
                <div class="remodal-content">
                    <div class="form-element-row mb-3">
                        <div id="userNIDCardImg">
                            
                        </div>
                    </div>
                </div>
                <div class="remodal-footer">
                    <button data-remodal-action="close" class="btn btn-sm btn-primary px-3">بستن</button>
                </div>
            </div>
        <!-- end of personal-info-fullname-modal -->
        <!-- start of personal-info-fullname-modal -->
            <div class="remodal remodal-xl" data-remodal-id="certificationsShow"
                data-remodal-options="hashTracking: false">
                <div class="remodal-header">
                    <div class="remodal-title">مشاهده عکس</div>
                    <button data-remodal-action="close" class="remodal-close"></button>
                </div>
                <div class="remodal-content">
                    <div class="form-element-row mb-3">
                        <div id="userNIDCardImg">
                            <img id="certificationsGallery" class="w-100 h-100 objectFitCover" src="" alt="">
                        </div>
                    </div>
                </div>
                <div class="remodal-footer">
                    <button data-remodal-action="close" class="btn btn-sm btn-primary px-3">بستن</button>
                </div>
            </div>
            
        <!-- end of personal-info-fullname-modal -->
    </main>

@stop

@section('footer')
    @parent
@stop

@section('extraJS')
    @parent
    <script>

        $(document).ready(function() {

            $.ajax({
                type: 'get',
                url: '{{ route('launcher.files', ['launcher' => $formId]) }}',
                headers: {
                    'accept': 'application/json'
                },
                success: function(res) {
                    var html= "";
                    var companyNewspaper="";
                    var userNIDCard ="";
                    var certifications="";
                    var certificationsGallery="";
                    if(res.status === "ok") {      
                        if (res.data.company_last_changes.length !== 0) {
                            html += '<div data-remodal-target="companyLastChangesShow" class="square cursorPointer position-relative">';
                            html += '<img class="w-100 h-100 objectfitCover" src="' + res.data.company_last_changes + '">';
                            html += '<i data-id="last_changes" class="icon-visit-delete position-absolute colorRed fontSize21 topLeft10"></i>';
                            html += '</div>';
                            $("#companyLastChanges").empty().append(html);
                            $('#companyLastChangesImg').empty().append('<img class="w-100 h-100 objectFitCover" src="' + res.data.company_last_changes + '" alt="">');
                        }else{
                            $('#companyLastChanges').addClass('hidden');
                        }
                        if (res.data.company_newspaper.length !== 0 ){
                            companyNewspaper += '<div data-remodal-target="companyNewspaperShow" class="square cursorPointer position-relative">';
                            companyNewspaper += '<img class="w-100 h-100 objectfitCover" src="' + res.data.company_newspaper + '">';
                            companyNewspaper += '<i data-id="last_changes" class="icon-visit-delete position-absolute colorRed fontSize21 topLeft10"></i>';
                            companyNewspaper +='</div>';
                            $("#companyNewspaper").empty().append(companyNewspaper);
                            $('#companyNewspaperImg').empty().append('<img class="w-100 h-100 objectFitCover" src="' + res.data.company_newspaper + '" alt="">');
                        }else{
                            $('#companyNewspaper').addClass('hidden');
                        }
                        if (res.data.user_NID_card.length !== 0 ){
                            userNIDCard += '<div data-remodal-target="userNIDCardShow" class="square cursorPointer position-relative">';
                            userNIDCard += '<img class="w-100 h-100 objectfitCover" src="' + res.data.user_NID_card + '" alt="">';
                            userNIDCard += '<i data-id="last_changes" class="icon-visit-delete position-absolute colorRed fontSize21 topLeft10"></i>';
                            userNIDCard += '</div>';
                            $("#userNIDCard").empty().append(userNIDCard);
                            $('#userNIDCardImg').empty().append('<img class="w-100 h-100 objectFitCover" src="' + res.data.user_NID_card + '" alt="">');
                        }else{
                            $('#userNIDCard').addClass('hidden');
                        }
                        if (res.data.certifications.length !== 0 ){
                            for(var i = 0; i < res.data.certifications.length; i++ ){                                 
                                certifications += '<div data-remodal-target="certificationsShow" onclick="sendImg(\'' + res.data.certifications[i].file + '\')" class="square cursorPointer position-relative">';
                                certifications += '<img class="w-100 h-100 objectfitCover" src="' + res.data.certifications[i].file + '" alt="">';
                                certifications += '<i data-id="last_changes" class="icon-visit-delete position-absolute colorRed fontSize21 topLeft10"></i>';
                                certifications += '</div>';
                            } 
                            $("#certifications").empty().append(certifications);
                        }else{
                            $('#certifications').addClass('hidden');
                        }
                        
                    }
                }
            });
        });

        function sendImg(img){
            $('#certificationsGallery').attr('src', img);
        }

        let uploadedFiles = [];

        Dropzone.options.newspaperForm = {
            paramName: "company_newspaper_file", // The name that will be used to transfer the file
            maxFilesize: 2, // MB
            timeout: 180000,
            parallelUploads: 1,
            chunking: false,
            forceChunking: false,
            uploadMultiple: false,
            maxFiles: 1,
            acceptedFiles: ".jpeg,.jpg,.png,.gif",
            accept: function(file, done) {
                done();
            },
            init: function () {
                this.hiddenFileInput.removeAttribute('multiple');
                this.on("success", function (file) {
                    uploadedFiles.push({
                        name: file.name,
                        id: 'news_paper'
                    });
                    
                    $(".dz-message").removeClass('block');
                    showSuccess('فایل شما با موفقیت آپلود شد');
                    $("#companyNewspaper").remove();
                });
            }
        };

        Dropzone.options.lastFiles = {
            paramName: "company_last_changes_file",
            maxFilesize: 2, // MB
            timeout: 180000,
            parallelUploads: 1,
            chunking: false,
            forceChunking: false,
            maxFiles: 1,
            acceptedFiles: ".jpeg,.jpg,.png,.gif",
            accept: function(file, done) {
                done();
            },
            init: function () {
                this.hiddenFileInput.removeAttribute('multiple');
                
                this.on("success", function (file) {
                    uploadedFiles.push({
                        name: file.name,
                        id: 'last_changes'
                    });
                    
                    $(".dz-message").removeClass('block');
                    showSuccess('فایل شما با موفقیت آپلود شد');
                    $("#companyLastChanges").remove();
                });
            }
        };

        Dropzone.options.permisionForm = {
            paramName: "img_file", // The name that will be used to transfer the file
            maxFilesize: 10, // MB
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
                    $('.dz-image').addClass('btnRemoveDropzone');
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
            maxFilesize: 2, // MB
            timeout: 180000,
            parallelUploads: 1,
            chunking: false,
            forceChunking: false,
            uploadMultiple: false,
            maxFiles: 1,
            acceptedFiles: ".jpeg,.jpg,.png,.gif",
            accept: function(file, done) {
                done();
            },
            init: function () {
                this.hiddenFileInput.removeAttribute('multiple');
                this.on("success", function (file) {
                    
                    uploadedFiles.push({
                        name: file.name,
                        id: 'NID'
                    });
                    
                    $(".dz-message").removeClass('block');
                    showSuccess('فایل شما با موفقیت آپلود شد');
                    $("#userNIDCard").remove();
                });
            }
        };

        $(document).on('click', ".icon-visit-uploaded-delete", function() {
            
            let filename = $(this).siblings('.dz-filename').text();
            let tmp = uploadedFiles.find(elem => elem.name === filename);
            if(tmp === undefined)
                return;

            let parentElem = $(this).parent().parent();

            $.ajax({
                type: 'delete',
                url: '{{ route('launcher.cert.destroy', ['launcher' => $formId]) }}',
                data: {
                    mode: tmp.id
                },
                success: function(res) {
                    if(res.status === 'ok') {
                        uploadedFiles = uploadedFiles.filter((elem, index) => {
                            return elem.id !== tmp.id;
                        });
                        parentElem.remove();
                        if(uploadedFiles.length === 0)
                            $(".dz-message").addClass('block');
                        
                        showSuccess('فایل موردنظر با موفقیت حدف گردید.');
                    }
                }
            });
        });

    </script>
@stop