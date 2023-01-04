
@extends('layouts.structure')
@section('header')

    @parent
    
    <script src="{{URL::asset("theme-assets/js/moment.js")}}"></script>
    <script src="{{URL::asset("theme-assets/js/moment-jalaali.js")}}"></script>

    <link rel="stylesheet" href="{{URL::asset('theme-assets/css/bootstrap-material-datetimepicker.css')}}">
    <script src="{{URL::asset("theme-assets/js/bootstrap-material-datetimepicker.js")}}"></script>

    <link rel="stylesheet" href="{{URL::asset('theme-assets/bootstrap-datepicker.css?v=1')}}">
    <script src="{{URL::asset("theme-assets/bootstrap-datepicker.js")}}"></script>
    {{-- <script>
        moment.locale("fa"); 
        moment().format('LLLL');
    </script> --}}
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
                        <span class="colorBlack  fontSize15 bold d-none d-md-block">ایجاد رویداد </span>
                        <ul class="checkout-steps mt-4 mb-3 w-100">
                            <li class="checkout-step-active">
                                <a href="{{ route('update-event', ['event' => $id]) }}"><span class="checkout-step-title" data-title="اطلاعات کلی"></span></a>
                            </li>
                            <li class="checkout-step-active">
                                <a href="{{ route('addSessionsInfo', ['event' => $id]) }}"><span class="checkout-step-title" data-title="زمان برگزاری"></span></a>
                            </li>
                            <li>
                                <a href="{{ route('addPhase2Info', ['event' => $id]) }}"><span class="checkout-step-title" data-title="ثبت نام و تماس"></span></a>
                            </li>
                            <li>
                                <a href="{{ route('addGalleryToEvent', ['event' => $id]) }}"><span class="checkout-step-title" data-title="اطلاعات تکمیلی"></span></a>
                            </li>
                        </ul>
                        <a href="{{ route('create-event') }}" class="px-3 b-0 btnHover backColorWhite colorBlack fontSize18">بازگشت</a>
                    </div>
                        <div class="ui-box bg-white mb-5 boxShadow">
                            <div class="ui-box-title">جلسات برگزاری</div>
                            <div class="ui-box-content">
                                <div class="row">
                                    <div class="col-lg-6 mb-3">
                                        <div data-remodal-target="time-and-date-start-modal" class="fs-7 text-dark">تاریخ و ساعت شروع</div>
                                        <div class="py-2">
                                            <div class="d-flex align-items-center justify-content-between">
                                                <input id="setDateStart" data-remodal-target="time-and-date-start-modal" type="text" class="form-control" style="direction: rtl" placeholder="تاریخ و ساعت شروع">
                                                <button data-remodal-target="time-and-date-start-modal" class="btn btn-circle btn-outline-light d-none">
                                                    <i class="ri-ball-pen-fill"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 mb-3">
                                        <div class="py-2">
                                            <div data-remodal-target="time-and-date-stop-modal" class="fs-7 text-dark">تاریخ و ساعت پایان</div>
                                            <div class="d-flex align-items-center justify-content-between">
                                                <input id="setDateStop" data-remodal-target="time-and-date-stop-modal" type="text" class="form-control" style="direction: rtl" placeholder="تاریخ و ساعت پایان">
                                                <button data-remodal-target="time-and-date-stop-modal" class="btn btn-circle btn-outline-light d-none"><i
                                                        class="ri-ball-pen-fill"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-end">
                                        <button data-remodal-target="addtoTable" class="btn btn-sm btn-primary px-3">افزودن</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="ui-box bg-white mb-5 b-0 p-0">
                            <div class="ui-box-title align-items-center justify-content-between">
                                جلسات
                            </div>
                            <div class="ui-box-content">
                                <div class="table-responsive">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>شماره</th>
                                                <th> تاریخ شروع  </th>
                                                <th> تاریخ پایان  </th>
                                                <th>عملیات</th>
                                            </tr>
                                        </thead>
                                        <tbody id="addedRowTable">
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="spaceBetween mb-2">
                            <a href="{{route('addPhase2Info', ['event' => $id])}}" class="px-5 b-0 btnHover backColorWhite colorBlack fontSize18">انصراف</a>
                            @if(isset($id))
                                <button data-remodal-target="modalAreYouSure" class="btn btn-sm btn-primary px-5">اعمال تغییرات</button>
                            @else
                                <a href="{{route('addPhase2Info', ['event' => $id])}}" class="btn btn-sm btn-primary px-5 nextBtn">ثبت اطلاعات</a>
                            @endif
                        </div>
                        @if(isset($id))
                            <div class="d-flex justify-content-end">
                                <a href="{{route('addPhase2Info', ['event' => $id])}}" class="colorBlue fontSize14 ml-33">مشاهده مرحله بعد</a>
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
                <a target="_blank" href="{{route('addPhase2Info', ['event' => $id])}}" class="btn btn-sm btn-primary px-3">بله</a>
            </div>
        </div>
        <div class="remodal remodal-xl" data-remodal-id="addtoTable"
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
                <button id="addedItem" data-remodal-action="close" class="btn btn-sm btn-primary px-3">بله</button>
            </div>
        </div>
        <!-- start of personal-info-fullname-modal -->
            <div class="remodal remodal-xs" data-remodal-id="time-and-date-start-modal"
                data-remodal-options="hashTracking: false">
                <div class="remodal-header">
                    <div class="remodal-title">تاریخ و ساعت شروع</div>
                    <button data-remodal-action="close" class="remodal-close"></button>
                </div>
                <div class="remodal-content">
                    <div>
                        <div id="date_btn_start_edit" class="label fs-7 font600">تاریخ شروع</div>
                        <label class="tripCalenderSection w-100">
                            <span class="calendarIcon"></span>
                            <input id="date_input_start" class="tripDateInput w-100 form-control directionLtr backColorWhite" placeholder="13xx/xx/xx" required readonly type="text">
                        </label>
                    </div>
                    <div class="form-element-row label-floating is-empty">
                        <label class="label fs-7">زمان شروع</label>
                        <input id="time_input_start" data-dtp="dtp_dKXUf" type="text" data-clear-btn="true" class="form-control" placeholder="؟؟:؟؟">
                    </div>
                </div>
                <div class="remodal-footer">
                    <button id="startSessionBtn" class="btn btn-sm btn-primary px-3">ثبت اطلاعات</button>
                </div>
            </div>
        <!-- end-modal -->
        <!-- start-modal -->
            <div class="remodal remodal-xs" data-remodal-id="time-and-date-stop-modal"
                data-remodal-options="hashTracking: false">
                <div class="remodal-header">
                    <div class="label fs-7">تاریخ و ساعت پایان</div>
                    <button data-remodal-action="close" class="remodal-close"></button>
                </div>
                <div class="remodal-content">
                    <div class="form-element-row mb-3">
                        <label class="label fs-7 font600">تاریخ پایان</label>
                        <label class="tripCalenderSection w-100">
                            <span class="calendarIcon"></span>
                            <input id="date_input_stop" class="tripDateInput w-100 form-control directionLtr backColorWhite" placeholder="13xx/xx/xx" required readonly type="text">
                        </label>
                    </div>
                    <div class="form-element-row">
                        <label class="label fs-7">زمان پایان</label>
                        <input id="time_input_stop" type="text" class="form-control" placeholder="؟؟:؟؟">
                    </div>
                </div>
                <div class="remodal-footer">
                    <button id="stopSessionBtn" class="btn btn-sm btn-primary px-3">ثبت اطلاعات</button>
                </div>
            </div>
        <!-- end-modal -->
    </main>
