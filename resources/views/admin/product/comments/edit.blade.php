@extends('admin.layouts.create')

@section('title')
{{ 'ویرایش نظر'}}
@stop

@section('form')

    <center>
        <p>کاربر مربوطه: {{ $item['user'] }}</p>
        <p>تاریخ ایجاد: {{ $item['created_at'] }}</p>
        <p>تاریخ تایید: {{ $item['status'] ? $item['confirmed_at'] : 'هنوز تایید نشده است' }}</p>
    </center>
    <form id="myForm" action="{{ route('comment.update', ['comment' => $item['id']])}}" method="post">
        {{ csrf_field() }}

        <div class="flex flex-col center gap10" style="margin: 10px">
            
            <div>
                <label for="title">عنوان</label>
                <input value="{{ $item['title'] }}" type="text" name="title" id="title" />
            </div>
                
            <div>
                <label for="rate">امتیاز</label>
                <input value="{{ $item['rate'] == null ? 0 : $item['rate'] }}" type="number" name="rate" id="rate" />
            </div>

            <div>
                <label for="msg">متن پیام</label>
                <textarea type="text" name="msg" id="msg">{{ $item['msg'] }}</textarea>
            </div>

            <div>
                <label for="positive">نقاط قوت</label>
                <textarea type="text" name="positive" id="positive">{{ $item['positive'] }}</textarea>
            </div>


            <div>
                <label for="negative">نقاط ضعف</label>
                <textarea type="text" name="negative" id="negative">{{ $item['negative'] }}</textarea>
            </div>


            <div>
                <label for="status">وضعیت</label>
                <select name="status" id="status">
                    <option {{ !$item['status'] ? 'selected' : '' }} value="0">تایید نشده</option>
                    <option {{ $item['status'] ? 'selected' : '' }} value="1">تایید شده</option>
                </select>
            </div>
        </div>


        <div class="flex center gap10">
            <span onclick="document.location.href = '{{ route('product.comment.index', ['product' => $product_id]) }}'" class="btn btn-danger">بازگشت</span>
            <input value="ذخیره" type="submit" class="btn green" id="saveBtn" />
        </div>

    </form>
@stop