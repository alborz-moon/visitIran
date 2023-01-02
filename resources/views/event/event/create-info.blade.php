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
                <?php $isEditor = Auth::user()->isEditor(); ?>
                @if(!$isEditor)
                    @include('event.launcher.launcher-menu')
                @endif
                <div class="{{ $isEditor ? 'col-xl-12 col-lg-12 col-md-12' : 'col-xl-9 col-lg-8 col-md-7'}}">
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
                            <div class="ui-box-title"> عکس اصلی رویداد</div>
                            <div class="ui-box-content">
                                <div class="row">
                                    <div class="col-lg-12 mb-3">
                                            <div id="mainPicEvent" class="boxGallery gap10">

                                            </div>
                                            @include('event.launcher.dropZone', [
                                                'label' => 'عکس اصلی رویداد',
                                                'key' => 'img_file',
                                                'camelKey' => 'imgFile',
                                                'maxFiles' => 1,
                                                'route' => route('event.set_main_img',['event' => $id]),
                                            ]);
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="ui-box bg-white mb-5 boxShadow">
                            <div class="ui-box-title">توضیحات</div>
                            <div class="ui-box-content">
                                <div class="row">
                                    <div class="col-lg-12 mb-3">
                                        <div class="py-2">
                                            <div class="d-flex align-items-center justify-content-between position-relative">
                                                <textarea data-editable="true" id="description" type="text" class="form-control" style="direction: rtl" placeholder="توضیحات"></textarea>
                                                <button data-input-id="description" class="toggle-editable-btn btn btn-circle btn-outline-light">
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
                                        
                                    <div id="certifications" class="boxGallery gap10">
                                        <div class="certificationsImg">
                                        </div>
                                    </div>

                                    <div iclass="uploadBody">
                                        <div class="uploadBorder">
                                            <div class="uploadBodyBox" style="padding-bottom: 50px">
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
                            <button id="nextBtn" class="btn btn-sm btn-primary px-5">مرحله بعد</button>
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
    
        let uploadedFiles = [];
        let total = 0;

        Dropzone.options.galleryForm = {
            paramName: "img_file", // The name that will be used to transfer the file
            maxFilesize: 5, // MB
            timeout: 180000,
            parallelUploads: 1,
            chunking: false,
            forceChunking: false,
            uploadMultiple: false,
            maxFiles: 8,
            accept: function(file, done) {
                done();
            },
            init: function () {
                this.on('completemultiple', function () {
                    
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
                this.on("success", function (file, res, e) {
                    uploadedFiles.push({
                        name: file.name,
                        id: res.id
                    });
                    
                    $(".dz-message").removeClass('block');
                    showSuccess('فایل شما با موفقیت آپلود شد');
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
        }
        $(document).ready(function(){
            $('textarea').attr("data-editable", "true");
            $('.toggle-editable-btn').addClass('hidden');
        });
        $.ajax({
            type: 'get',
            url: '{{route('event.galleries.index',['event' => $id])}}',
            success: function(res) {
                var gallery = "";
                if(res.status === "ok") {
                    $('textarea').attr("data-editable", "false");
                    $('.toggle-editable-btn').removeClass('hidden');
                    if(res.data.length != 0) {
                        total = res.data.length;
                        for(i = 0; i < res.data.length; i ++ ){
                            gallery += '<div id="gallery_' + res.data[i].id + '" class="certificationsImg">';
                            gallery += '<img class="w-100 h-100" src="' + res.data[i].img + '" alt="">';
                            gallery += '<i data-id=' + res.data[i].id + ' class="icon-visit-delete position-absolute colorRed fontSize21 topLeft10"></i>';
                            gallery += '</div>';
                        }
                        $("#certifications").empty().append(gallery);
                    }
                    else {
                        $("#certifications").remove();
                    }
                }
            }
        });
        $.ajax({
            type: 'get',
            url: '{{route('event.get_main_img' ,['event' => $id])}}',
            success: function(res) {
                var mainProfileEvent = "";
                if(res.status === "ok") {
                    if (res.img.length != 0){
                        console.log('====================================');
                        console.log(res.img);
                        console.log('====================================');
                        mainProfileEvent += '<div class="">';
                        mainProfileEvent += '<img class="w-100 h-100" src="' + res.img + '" alt="">';
                        mainProfileEvent += '<i class="icon-visit-delete position-absolute colorRed fontSize21 topLeft10"></i>';
                        mainProfileEvent += '</div>';
                        $("#mainPicEvent").empty().append(mainProfileEvent);
                    }
                }
            }
        });

        $(document).on('click', ".icon-visit-uploaded-delete", function() {
            
            let filename = $(this).siblings('.dz-filename').text();
            let tmp = uploadedFiles.find(elem => elem.name === filename);
            if(tmp === undefined)
                return;

            let parentElem = $(this).parent().parent();

            $.ajax({
                type: 'delete',
                url: '{{ route('event.galleries.destroy') }}' + "/" + tmp.id,
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


        $(document).on('click', ".icon-visit-delete", function() {
            
            let id = $(this).attr('data-id');

            $.ajax({
                type: 'delete',
                url: '{{ route('event.galleries.destroy') }}' + "/" + id,
                success: function(res) {
                    if(res.status === 'ok') {
                        $("#gallery_" + id).remove();
                        showSuccess('فایل موردنظر با موفقیت حدف گردید.');
                        console.log(uploadedFiles.length);
                        total--;
                        if(total === 0)
                            $("#certifications").remove();
                    }
                }
            });
        });

    $("#nextBtn").on('click', function () {
        var description = $('#description').val()
        $.ajax({
            type: 'post',
            url: '{{route('event.store_desc',['event' => $id])}}',
            data: {
                'description': description,
            },
            success: function(res) {
                if(res.status === "ok") {
                    window.location.href = "{{isset($id) ? route('show-events', ['event' => $id]) : route('show-events') }}";
                }
            }
        });
    });

    
    $.ajax({
        type: 'get',
        url: '{{route('event.get_desc',['event' => $id])}}',
        success: function(res) {
            if(res.status === "ok") {
                $('#description').val(res.data)
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
        }
    });
    </script>
@stop