@stop

@section('footer')
    @parent
@stop

@section('extraJS')
    @parent
    <script> 
    var timeStart ='';
    var dateStart ='';
    var timeStop = '';
    var dateStop = '';
    let idx = 0;
    
    var arrDateTime = [];
    $(document).ready(function() {
        $('#time_input_start').bootstrapMaterialDatePicker({ date: false, time: true, format: 'HH:mm' });
        $('#time_input_stop').bootstrapMaterialDatePicker({ date: false, time: true, format: 'HH:mm' });
        
        var datePickerOptions = {
            numberOfMonths: 1,
            showButtonPanel: true,
            dateFormat: "yy/mm/dd"
        };

        $("#date_input_start").datepicker(datePickerOptions);
        $("#date_input_stop").datepicker(datePickerOptions);
        
        $(document).on('click', "#startSessionBtn", function () {
            timeStart =$('#time_input_start').val();
            dateStart = $('#date_input_start').val();
            if (timeStart.length == 0 || dateStart.length == 0){
                showErr("تاریخ شروع و زمان شروع را وارد کنید");
                return;
            }else{
                $('#setDateStart').val(timeStart + ' ' + dateStart);                
                $(".remodal-close").click();
            }
        });
        $(document).on('click', "#stopSessionBtn", function () {
            timeStop = $('#time_input_stop').val();
            dateStop = $('#date_input_stop').val();
            if (timeStop.length == 0 || dateStop.length == 0){
                showErr("تاریخ پایان و زمان پایان را وارد کنید");
                return;
            }else{
                $('#setDateStop').val(timeStop + ' ' + dateStop);
                $(".remodal-close").click();               
            }
        });
    });

    $("#addedItem").on('click', function () {
        if (timeStart == '' || dateStart == '' || timeStop == '' || dateStop == '') {
            showErr('تاریخ و زمان شروع و پایان را اضافه کنید.');
            return;
        }

        $.ajax({
            type: 'post',
            url: '{{ route('event.sessions.store', ['event' => $id]) }}',
            data: {
                'start_date': dateStart,
                'end_date': dateStop,
                'start_time': timeStart,
                'end_time': timeStop,
            },
            headers: {
                'accept': 'application/json'
            },
            success: function(res) {
                if(res.status === "ok") {
                    if (dateStart != '' && dateStop != '' && timeStart != ''  && timeStop != ''){
                        
                        var addedRowTable = '<tr id="row-' + res.id +  '">';
                        addedRowTable += '<td class="fa-num">' + idx +  '</td>';
                        addedRowTable += '<td class="fa-num">' + dateStart + ' ' + timeStart + '</td>';
                        addedRowTable += '<td class="fa-num">' + dateStop + ' ' + timeStop + '</td>';
                        addedRowTable += '<td>';
                        addedRowTable += '<button data-id="' + res.id + '" class="btn btn-circle borderCircle my-1 remove-btn-sessions">';
                        addedRowTable += '<i class="icon-visit-delete marginTop7"></i>';
                        addedRowTable += '</button>';
                        addedRowTable += '</td>';
                        addedRowTable += '</tr>';
                        idx ++;
                        $("#addedRowTable").append(addedRowTable);
                        timeStart =$('#time_input_start').val('');
                        dateStart = $('#date_input_start').val('');
                        $('#setDateStart').val('');
                        timeStop =$('#time_input_stop').val('');
                        dateStop = $('#date_input_stop').val('');
                        $('#setDateStop').val('');
                    }
                }
            }
        });
    });

    $.ajax({
        type: 'get',
        url: '{{ route('event.sessions.index', ['event' => $id]) }}',
        headers: {
            'accept': 'application/json'
        },
        success: function(res) {
            if(res.status === "ok") {
                if (res.data.length !== 0){
                    for(var i = 0; i < res.data.length ; i++){
                        var addedRowTable = '<tr id="row-' + res.data[i].id + '">';
                        addedRowTable += '<td class="fa-num">' + i + '</td>';
                        addedRowTable += '<td class="fa-num">' + res.data[i].start_date +' '+ res.data[i].start_time + '</td>';
                        addedRowTable += '<td class="fa-num">' + res.data[i].end_date +' '+ res.data[i].end_time + '</td>';
                        addedRowTable += '<td>';
                        addedRowTable += '<button data-id="' + res.data[i].id + '" class="btn btn-circle borderCircle my-1 remove-btn-sessions">';
                        addedRowTable += '<i class="icon-visit-delete marginTop7"></i>';
                        addedRowTable += '</button>';
                        addedRowTable += '</td>';
                        addedRowTable += '</tr>';
                        $("#addedRowTable").append(addedRowTable);
                        idx ++;
                    }
                }
            }
        }
    });

    $(document).on('click', '.remove-btn-sessions', function () {

        let id = $(this).attr('data-id');


        $.ajax({
            type: 'delete',
            url: '{{ route('sessions.destroy') }}' + "/" + id,
            headers: {
                'accept': 'application/json'
            },
            success: function(res) {
                if(res.status === "ok")
                    $('#row-'+ id +'').remove();
            }
        });


    });

    </script>
@stop