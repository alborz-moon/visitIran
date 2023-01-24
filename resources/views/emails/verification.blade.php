<!DOCTYPE html>
<html lang="fa">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <style>
        @font-face {
            font-family: IRANSans;
            font-style: normal;
            font-weight: bold;
            src: url("https://events.visitiran.ir/theme-assets/fonts/IRANSans/ttf/IRANSansWeb(FaNum)_Bold.ttf") format("truetype");
        }

        @font-face {
            font-family: IRANSans;
            font-style: normal;
            font-weight: 500;
            src: url("https://events.visitiran.ir/theme-assets/fonts/IRANSans/ttf/IRANSansWeb(FaNum)_Medium.ttf") format("truetype");
        }

        body {
            font-family: IRANSans !important;
            margin: 0 !important;
            padding: 0 !important;
            direction: rtl;
        }

        .d-flex {
            display: flex;
        }

        .spaceBetween {
            justify-content: space-between;
        }

        .bold {
            font-family: IRANSans !important;
            direction: rtl;
            font-weight: bold;
        }

        .normal {
            font-weight: 600 !important;
        }

        .responsive {
            width: 100%;
        }

        .logo {
            width: 150px;
            float: right;
            position: relative;
            display: inline-block;
        }

        .floatRight {
            float: right;
        }

        .relative {
            position: relative;
        }

        .absolute {
            position: absolute;

        }

        .yellow {
            color: #c59358;
        }


        .blue {
            color: #009bb9;
        }

        .font14 {
            font-size: 14px
        }

        .font16 {
            font-size: 16px
        }

        .font18 {
            font-size: 18px
        }

        .ml-50 {
            margin-right: 50px;
            gap: 50px;
        }

        .bold {
            font-weight: bold;
        }

        .float-r {
            float: right !important;
        }

        .float-l {
            float: left !important;
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

        .border-bottom {
            border: 1px solid #eaeaea;
        }

        .halfW {
            width: 320px;
        }

        .padding5 {
            padding: 5px;
        }

        .padding0,
        .p-9 {
            padding: 0 !important;
        }

        .margin0,
        .m-0 {
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

        a {
            text-decoration: none !important;
        }

        .footer {
            margin: 0 !important;
            padding-left: 20px !important;
            padding-right: 20px !important;
            padding-top: 10px !important;
            padding-bottom: 10px !important;
            background-color: #eaeaea;
            direction: rtl;
            text-align: right;
        }

        .footer p {
            margin-top: 5px !important;
            margin-bottom: 5px !important;
        }
    </style>
</head>

<body>

    <div class="relative">
        <div class="logo">
            <img class="responsive" src="https://events.visitiran.ir/theme-assets/images/menuImage.png">
        </div>

        <div style="float: right; text-align: right; display: flex; flex-direction: column; gap: 1px; ">
            <div style="margin-top: 18px; margin-right: 10px">
                <div class="yellow font14 bold">ویزیت ایران</div>
                <div class="font14 bold">دبیرخانه رویدادها</div>
            </div>

        </div>

    </div>

    <div style="clear: both"></div>
    <div class="border-bottom"></div>

    <div style="text-align: right; direction: rtl">
        <p class="font14 bold">{{ $name }} عزیز</p>
        <p>امیدواریم از خرید خود لذت برده باشید</p>
        <p>رسید خرید شما برای سفارش شماره <span class="yellow">{{ $invoice_no }}</span> ضمیمه این پیام ارسال گردیده
            است.</p>

    </div>

    <div class="border-bottom"></div>

    <div style="text-align: right; direction: rtl">
        <p>
            <span class="font14 bold">نام رویداد: </span>
            <span>{{ $event }}</span>
        </p>

    </div>

    <div class="border-bottom"></div>

    <div style="text-align: right; direction: rtl">

        <p class="font14 bold">برای مشاهده رویدادهای من <a class="blue"
                href="https://events.visitiran.ir/my-events">از
                اینجا</a>&nbsp;&nbsp;اقدام کنید.</p>

        <p class="font14 bold">برای پشتیبانی <a class="blue" href="https://events.visitiran.ir/my-tickets">از
                اینجا</a>&nbsp;&nbsp;اقدام کنید.</p>

    </div>

    <div class="footer">
        <p class="font14 bold silver">پشتیبانی</p>
        <p class="font14 bold yellow">هفت روز هفته از ساعت ۸ الی ۱۷</p>
        <p class="font14 silver">تلفن پشتیبانی ۰۲۱- ۸۸۸۱۹۵۶۲</p>
    </div>

</body>

</html>
