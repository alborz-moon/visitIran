
@extends('layouts.structure')
@section('content')
        <main class="page-content">
        <div class="container">
            <div class="row mb-5">
                @include('event.launcher.launcher-menu')     
                    <div class="col-xl-9 col-lg-8 col-md-7">
                        <div class="alert alert-warning alert-dismissible fade show mb-5 d-flex align-items-center spaceBetween" role="alert">
                            <div>
                                در حال حاضر حساب کاربری شما غیر فعال است. پس از بررسی مدارک و تایید از سوی ادمین حساب شما فعال خواهد شد.
                            </div>
                            <a href="#" class="btn btn-sm btn-primary mx-3">تیکت ها</a>                        
                        </div>
                        <div class="ui-box bg-white mb-5 boxShadow">
                            <div class="ui-box-title">اطلاعات مالی <span class="fontSize12 colorBlack">شماره شبا حتما باید به نام برگزار کننده بوده و بدون IR وارد شود</span></div>
                            <div class="ui-box-content">                  
                                <div class="row">
                                    <div class="col-lg-12 mb-3">
                                        <div class="border-bottom py-2">
                                            <div  class="fs-7 text-dark">شماره شبا</div>
                                            <div class="d-flex align-items-center justify-content-between">
                                                <input id="shabaNo" type="text" class="form-control" style="direction: rtl" placeholder="شماره شبا">
                                                <button class="btn btn-circle btn-outline-light hidden"
                                                    data-remodal-target="personal-info-fullname-modal"><i
                                                        class="ri-ball-pen-fill"></i></button>
                                            </div>
                                            <div class="fs-6 fw-bold text-muted"></div>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-end">
                                        <button id="addShabaNo" class="btn btn-sm btn-primary px-3">افزودن</button>
                                    </div>
                                </div>
                            </div>
                        </div>
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
                                                <th>شماره شبا</th>
                                                <th>پیش فرض</th>
                                                <th>وضعیت</th>
                                                <th>تاریخ ایجاد</th>
                                                <th>عملیات</th>
                                            </tr>
                                        </thead>
                                        <tbody id="bankAccounts">
                                            {{-- <tr>
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
                                            </tr> --}}
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


@section('extraJS')
    @parent
    <script>


        let totalRows = 0;

        $(document).ready(function() {
            $.ajax({
             type: 'get',
             url: '{{ route('launcher.launcher_bank_accounts.index',['launcher' => $formId]) }}',
             headers: {
                 'accept': 'application/json'
             },
                success: function(res) {
                    if(res.status === "ok") {
                        var html = '';
                        totalRows = res.data.length;
                        for (let i = 0 ; i < res.data.length ; i++){
                            html += addNewRow(i, res.data[i]);
                        }
                        $("#bankAccounts").empty().append(html);
                        function selectBtn(){
                            for(i = 0 ; i > res.data.length; i++ ){
                                $("#choose").addClass('btn-light')
                            }
                        }
                    }
                }
            });
        });
        function selectBtn(){
        }
        function addNewRow(i, data) {
            let html = '<tr>';
            html += '<td class="fa-num">'  + (i + 1 )+ '</td>';
            html += '<td class="fa-num">' + data.shaba_no + '</td>';
            html += '<td>';
            html += '</td>';
            if (data.status === 'pending'){
                html += '<td class="fa-num"><span class="badge bg-primary rounded-pill"> درحال بررسی</span></td>';
            }else if (data.status === 'rejected'){
                html += '<td class="fa-num"><span class="badge bg-danger rounded-pill">رد شده</span></td>';
            }else{
                html += '<td class="fa-num"><span class="badge bg-success rounded-pill">تایید شده</span></td>';
            }
            html += '<td class="fa-num">' + data.created_at + '</td>';
            html += '<td>';
            html += '<button onclick="selectBtn()" id="choose' + i + '" class="btn btn-circle btn-light my-1"><i class="icon-visit-Exclusion1"></i></button>';
            html += '<a href="#" class="btn btn-circle btn-danger my-1"><i class="ri-close-line"></i></a>';
            html += '</td>';
            html += '</tr>';
            return html;
        }

        $('#addShabaNo').on('click',function(){
            
            var shabaNo = $('#shabaNo').val();
            
            $.ajax({
                    type: 'post',
                    url: '{{ route('launcher.launcher_bank_accounts.store',['launcher' => $formId]) }}',
                    data: {
                        shaba_no : shabaNo
                    },
                    success: function(res) {
                        if(res.status === "ok") {
                            showSuccess("اضافه شد");
                            $("#bankAccounts").append(addNewRow(totalRows, res.data));
                            totalRows++;
                        }
                        else
                            showErr(res.msg);
                    },
                    error: function(XMLHttpRequest, textStatus, errorThrown) {
                        
                        var errs = XMLHttpRequest.responseJSON.errors;

                        if(errs instanceof Object) {
                            var errsText = '';

                            Object.keys(errs).forEach(function(key) {
                                errsText += key + " : " + errs[key];
                            });
                            showErr(errsText);    
                        }
                        else {
                            var errsText = '';

                            for(let i = 0; i < errs.length; i++)
                                errsText += errs[i].value;
                            
                            showErr(errsText);
                        }
                    }
                });
        });
    </script>
@stop