                    <!-- start of product-comments -->
                    <div class="product-tab-content product-comments tab-content border-bottom pb-2 mb-4 b-0"
                        id="scrollspyHeading4">
                        <div class="row">
                        <div class="product-user-meta fa-num mb-4 spaceBetween">
                            <span class="product-users-rating">
                                <span class="product-title fontSize15 marginLeft15 d-flex align-items-center">دیدگاه کاربران</span>
                                <span class="rattingToStar"></span>
                                <span class="fw-bold me-1">{{ $product['rate'] }}</span>
                                <span class="text-muted fs-7">(از <span>{{ $product['all_rates_count'] }}</span> رای)</span>
                            </span>
                            <span style="gap15">
                                <i class="icon-visit-sort align-middle fontSize20 marginLeft15 colorYellow"></i>
                                <a class="marginLeft15 btnHover colorBlack" href="">جدید ترین</a>
                                <a class="marginLeft15 btnHover colorBlack" href="">کمترین امتیاز</a>
                                <a class="marginLeft15 btnHover colorBlack" href="">بیشترین امتیاز</a>
                            </span>
                        </div>
                            <div class="col-xl-3 col-lg-4 col-md-5 mb-3">
                                <p class="bold fontSize12">شما هم درباره این کالا دیدگاه ثبت کنید</p>
                                <button class="btn btn-secondary w-100 mt-4" data-bs-toggle="modal" data-bs-target="#commentModal"> ثبت دیدگاه </button>
                                <!-- Modal -->
                                {{-- @include('layouts.ratting') --}}
                            </div>
                            <div class="col-xl-9 col-lg-8 col-md-7 pt-0">
                                <!-- start of comments -->
                                <div class="comments">
                                    <!-- start of comment -->
                                    <div id="comment" class="comment">

                                    </div>
                                    <!-- end of comment -->
                                </div>
                                <!-- end of comments -->
                            </div>
                        </div>
                    </div>
                    <!-- end of product-comments -->
<script>
    $.ajax({
        type: 'get',
        url: '{{ route('api.product.comment.list', ['product' => $productId]) }}',
        headers: {
            'accept': 'application/json'
        },
        success: function(res) {
            var html = "";
            if(res.status === "ok") {
                for(var i = 0; i < res.data.length; i++) {
                    let rate = res.data[i].rate;
                    html += '<div class="customBoxComment">';
                    html += '<div class="comment">';
                    html += '<div class="d-flex spaceBetween">';
                    html += '<div>';
                    html += '<span class="comment-header colorBlack fontSize12 font400">';
                    html += '<span class="font800 ml-5">از</span>' + res.data[i].user + '</span>';
                    html += '<span class="m-3 colorBlack fontSize12 font400">';
                    html += '<span class="font800 ml-5">در</span>';
                    html +=  res.data[i].created_at + '</span>';
                    html += '</div>';
                    html += '<div>';
                    html += '<span>';
                    if(rate != null) {
                        for(var j = 5; j >= 1; j--) {
                            if(j <= rate)
                                html += '<i class="icon-visit-star me-1 fontSize21"></i>';
                            else
                                html += '<i class="icon-visit-staroutline me-1 fontSize14"></i>';
                        }
                    }
                   html += '</span>';
                   html += '</div>';
                   html += '</div>';
                   html += '</div>';
                   html +='<div class="comment-body">';
                   if(res.data[i].msg != null)
                   html += '<p>' + res.data[i].msg + '</p>';
                   html += '<ul>';
                    for(var j = 0; j < res.data[i].positive.length; j++) {
                        html += '<li class="comment-evaluation positive">' + res.data[i].positive[j] + '</li>';
                    }
                    for(var j = 0; j < res.data[i].negative.length; j++) {
                        html += '<li class="comment-evaluation negative">' + res.data[i].negative[j] + '</li>';
                    }  
                   html += '</ul></div>';
                   html += '</div>';
                   html += '</div>';
               }
               $("#comment").empty().append(html);
            }
        }
    });
</script>