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
                        <div class="ui-box bg-white mb-5 boxShadow">
                            <div class="ui-box-title">رویداد ها</div>
                            <div class="ui-box-content">
                                <div class="row">
                                    <div class="col-lg-12 mb-3">
                                        <div class="border-bottom py-2">
                                            <div class="tabs">
                                                <input type="radio" name="tabs" id="tabone" checked="checked">
                                                <label for="tabone">پیش نویس</label>
                                                <div class="tab">
                                                <div class="ui-box bg-white mb-5">
                                                    <div class="ui-box-title align-items-center justify-content-between">
                                                        شماره حساب های موجود
                                                    </div>
                                                    <div class="ui-box-content">
                                                        <div class="table-responsive">
                                                            <table class="table">
                                                                <thead>
                                                                    <tr>
                                                                        <th>شماره</th>
                                                                        <th>شماره عملیات </th>
                                                                        <th> تاریخ شروع  </th>
                                                                        <th> تاریخ پایان  </th>
                                                                        <th>وضعیت</th>
                                                                        <th>آخرین بروزرسانی</th>
                                                                        <th>عملیات</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr>
                                                                        <td class="fa-num">1</td>
                                                                        <td class="fa-num">1400 دی 25</td>
                                                                        <td class="fa-num">پشتیبانی</td>
                                                                        <td class="fa-num">کالای غیراصل</td>
                                                                        <td class="fa-num"><span class="badge bg-success rounded-pill">پاسخ داده
                                                                                شد</span></td>
                                                                        <td class="fa-num">1400 دی 26</td>
                                                                        <td>
                                                                            <a href="#" class="btn btn-circle btn-info my-1"><i
                                                                                    class="ri-eye-line"></i></a>
                                                                            <a href="#" class="btn btn-circle btn-danger my-1"><i
                                                                                    class="ri-close-line"></i></a>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="fa-num">1</td>
                                                                        <td class="fa-num">1400 دی 25</td>
                                                                        <td class="fa-num">پشتیبانی</td>
                                                                        <td class="fa-num">کالای غیراصل</td>
                                                                        <td class="fa-num"><span
                                                                                class="badge bg-danger rounded-pill">بسته</span></td>
                                                                        <td class="fa-num">1400 دی 26</td>
                                                                        <td>
                                                                            <a href="#" class="btn btn-circle btn-info my-1"><i
                                                                                    class="ri-eye-line"></i></a>
                                                                            <a href="#" class="btn btn-circle btn-danger my-1"><i
                                                                                    class="ri-close-line"></i></a>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td class="fa-num">1</td>
                                                                        <td class="fa-num">1400 دی 25</td>
                                                                        <td class="fa-num">پشتیبانی</td>
                                                                        <td class="fa-num">کالای غیراصل</td>
                                                                        <td class="fa-num"><span class="badge bg-warning rounded-pill">در حال
                                                                                بررسی</span></td>
                                                                        <td class="fa-num">1400 دی 26</td>
                                                                        <td>
                                                                            <a href="#" class="btn btn-circle btn-info my-1"><i
                                                                                    class="ri-eye-line"></i></a>
                                                                            <a href="#" class="btn btn-circle btn-danger my-1"><i
                                                                                    class="ri-close-line"></i></a>
                                                                        </td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                                </div>
                                                <input type="radio" name="tabs" id="tabtwo">
                                                <label for="tabtwo">در انتظار تایید</label>
                                                <div class="tab">
                                    <div class="ui-box bg-white mb-5">
                                        <div class="ui-box-title align-items-center justify-content-between">
                                            شماره حساب های موجود
                                        </div>
                                        <div class="ui-box-content">
                                            <div class="table-responsive">
                                                <table class="table">
                                                    <thead>
                                                        <tr>
                                                            <th>شماره</th>
                                                            <th>شماره عملیات </th>
                                                            <th> تاریخ شروع  </th>
                                                            <th> تاریخ پایان  </th>
                                                            <th>وضعیت</th>
                                                            <th>آخرین بروزرسانی</th>
                                                            <th>عملیات</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <td class="fa-num">1</td>
                                                            <td class="fa-num">1400 دی 25</td>
                                                            <td class="fa-num">پشتیبانی</td>
                                                            <td class="fa-num">کالای غیراصل</td>
                                                            <td class="fa-num"><span class="badge bg-success rounded-pill">پاسخ داده
                                                                    شد</span></td>
                                                            <td class="fa-num">1400 دی 26</td>
                                                            <td>
                                                                <a href="#" class="btn btn-circle btn-info my-1"><i
                                                                        class="ri-eye-line"></i></a>
                                                                <a href="#" class="btn btn-circle btn-danger my-1"><i
                                                                        class="ri-close-line"></i></a>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="fa-num">1</td>
                                                            <td class="fa-num">1400 دی 25</td>
                                                            <td class="fa-num">پشتیبانی</td>
                                                            <td class="fa-num">کالای غیراصل</td>
                                                            <td class="fa-num"><span
                                                                    class="badge bg-danger rounded-pill">بسته</span></td>
                                                            <td class="fa-num">1400 دی 26</td>
                                                            <td>
                                                                <a href="#" class="btn btn-circle btn-info my-1"><i
                                                                        class="ri-eye-line"></i></a>
                                                                <a href="#" class="btn btn-circle btn-danger my-1"><i
                                                                        class="ri-close-line"></i></a>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td class="fa-num">1</td>
                                                            <td class="fa-num">1400 دی 25</td>
                                                            <td class="fa-num">پشتیبانی</td>
                                                            <td class="fa-num">کالای غیراصل</td>
                                                            <td class="fa-num"><span class="badge bg-warning rounded-pill">در حال
                                                                    بررسی</span></td>
                                                            <td class="fa-num">1400 دی 26</td>
                                                            <td>
                                                                <a href="#" class="btn btn-circle btn-info my-1"><i
                                                                        class="ri-eye-line"></i></a>
                                                                <a href="#" class="btn btn-circle btn-danger my-1"><i
                                                                        class="ri-close-line"></i></a>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </div>
                                                </div>

                                                <input type="radio" name="tabs" id="tabfour">
                                                <label for="tabfour">در ثبت نام</label>
                                                <div class="tab">
                                                  by
                                                </div>
                                                <input type="radio" name="tabs" id="tabfive">
                                                <label for="tabfive">جاری</label>
                                                <div class="tab">
                                                   way
                                                </div>
                                                <input type="radio" name="tabs" id="tabsix">
                                                <label for="tabsix">آرشیو</label>
                                                <div class="tab">
                                                   hi
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
