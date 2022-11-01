@extends('layouts.structure')
@section('content')
        <main class="page-content">
            <div class="container">
                <!-- start of box => contact-us -->
                <h3 class="mt-2 mb-5">اتاق خبر</h3>
                <div class="d-flex justifuy-content-spacebeween align-item-center mb-5">
                    <select id="distinctTags" class="jet-select__control w-100 py-2 px-5" name="category">
			        </select>
                    <select id="orderBy" class="jet-sorting-select w-100 py-2 px-5" name="select-name">
						<option value="-1">مرتب سازی</option>
						<option value="header_asc">عنوان</option>
						<option value="createdAt_desc">جدیدترین‌ها</option>
						<option value="seen_desc">پربازدیدترین‌ها</option>
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

            $("#distinctTags").on('change', function() {
               filter();
            });

            $("#orderBy").on('change', function() {
               filter();
            });

            function buildQuery() {
            
                let query = new URLSearchParams();
                
                let orderBy = $("#orderBy").val();
                let distinctTags = $('#distinctTags').val();

                if (distinctTags != null && distinctTags != -1)
                    query.append('tag', distinctTags);

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
                    var option = '<option value="-1">دسته بندی</option>';
                    if(res.status === "ok") {

                        for(var i = 0; i < res.tags.length; i++)
                            option += '<option value="' + res.tags[i] + '">' + res.tags[i] + '</option>';

                        $("#distinctTags").empty().append(option);
                    }
                }
            });

            function filter() {
                $.ajax({
                    type: 'get',
                    url: '{{ route('api.blog.list') }}' + "?" + buildQuery(),
                    success: function(res) {
                        var html = '';
                        if(res.status === "ok") {
                            for(var i = 0; i < res.data.length; i++) {
                                html += '<div class="col-lg-4 col-md-6 col-sm-12">';
                                html += '<div class="cardBlog">';
                                html += '<a href="' + res.data[i].href + '" class="w-100 p-3 pb-0">';
                                html += '<div class="d-flex">';
                                html += '<img class="w-100 h-100" src="' + res.data[i].img + '" style="height:250px!important" alt="' + res.data[i].alt + '">';
                                html += '</div>';
                                html += '</a>';
                                html += '<a href="' + res.data[i].href + '" class="w-100 p-3 pt-0"><div class="overFlowHidden mx-3 mb-3" style="height: 90px">';
                                html += '<h6 class="colorBlack">' + res.data[i].header + '</h6>';
                                html += '<p class="colorBlack">' + res.data[i].digest + '</p>';
                                html += '</div></a>';
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