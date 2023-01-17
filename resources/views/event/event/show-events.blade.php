@extends('layouts.structure')

@section('header')
    @parent


    <script src="{{ URL::asset('theme-assets/js/moment.js') }}"></script>

    <link rel="stylesheet" href="{{ URL::asset('theme-assets/css/bootstrap-material-datetimepicker.css') }}">
    <script src="{{ URL::asset('theme-assets/js/bootstrap-material-datetimepicker.js') }}"></script>

    <link rel="stylesheet" href="{{ URL::asset('theme-assets/bootstrap-datepicker.css?v=1') }}">
    <script src="{{ URL::asset('theme-assets//bootstrap-datepicker.js') }}"></script>

    <style>
        /**
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                     * Tabs
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                     */
        .tabs {
            display: flex;
            flex-wrap: wrap;
        }

        .tabs label {
            order: 1;
            padding: 10px 15px;
            cursor: pointer;
            border: 1px solid #dfdfdf;
            font-weight: bold;
            margin-left: 10px;
            transition: background ease 0.2s;
            display: -webkit-inline-box;
            display: -ms-inline-flexbox;
            display: inline-flex;
            -webkit-box-align: center;
            -ms-flex-align: center;
            align-items: center;
            -webkit-box-pack: center;
            -ms-flex-pack: center;
            justify-content: center;
            min-height: 40px;
            border-radius: 10px;
            -webkit-box-shadow: unset !important;
            box-shadow: unset !important;
        }

        .tabs .tab {
            order: 99;
            flex-grow: 1;
            width: 100%;
            display: none;
            padding: 1rem;
            background: #fff;
        }

        .tabs input[type="radio"] {
            display: none;
        }

        .tabs input[type="radio"]:checked+label {
            background-color: #00b2bc;
            color: #fff;
        }

        .tabs input[type="radio"]:checked+label+.tab {
            display: block;
        }

        @media (max-width: 45em) {

            .tabs .tab,
            .tabs label {
                order: initial;
            }

            .tabs label {
                width: 100%;
                margin-right: 0;
                margin-top: 0.2rem;
            }
        }
    </style>
@stop

