@extends('admin.layouts.create')

@section('title')
{{ isset($item) ? 'ویرایش بلاگ' . ' > ' . $item['header'] : 'افزودن بلاگ' }}
@stop

@section('form')

    @if(isset($item))
        <div class="flex center">
            <img width="200px" src="{{ $item['img'] }}" />
        </div>
    @endif

    <form id="myForm" action="{{ isset($item) ? route('blog.update', ['blog' => $item['id']]) : route('blog.store')}}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}

        <div class="flex flex-col center gap10" style="margin: 10px">
            
            <input {{ isset($item) ? '' : 'required' }} type="file" name="img_file" id="imgInp">

            <div>
                <label for="header">عنوان</label>
                <input required value="{{ isset($item) ? $item['header'] : '' }}" type="text" name="header" id="header" />
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
                <label for="article_tags">تگ ها سئو</label>
                <textarea name="article_tags" id="article_tags">{{ isset($item) ? $item['article_tags'] : '' }}</textarea>
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

        </div>

        <div class="flex center gap10">
            <span onclick="document.location.href = '{{ route('blog.index') }}'" class="btn btn-danger">بازگشت</span>
            <input value="ذخیره" type="submit" class="btn green" id="saveBtn" />
        </div>

    </form>
@stop