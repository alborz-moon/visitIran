@extends('admin.layouts.list')

@section('title')
مدیریت ویژگی های محصول > {{ $productName }}
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
                        @if($item->answer_type == 'text')
                            <input id="feature_{{ $item->id }}" value="{{ $item->value }}" />
                        @elseif($item->answer_type == 'number')
                            <input type="number" id="feature_{{ $item->id }}" value="{{ $item->value }}" />
                        @elseif($item->answer_type == 'longtext')
                            <textarea id="feature_{{ $item->id }}">{{ $item->value }}</textarea>
                        @else
                            <?php 
                                $choices = [];
                                if($item->choices != null) {
                                    $tmp = explode('__', $item->choices);
                                    foreach($tmp as $itr) {
                                        $arr = explode('$$', $itr);
                                        if(count($arr) == 2) {
                                            array_push($choices, [
                                                'key' => $arr[0],
                                                'label' => $arr[1]
                                            ]);
                                        }
                                        else {
                                            array_push($choices, [
                                                'key' => $arr[0],
                                                'label' => ''
                                            ]);
                                        }
                                    }
                                }
                                $values = [];
                                $values = explode('$$', explode('__', $item->value)[0]);
                                
                             ?>
                            @foreach ($choices as $choice)
                                <div>
                                    <label style="width: auto" for="feature_{{ $item->id }}_{{ $choice['key'] }}">{{ $choice['key'] }}</label>
                                    <input class="feature_multi_choice" data-id="{{ $item->id }}" {{ in_array($choice['key'], $values) ? 'checked' : '' }} style="width: auto" name="feature_{{ $item->id }}_multi_choice[]" id="feature_{{ $item->id }}_{{ $choice['key'] }}" type="checkbox" value="{{ $choice['key'] }}" />
                                </div>
                            @endforeach
                            </select>
                        @endif
                    </td>
                    <td>{{ $item->unit }}</td>
                    <td>
                        @if($item->effect_on_price && count($choices) > 0)
                            <div id="prices_{{ $item->id }}">
                                <?php $k = 0; ?>
                                <?php 
                                    $prices = $item->price != null ? $prices = explode('$$', $item->price) : [];
                                ?>
                                @foreach($values as $value)

                                        @if(isset($prices[$k]))
                                            <div class="flex" style="margin-top: 10px">
                                                <label for="feature_{{ $item->id }}_price_{{ $value }}" style="width: 100px">قیمت {{ $value }}</label>
                                                <input value="{{ str_replace(',', '', $prices[$k]) }}" class="feature_{{ $item->id }}_price" style="width: 100px" id="feature_{{ $item->id }}_price_{{ $value }}" type="number" />    
                                            </div>
                                        @endif

                                    <?php $k++ ?>
                                @endforeach
                            </div>
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

            $(document).on('change', '.feature_multi_choice', function() {
                let id = $(this).attr('data-id');
                val = [];
                $("input[name='feature_" + id + "_multi_choice[]']:checked").each(function() {
                    val.push(this.value);
                });

                let htmlPrices = '';
                for(let i = 0; i < val.length; i++) {
                    htmlPrices += '<div class="flex" style="margin-top: 10px">';
                    htmlPrices += '<label for="feature_' + id + '_price_' + val[i] + '" style="width: 100px">قیمت ' + val[i] + '</label>';
                    htmlPrices += '<input class="feature_' + id + '_price" style="width: 100px" id="feature_' + id + '_price_' + val[i] + '" type="number" />'
                    htmlPrices += '</div>';
                }
                
                $("#prices_" + id).empty('').append(htmlPrices);
            });

            function save(categoryFeatureId) {
                
                var price =  $("#feature_" + categoryFeatureId + "_price") !== undefined ? 
                    $("#feature_" + categoryFeatureId + "_price").val() : null;

                if(price === undefined) {
                    price = [];
                    $(".feature_" + categoryFeatureId + "_price").each(function() {
                        if(this.value === '')
                            price.push('{{ $defaultPrice }}')
                        else
                            price.push(this.value);
                    });
                }

                var val = $("#feature_" + categoryFeatureId).val();
                if(val === undefined) {
                    val = [];
                    $("input[name='feature_" + categoryFeatureId + "_multi_choice[]']:checked").each(function() {
                        val.push(this.value);
                    });
                }

                $.ajax({
                    type: 'post',
                    url: '{{ route('product.productFeature.store', ['product' => $productId]) }}',
                    data: {
                        'category_feature_id': categoryFeatureId,
                        'value': val,
                        'price': price,
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
