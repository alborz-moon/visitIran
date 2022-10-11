@extends('admin.layouts.create')

@section('title')
{{ isset($item) ? 'ویرایش ویژگی' . ' > ' . $categoryName : 'افزودن ویژگی' . ' > ' . $categoryName}}
@stop

@section('form')

    <form id="myForm" action="{{ isset($item) ? route('feature.update', ['feature' => $item['id']]) : route('category.features.store', ['category' => $categoryId])}}" method="post">
        {{ csrf_field() }}

        <div class="flex flex-col center gap10" style="margin: 10px">

            <div>
                <label for="name">نام</label>
                <input {{ isset($item) ? '' : 'required' }} value="{{ isset($item) ? $item['name'] : '' }}" type="text" name="name" id="name" />
            </div>
            
            <div>
                <label for="answer_type">نوع ویژگی</label>
                <select name="answer_type" id="answer_type">
                    <option {{ isset($item) && !$item['answer_type'] == 'text' ? 'selected' : '' }} value="text">متنی</option>
                    <option {{ isset($item) && $item['answer_type'] == 'longtext' ? 'selected' : '' }} value="longtext">متن بلند</option>
                    <option {{ isset($item) && $item['answer_type'] == 'multi_choice' ? 'selected' : '' }} value="multi_choice">چند گزینه ای</option>
                    <option {{ isset($item) && $item['answer_type'] == 'number' ? 'selected' : '' }} value="number">عدد</option>
                </select>
            </div>

            <div>
                <label for="unit">واحد</label>
                <input value="{{ isset($item) ? $item['unit'] : '' }}" type="text" placeholder="این فیلد اختیاری است" name="unit" id="unit" />
            </div>
            
            <div>
                <label for="priority">اولویت</label>
                <input value="{{ isset($item) ? $item['priority'] : '' }}" type="number" name="priority" id="priority" />
            </div>

            <div>
                <label for="show_in_top">آیا این ویژگی کلیدی است؟</label>
                <select name="show_in_top" id="show_in_top">
                    <option {{ isset($item) && !$item['show_in_top'] ? 'selected' : '' }} value="0">خیر</option>
                    <option {{ isset($item) && $item['show_in_top'] ? 'selected' : '' }} value="1">بله</option>
                </select>
            </div>
            
            <div>
                <label for="effect_on_price">آیا این ویژگی در قیمت محصول تاثیر دارد؟</label>
                <select name="effect_on_price" id="effect_on_price">
                    <option {{ isset($item) && !$item['effect_on_price'] ? 'selected' : '' }} value="0">خیر</option>
                    <option {{ isset($item) && $item['effect_on_price'] ? 'selected' : '' }} value="1">بله</option>
                </select>
            </div>
            
            <div>
                <label for="effect_on_available_count">آیا این ویژگی در موجودی محصول تاثیر دارد؟</label>
                <select name="effect_on_available_count" id="effect_on_available_count">
                    <option {{ isset($item) && !$item['effect_on_available_count'] ? 'selected' : '' }} value="0">خیر</option>
                    <option {{ isset($item) && $item['effect_on_available_count'] ? 'selected' : '' }} value="1">بله</option>
                </select>
            </div>

        </div>

        <div class="flex center gap10">
            <span onclick="document.location.href = '{{ route('category.features.index', ['category' => $categoryId]) }}'" class="btn btn-danger">بازگشت</span>
            <input value="ذخیره" type="submit" class="btn green" id="saveBtn" />
        </div>

    </form>
@stop