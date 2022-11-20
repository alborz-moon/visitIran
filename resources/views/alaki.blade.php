@extends('layouts.structure')

@section('header')

    @parent

    <script src="{{asset('theme-assets/dropzone/dropzone.js?v=1.2')}}"></script>
    <link rel="stylesheet" href="{{asset("theme-assets/dropzone/dropzone.css")}}">
    <script>
        var myPreventionFlag = false;
    </script>
    <link rel="stylesheet" href="{{URL::asset('theme-assets/bootstrap-datepicker.css?v=1')}}">
    <script async src="{{URL::asset("theme-assets//bootstrap-datepicker.js")}}"></script>
    <style>
        /* img {
          min-height: 100px;
        } */
    </style>
    <script src="{{URL::asset("theme-assets/js/lozad.min.js")}}"></script>
@stop


@section('content')
    <div style="margin-top: 100px">
        <div class="uploadBody">
            <div class="uploadBorder">
                <div class="uploadBodyBox">
                    <div class="uploadTitleText">بارگذاری فایل محتواasdasd</div>
                    <form action="{{route('api.testUpload')}}" class="dropzone uploadBox" id="my-awesome-dropzone">
                        {{csrf_field()}}
                    </form>
                    <div id="dropZoneErr" style="margin-top: 25px; font-size: 1.2em; color: red;" class="hidden">شما اجازه بارگذاری چنین فایلی را ندارید.</div>
                    <div class="uploadّFileAllowed">حداکثر فایل مجاز: 100 مگابایت</div>
                </div>
            </div>
        </div>
    </div>
    <div style="margin: 100px">
        <div id="date_btn_start_edit">تاریخ شروع</div>
        <label class="tripCalenderSection">
            <span class="calendarIcon"></span>
            <input id="date_input_start" class="tripDateInput" placeholder="13xx/xx/xx" required readonly type="text">
        </label>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-4">1</div>
            <div class="col-4">2</div>
            <div class="col-4">3</div>
        </div>
        <div class="row">
            <div class="col-2">1</div>
            <div class="col-2">2</div>
            <div class="col-2">3</div>
            <div class="col-2">4</div>
            <div class="col-2">5</div>
            <div class="col-2">6</div>
        </div>
    </div>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
  let lazyImages = [].slice.call(document.querySelectorAll("img.lazy"));
  let active = false;

  const lazyLoad = function() {
    if (active === false) {
      active = true;

      setTimeout(function() {
        lazyImages.forEach(function(lazyImage) {
          if ((lazyImage.getBoundingClientRect().top <= window.innerHeight && lazyImage.getBoundingClientRect().bottom >= 0) && getComputedStyle(lazyImage).display !== "none") {
            lazyImage.src = lazyImage.dataset.src;
            lazyImage.srcset = lazyImage.dataset.srcset;
            lazyImage.classList.remove("lazy");

            lazyImages = lazyImages.filter(function(image) {
              return image !== lazyImage;
            });

            if (lazyImages.length === 0) {
              document.removeEventListener("scroll", lazyLoad);
              window.removeEventListener("resize", lazyLoad);
              window.removeEventListener("orientationchange", lazyLoad);
            }
          }
        });

        active = false;
      }, 200);
    }
  };

  document.addEventListener("scroll", lazyLoad);
  window.addEventListener("resize", lazyLoad);
  window.addEventListener("orientationchange", lazyLoad);
});

        var datePickerOptions = {
            numberOfMonths: 1,
            showButtonPanel: true,
            dateFormat: "yy/mm/dd"
        };
        $("#date_input_start").datepicker(datePickerOptions);
        
        Dropzone.options.myAwesomeDropzone = {
            paramName: "img_file", // The name that will be used to transfer the file
            maxFilesize: 1, // MB
            timeout: 180000,
            parallelUploads: 1,
            chunking: false,
            forceChunking: false,
            accept: function(file, done) {
                done();
            },
            init: function () {
                this.on('completemultiple', function () {
                    // if(myPreventionFlag)
                    //     $("#dropZoneErr").removeClass('hidden');
                    // else
                    //     location.reload();
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