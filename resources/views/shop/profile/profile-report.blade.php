@extends('layouts.structure')
@section('header')
    @parent

    <script>
        const myArray = ['rgba(255, 99, 132)',
            'rgba(54, 162, 235)',
            'rgba(255, 206, 86)',
            'rgba(75, 192, 192)',
            'rgba(153, 102, 255)',
            'rgba(255, 159, 64)'
        ];
    </script>
    <script src="{{ URL::asset('theme-assets/js/moment.js') }}"></script>
    <script src="{{ URL::asset('theme-assets/js/moment-jalaali.js') }}"></script>

    <link rel="stylesheet" href="{{ URL::asset('theme-assets/css/bootstrap-material-datetimepicker.css') }}">
    <script src="{{ URL::asset('theme-assets/js/bootstrap-material-datetimepicker.js') }}"></script>

    <link rel="stylesheet" href="{{ URL::asset('theme-assets/bootstrap-datepicker.css?v=1') }}">
    <script src="{{ URL::asset('theme-assets/bootstrap-datepicker.js') }}"></script>
    <link href="{{ asset('theme-assets/js/chartjs/chart.min.js') }}" />
    <script src="{{ asset('theme-assets/js/chartjs/chart.min.js') }}"></script>
@stop
@section('content')

    <main class="page-content TopParentBannerMoveOnTop">
        <div class="container">
            <div class="row mb-5">
                @include('shop.profile.layouts.profile_menu')
                <div class="col-xl-9 col-lg-8 col-md-7">
                    <div class=" ui-box bg-white mb-5 p-0 py-2">
                        <div class="spaceBetween  bg-white mb-5 p-0 py-2">
                            <div class="ui-box-title align-items-center justify-content-between">
                                گزارشات مالی
                            </div>
                            <div class="width250">
                                <select class="select2" name="" id="">
                                    <option value="0" selected>نام رویداد</option>
                                    <option value="haghighi">حقیقی</option>
                                    <option value="hoghoghi">حقوقی</option>
                                </select>
                            </div>
                        </div>
                        <div class="container">
                            <div class="row">
                                <div class="col-xl-3 col-lg-12 ">
                                    {{-- <div class="positionRelative boxShadow p-3 height190 d-flex alignItemsEnd justifyContentCenter"
                                        style="align-items: end">
                                        <div
                                            class="positionAbsolute backgroundYellow colorWhite border fontSize12 borderRadius10 p-2 top17 r-4">
                                            مانده تسویه</div>
                                        <div class="mt-1 " style="align-items: center">
                                            <div class="p-1 fontSize21 bold">ت 300.000.000 </div>
                                            <div class=" ">
                                                <div class="fontSize12 textColor p-1 ">
                                                    حداقل تسویه: 150/000 ت
                                                </div>

                                                <button data-remodal-target="buy-event-modal"
                                                    class="fontSize16  btn btn-primary p-1 "> درخواست تسویه
                                                </button>

                                            </div>
                                        </div>
                                    </div> --}}
                                </div>

                                <div class="col-xl-3 col-lg-12 ">
                                    {{-- <div class=" spaceBetween positionRelative flexDirectionColumn boxShadow p-3 height190">
                                        <div
                                            class="positionAbsolute backgroundYellow colorWhite border fontSize12 borderRadius10 p-2 top17 r-4 mb-1">
                                            آمار کل </div>
                                        <div class="spaceBetween gap15 fontNormal mb-1 pt-4">
                                            <div class="fontSize16">کل رویدادها</div>
                                            <div class="fontSize14 colorYellow">رویداد 3</div>
                                        </div>
                                        <div class="spaceBetween gap15 fontNormal mb-1">
                                            <div class="fontSize16">کل فروش</div>
                                            <div class="fontSize14 colorYellow">300.000.000 ت</div>
                                        </div>
                                        <div class="spaceBetween gap15 fontNormal mb-1">
                                            <div class="fontSize16">کل تسویه</div>
                                            <div class="fontSize14 colorYellow">270.000000 ت</div>
                                        </div>
                                        <div class="spaceBetween gap15 fontNormal mb-1">
                                            <div class="fontSize16">کل ثبت نام</div>
                                            <div class="fontSize14 colorYellow">1500 نفر</div>
                                        </div>
                                    </div> --}}
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="ui-box bg-white mb-5 p-0" style="height: 600px">
                        <div class="col-xl-12 col-lg-12 " style="height: 600px">
                            <div
                                class=" flexCenter positionRelative text-align-center align-items-center boxShadow p-3 height190">
                                <div
                                    class="positionAbsolute backgroundYellow colorWhite border  fontSize12 borderRadius10 p-2 top17 r-4">
                                    درآمد / رویداد</div>
                                <!-- <div>
                                                                         <div class="fontSize16 fontNormal eventCircle"><span class="dot"></span> نام رویداد</div>
                                                                        <div class="fontSize16 fontNormal"><span class="dot"></span> نام رویداد</div>
                                                                        <div class="fontSize16 fontNormal"><span class="dot"></span> نام رویداد</div>
                                                                        <div class="fontSize16 fontNormal colorBlue p-4">نمایش ثبت نام/ درآمد</div>
                                                                    </div> -->
                                {{-- <div> --}}
                                <canvas dir="rtl" id="myChart"></canvas>
                                {{-- </div> --}}
                            </div>
                        </div>
                    </div>

                    <div class="ui-box bg-white mb-5 p-0">
                        <div class="ui-box-title align-items-center justify-content-between">
                            <div>گزارشات تفکیکی </div>
                            <div class="spaceBetween">
                                <div> <label class="tripCalenderSection w-100">

                                        <input id="date_input_start"
                                            class="tripDateInput w-100 form-control directionLtr backColorWhite"
                                            placeholder="تاریخ شروع" required readonly type="text">
                                    </label></div>
                                <div>
                                    <label class="tripCalenderSection w-100">
                                        <span class="calendarIcon"></span>
                                        <input id="date_input_stop"
                                            class="tripDateInput w-100 form-control directionLtr backColorWhite"
                                            placeholder="تاریخ پایان" required readonly type="text">
                                    </label>
                                </div>
                            </div>

                        </div>
                        <div>
                            <canvas dir="rtl" id="myChartLine"></canvas>
                        </div>
                        <div class="py-2">
                            <div class="table-responsive dropdown">
                                <table class="table mb-0">
                                    <thead>
                                        <tr>
                                            <th>ردیف</th>
                                            <th>نام رویداد</th>
                                            <th>تاریخ</th>
                                            <th>نام خریداد</th>
                                            <th>مبلغ </th>
                                            <th>وضعیت </th>
                                        </tr>
                                    </thead>
                                    <tbody id="myTickets">
                                        <tr>
                                            <td>1</td>
                                            <td>رویداد من</td>
                                            <td>1401 </td>
                                            <td>اصغر فرهادی</td>
                                            <td>100/000</td>
                                            <td>
                                                <button class="btn btn-circle borderCircle my-1 dropdown-toggle"
                                                    data-bs-toggle="dropdown" aria-expanded="false">
                                                    <i class="icon-visit-menu"></i>
                                                </button>
                                                <ul class="dropdown-menu">
                                                    <li><a class="dropdown-item fontSize12 btnHover" href="#">مشاهده
                                                            فاکتور</a></li>
                                                </ul>
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
            $("#date_input_start").datepicker(datePickerOptions);
            $("#date_input_stop").datepicker(datePickerOptionsEnd);
        });
        var ctx = document.getElementById('myChart');
        var myChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: [
                    'قدرت بخشش «چگونه دیگران را ببخشیم؟', 'قدرت بخشش «چگونه دیگران را ببخشیم؟',
                    'قدرت بخشش «چگونه دیگران را ببخشیم؟', 'قدرت بخشش «چگونه دیگران را ببخشیم؟',
                    'قدرت بخشش «چگونه دیگران را ببخشیم؟', 'قدرت بخشش «چگونه دیگران را ببخشیم؟'
                ],
                datasets: [{
                    label: '# of Votes',
                    data: [50, 30, 60, 90, 20, 50],
                    backgroundColor: myArray,
                    borderColor: [
                        'rgba(255, 99, 132, 1)',
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 206, 86, 1)',
                        'rgba(75, 192, 192, 1)',
                        'rgba(153, 102, 255, 1)',
                        'rgba(255, 159, 64, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {

                legend: {

                    rtl: true,
                    display: true,
                    position: 'right',
                    align: 'start',
                    labels: {
                        useBorderRadius: true,
                        borderRadius: 50,
                        fontFamily: "IRANSans",
                        fontSize: 10,
                        boxWidth: 20,
                        fontColor: '#111',
                        padding: 15,

                    }
                }
            }
        });
        new Chart(document.getElementById("myChartLine"), {
            type: 'line',
            data: {
                labels: [1500, 1600, 1700, 1750, 1800, 1850, 1900, 1950, 1999, 2050],
                datasets: [{
                    data: [86, 114, 106, 106, 107, 111, 133, 221, 783, 2478],
                    borderColor: "#3e95cd",
                    fill: false
                }, ]
            },
            options: {

                scales: {

                    yAxes: [{
                        ticks: {
                            fontFamily: "IRANSans",

                        }
                    }],
                    xAxes: [{
                        ticks: {
                            fontFamily: "IRANSans",
                            autoSkip: false,
                            maxRotation: 90,
                            minRotation: 90
                        }
                    }]
                },
                legend: {
                    display: false,
                },

                title: {
                    fontFamily: "IRANSans",
                    display: true,
                    text: 'نمودار تراکنش ها از تاریخ تا تاریخ'
                }

            }
        });
    </script>
@stop
