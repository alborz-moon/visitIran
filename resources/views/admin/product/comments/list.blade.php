@extends('admin.layouts.list')

@section('title')
مدیریت نظرات محصول > {{ $productName }}
@stop

@section('backBtn')
<button onclick="document.location.href = '{{ route('product.index') }}'" class="btn btn-danger">بازگشت</button>
@stop

@section('addBtn')
@stop

@section('items')
<center style="margin-top: 20px">
    <p id="err"></p>
    <table>
        <thead>
            <tr>
                <th>ردیف</th>
                <th>نام کاربر</th>
                <th>امتیاز</th>
                <th>عنوان نظر</th>
                <th>وضعیت</th>
                <th>زمان ایجاد</th>
                <th>عملیات</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1; ?>
            @foreach($items as $item)
                <tr>

                    <td>{{ $i++ }}</td>
                    <td>{{ $item['user'] }}</td>
                    <td>{{ $item['rate'] == null ? 'رای داده نشده' : $item['rate'] }}</td>
                    <td>{{ $item['title'] == null ? 'نظری ثبت نشده' : $item['title'] }}</td>
                    <td>{{ $item['status'] ? 'تایید شده' : 'تایید نشده' }}</td>
                    <td>{{ $item['created_at'] }}</td>
                    
                    <td>
                        <button data-toggle='tooltip' title="نمایش متن کامل نظر" onclick="document.location.href = '{{ route('comment.edit', ['comment' => $item['id']]) }}'" class="btn btn-primary"><span class="glyphicon glyphicon-eye-open"></span></button>
                        <button onclick="removeModal('item', {{$item['id']}}, '{{ route('comment.destroy', ['comment' => $item['id']]) }}')" data-toggle='tooltip' title="حذف" class="btn btn-danger"><span class="glyphicon glyphicon-trash"></span></button>
                    </td>
                </tr>
                <?php $i++; ?>
            @endforeach
        </tbody>
    </table>
@stop