@section('content')
    <main class="page-content TopParentBannerMoveOnTop">
        <div class="container">
            <div class="row mb-5">

                @include('event.launcher.launcher-menu')

                <div class="col-xl-9 col-lg-8 col-md-7">
                    <div class="ui-box bg-white mb-5 boxShadow p-0">
                        <div class="ui-box-title">رویداد ها</div>
                        <div class="ui-box-content">
                            <div class="row">
                                <div class="col-lg-12 mb-3">
                                    <div class="py-2">
                                        <div class="tabs">

                                            <input type="radio" name="tabs" id="tabone" checked="checked">
                                            <label for="tabone">پیش نویس</label>
                                            <div class="tab p-0">
                                                <div class="ui-box bg-white mb-5 p-0">

                                                    <div class="table-responsive">
                                                        <table class="table mb-0">
                                                            <thead>
                                                                <tr>
                                                                    <th>شماره</th>
                                                                    <th>نام رویداد </th>
                                                                    <th>اطلاعات کلی</th>
                                                                    <th>اطلاعات برگزاری</th>
                                                                    <th>اطلاعات ثبت نام</th>
                                                                    <th>اطلاعات تکمیلی</th>
                                                                    <th>عملیات</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody id="drafts"></tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>

                                            <input type="radio" name="tabs" id="tabtwo">
                                            <label for="tabtwo">در انتظار تایید</label>
                                            <div class="tab p-0">
                                                <div class="ui-box bg-white mb-5 p-0">

                                                    <div class="table-responsive">
                                                        <table class="table mb-0">
                                                            <thead>
                                                                <tr>
                                                                    <th>شماره</th>
                                                                    <th>نام رویداد</th>
                                                                    <th> تاریخ ایجاد </th>
                                                                    <th>وضعیت</th>
                                                                    <th>آخرین بروزرسانی</th>
                                                                    <th>عملیات</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody id="pendings"></tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>

                                            <input type="radio" name="tabs" id="tabfour">
                                            <label for="tabfour">در ثبت نام</label>
                                            <div class="tab p-0">
                                                <div class="ui-box bg-white mb-5 p-0">

                                                    <div class="table-responsive">
                                                        <table class="table mb-0">
                                                            <thead>
                                                                <tr>
                                                                    <th>شماره</th>
                                                                    <th>نام رویداد</th>
                                                                    <th>قیمت</th>
                                                                    <th>ظرفیت</th>
                                                                    <th>تاریخ شروع ثبت نام</th>
                                                                    <th>تاریخ پایان ثبت نام</th>
                                                                    <th>وضعیت نمایش</th>
                                                                    <th>عملیات</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody id="registries"></tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>


                                            <input type="radio" name="tabs" id="tabfive">
                                            <label for="tabfive">جاری</label>
                                            <div class="tab p-0">
                                                <div class="ui-box bg-white mb-5 p-0">
                                                    <div class="table-responsive">
                                                        <table class="table mb-0">
                                                            <thead>
                                                                <tr>
                                                                    <th>شماره</th>
                                                                    <th>نام رویداد</th>
                                                                    <th>تاریخ شروع و پایان دوره</th>
                                                                    <th>قیمت </th>
                                                                    <th>نفرات ثبت نام</th>
                                                                    <th>درآمد</th>
                                                                    <th>عملیات</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody id="runs"></tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>


                                            <input type="radio" name="tabs" id="tabsix">
                                            <label for="tabsix">آرشیو</label>
                                            <div class="tab p-0">
                                                <div class="ui-box bg-white mb-5 p-0">
                                                    <div class="table-responsive">
                                                        <table class="table mb-0">
                                                            <thead>
                                                                <tr>
                                                                    <th>شماره</th>
                                                                    <th>نام رویداد</th>
                                                                    <th>تاریخ شروع و پایان دوره</th>
                                                                    <th>قیمت </th>
                                                                    <th>نفرات ثبت نام</th>
                                                                    <th>درآمد</th>
                                                                    <th>عملیات</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody id="archieves"></tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>


                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- start of personal-info-fullname-modal -->
    <div class="remodal remodal-xs" data-remodal-id="changePriceModal" data-remodal-options="hashTracking: false">
        <div class="remodal-header">
            <div class="remodal-title">تغییر قیمت</div>
            <button data-remodal-action="close" class="remodal-close"></button>
        </div>
        <div class="remodal-content">
            <div class="form-element-row">
                <label class="label fs-7">قیمت موردنظر</label>
                <input id="newprice" type="text" class="form-control" onkeypress="return isNumber(event)"
                    placeholder="قیمت موردنظر" value="">
            </div>
        </div>
        <div class="remodal-footer">
            <button id="changePrice" class="btn btn-sm btn-primary px-3">ثبت اطلاعات</button>
        </div>
    </div>
    <!-- end of personal-info-fullname-modal -->


    <!-- start of personal-info-fullname-modal -->
    <div class="remodal remodal-xs" data-remodal-id="changeCapacityModal" data-remodal-options="hashTracking: false">
        <div class="remodal-header">
            <div class="remodal-title">تغییر ظرفیت</div>
            <button data-remodal-action="close" class="remodal-close"></button>
        </div>
        <div class="remodal-content">
            <div class="form-element-row">
                <label class="label fs-7">ظرفیت موردنظر</label>
                <input id="newcapacity" type="text" class="form-control" onkeypress="return isNumber(event)"
                    placeholder="ظرفیت موردنظر" value="">
            </div>
        </div>
        <div class="remodal-footer">
            <button id="changeCapacity" class="btn btn-sm btn-primary px-3">ثبت اطلاعات</button>
        </div>
    </div>
    <!-- end of personal-info-fullname-modal -->

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
                    <input id="date_input_start" class="tripDateInput w-100 form-control directionLtr backColorWhite"
                        placeholder="14XX/XX/XX" required readonly type="text">
                </label>
            </div>
            <div class="form-element-row">
                <label class="label fs-7">زمان شروع</label>
                <input id="time_start" type="text" data-clear-btn="true" class="form-control" placeholder="0:00">
            </div>
        </div>
        <div class="remodal-footer">
            <button id="startSessionBtn" class="btn btn-sm btn-primary px-3">ثبت اطلاعات</button>
        </div>
    </div>
    <!-- end of personal-info-fullname-modal -->

    <!-- start of personal-info-fullname-modal -->
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
                    <input id="date_input_stop" class="tripDateInput w-100 form-control directionLtr backColorWhite"
                        placeholder="14XX/XX/XX" required readonly type="text">
                </label>
            </div>
            <div class="form-element-row">
                <label class="label fs-7">زمان پایان</label>
                <input id="time_stop" type="text" class="form-control" placeholder="0:00">
            </div>
        </div>
        <div class="remodal-footer">
            <button id="stopSessionBtn" class="btn btn-sm btn-primary px-3">ثبت اطلاعات</button>
        </div>
    </div>
    <!-- end of personal-info-fullname-modal -->

    <input id="date_input_start_formatted" type="hidden" />
    <input id="date_input_stop_formatted" type="hidden" />

