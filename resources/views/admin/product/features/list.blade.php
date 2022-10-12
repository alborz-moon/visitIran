@extends('admin.layouts.list')

@section('title')
مدیریت ویژگی های محصول > {{ $productName }}
@stop

@section('backBtn')
<button onclick="document.location.href = '{{ route('product.index') }}'" class="btn btn-danger">بازگشت</button>
@stop

@section('items')
<center style="margin-top: 20px">
    <p id="err"></p>
    <table>
        <thead>
            <tr>
                <th>ردیف</th>
                <th>نام</th>
                <th>مقدار</th>
                <th>واحد</th>
                <th>قیمت</th>
                <th>موجودی</th>
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
                        <input autocomplete="false" id="feature_{{ $item->id }}" value="{{ $item->value }}" />
                    </td>
                    <td>{{ $item->unit }}</td>
                    <td>
                        @if($item->effect_on_price)
                            <input id="feature_{{ $item->id }}_price" type="number" value="{{ $item->price }}" />
                        @else
                            <span>-</span>
                        @endif
                    </td>
                    <td>
                        @if($item->effect_on_available_count)
                            <input id="feature_{{ $item->id }}_count" type="number" value="{{ $item->available_count }}" />
                        @else
                            <span>-</span>
                        @endif
                    </td>
                    <td>
                        @if($item->product_features_id != null)
                            <button onclick="removeModal('item', {{$item->id}}, '{{ route('productFeature.destroy', ['productFeature' => $item->product_features_id]) }}')" class="btn btn-danger">حذف</button>
                        @endif
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
                        'value': $("#feature_" + categoryFeatureId).val(),
                        'price': $("#feature_" + categoryFeatureId + "_price") !== undefined ? 
                            $("#feature_" + categoryFeatureId + "_price").val() : null,
                        'count': $("#feature_" + categoryFeatureId + "_count") !== undefined ?
                            $("#feature_" + categoryFeatureId + "_count").val() : null,
                    },
                    success: function(res) {

                        if(res.status === "ok") {
                            alert("عملیات موردنظر با موفقیت انجام شد.");
                        }
                        else {
                            alert(res.msg);
                        }
                    },
                    error: function(XMLHttpRequest, textStatus, errorThrown) {
                        
                        var errs = XMLHttpRequest.responseJSON.errors;
                        if(errs instanceof Object)
                            $("#err").empty().append(errs.value);
                        else {
                            var errsText = '';

                            for(let i = 0; i < errs.length; i++)
                                errsText += errs[i].value;


                            $("#err").empty().append(errsText);
                        }
                    }
                });
            }
        });
        
    </script>

@stop
