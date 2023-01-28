
@extends('layouts.structure')
@section('content')
        <main class="page-content">
            <div class="container">
                <div class="row mb-5">
                        @include('shop.profile.layouts.profile_menu')     
                    <div class="col-xl-9 col-lg-8 col-md-7">
                        <div class="ui-box bg-white mb-5 p-0">
                            <div class="ui-box-title">تراکنش های من</div>
                            <div class="ui-box-content p-0 ">
                                <div class="product-list p-0">
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
											<tbody id="myTransaction">
												<tr>
													<td>1</td>
													<td>رویداد من</td>
													<td>1401 </td>
													<td>اصغر فرهادی</td>
													<td>100/000</td>
													<td>
														<button class="btn btn-circle borderCircle my-1 dropdown-toggle" data-bs-toggle="dropdown"
															aria-expanded="false">
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
            </div>
        </main>
@stop

@section('footer')
    @parent
@stop

@section('extraJS')
    @parent
@stop