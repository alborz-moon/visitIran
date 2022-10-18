@extends('admin.layouts.structure')

@section('header')
    @parent
@stop

@section('content')

    <div class="col-md-1"></div>

    <div class="col-md-10">
        <div class="sparkline8-list shadow-reset mg-tb-30">
            <div class="sparkline8-hd">
                <div class="main-sparkline8-hd flex space-between">
                    <h1>
                        <span>مدیریت دسته ها</span>
                        @if(!empty($name))
                            <span> / </span>
                        @endif
                        <span>{{ $name }}</span>
                    </h1>
                    @if(!empty($name))
                        <button onclick="document.location.href = '{{ $isHead ? route('category.index')  : route('category.sub', ['category' => $parent_id])}}'" class="btn btn-danger">بازگشت</button>
                    @endif
                </div>
            </div>

            <div class="sparkline8-graph dashone-comment messages-scrollbar dashtwo-messages">

                <div id="mainContainer" class="page-content" style="margin-top: 5%; margin: 50px; direction: rtl">

                    <div class="row">
                        <div class="flex center gap10">
                            <button onclick="document.location.href = '{{ route('category.create') }}'" class="btn btn-success">افزودن مورد جدید</button>
                            <button onclick="$('#addBatchModal').removeClass('hidden')" class="btn btn-success">افزودن دسته ای</button>
                        </div>

                        <div class="flex flex-start gap10 margin20">
                            <label for="presentType">نوع نمایش</label>
                            <select id="presentType">
                                <option value="card">کارتی</option>
                                <option value="table">جدولی</option>
                            </select>
                        </div>

                        <div class="col-xs-12">
                            @if(isset($errors) && $errors != null && count($errors) > 0)
                                @foreach ($errors as $error)
                                    <div>{{$error}}</div>
                                @endforeach
                            @else
                                <div id="card-view">
                                    @foreach($categories as $category)
                                        <div class="col-xs-12 col-lg-3" id="item_{{ $category['id'] }}">
                                            <center>
                                                <h5>{{ $category['name'] }}</h5>
                                            </center>
                                            <img src="{{$category['img']}}" alt="{{ $category['alt'] }}" style="width:100%; height: 100%">
                                            <div class="flex space-between flex-wrap gap10">
                                                <button class="btn btn-primary" onclick="document.location.href = '{{ route('category.edit', ['category' => $category['id']]) }}'">مشاهده اطلاعات</button>
                                                <button class="btn btn-danger" onclick="removeModal('item', {{$category['id']}}, '{{ route('category.destroy', ['category' => $category['id']]) }}')">حذف</button>
                                                @if($category['has_sub'])
                                                    <button style="width: 100%" onclick="document.location.href = '{{ route('category.sub', ['category' => $category['id']]) }}'" class="btn btn-info">مشاهده زیر دسته ها</button>
                                                @else
                                                    <button onclick="document.location.href = '{{ route('category.features.index', ['category' => $category['id']]) }}'" class="btn btn-info">ویژگی ها</button>
                                                    <button onclick="document.location.href = '{{ route('product.index', ['category' => $category['id']]) }}'" class="btn btn-warning">محصولات</button>
                                                @endif
                                            </div>
                                            
                                        </div>
                                    @endforeach
                                </div>
                                <div id="table-view" class="hidden">
                                    <table>
                                        <thead>
                                            <th>نام</th>
                                            @if($category['has_sub'])
                                                <th>تعداد زیردسته</th>
                                            @else
                                                <th>تعداد ویژگی</th>
                                                <th>تعداد محصول</th>
                                            @endif
                                            <th>عملیات</th>
                                        </thead>
                                        @foreach($categories as $category)
                                            <tr id="item_{{ $category['id'] }}">
                                                <td>{{ $category['name'] }}</td>
                                                <td>
                                                    <div class="flex space-between flex-wrap gap10">
                                                        <button class="btn btn-primary" onclick="document.location.href = '{{ route('category.edit', ['category' => $category['id']]) }}'">مشاهده اطلاعات</button>
                                                        <button class="btn btn-danger" onclick="removeModal('item', {{$category['id']}}, '{{ route('category.destroy', ['category' => $category['id']]) }}')">حذف</button>
                                                        @if($category['has_sub'])
                                                            <button style="width: 100%" onclick="document.location.href = '{{ route('category.sub', ['category' => $category['id']]) }}'" class="btn btn-info">مشاهده زیر دسته ها</button>
                                                        @else
                                                            <button onclick="document.location.href = '{{ route('category.features.index', ['category' => $category['id']]) }}'" class="btn btn-info">ویژگی ها</button>
                                                            <button onclick="document.location.href = '{{ route('product.index', ['category' => $category['id']]) }}'" class="btn btn-warning">محصولات</button>
                                                        @endif
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </table>
                                </div>
                            @endif
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-1"></div>


    <div id="addBatchModal" class="modal hidden">
        <div class="modal-content" style="width: 70% !important">
            <input type="hidden" value="" id="slideId" name="id">
            <input type="hidden" value="delete" name="kind">
            
            <form method="post" action="{{ route('category.upload') }}" enctype="multipart/form-data">
                {{ csrf_field() }}
                <center style="margin: 10px">
                    <h3>لطفا فایل اکسل را مطابق فایل نمونه بارگزاری نمایید.</h3>
                    <div style="margin: 10px">
                        <a href="{{ asset('categories.xlsx') }}" target="_blank" download>دانلود فایل نمونه</a>
                    </div>
                    <input type="file" name="file" />
                </center>
                <div class="flex center gap10">
                    <input type="submit" value="افزودن" class="btn green"  style="margin-right: 5px; margin-bottom: 3%">
                    <input type="button" value="انصراف" class="btn green"  style="margin-bottom: 3%; margin-left: 5px;" onclick="$('#addBatchModal').addClass('hidden')">
                </div>
            </form>
        </div>
    </div>


    <script>

        $(document).on('ready', function() {
            $("#presentType").on('change', function() {
                if($(this).val() === "table") {
                    $("#table-view").removeClass('hidden');
                    $("#card-view").addClass('hidden');
                }
                else {
                    $("#table-view").addClass('hidden');
                    $("#card-view").removeClass('hidden');
                }
            });
        });

    </script>
@stop