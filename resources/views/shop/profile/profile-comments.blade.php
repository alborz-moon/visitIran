
@extends('layouts.structure')
@section('content')
        <main class="page-content">
            <div class="container">
                <div class="row mb-5">
                    @include('shop.profile.layouts.profile_menu')
                    <div class="col-xl-9 col-lg-8 col-md-7">
                        <div class="ui-box bg-white mb-5">
                            <div class="ui-box-title">نظرات</div>
                            <div class="ui-box-content comments">
                                <div class="row" id="commentMy">
                                </div>
                            </div>
                        </div>
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
@stop

<script>
     $.ajax({
        type: 'get',
        url: '{{ route('api.comment.my') }}',
        headers: {
            'accept': 'application/json'
        },
        success: function(res) {
            var html= "";
            if(res.status === "ok") {
                for(var i = 0; i < res.data.length; i++) {
                    html +='<div class="col-lg-6 mb-4">';
                    html +='<div class="border rounded p-3">';
                    html +='<a href="#" class="d-flex align-items-center link pb-3">';
                    html +='<img src="./theme-assets/images/carts/02.jpg" width="60" alt="">';
                    html +='<span class="fs-7 fw-bold"> و رم 4 گیگابایت</span>';
                    html +='</a>';
                    html +='<div class="comment">';
                    html +='<div class="comment-header"><span>۱۵ تیر ۱۴۰۰</span></div>';
                    html +='<div class="comment-body"><p>در کل</p>';
                    html +='<ul>';
                    html +='<li class="comment-evaluation positive">دوربین قوی</li>';
                    html +='<li class="comment-evaluation negative">حسگر اثر انگشت کمی ضعیفه</li>';
                    html +='</ul>';
                    html +='</div>';
                    html +='<div class="d-flex align-items-center justify-content-flex-end">';
                    html +='<a href="#" class="btn btn-link text-danger">حذف <i class="ri-delete-bin-5-line ms-1"></i></a>';
                    html +='</div>';
                    html +='</div>';
                    html +='</div>';
                    html +='</div>';
                }
                $("#commentMy").empty().append(html);
            }
        }
     });
</script>