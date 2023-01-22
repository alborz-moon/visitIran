<!DOCTYPE html>
<html lang="fa">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <style>
        body {
            font-family: 'iran';
            margin: 0 !important;
            padding: 0 !important;
            direction: rtl;
        }

        .bold {
            font-weight: bold;
        }

        .float-r {
            float: right !important;
        }


        .yellow {
            color: #c59358 !important;
        }

        .fontSize18 {
            font-size: 18px !important;
        }

        .fontSize12 {
            font-size: 12px !important;
        }

        .fontSize10 {
            font-size: 10px !important;
        }

        .margin-r-10 {
            margin-right: 10px;
        }

        .border {
            border: 1px solid black;
        }

        .halfW {
            width: 320px;
        }

        .padding5 {
            padding: 5px;
        }

        .padding0 {
            padding: 0 !important;
        }

        .margin0 {
            margin: 0 !important;
        }

        .hr {
            border-bottom: 1px solid #777;
            margin-top: 5px;
            margin-bottom: 5px;
        }

        .silver {
            color: #555;
        }
    </style>

</head>

<body>
    <div>
        <img class="float-r" width="100px" src="{{ asset('theme-assets/images/menuImage.png') }}" />

        <p class="float-r margin-r-10">
            <span class="yellow bold fontSize18">ویزیت ایران</span>
            <br />
            <span class="fontSize10">دبیرخانه رویدادها</span>
        </p>

    </div>

    <div class="float-r border"
        style="padding-left: 40px; width: 260; padding-right: 5px; padding-top: 10px; padding-bottom: 10px; height: 270px; min-height: 270px; max-height: 270px; overflow: hidden">
        <p class="margin0 padding0">
            <span class="bold fontSize12">نام رویداد: </span>
            <span class="fontSize10">{{ $title }}</span>
        </p>
        <div class="hr"></div>
        <p class="margin0 padding0">
            <span class="bold fontSize12">برگزار کننده: </span><span class="fontSize10">{{ $launcher }}</span>
        </p>
        <div class="hr"></div>
        <p class="margin0 padding0">
            <span class="bold fontSize12">نوع رویداد: </span><span class="fontSize10">{{ $type }}</span>
        </p>
        <div class="hr"></div>
        <p class="margin0 padding0">
            <span class="bold fontSize12">آدرس رویداد: </span><br /><span class="fontSize10">{{ $address }}</span>
        </p>
        <div class="hr"></div>
        <p class="margin0 padding0">
            <span class="bold fontSize12">تلفن: </span><br /><span class="fontSize10">{{ $tel }}</span>
        </p>
        <div class="hr"></div>
        <p class="margin0 padding0">
            <span class="bold fontSize12">ایمیل و وب سایت: </span><br /><span
                class="fontSize10">{{ $site != null ? $email . ' - ' . $site : $email }}</span>
        </p>
    </div>

    <div class="float-r border padding5"
        style="margin-right: 10px; width: 380px; padding-left: 30px; height: 280px; min-height: 280px; max-height: 280px; overflow: hidden">
        <div class="float-r" style="width: 240px">
            <p class="margin0 padding0">
                <span class="bold fontSize12">نام و نام خانوادگی: </span><span
                    class="fontSize10">{{ $name }}</span>
            </p>
            <p class="margin0 padding0">
                <span class="bold fontSize12">شماره تلفن: </span><span class="fontSize10">{{ $phone }}</span>
            </p>
        </div>
        <div class="float-r">
            <p class="margin0 padding0">
                <span class="bold fontSize12">کد ملی: </span><span class="fontSize10">{{ $nid }}</span>
            </p>
            <p class="margin0 padding0">
                <span class="bold fontSize12">تعداد بلیط: </span><span class="fontSize10">{{ $count }}
                    بلیط</span>
            </p>
        </div>

        <div style="clear: both"></div>

        <div class="hr"></div>

        <p class="margin0 padding0">
            <span class="bold fontSize12">توضیحات بلیط: </span><span class="fontSize10">{{ $ticket_desc }}</span>
        </p>

        <div class="hr"></div>

        <div>
            <div class="float-r margin0 padding5" style="width: 270px">
                <p class="fontSize12 bold margin0 padding0">روزهای برگزاری:</p>


                @foreach ($days as $day)
                    <div class="margin0 padding0" style="border-bottom: 1px solid #aaa">
                        <p style="text-align: center; width: 15px"
                            class="margin0 padding0 bold fontSize12 silver float-r">تا</p>
                        <p style="width: 120px" class="margin0 padding0 fontSize10 float-r">{{ $day['start'] }}</p>
                        <p style="text-align: right; width: 15px"
                            class="margin0 padding0 bold fontSize12 silver float-r">از</p>
                        <p style="width: 120px" class="margin0 padding0 fontSize10 float-r">{{ $day['end'] }}</p>
                    </div>
                @endforeach

            </div>
            <div class="float-r" style="border-right: 1px solid #aaa; padding-right: 10px; height: 150px">

                <img style="margin-top: 25px" width="95px" src="{{ $qr }}" />

            </div>
        </div>

    </div>

    <div style="clear: both"></div>
    <h3>قانون استرداد</h3>
    <diV class="border padding5">
        <p class="fontSize12">
            استرداد بلیط تنها تا ۷۲ ساعت قبل از شروع رویداد امکان پذیر میباشد.
            در صورت درخواست شرکت‌کننده بعد از بازه تعیین شده، برگزارکننده درخواست را به صورت موردی بررسی
            خواهد کرد و نتیجه را تا ۳ روز کاری اعلام میکند.
            در صورتی که رویداد کنسل شود، برگزار کننده موظف است که مبلغ کامل را به شرکت کنندگان عودت دهد.
        </p>
    </diV>

</body>
