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

@stop


@section('content')
<div style="margin-top: 100px">
        <div class="uploadBody">
            <div class="uploadBorder">
                
                <div class="uploadBodyBox">
                    <div class="uploadTitleText">بارگذاری فایل محتوا</div>
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
    
    <script>

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