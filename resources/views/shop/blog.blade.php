@extends('layouts.structure')
@section('content')
            <main class="page-content">
            <div class="container">
                <h3 class="mt-2 mb-5">اخبار</h3>
                <div class="container">
                    <div class="row">
                        <div class="col-lg-9 col-md-8 col-sm-12 mb-4">
                            <div>
                                <img class="w-100 h-100" src="{{ $blog['img'] }}" alt="{{ $blog['alt'] }}">
                            </div>
                            <div class="d-flex spaceBetween overFlowHidden mx-3 mt-3">
                                <p></p>
                                <p class="border px-4 py-1 borderRadius15"></p>
                            </div>
                            <hr>
                            <h3 class="my-5">{{ $blog['header'] }}</h3>
                            <p>{{ $blog['description'] }}</p>
                        </div>
                        <div class="col-lg-3 col-md-4 d-none d-md-block">
                            <div style="position: sticky;top:150px">
                                <div class="title mb-3">پر بازدیدترین‌ها</div>
                                <hr>
                                <div id="blogListInfo">

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main
@stop

@section('footer')
    @parent
@stop

@section('extraJS')
    @parent
    <script src="{{ asset('theme-assets/js/theme.js') }}"></script>
    <script src="{{ asset('theme-assets/js/custom.js') }}"></script>
    <script>
        $.ajax({
            type: 'get',
            url: '{{ route('api.blog.list') }}',
            success: function(res) {
                var html = '';
                console.log('====================================');
                console.log(res);
                console.log('====================================');
                if(res.status === "ok") {
                    for(var i = 0; i < res.data.length; i++) {
                        html += '<div class="container p-0 m-0 py-3">';
                        html += '<div class="row p-0 m-0">';
                        html += '<div class="col-4 p-0 m-0">';
                        html += '<div><img class="w-100 h-100" src="' + res.data[i].img + '" alt="' + res.data[i].alt + '"></div>';
                        html += '</div>'
                        html += '<div class="col-8 p-0 m-0">';
                        html += '<div style="height: 60px" class="d-flex justify-content-center align-items-center" >';
                        html += '<h6  class="fontSize12 bold pr-15 overFlowHidden lineHeight2">' + res.data[i].digest + '</h6>';
                        html += '</div>';
                        html += '</div>';
                        html += '</div>';
                        html += '</div>';
                        html += '<hr>';
                    }
                $("#blogListInfo").empty().append(html);
                }
            }
                });
    </script>
@stop