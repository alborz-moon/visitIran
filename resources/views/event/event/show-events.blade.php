@extends('layouts.structure')

@section('header')
    @parent
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
                                                    <div class="ui-box-title align-items-center justify-content-between">
                                                        پیش نویس
                                                    </div>

                                                    <div class="table-responsive">
                                                        <table class="table mb-0">
                                                            <thead>
                                                                <tr>
                                                                    <th>شماره</th>
                                                                    <th>عنوان </th>
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

                                                    <div class="ui-box-title align-items-center justify-content-between">
                                                        در انتظار تایید
                                                    </div>

                                                    <div class="table-responsive">
                                                        <table class="table mb-0">
                                                            <thead>
                                                                <tr>
                                                                    <th>شماره</th>
                                                                    <th>نام عملیات </th>
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
                                                    <div class="ui-box-title align-items-center justify-content-between">
                                                        در ثبت نام
                                                    </div>
                                                    <div class="table-responsive">
                                                        <table class="table mb-0">
                                                            <thead>
                                                                <tr>
                                                                    <th>شماره</th>
                                                                    <th>نام عملیات </th>
                                                                    <th>تاریخ عملیات</th>
                                                                    <th>قیمت</th>
                                                                    <th>ظرفیت</th>
                                                                    <th>وضعیت نمایش</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td class="fa-num">1</td>
                                                                    <td class="fa-num">رویداد چالش سئو</td>
                                                                    <td class="fa-num">نیازمند تکیمل</td>
                                                                    <td class="fa-num"><span
                                                                            class="px-1">20,000,000</span>تمومان</td>
                                                                    <td class="fa-num"><span class="px-1">5</span>نفر</td>
                                                                    <td class="fa-num">1400 دی 26</td>
                                                                    <td>
                                                                        {{-- <button class="btn btn-circle borderCircle my-1">
                                                                        <i class="icon-visit-edit"></i>
                                                                    </button> --}}
                                                                        <button class="btn btn-circle borderCircle my-1">
                                                                            <i class="icon-visit-menu"></i>
                                                                        </button>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                            <input type="radio" name="tabs" id="tabfive">
                                            <label for="tabfive">جاری</label>
                                            <div class="tab p-0">
                                                <div class="ui-box bg-white mb-5 p-0">
                                                    <div class="ui-box-title align-items-center justify-content-between">
                                                        جاری
                                                    </div>
                                                    <div class="table-responsive">
                                                        <table class="table mb-0">
                                                            <thead>
                                                                <tr>
                                                                    <th>شماره</th>
                                                                    <th>نام عملیات </th>
                                                                    <th>تاریخ ثبت نام</th>
                                                                    <th>قیمت </th>
                                                                    <th>ظرفیت</th>
                                                                    <th>نفرات ثبت نامی</th>
                                                                    <th>وضعیت</th>
                                                                    <th>عملیات</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td class="fa-num">1</td>
                                                                    <td class="fa-num">رویداد چالش سئو</td>
                                                                    <td class="fa-num">1400 دی 26</td>
                                                                    <td class="fa-num"><span
                                                                            class="px-1">20,000,000</span>تمومان</td>
                                                                    <td class="fa-num"><span class="px-1">5</span>نفر
                                                                    </td>
                                                                    <td class="fa-num"><span class="px-1">30</span>نفر
                                                                    </td>
                                                                    <td class="fa-num">
                                                                        <span
                                                                            class="badge bg-danger rounded-pill">نیازمند</span>
                                                                        <span class="badge bg-warning rounded-pill">در حال
                                                                            بررسی</span>
                                                                        <span
                                                                            class="badge bg-success rounded-pill">تایید</span>
                                                                    </td>
                                                                    <td>
                                                                        <button class="btn btn-circle borderCircle my-1">
                                                                            <i class="icon-visit-menu"></i>
                                                                        </button>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                            <input type="radio" name="tabs" id="tabsix">
                                            <label for="tabsix">آرشیو</label>
                                            <div class="tab p-0">
                                                <div class="ui-box bg-white mb-5 p-0">
                                                    <div class="ui-box-title align-items-center justify-content-between">
                                                        جاری و آرشیو
                                                    </div>
                                                    <div class="table-responsive">
                                                        <table class="table mb-0">
                                                            <thead>
                                                                <tr>
                                                                    <th>شماره</th>
                                                                    <th>نام عملیات </th>
                                                                    <th>تاریخ شروع و پایان</th>
                                                                    <th>تعداد جلسات</th>
                                                                    <th>قیمت</th>
                                                                    <th>ظرفیت</th>
                                                                    <th>نفرات ثبت نامی</th>
                                                                    <th>درآمد کل</th>
                                                                    <th>درآمد قابل تسویه</th>
                                                                    <th>عملیات</th>
                                                                </tr>
                                                            </thead>
                                                            <tbody>
                                                                <tr>
                                                                    <td class="fa-num">1</td>
                                                                    <td class="fa-num">رویداد چالش سئو</td>
                                                                    <td class="fa-num">22 بهمن 1354</td>
                                                                    <td class="fa-num"><span class="px-1">120</span>جلسه
                                                                    </td>
                                                                    <td class="fa-num"><span
                                                                            class="px-1">20,000,000</span>تمومان</td>
                                                                    <td class="fa-num"><span class="px-1">5</span>نفر
                                                                    </td>
                                                                    <td class="fa-num"><span class="px-1">105</span>نفر
                                                                    </td>
                                                                    <td class="fa-num"><span
                                                                            class="px-1">120,000,000</span>تمومان</td>
                                                                    <td class="fa-num"><span
                                                                            class="px-1">120,000,000</span>تمومان</td>
                                                                    <td class="fa-num"> <span
                                                                            class="badge bg-danger rounded-pill">نیازمند</span>
                                                                        <span class="badge bg-warning rounded-pill">در حال
                                                                            بررسی</span>
                                                                        <span
                                                                            class="badge bg-success rounded-pill">تایید</span>
                                                                    </td>
                                                                    <td>
                                                                        <button class="btn btn-circle borderCircle my-1">
                                                                            <i class="icon-visit-menu"></i>
                                                                        </button>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
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
@stop

@section('footer')
    @parent
@stop

@section('extraJS')
    @parent
    <script>
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
        let steps = ['first', 'second', 'third', 'forth'];
        let links = [
            '{{ route('event.home') }}' + "/admin/update-event/",
            '{{ route('event.home') }}' + "/admin/addSessionsInfo/",
            '{{ route('event.home') }}' + "/admin/addPhase2Info/",
            '{{ route('event.home') }}' + "/admin/addGalleryToEvent/",
        ];


        function addToDrafts(data) {
            let html = '<tr>';
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
            html += '<button class="btn btn-circle borderCircle removeEventBtn my-1">';
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
            html += '<button class="btn btn-circle borderCircle removeEventBtn my-1">';
            html += '<i class="icon-visit-delete"></i>';
            html += '</button>';
            html += '</td>';

            html += '</tr>';
            pendingsIdx++;
            $("#pendings").append(html);
        }


        $(document).on('click', ".removeEventBtn", function() {

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
                    }

                }

            }
        });
    </script>
@stop
