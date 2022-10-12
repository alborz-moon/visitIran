@extends('admin.layouts.create')

@section('title')
{{ isset($item) ? 'ویرایش محصول' . ' > ' . $item['name'] : 'افزودن محصول' }}
@stop

@section('form')
    
    <center>
        @if($errors->any())
            {{ implode('', $errors->all(':message')) }}
        @endif
    </center>


    @if(isset($item))
        <div class="flex center">
            <img width="200px" src="{{ $item['img'] }}" />
        </div>
    @endif

    <form id="myForm" action="{{ isset($item) ? route('product.update', ['product' => $item['id']]) : route('product.store')}}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}

        <div class="flex flex-col center gap10" style="margin: 10px">
            
            <input {{ isset($item) ? '' : 'required' }} type="file" name="img_file" id="imgInp">

            <div>
                <label for="name">نام</label>
                <input required value="{{ isset($item) ? $item['name'] : '' }}" type="text" name="name" id="name" />
            </div>
            
            <div>
                <label for="description">توضیح محصول</label>
                <textarea required name="description" id="description">{{ isset($item) ? $item['description'] : '' }}</textarea>
            </div>

            <div>
                <label for="digest">متن خلاصه</label>
                <textarea name="digest" id="digest">{{ isset($item) ? $item['digest'] : '' }}</textarea>
            </div>

            <div>
                <label for="keywords">واژه های کلیدی</label>
                <textarea name="keywords" id="keywords">{{ isset($item) ? $item['keywords'] : '' }}</textarea>
            </div>

            <div>
                <label for="tags">تگ ها</label>
                <textarea name="tags" id="tags">{{ isset($item) ? $item['tags'] : '' }}</textarea>
            </div>

            <div>
                <label for="alt">تگ alt</label>
                <input value="{{ isset($item) ? $item['alt'] : '' }}" type="text" placeholder="این فیلد اختیاری است" name="alt" id="alt" />
            </div>

            <div>
                <label for="price">قیمت</label>
                <input required {{ isset($item) ? '' : 'required' }} value="{{ isset($item) ? $item['price'] : '' }}" type="number" name="price" id="price" />
            </div>

            <div>
                <label for="category_id">دسته موردنظر</label>
                <select name="category_id" id="category_id">
                    @foreach($categories as $category)
                        <option {{ isset($item) && $item['category_id'] == $category['id'] ? 'selected' : '' }} value="{{$category['id']}}">{{$category['name']}}</option>
                    @endforeach
                </select>
            </div>
            
            <div>
                <label for="brand_id">برند موردنظر</label>
                <select name="brand_id" id="brand_id">
                    @foreach($brands as $brand)
                        <option {{ isset($item) && $item['brand_id'] == $brand['id'] ? 'selected' : '' }} value="{{$brand['id']}}">{{$brand['name']}}</option>
                    @endforeach
                </select>
            </div>
            

            <div>
                <label for="seller_id">فروشنده</label>
                <select name="seller_id" id="seller_id">
                    <option value="-1">نامشخص</option>
                    @foreach($sellers as $seller)
                        <option {{ isset($item) && $item['seller_id'] == $seller['id'] ? 'selected' : '' }} value="{{$seller['id']}}">{{$seller['name']}}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <label for="priority">اولویت</label>
                <input value="{{ isset($item) ? $item['priority'] : '' }}" type="number" required name="priority" id="priority" />
            </div>

            <div>
                <label for="visibility">وضعیت نمایش</label>
                <select name="visibility" id="visibility">
                    <option {{ isset($item) && !$item['visibility'] ? 'selected' : '' }} value="0">مخفی</option>
                    <option {{ isset($item) && $item['visibility'] ? 'selected' : '' }} value="1">نمایش</option>
                </select>
            </div>
            
            <div>
                <label for="is_in_top_list">آیا جز محصولات برتر است؟</label>
                <select name="is_in_top_list" id="is_in_top_list">
                    <option {{ isset($item) && !$item['is_in_top_list'] ? 'selected' : '' }} value="0">خیر</option>
                    <option {{ isset($item) && $item['is_in_top_list'] ? 'selected' : '' }} value="1">بله</option>
                </select>
            </div>

        </div>


        <div class="flex center gap10">
            <span onclick="document.location.href = '{{ route('product.index') }}'" class="btn btn-danger">بازگشت</span>
            <input value="ذخیره" type="submit" class="btn green" id="saveBtn" />
        </div>

    </form>
@stop