@stop


@section('extraJS')
    @parent

    <script>
        var timeStart = '';
        var dateStart = '';
        var timeStop = '';
        var dateStop = '';
        var telsObj = {
            tels: [],
            idx: 1
        };

        var datePickerOptions = {
            numberOfMonths: 1,
            showButtonPanel: true,
            dateFormat: "DD d M سال yy",
            altFormat: "yy/mm/dd",
            altField: $("#date_input_start_formatted")
        };

        var datePickerOptionsEnd = {
            numberOfMonths: 1,
            showButtonPanel: true,
            dateFormat: "DD d M سال yy",
            altFormat: "yy/mm/dd",
            altField: $("#date_input_stop_formatted")
        };

        $(document).ready(function() {
            $('#time_start').bootstrapMaterialDatePicker({
                date: false,
                time: true,
                format: 'HH:mm'
            });
            $('#time_stop').bootstrapMaterialDatePicker({
                date: false,
                time: true,
                format: 'HH:mm'
            });
            $("#date_input_start").datepicker(datePickerOptions);
            $("#date_input_stop").datepicker(datePickerOptionsEnd);
        });

        let selectedId;

        $(document).on('click', '.changePriceBtn', function() {
            $("#newprice").val($(this).attr('data-val'));
            selectedId = $(this).attr('data-id');
        });

        $(document).on('click', '.changeCapacityBtn', function() {
            $("#newcapacity").val($(this).attr('data-val'));
            selectedId = $(this).attr('data-id');
        });

        $(document).on('click', '.changeStartRegistryBtn', function() {
            $("#date_input_start").val($(this).attr('data-val'));
            selectedId = $(this).attr('data-id');
        });

        $(document).on('click', '.changeEndRegistryBtn', function() {
            $("#date_input_stop").val($(this).attr('data-val'));
            selectedId = $(this).attr('data-id');
        });


        function update(key) {

            let val = $("#new" + key).val();
            let data = {};
            data[key] = val;

            $.ajax({
                type: 'put',
                url: '{{ route('event.home') }}' + "/admin/event/" + selectedId + "/launcher-update",
                data: data,
                success: function(res) {

                    if (res.status === 'ok') {
                        $("#" + key + "_" + selectedId).empty().append(val);
                        $("#" + key + "_" + selectedId + "_btn").attr('data-val', val);
                        $(".remodal-close").click();
                    }

                }
            });

        }

        $(document).on('click', '#changePrice', function() {
            update("price");
        });

        $(document).on('click', '#changeCapacity', function() {
            update("capacity");
        });

        $(document).on('click', '#startSessionBtn', function() {

            timeStart = $('#time_start').val();
            dateStart = $('#date_input_start_formatted').val();

            let dateStart2 = $('#date_input_start').val();

            if (timeStart.length == 0 || dateStart.length == 0) {
                showErr("تاریخ شروع و زمان شروع را وارد کنید");
                return;
            } else {

                $.ajax({
                    type: 'put',
                    url: '{{ route('event.home') }}' + "/admin/event/" + selectedId + "/launcher-update",
                    data: {
                        'start_registry_date': dateStart,
                        'start_registry_time': timeStart
                    },
                    success: function(res) {

                        if (res.status === 'ok') {
                            $("#start_registry_" + selectedId).empty().append(dateStart2 + " - " +
                                timeStart);
                            $(".remodal-close").click();
                        }

                    }
                });

            }
        });


        $(document).on('click', '#stopSessionBtn', function() {

            timeStart = $('#time_stop').val();
            dateStart = $('#date_input_stop_formatted').val();

            let dateStart2 = $('#date_input_stop').val();

            if (timeStart.length == 0 || dateStart.length == 0) {
                showErr("تاریخ پایان و زمان پایان را وارد کنید");
                return;
            } else {

                $.ajax({
                    type: 'put',
                    url: '{{ route('event.home') }}' + "/admin/event/" + selectedId + "/launcher-update",
                    data: {
                        'end_registry_date': dateStart,
                        'end_registry_time': timeStart
                    },
                    success: function(res) {

                        if (res.status === 'ok') {
                            $("#end_registry_" + selectedId).empty().append(dateStart2 + " - " +
                                timeStart);
                            $(".remodal-close").click();
                        }

                    }
                });
            }
        });

        function removeItem1() {
            $('#removeItem1').remove();
        }

        function removeItem2() {
            $('#removeItem2').remove();
        }

        function removeItem3() {
            $('#removeItem3').remove();
        }

        function removeItem4() {
            $('#removeItem4').remove();
        }

        function removeItem5() {
            $('#removeItem5').remove();
        }
        $('#onlineOrOffline').on('change', function() {
            onlineOrOffline = $('#onlineOrOffline').val();
            if (onlineOrOffline === 'online') {
                // show or hide class for online
            } else if (onlineOrOffline === 'offline') {
                // show or hide class for offline
            } else {
                // hide All
            }
        });

        let draftsIdx = 1;
        let pendingsIdx = 1;
        let registryIdx = 1;
        let runIdx = 1;
        let archieveIdx = 1;

        let steps = ['first', 'second', 'third', 'forth'];
        let links = [
            '{{ route('event.home') }}' + "/admin/update-event/",
            '{{ route('event.home') }}' + "/admin/addSessionsInfo/",
            '{{ route('event.home') }}' + "/admin/addPhase2Info/",
            '{{ route('event.home') }}' + "/admin/addGalleryToEvent/",
        ];


        function addToDrafts(data) {
            let html = '<tr id="row_' + data.id + '">';
            html += '<td>' + draftsIdx + '</td>';
            html += '<td>' + data.title + '</td>';


            if (data.stepsStatus != null) {

                for (let i = 0; i < steps.length; i++) {

                    if (data.stepsStatus[steps[i]] === 'done')
                        html += '<td class="fa-num">تکیمل';
                    else
                        html += '<td class="fa-num">نیازمند تکیمل';

                    html += '<a target="_blank" href="' + links[i] + '' + data.id +
                        '" class="btn btn-circle borderCircle my-1">';
                    html += '<i class="icon-visit-edit"></i>';
                    html += '</a></td>';
                }

            } else
                html += '<td></td><td></td><td></td><td></td>';

            html += '<td>';
            html += '<button data-id="' + data.id + '" class="btn btn-circle borderCircle removeEventBtn my-1">';
            html += '<i class="icon-visit-delete"></i>';
            html += '</button>';
            html += '</td>';

            html += '</tr>';
            draftsIdx++;
            $("#drafts").append(html);
        }

        function addToPending(data) {
            let html = '<tr>';
            html += '<td>' + pendingsIdx + '</td>';
            html += '<td>' + data.title + '</td>';
            html += '<td>' + data.created_at + '</td>';

            html += '<td class="fa-num">';


            if (data.status === 'pending')
                html += '<span class="badge bg-warning rounded-pill">در حال بررسی </span>';
            else
                html += '<span class="badge bg-danger rounded-pill">رد شده</span>';

            html += '</button>';
            html += '</td>';

            html += '<td>' + data.updated_at + '</td>';

            html += '<td>';
            html += '<button data-id="' + data.id + '" class="btn btn-circle borderCircle removeEventBtn my-1">';
            html += '<i class="icon-visit-delete"></i>';
            html += '</button>';
            html += '</td>';

            html += '</tr>';
            pendingsIdx++;
            $("#pendings").append(html);
        }


        function addToRegistry(data) {

            let html = '<tr>';
            html += '<td>' + registryIdx + '</td>';

            html += '<td>' + data.title + '</td>';

            html += '<td><span id="price_' + data.id + '">' + data.price + '</span>';
            html += '<button id="price_' + data.id + '_btn" data-id="' + data.id +
                '" data-remodal-target="changePriceModal" data-val="' + data.price +
                '" class="btn btn-circle changePriceBtn borderCircle my-1">';
            html += '<i class="icon-visit-edit"></i>';
            html += '</button>';
            html += '</td>';

            html += '<td><span id="capacity_' + data.id + '">' + data.capacity + '</span>';
            html += '<button id="capacity_' + data.id + '_btn" data-id="' + data.id +
                '" data-remodal-target="changeCapacityModal" data-val="' + data.capacity +
                '" class="btn btn-circle changeCapacityBtn borderCircle my-1">';
            html += '<i class="icon-visit-edit"></i>';
            html += '</button>';
            html += '</td>';

            html += '<td><span id="start_registry_' + data.id + '">' + data.start_registry + '</span>';
            html += '<button id="start_registry_' + data.id + '_btn" data-id="' + data.id +
                '" data-remodal-target="time-and-date-start-modal" data-val="' + data.start_registry +
                '" class="btn btn-circle changeStartRegistryBtn borderCircle my-1">';
            html += '<i class="icon-visit-edit"></i>';
            html += '</button>';
            html += '</td>';

            html += '<td><span id="end_registry_' + data.id + '">' + data.end_registry + '</span>';
            html += '<button id="end_registry_' + data.id + '_btn" data-id="' + data.id +
                '" data-remodal-target="time-and-date-stop-modal" data-val="' + data.end_registry +
                '" class="btn btn-circle changeEndRegistryBtn borderCircle my-1">';
            html += '<i class="icon-visit-edit"></i>';
            html += '</button>';
            html += '</td>';

            if (data.visibility == 1)
                html += '<td>فعال</td>';
            else
                html += '<td>غیرفعال</td>';

            html += '<td>';
            html += '<button data-id="' + data.id + '" class="btn btn-circle borderCircle my-1">';
            html += '<i class="icon-visit-menu"></i>';
            html += '</button>';
            html += '</td>';

            html += '</tr>';
            registryIdx++;

            $("#registries").append(html);
        }

        function addToRun(data) {

            let html = '<tr>';
            html += '<td>' + runIdx + '</td>';
            html += '<td>' + data.title + '</td>';

            if (data.start !== '' && data.end !== '')
                html += '<td>' + data.start + ' تا ' + data.end + '</td>';
            else
                html += '<td></td>';

            html += '<td>' + data.price + '</td>';
            html += '<td>' + data.buyersCount + '</td>';
            html += '<td>' + data.totalPaid + '</td>';


            html += '<td>';
            html += '<button data-id="' + data.id + '" class="btn btn-circle borderCircle my-1">';
            html += '<i class="icon-visit-menu"></i>';
            html += '</button>';
            html += '</td>';

            html += '</tr>';
            runIdx++;

            $("#runs").append(html);
        }

        function addToArchieve(data) {

            let html = '<tr>';
            html += '<td>' + archieveIdx + '</td>';
            html += '<td>' + data.title + '</td>';

            if (data.start !== '' && data.end !== '')
                html += '<td>' + data.start + ' تا ' + data.end + '</td>';
            else
                html += '<td></td>';

            html += '<td>' + data.price + '</td>';
            html += '<td>' + data.buyersCount + '</td>';
            html += '<td>' + data.totalPaid + '</td>';


            html += '<td>';
            html += '<button data-id="' + data.id + '" class="btn btn-circle borderCircle my-1">';
            html += '<i class="icon-visit-menu"></i>';
            html += '</button>';
            html += '</td>';

            html += '</tr>';
            archieveIdx++;

            $("#archieves").append(html);
        }

        $(document).on('click', ".removeEventBtn", function() {

            let id = $(this).attr('data-id');

            $.ajax({
                type: 'delete',
                url: '{{ route('event.home') }}' + "/admin/event/" + id,
                success: function(res) {

                    if (res.status === "ok") {
                        showSuccess("عملیات موردنظر با موفقیت انجام شد");
                        $("#row_" + id).remove();
                    }

                }
            });

        });

        $.ajax({
            type: 'get',
            url: '{{ route('myevents') }}',
            success: function(res) {

                if (res.status === 'ok') {

                    for (let i = 0; i < res.data.length; i++) {

                        if (res.data[i].status === 'init')
                            addToDrafts(res.data[i]);
                        else if (res.data[i].status === 'rejected' || res.data[i].status === 'pending')
                            addToPending(res.data[i]);
                        else if (res.data[i].status === 'confirmed' && res.data[i].runStatus === 'registry')
                            addToRegistry(res.data[i]);
                        else if (res.data[i].status === 'confirmed' && res.data[i].runStatus === 'run')
                            addToRun(res.data[i]);
                        else if (res.data[i].status === 'confirmed' && res.data[i].runStatus === 'finish')
                            addToArchieve(res.data[i]);
                    }

                }

            }
        });
    </script>
@stop
