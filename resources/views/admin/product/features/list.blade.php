@extends('admin.layouts.list')

@section('title')
مدیریت ویژگی های محصول > {{ $productName }}
@stop

@section('backBtn')
<button onclick="document.location.href = '{{ route('product.index') }}'" class="btn btn-danger">بازگشت</button>
@stop

@section('items')
<center style="margin-top: 20px">
    <table>
        <thead>
            <tr>
                <th>ردیف</th>
                <th>نام</th>
                <th>مقدار</th>
                <th>عملیات</th>
            </tr>
        </thead>
        <tbody>
            <?php $i = 1; ?>
            @foreach($items as $item)
                <tr>
                    <td>{{ $i++ }}</td>
                    <td>{{ $item->name }}</td>
                    <td>
                        <input id="feature_{{ $item->id }}" value="{{ $item->value }}" />
                    </td>
                    <td>
                        <button data-id={{ $item->id }} class="saveBtn btn btn-primary">ثبت تغییر</button>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    
    <script>

        $(document).ready(function() {

            $(".saveBtn").on('click', function() {
                save($(this).attr('data-id'));
            });

            function save(categoryFeatureId) {
                $.ajax({
                    type: 'post',
                    url: '{{ route('product.productFeature.store', ['product' => $productId]) }}',
                    data: {
                        'category_feature_id': categoryFeatureId,
                        'value': $("#feature_" + categoryFeatureId).val()
                    },
                    success: function(res) {

                        if(res.status === "ok") {
                            alert("عملیات موردنظر با موفقیت انجام شد.");
                        }
                        else {
                            alert(res.msg);
                        }
                    }
                });
            }
        });
        
    </script>

@stop
