@extends('admin.layouts.list')

@section('title')
مدیریت برندها
@stop

@section('createNew')
'{{ route('brand.create') }}'
@stop

@section('items')
    @foreach($items as $item)
        <div class="col-xs-12 col-lg-3" id="item_{{ $item['id'] }}">
            <center>
                <h4>{{ $item['name'] }}</h4>
            </center>
            <img src="{{$item['logo']}}" alt="{{ $item['alt'] }}" style="width:100%; height: 100%">
            <div class="flex space-between">
                <button class="btn btn-primary" onclick="document.location.href = '{{ route('brand.edit', ['brand' => $item['id']]) }}'">مشاهده اطلاعات</button>
                <button class="btn btn-danger" onclick="removeModal('item', {{$item['id']}}, '{{ route('brand.destroy', ['brand' => $item['id']]) }}')">حذف</button>
            </div>
        </div>
    @endforeach
@stop
