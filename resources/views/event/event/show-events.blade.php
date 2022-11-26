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
.tabs input[type="radio"]:checked + label {
	background-color: #00b2bc;
    color: #fff;
}
.tabs input[type="radio"]:checked + label + .tab {
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
@extends('layouts.structure')
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
                                                                        <th>شماره عملیات </th>
                                                                        <th>اطلاعات کلی</th>
                                                                        <th>اطلاعات برگزاری</th>
                                                                        <th>اطلاعات ثبت نام</th>
                                                                        <th>اطلاعات تکمیلی</th>
                                                                        <th>عملیات</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr>
                                                                        <td class="fa-num">1</td>
                                                                        <td class="fa-num">رویداد چالش سئو</td>
                                                                        <td class="fa-num">تکیمل<button class="btn btn-circle borderCircle my-1">
                                                                                <i class="icon-visit-edit"></i>
                                                                            </button></td>
                                                                        <td class="fa-num">نیازمند تکیمل<button class="btn btn-circle borderCircle my-1">
                                                                                <i class="icon-visit-edit"></i>
                                                                            </button></td>
                                                                        <td class="fa-num">
                                                                            <span class="badge bg-danger rounded-pill">نیازمند</span>
                                                                            <span class="badge bg-warning rounded-pill">در حال بررسی</span>
                                                                            <span class="badge bg-success rounded-pill">تایید</span>
                                                                        </td>
                                                                        <td class="fa-num">1400 دی 26</td>
                                                                        <td>
                                                                                {{-- <button class="btn btn-circle borderCircle my-1">
                                                                                <i class="icon-visit-edit"></i>
                                                                            </button> --}}
                                                                            <button class="btn btn-circle borderCircle my-1">
                                                                                    <i class="icon-visit-delete"></i>
                                                                            </button>
                                                                        </td>
                                                                    </tr>
                                                                                                                                        <tr>
                                                                        <td class="fa-num">2</td>
                                                                        <td class="fa-num">رویداد چالش</td>
                                                                        <td class="fa-num">تکیمل<button class="btn btn-circle borderCircle my-1">
                                                                                <i class="icon-visit-edit"></i>
                                                                            </button></td>
                                                                        <td class="fa-num">نیازمند تکیمل<button class="btn btn-circle borderCircle my-1">
                                                                                <i class="icon-visit-edit"></i>
                                                                            </button></td>
                                                                        <td class="fa-num">
                                                                            <span class="badge bg-danger rounded-pill">نیازمند</span>
                                                                            <span class="badge bg-warning rounded-pill">در حال بررسی</span>
                                                                            <span class="badge bg-success rounded-pill">تایید</span>
                                                                        </td>
                                                                        <td class="fa-num">1400 دی 26</td>
                                                                        <td>
                                                                                {{-- <button class="btn btn-circle borderCircle my-1">
                                                                                <i class="icon-visit-edit"></i>
                                                                            </button> --}}
                                                                            <button class="btn btn-circle borderCircle my-1">
                                                                                    <i class="icon-visit-delete"></i>
                                                                            </button>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
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
                                                                            <th> تاریخ ایجاد  </th>
                                                                            <th>وضعیت</th>
                                                                            <th>آخرین بروزرسانی</th>
                                                                            <th>عملیات</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <tr>
                                                                            <td class="fa-num">1</td>
                                                                            <td class="fa-num">ولفجر</td>
                                                                            <td class="fa-num">پشتیبانی</td>
                                                                            <td class="fa-num">
                                                                                <span class="badge bg-danger rounded-pill">نیازمند</span>
                                                                                <span class="badge bg-warning rounded-pill">در حال بررسی</span>
                                                                                <span class="badge bg-success rounded-pill">تایید</span>
                                                                            </td>
                                                                            <td class="fa-num">1400 دی 26</td>
                                                                            <td>
                                                                                <button class="btn btn-circle borderCircle my-1">
                                                                                    <i class="icon-visit-edit"></i>
                                                                                </button> 
                                                                                <button class="btn btn-circle borderCircle my-1">
                                                                                    <i class="icon-visit-delete"></i>
                                                                                </button>
                                                                                <button class="btn btn-circle borderCircle my-1">
                                                                                        <i class="icon-visit-eye"></i>
                                                                                </button>
                                                                            </td>
                                                                        </tr>
                                                                    </tbody>
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
                                                                        <td class="fa-num"><span class="px-1">20,000,000</span>تمومان</td>
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
                                                                        <td class="fa-num"><span class="px-1">20,000,000</span>تمومان</td>
                                                                        <td class="fa-num"><span class="px-1">5</span>نفر</td>
                                                                        <td class="fa-num"><span class="px-1">30</span>نفر</td>
                                                                        <td class="fa-num">
                                                                            <span class="badge bg-danger rounded-pill">نیازمند</span>
                                                                            <span class="badge bg-warning rounded-pill">در حال بررسی</span>
                                                                            <span class="badge bg-success rounded-pill">تایید</span>
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
                                                                        <td class="fa-num"><span class="px-1">120</span>جلسه</td>
                                                                        <td class="fa-num"><span class="px-1">20,000,000</span>تمومان</td>
                                                                        <td class="fa-num"><span class="px-1">5</span>نفر</td>
                                                                        <td class="fa-num"><span class="px-1">105</span>نفر</td>
                                                                        <td class="fa-num"><span class="px-1">120,000,000</span>تمومان</td>
                                                                        <td class="fa-num"><span class="px-1">120,000,000</span>تمومان</td>
                                                                        <td class="fa-num">                                                                            <span class="badge bg-danger rounded-pill">نیازمند</span>
                                                                            <span class="badge bg-warning rounded-pill">در حال بررسی</span>
                                                                            <span class="badge bg-success rounded-pill">تایید</span>
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
        function removeItem1(){
            $('#removeItem1').remove();
        }
        function removeItem2(){
            $('#removeItem2').remove();
        }
        function removeItem3(){
            $('#removeItem3').remove();
        }
        function removeItem4(){
            $('#removeItem4').remove();
        }
        function removeItem5(){
            $('#removeItem5').remove();
        }
        $('#onlineOrOffline').on('change',function(){
            onlineOrOffline = $('#onlineOrOffline').val();
            if (onlineOrOffline=== 'online'){
                // show or hide class for online
            }else if(onlineOrOffline=== 'offline'){
                // show or hide class for offline
            }else{
                // hide All
            }
        })
    </script>
@stop
