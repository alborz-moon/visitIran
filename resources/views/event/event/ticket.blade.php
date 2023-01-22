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

    <div class="float-r border halfW"
        style="padding-left: 40px; padding-right: 5px; padding-top: 10px; padding-bottom: 10px">
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

    <div class="float-r border padding5 halfW" style="margin-right: 10px">
        <img width="80px" src="{{ $qr }}" />
    </div>

    <div style="clear: both"></div>
    <h3>قانون استرداد</h3>
    <diV class="border padding5">
        <p class="fontSize12">
            استرداد بلیت تنها تا ۷۲ ساعت قبل از شروع رویداد امکان پذیر میباشد.
            در صورت درخواست شرکت‌کننده بعد از بازه تعیین شده، برگزارکننده درخواست را به صورت موردی بررسی
            خواهد کرد و نتیجه را تا ۳ روز کاری اعلام میکند.
            در صورتی که رویداد کنسل شود، برگزار کننده موظف است که مبلغ کامل را به شرکت کنندگان عودت دهد.
        </p>
    </diV>

</body>
