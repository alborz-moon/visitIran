@extends('admin.layouts.list')

@section('header')
    @parent
    <script src = {{asset("admin-panel/js/calendar.js") }}></script>
    <script src = {{asset("admin-panel/js/calendar-setup.js") }}></script>
    <script src = {{asset("admin-panel/js/calendar-fa.js") }}></script>
    <script src = {{asset("admin-panel/js/jalali.js") }}></script>
    <link rel="stylesheet" href = {{asset("admin-panel/css/calendar-green.css") }}>
    
    <style>
        .calendar table td, .calendar table th {
            min-width: unset !important;
        }
    </style>
@stop

@section('title')
مدیریت برگزار کنندگان
@stop

@section('addBtn')
<a target="_blank" href="{{ route('launcher') }}">ایجاد برگزار کننده جدید</a>
@stop

@section('items')

<center style="margin-top: 20px">
    

    <p>تعداد کل: {{ count($items) }}</p>

    <h3 style="text-align: right">
        جست و جو پیشرفته
        <span data-status="close" style="cursor: pointer" id="toggleProSearchBtn" class="glyphicon glyphicon-chevron-down"></span>
    </h3>

    <div id="pro_search" class="flex gap30 margin20 flex-wrap hidden">
        <div class="flex gap10 center">
            <label class="width-auto" for="visibilityFilter">وضعیت</label>
            <select id="visibilityFilter">
                <option value="all">همه</option>
                <option {{ isset($statusFilter) && $statusFilter == 'confirmed' ? 'selected' : '' }} value="1">تایید شده</option>
                <option {{ isset($statusFilter) && $statusFilter == 'pending' ? 'selected' : '' }} value="0">در حال بررسی</option>
                <option {{ isset($statusFilter) && $statusFilter == 'rejected' ? 'selected' : '' }} value="0">رد شده</option>
            </select>
        </div>

        
        <div class="flex gap10 center">
            <label class="width-auto" for="orderBy">مرتب سازی بر اساس</label>
            <select id="orderBy">
                <option {{ isset($orderBy) && $orderBy == 'createdAt' ? 'selected' : '' }} value="createdAt">زمان ایجاد</option>
                <option {{ isset($orderBy) && $orderBy == 'rate' ? 'selected' : '' }} value="rate">محبوبیت</option>
                <option {{ isset($orderBy) && $orderBy == 'seen' ? 'selected' : '' }} value="seen">بازدید</option>
                <option {{ isset($orderBy) && $orderBy == 'price' ? 'selected' : '' }} value="price">قیمت</option>
                <option {{ isset($orderBy) && $orderBy == 'rate_count' ? 'selected' : '' }} value="rate_count">تعداد رای</option>
                <option {{ isset($orderBy) && $orderBy == 'comment_count' ? 'selected' : '' }} value="comment_count">تعداد نظرات</option>
                <option {{ isset($orderBy) && $orderBy == 'new_comment_count' ? 'selected' : '' }} value="new_comment_count">تعداد نظرات تایید نشده</option>
                <option {{ isset($orderBy) && $orderBy == 'sell_count' ? 'selected' : '' }} value="sell_count">تعداد فروش</option>
            </select>
        </div>
            
        <div class="flex gap10 center">
            <label class="width-auto" for="orderByType">نوع مرتب سازی</label>
            <select id="orderByType">
                <option {{ isset($orderByType) && $orderByType == 'asc' ? 'selected' : '' }} value="asc">صعودی</option>
                <option {{ isset($orderByType) && $orderByType == 'desc' ? 'selected' : '' }} value="desc">نزولی</option>
            </select>
        </div>

        <div class="flex gap10" style="width: 100%">
                <div class="flex gap10 center">
                <label class="width-auto" for="fromCreatedAt">شروع بازه تاریخ ایجاد</label>
                <input type="button" style="border: none; width: 30px; height: 30px; background: url({{ asset('admin-panel/img/calendar-flat.png') }}) repeat 0 0; background-size: 100% 100%;" id="fromCreatedAtBtn">
                <input value="{{ isset($fromCreatedAtFilter) ? $fromCreatedAtFilter : '' }}" name="fromCreatedAt" type="text" id="fromCreatedAt" readonly>
                <script>
                    Calendar.setup({
                        inputField: "fromCreatedAt",
                        button: "fromCreatedAtBtn",
                        ifFormat: "%Y/%m/%d",
                        dateType: "jalali"
                    });
                </script>
            </div>

            <div class="flex gap10 center">
                <label class="width-auto" for="toCreatedAt">اتمام بازه تاریخ ایجاد</label>
                <input type="button" style="border: none; width: 30px; height: 30px; background: url({{ asset('admin-panel/img/calendar-flat.png') }}) repeat 0 0; background-size: 100% 100%;" id="toCreatedAtBtn">
                <input value="{{ isset($toCreatedAtFilter) ? $toCreatedAtFilter : '' }}" name="toCreatedAt" type="text" id="toCreatedAt" readonly>
                <script>
                    Calendar.setup({
                        inputField: "toCreatedAt",
                        button: "toCreatedAtBtn",
                        ifFormat: "%Y/%m/%d",
                        dateType: "jalali"
                    });
                </script>
            </div>
                
        </div>

        <div>
            <button onclick="filter()" class="btn btn-success">اعمال فیلتر</button>
        </div>
        
    </div>

    <table id="table" data-toggle="table" data-search="true" data-show-columns="true"  data-key-events="true" data-show-toggle="true" data-resizable="true" data-show-export="true" data-click-to-select="true" data-toolbar="#toolbar">
        <thead>
            <tr>
                <th>ردیف</th>
                <th>عملیات</th>
                <th>نام شرکت</th>
                <th>نام کاربر</th>
                <th>شماره تماس کاربر</th>
                <th>نوع برگزار کننده</th>
                <th>امتیاز</th>
                <th>تعداد کامنت</th>
                <th>تعداد دنبال کنندگان</th>
                <th>وضعیت</th>
                <th>تعداد بازدید</th>
                <th>تاریخ ایجاد</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1; ?>
            @foreach($items as $item)
                <tr id="item_{{ $item['id'] }}">
                    <td>{{ $i++ }}</td>
                    <td>
                        <div class="flex flex-col gap10">
                            <div class="flex gap10">
                                <a target="_blank" data-toggle='tooltip' title="ویرایش" href="{{ route('launcher-edit', ['formId' => $item['id']]) }}" class="btn btn-primary"><span class="glyphicon glyphicon-eye-open"></span></a>
                                {{-- <button data-toggle='tooltip' title="مدیریت رویدادها" onclick="document.location.href = '{{ route('event.index', ['product' => $item['id']]) }}'" class="btn btn-info"><span class="glyphicon glyphicon-list"></span></button> --}}
                                <button data-toggle='tooltip' title="مدیریت نظرات" onclick="document.location.href = '{{ route('launcher.launcher_comment.index', ['launcher' => $item['id']]) }}'" class="btn btn-purple"><span class="glyphicon glyphicon-comment"></span></button>
                                <button onclick="removeModal('item', {{$item['id']}}, '{{ route('product.destroy', ['product' => $item['id']]) }}')" data-toggle='tooltip' title="حذف" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span></button>
                                
                            </div>
                            
                            <div class="flex gap10">
                                <button data-toggle='tooltip' title="مدیریت نظرات" onclick="document.location.href = '{{ route('product.comment.index', ['product' => $item['id']]) }}'" style="background-color: #ce9243; border-color: #ce9243;" class="btn btn-success"><span class="glyphicon glyphicon-stats"></span></button>
                            </div>
                        </div>
                        
                    </td>
                    <td>{{ $item['company_name'] }}</td>
                    <td>{{ $item['user']['name'] }}</td>
                    <td>{{ $item['user']['phone'] }}</td>
                    <td>{{ $item['type'] == 'haghighi' ? 'حقیقی' : 'حقوقی' }}</td>
                    <td>{{ $item['rate'] == null ? 'امتیازی ثبت نشده است' : $item['rate'] . ' از ' . $item['rate_count'] . ' رای'}}</td>
                    
                    <td>{{ $item['comment_count'] == 0 ? 'کامنتی ثبت نشده است' : 'تعداد کل: ' . $item['comment_count'] . ' تعداد تایید نشده:' . $item['new_comment_count'] }}</td>
                    
                    <td>{{ $item['followers_count'] == 0 ? 'خریدی ثبت نشده است' : $item['seller_count'] }}</td>
                    <td>
                        <p id="status_text_{{ $item['id'] }}">{{ $item['status'] == 'pending' ? "در حال بررسی" : ($item['status'] == 'confirmed' ? "تایید شده" : "رد شده")}}</p>
                        @if($item['status'] == 'pending')
                            <button class="btn btn-success changeStatusBtn" data-value='confirmed' data-id='{{ $item['id'] }}' id="status_confirmed_{{ $item['id'] }}">تغییر وضعیت به تایید شده</button>
                            <button class="btn btn-danger changeStatusBtn" data-value='rejected' data-id='{{ $item['id'] }}' id="status_rejected_{{ $item['id'] }}">تغییر وضعیت به رد شده</button>
                            <button class="hidden btn btn-primary changeStatusBtn" data-value='pending' data-id='{{ $item['id'] }}' id="status_pending_{{ $item['id'] }}">تغییر وضعیت به در حال بررسی</button>
                        @elseif($item['status'] == 'confirmed')
                            <button class="hidden btn btn-success changeStatusBtn" data-value='confirmed' data-id='{{ $item['id'] }}' id="status_confirmed_{{ $item['id'] }}">تغییر وضعیت به تایید شده</button>
                            <button class="btn btn-danger changeStatusBtn" data-value='rejected' data-id='{{ $item['id'] }}' id="status_rejected_{{ $item['id'] }}">تغییر وضعیت به رد شده</button>
                            <button class="btn btn-primary changeStatusBtn" data-value='pending' data-id='{{ $item['id'] }}' id="status_pending_{{ $item['id'] }}">تغییر وضعیت به در حال بررسی</button>
                        @else
                            <button class="btn btn-success changeStatusBtn" data-value='confirmed' data-id='{{ $item['id'] }}' id="status_confirmed_{{ $item['id'] }}">تغییر وضعیت به تایید شده</button>
                            <button class="hidden btn btn-danger changeStatusBtn" data-value='rejected' data-id='{{ $item['id'] }}' id="status_rejected_{{ $item['id'] }}">تغییر وضعیت به رد شده</button>
                            <button class="btn btn-primary changeStatusBtn" data-value='pending' data-id='{{ $item['id'] }}' id="status_pending_{{ $item['id'] }}">تغییر وضعیت به در حال بررسی</button>
                        @endif
                    </td>
                    <td>{{ $item['seen'] }}</td>
                    <td>{{ $item['created_at'] }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
    
</center>

<script src="{{ asset('admin-panel/js/pro_search.js') }}"></script>

    <script>
        
        $(document).ready(function() {

            $(".saveBtn").on('click', function() {
                save($(this).attr('data-id'));
            });

            $('.changeStatusBtn').on('click', function() {
                changeStatus($(this).attr('data-id'), $(this).attr('data-value'));
            });


            function changeStatus(launcherId, newStatus) {
                $.ajax({
                    type: 'post',
                    url: '{{ route('launcher.changeStatus') }}',
                    data: {
                        'status': newStatus,
                        'launcher_id': launcherId
                    },
                    success: function(res) {

                        if(res.status === "ok") {
                            if(newStatus == 'pending') {
                                $("#status_confirmed_" + launcherId).removeClass('hidden');
                                $("#status_rejected_" + launcherId).removeClass('hidden');
                                $("#status_pending_" + launcherId).addClass('hidden');
                                $("#status_text_" + launcherId).text('در حال بررسی');
                            }
                            else if(newStatus == 'confirmed') {
                                $("#status_confirmed_" + launcherId).addClass('hidden');
                                $("#status_rejected_" + launcherId).removeClass('hidden');
                                $("#status_pending_" + launcherId).removeClass('hidden');
                                $("#status_text_" + launcherId).text('تایید شده');
                            }
                            else {
                                $("#status_confirmed_" + launcherId).removeClass('hidden');
                                $("#status_pending_" + launcherId).removeClass('hidden');
                                $("#status_rejected_" + launcherId).addClass('hidden');
                                $("#status_text_" + launcherId).text('رد شده');
                            }
                            showSuccess("عملیات موردنظر با موفقیت انجام شد.");
                        }
                        else {
                            showErr(res.msg);
                        }
                    }
                });
            }
        });

    </script>

    <script>
        function buildQuery() {
            
            let query = new URLSearchParams();
            
            let visibility = $("#visibilityFilter").val();
            let isInTopList = $("#isInTopListFilter").val();
            let brand = $("#brandFilter").val();
            let category = $("#categoryFilter").val();
            let seller = $("#sellerFilter").val();
            let off = $("#offFilter").val();
            let comment = $("#commentFilter").val();
            let max = $("#maxFilter").val();
            let min = $("#minFilter").val();
            let orderBy = $("#orderBy").val();
            let orderByType = $("#orderByType").val();

            let toCreatedAt = $("#toCreatedAt").val();
            let fromCreatedAt = $("#fromCreatedAt").val();

            if(visibility !== 'all')
                query.append('visibility', visibility);
                
            if(isInTopList !== 'all')
                query.append('isInTopList', isInTopList);
                
             if(brand !== 'all')
                query.append('brand', brand);
               
            if(category !== 'all')
                query.append('category', category);
                
            if(seller !== 'all')
                query.append('seller', seller);

            if(max !== '')
                query.append('max', max);
                
            if(min !== '')
                query.append('min', min);

            if(off !== 'all')
                query.append('off', off);

            if(comment !== 'all')
                query.append('comment', comment);
                
            if(toCreatedAt !== '')
                query.append('toCreatedAt', toCreatedAt);
                
            if(fromCreatedAt !== '')
                query.append('fromCreatedAt', fromCreatedAt);

            query.append('orderBy', orderBy);
            query.append('orderByType', orderByType);

            return query;
        }

        function filter() {
            document.location.href = '{{ route('product.index') }}' + '?' + buildQuery().toString();
        }
    

    </script>

@stop
