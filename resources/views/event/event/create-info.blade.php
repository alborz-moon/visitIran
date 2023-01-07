@extends('layouts.structure')
@section('header')
    @parent
    <script src="{{asset('theme-assets/dropzone/dropzone.js?v=1.2')}}"></script>
    <link rel="stylesheet" href="{{asset("theme-assets/dropzone/dropzone.css")}}">
    {{-- <script src="{{asset('theme-assets/js/Utilities.js')}}"></script> --}}
@stop

@section('content')
    <main class="page-content TopParentBannerMoveOnTop">
        <div class="dark hidden"></div>
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
                                        @include('event.launcher.dropZone', [
                                            'col' => 'col-12', 
                                            'label' => 'عکس اصلی رویداد',
                                            'key' => 'main_img',
                                            'camelKey' => 'mainImg',
                                            'maxFiles' => 1,
                                            'route' => route('event.set_main_img',['event' => $id]),
                                        ])
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="ui-box bg-white mb-5 boxShadow">
                            <div class="ui-box-title">گالری عکس</div>
                                <div class="col-lg-12 mb-3 zIndex0">
                                        
                                    <div id="certifications" class="boxGallery gap10">
                                        <div class="square">
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
                        <div class="spaceBetween mb-2">
                            <a href="" class="px-5 b-0 btnHover backColorWhite colorBlack fontSize18">انصراف</a>
                            @if(isset($id))
                                <button data-remodal-target="modalAreYouSure" class="btn btn-sm btn-primary px-5">ارسال برای بازبینی</button>
                            @else
                                <button class="btn btn-sm btn-primary px-5 nextBtn">ارسال برای بازبینی</button>
                            @endif
                        </div>
                        {{-- @if(isset($id))
                            <div class="d-flex justify-content-end">
                                <a href="{{ route('show-events') }}" class="colorBlue fontSize14 ml-33">مشاهده مرحله بعد</a>
                            </div>
                        @endif --}}
                    </div>
            </div>
        </div>
        <div class="remodal remodal-xl" data-remodal-id="mainImgShow"
            data-remodal-options="hashTracking: false">
            <div class="remodal-header">
                <div class="remodal-title">مشاهده عکس</div>
                <button data-remodal-action="close" class="remodal-close"></button>
            </div>
            <div class="remodal-content">
                <div class="form-element-row mb-3">
                    <div id="mainImgModal">
                    </div>
                </div>
            </div>
            <div class="remodal-footer">
                <button data-remodal-action="close" class="btn btn-sm btn-primary px-3">بستن</button>
            </div>
        </div>
        <div class="remodal remodal-xl" data-remodal-id="mainGallery"
            data-remodal-options="hashTracking: false">
            <div class="remodal-header">
                <div class="remodal-title">مشاهده عکس</div>
                <button data-remodal-action="close" class="remodal-close"></button>
            </div>
            <div class="remodal-content">
                <div class="form-element-row mb-3">
                    <div>
                        <img id="mainGalleryModal" class="w-100 h-100 objectFitCover" src="" alt="">
                    </div>
                </div>
            </div>
            <div class="remodal-footer">
                <button data-remodal-action="close" class="btn btn-sm btn-primary px-3">بستن</button>
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
                <button class="btn btn-sm btn-primary px-3 nextBtn">بله</button>
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
                this.on("success", function (file, res, e) {
                    uploadedFiles.push({
                        name: file.name,
                        id: res.id
                    });
                    $(".dz-message").removeClass('block');
                    showSuccess('فایل شما با موفقیت آپلود شد');
                });
            }
        }
        $(document).ready(function(){
            $('textarea').attr("data-editable", "true");
            $('.toggle-editable-btn').addClass('hidden');
            $(".toggle-editable-btn").on("click", function () {
                if ($('textarea').attr("data-editable") == "false") {
                    $('textarea').attr("data-editable", "true");
                    $('textarea').removeAttr("disabled");
                } else {
                    $('textarea').attr("data-editable", "false");
                    $('textarea').attr("disabled", "disabled");
                }
            });
        });
        function sendimg(img){
            $("#mainGalleryModal").attr('src', img);
        }
        $.ajax({
            type: 'get',
            url: '{{route('event.galleries.index',['event' => $id])}}',
            success: function(res) {
                var gallery = "";
                if(res.status === "ok") {
                    $('textarea').attr("data-editable", "false");
                    if(res.data.length != 0) {
                        total = res.data.length;
                        for(i = 0; i < res.data.length; i ++ ){
                            gallery += '<div onclick="sendimg(\'' + res.data[i].img + '\')" data-remodal-target="mainGallery" id="gallery_' + res.data[i].id + '" class="square cursorPointer">';
                            gallery += '<img class="w-100 h-100 objectFitCover" src="' + res.data[i].img + '" alt="">';
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
                        let html = '<div data-remodal-target="mainImgShow" class="square cursorPointer position-relative square">';
                        html += '<img class="w-100 h-100 objectFitCover" src="' + res.img + '">';
                        html += '</div>';
                        $("#drop_zone_container_main_img").addClass('hidden');
                        $("#gallery_container_main_img").append(html);
                        $("#edit_btn_main_img").removeClass('hidden');
                        $('#mainImgModal').empty().append('<img class="w-100 h-100 objectFitCover" src="' + res.img + '" alt="">')
                    }else {
                        $("#gallery_container_main_img").remove();
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

    $(".nextBtn").on('click', function () {
        function checkInputs(required_list) {
            let isValid = true;

            required_list.forEach((elem) => {
                let tmpVal = $("#" + elem).val();
                if (tmpVal.length == 0) {
                    $("#" + elem)
                        .addClass("errEmpty")
                        .removeClass("haveValue");
                    isValid = false;
                } else if (tmpVal.length > 0) {
                    $("#" + elem)
                        .addClass("haveValue")
                        .removeClass("errEmpty");
                }
            });
            return isValid;
        }
        var description = $('#description').val();
        if (description.length == 0){
            var required_list = ['description'];
            var inputList = checkInputs(required_list);
            if( !inputList ) {
                showErr("فیلد توضیحات را پر کنید.");
               return
            }
            showErr("فیلد توضیحات را پر کنید.");
            return;
        }

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
                if (res.data.length != 0){
                    $("textarea").each(function() {
                        if ($(this).attr('data-editable') != 'true' ){
                            $(this).attr('disabled', 'disabled');
                            $(this).attr('data-editable', 'false');
                            $('.toggle-editable-btn').removeClass('hidden');
                        }
                    });
                }else{
                    if ($(this).attr('data-editable') != 'false' ){
                            $(this).removeAttr('disabled', 'disabled');
                            $(this).attr('data-editable', 'true');
                        }
                }
                $('#description').val(res.data);    
            }
        }
    });
    </script>
@stop