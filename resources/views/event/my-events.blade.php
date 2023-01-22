
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
                                    <div class="ui-box bg-white mb-5 p-0"> 
                                        <div class="table-responsive dropdown">
                                            <table class="table mb-0">
                                                <thead>
                                                    <tr>
                                                        <th>ردیف</th>
                                                        <th>نام رویداد</th>
                                                        <th>نام برگزار کننده</th>
                                                        <th>تاریخ شروع</th>
                                                        <th>تاریخ ثبت نام</th>
                                                        <th>تعداد بلیت</th>
                                                        <th>عملیات</th>
                                                    </tr>
                                                </thead>
                                                <tbody id="myTickets">
                                                    {{-- <tr>
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
                                                                <li><a class="dropdown-item fontSize12 btnHover" href="#">مشاهده</a></li>
                                                                <li><a class="dropdown-item fontSize12 btnHover" href="#">بلیط</a></li>
                                                                <li><a class="dropdown-item fontSize12 btnHover" href="#">پشتیبانی</a></li>
                                                            </ul>
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
                </div>
            </div>
        </div>
    </div>
</main>
@stop


@section('extraJS')
    @parent
    <script>
        $.ajax({
            type: 'get',
            url: '{{ route('api.my-events') }}',
            headers: {
                'accept': 'application/json'
            },
            success: function(res) {
                if(res.status === "ok") {
                    var myTickets= "";
                    if(res.data.length != 0){
                        for(var i = 0; i < res.data.length; i++){
                            myTickets += '<tr>';
                            myTickets += '<td>' + (i + 1) + '</td>';
                            myTickets += '<td>' + res.data[i].title + '</td>';
                            myTickets += '<td>' + res.data[i].launcher + '</td>';
                            myTickets += '<td>' + res.data[i].created_at + '</td>';
                            myTickets += '<td>' + res.data[i].start + '</td>';
                            myTickets += '<td>' + res.data[i].count + '</td>';
                            myTickets += '<td>';
                            myTickets += '<button class="btn btn-circle borderCircle my-1 dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">';
                            myTickets += '<i class="icon-visit-menu"></i>';
                            myTickets += '</button>';
                            myTickets += '<ul class="dropdown-menu">';
                            myTickets += '<li><a class="dropdown-item fontSize12 btnHover" href="' + res.data[i].href + '">مشاهده</a></li>';
                            myTickets += '<li><a class="dropdown-item fontSize12 btnHover" href="' + res.data[i].ticket_href + '">بلیط</a></li>';
                            myTickets += '<li><a class="dropdown-item fontSize12 btnHover" href="{{ route('profile.my-tickets') }}">پشتیبانی</a></li>';
                            myTickets += '</ul>'
                            myTickets += '</td>';
                            myTickets += '</tr>';
                        }
                        $("#myTickets").empty().append(myTickets);
                    }
                }
            }
         });
    </script>
@stop