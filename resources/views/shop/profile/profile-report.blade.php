@extends('layouts.structure')
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
                            <div class="width250" >
                            <select class="select2"  name="" id="">
                                                 <option value="0" selected>نام رویداد</option>
                                                <option value="haghighi">حقیقی</option>
                                                <option value="hoghoghi">حقوقی</option>
                            </select>
                        </div >        
                        </div >   
                        <div class="container">
                            <div class="row">
                            <div class="spaceBetween ui-box bg-white mb-5 p-2 py-2 ui-box-title align-items-center  flexCenter text-align-center " >
                              <div class="positionRelative boxShadow p-3">
                                    <div class="positionAbsolute backgroundYellow colorWhite border fontSize12 borderRadius10 p-2 top17 r-4">مانده تسویه</div>
                                    <div class="mt-1">
                                      <div class="p-1">300.000.000</div>
                                      <div class="fontSize12 textColor p-1"> حداقل تسویه: 150/000 ت</div>
                                         <div>       
                                               <button data-remodal-target="buy-event-modal" 
                                               class="fontSize16  btn btn-primary p-1 "> درخواست تسویه
                                             </button>
                                     </div>
                                    </div>
                                </div>
                                
                                <div class=" flexCenter positionRelative text-align-center align-items-center boxShadow p-3">
                                <div class="positionAbsolute backgroundYellow colorWhite border  fontSize12 borderRadius10 p-2 top17 r-4"> درآمد / رویداد</div>
                                    <div>
                                         <div class="fontSize16 fontNormal eventCircle"><span class="dot"></span> نام رویداد</div>
                                        <div class="fontSize16 fontNormal"><span class="dot"></span> نام رویداد</div>
                                        <div class="fontSize16 fontNormal"><span class="dot"></span> نام رویداد</div>
                                        <div class="fontSize16 fontNormal colorBlue p-4">نمایش ثبت نام/ درآمد</div>
                                    </div>
                                    <div>
    
                                    </div>
                                </div>
                                <div class=" spaceBetween positionRelative flexDirectionColumn boxShadow p-3">
                                <div class="positionAbsolute backgroundYellow colorWhite border fontSize12 borderRadius10 p-2 top17 r-4 mb-1">آمار کل </div>
                                    <div class="spaceBetween gap15 fontNormal mb-1"> 
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
                                </div>
                            </div>
                            </div>
                        </div>
                    </div >
                        
                    <div class="ui-box bg-white mb-5 p-0">
                        <div class="ui-box-title align-items-center justify-content-between">
                            گزارشات تفکیکی 
                        </div>
                        <div class="py-2">
                            <div class="table-responsive dropdown">
                                <table class="table mb-0">
                                    <thead>
                                        <tr>
                                            <th>نام رویداد</th>
                                            <th>تعداد بلیط</th>
                                            <th>مبلغ</th>
                                            <th>تاریخ</th>
                                            <th>شماره تراکنش</th>
                                            <th>مشاهده فاکتور</th>
                                            <th>نمایش حالت بدون تراکنش</th>
                                        </tr>
                                    </thead>
                                    <tbody id="myTickets">
                                        <tr>
                                            <td>رویداد من</td>
                                            <td>اصغر فرهادی</td>
                                            <td>1401</td>
                                            <td>1402</td>
                                            <td>10</td>
                                            <td>
                                                <button class="btn btn-circle borderCircle my-1 dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                                    <i class="icon-visit-menu"></i>
                                                </button>
                                                <ul class="dropdown-menu">
                                                    <li><a class="dropdown-item fontSize12 btnHover" href="#">مشاهده فاکتور</a></li>
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
@stop
