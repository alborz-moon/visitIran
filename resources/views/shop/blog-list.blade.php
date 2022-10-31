
@extends('layouts.structure')
@section('content')
        <main class="page-content">
            <div class="container">
                <!-- start of box => contact-us -->
                <h3 class="mt-2 mb-5">اتاق خبر</h3>
                <div class="d-flex justifuy-content-spacebeween align-item-center mb-5">
                    <select id="setDistinctTags" class="jet-select__control w-100 py-2 px-5" name="category">
			        </select>
                    <select id="orderBy" class="jet-sorting-select w-100 py-2 px-5" name="select-name">
						<option value="-1">مرتب سازی</option>
						<option {{ isset($orderBy) && $orderBy == 'header_asc' ? 'selected' : '' }} value="header_asc">عنوان</option>
						<option {{ isset($orderBy) && $orderBy == 'createdAt_desc' ? 'selected' : '' }} value="createdAt_desc">جدیدترین‌ها</option>
						<option {{ isset($orderBy) && $orderBy == 'seen_desc' ? 'selected' : '' }} value="seen_desc">پربازدیدترین‌ها</option>
					</select>
               		<input class="jet-search-filter__input w-100 py-2 px-5 d-none d-lg-block" type="search" autocomplete="off" value="" placeholder="جست‌وجو بر اساس کلمات کلیدی">
                </div>
                    <div class="container mb-5">
                        <div id="blogList" class="row">
                        </div>
                    </div>
            </div>
        </main>
@stop

@section('footer')
    @parent
@stop

@section('extraJS')
    @parent
    <script src="{{ asset('theme-assets/js/theme.js') }}"></script>
    <script src="{{ asset('theme-assets/js/custom.js') }}"></script>

    <script>
        
        $(document).ready(function() {

            filter();

            $("#orderBy").on('change', function() {
               filter() ;
            });

            function buildQuery() {
            
                let query = new URLSearchParams();
                
                let orderBy = $("#orderBy").val();
                    
                if(orderBy != -1) {
                    let s = orderBy.split('_');
                    query.append('orderBy', s[0]);
                    query.append('orderByType', s[1]);
                }
                return query;
            }

            $.ajax({
                type: 'get',
                url: '{{ route('api.blog.getDistinctTags') }}',
                success: function(res) {
                    console.log(res);
                    var option = '';
                    if(res.status === "ok") {
                        for(var i = 0; i < res.tags.length; i++) {
                            option += '<option data-label="' + res.tags[i] + '">' + res.tags[i] + '</option>';
                        }
                        $("#setDistinctTags").empty().append(option);
                    }
                }
            });

            function filter() {
                $.ajax({
                    type: 'get',
                    url: '{{ route('api.blog.list') }}' + "?" + buildQuery(),
                    success: function(res) {
                        console.log(res);
                        var html = '';
                        if(res.status === "ok") {
                            for(var i = 0; i < res.data.length; i++) {
                                html += '<div class="col-lg-4 col-md-6 col-sm-12">';
                                html += '<div class="cardBlog mb-4">';
                                html += '<div class="d-flex">';
                                html += '<a href="' + res.data[i].href + '" class="w-100 m-3">';
                                html += '<img class="w-100 h-100" src="' + res.data[i].img + '" style="height:250px!important" alt="' + res.data[i].alt + '">';
                                html += '</a>';
                                html += '</div>';
                                html += '<div class="overFlowHidden mx-3 mb-3" style="height: 60px">';
                                html += '<h6>' + res.data[i].header + '</h6>';
                                html += '<p>' + res.data[i].digest + '</p>';
                                html += '</div>';
                                html += '<div class="overFlowHidden mx-3 mb-3"><p>' + res.data[i].slug + '</p>';
                                html += '</div>';
                                html += '</div>';
                                html += '</div>';
                            }
                        $("#blogList").empty().append(html);
                    }
                    }
                });

            }
        });

    </script>

@stop