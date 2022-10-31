
@extends('layouts.structure')
@section('content')
        <main class="page-content">
            <div class="container">
                <!-- start of box => contact-us -->
                <h3 class="mt-2 mb-5">اتاق خبر</h3>
                <div class="d-flex justifuy-content-spacebeween align-item-center mb-5">
                    <select class="jet-select__control w-100 py-2 px-5" name="category">
					    <option data-label="دسته‌بندی‌ها">دسته‌بندی‌ها</option>
						<option data-label="اطلاع رسانی‌ها">اطلاع رسانی‌ها</option>
						<option data-label="بیانیه‌های مطبوعاتی">بیانیه‌های مطبوعاتی</option>
						<option data-label="جشنواره‌ها">جشنواره‌ها</option>
						<option data-label="دیگر رسانه‌ها">دیگر رسانه‌ها</option>
						<option data-label="راهنما‌ها">راهنما‌ها</optionvalue=>
						<option data-label="رویداد‌ها">رویداد‌ها</option>
						<option data-label="عمومی">عمومی</option>
						<option data-label="کارآفرینان ایرانی">کارآفرینان ایرانی</option>
						<option data-label="گزارش‌ها">گزارش‌ها</option>
						<option data-label="گفتگوها">گفتگوها</option>
						<option data-label="مسؤولیت‌های اجتماعی">مسؤولیت‌های اجتماعی</option>
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
                        <div class="row">
                            <div class="col-lg-4 col-md-6 col-sm-12">
                                <div class="cardBlog mb-4">
                                    <div class="d-flex">
                                        <a class="w-100 m-3">
                                            <img class="w-100 h-100" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQNicpQQAwnjSYPlBlCDUbfF1JbbZUMHZZOpQ&usqp=CAU" style="height:250px!important" alt="">
                                        </a>
                                    </div>
                                    <div class="overFlowHidden mx-3 mb-3" style="height: 60px">
                                        <h6>
                                            لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ، و با استفاده از طراحان گرافیک است، چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است، و برای شرایط فعلی تکنولوژی مورد نیاز، و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد، کتابهای زیادی در شصت و سه درصد گذشته حال و آینده، شناخت فراوان جامعه و متخصصان را می طلبد، تا با نرم افزارها شناخت بیشتری را برای طراحان رایانه ای علی الخصوص طراحان خلاقی، و فرهنگ پیشرو در زبان فارسی ایجاد کرد، در این صورت می توان امید داشت که تمام و دشواری موجود در ارائه راهکارها، و شرایط سخت تایپ به پایان رسد و زمان مورد نیاز شامل حروفچینی دستاوردهای اصلی، و جوابگوی سوالات پیوسته اهل دنیای موجود طراحی اساسا مورد استفاده قرار گیرد.
                                        </h6>
                                    </div>
                                    <div class="overFlowHidden mx-3 mb-3">
                                        <p>تاریخ امروز 8 آبان</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-12">
                                <div class="cardBlog mb-4">
                                    <div class="d-flex">
                                        <a class="w-100 m-3">
                                            <img class="w-100 h-100" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQNicpQQAwnjSYPlBlCDUbfF1JbbZUMHZZOpQ&usqp=CAU" style="height:250px!important" alt="">
                                        </a>
                                    </div>
                                    <div class="overFlowHidden mx-3 mb-3" style="height: 60px">
                                        <h6>
                                            لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ، و با استفاده از طراحان گرافیک است، چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است، و برای شرایط فعلی تکنولوژی مورد نیاز، و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد، کتابهای زیادی در شصت و سه درصد گذشته حال و آینده، شناخت فراوان جامعه و متخصصان را می طلبد، تا با نرم افزارها شناخت بیشتری را برای طراحان رایانه ای علی الخصوص طراحان خلاقی، و فرهنگ پیشرو در زبان فارسی ایجاد کرد، در این صورت می توان امید داشت که تمام و دشواری موجود در ارائه راهکارها، و شرایط سخت تایپ به پایان رسد و زمان مورد نیاز شامل حروفچینی دستاوردهای اصلی، و جوابگوی سوالات پیوسته اهل دنیای موجود طراحی اساسا مورد استفاده قرار گیرد.
                                        </h6>
                                    </div>
                                    <div class="overFlowHidden mx-3 mb-3">
                                        <p>تاریخ امروز 8 آبان</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-12">
                                <div class="cardBlog mb-4">
                                    <div class="d-flex">
                                        <a class="w-100 m-3">
                                            <img class="w-100 h-100" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQNicpQQAwnjSYPlBlCDUbfF1JbbZUMHZZOpQ&usqp=CAU" style="height:250px!important" alt="">
                                        </a>
                                    </div>
                                    <div class="overFlowHidden mx-3 mb-3" style="height: 60px">
                                        <h6>
                                            لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ، و با استفاده از طراحان گرافیک است، چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است، و برای شرایط فعلی تکنولوژی مورد نیاز، و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد، کتابهای زیادی در شصت و سه درصد گذشته حال و آینده، شناخت فراوان جامعه و متخصصان را می طلبد، تا با نرم افزارها شناخت بیشتری را برای طراحان رایانه ای علی الخصوص طراحان خلاقی، و فرهنگ پیشرو در زبان فارسی ایجاد کرد، در این صورت می توان امید داشت که تمام و دشواری موجود در ارائه راهکارها، و شرایط سخت تایپ به پایان رسد و زمان مورد نیاز شامل حروفچینی دستاوردهای اصلی، و جوابگوی سوالات پیوسته اهل دنیای موجود طراحی اساسا مورد استفاده قرار گیرد.
                                        </h6>
                                    </div>
                                    <div class="overFlowHidden mx-3 mb-3">
                                        <p>تاریخ امروز 8 آبان</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6 col-sm-12">
                                <div class="cardBlog mb-4">
                                    <div class="d-flex">
                                        <a class="w-100 m-3">
                                            <img class="w-100 h-100" src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcQNicpQQAwnjSYPlBlCDUbfF1JbbZUMHZZOpQ&usqp=CAU" style="height:250px!important" alt="">
                                        </a>
                                    </div>
                                    <div class="overFlowHidden mx-3 mb-3" style="height: 60px">
                                        <h6>
                                            لورم ایپسوم متن ساختگی با تولید سادگی نامفهوم از صنعت چاپ، و با استفاده از طراحان گرافیک است، چاپگرها و متون بلکه روزنامه و مجله در ستون و سطرآنچنان که لازم است، و برای شرایط فعلی تکنولوژی مورد نیاز، و کاربردهای متنوع با هدف بهبود ابزارهای کاربردی می باشد، کتابهای زیادی در شصت و سه درصد گذشته حال و آینده، شناخت فراوان جامعه و متخصصان را می طلبد، تا با نرم افزارها شناخت بیشتری را برای طراحان رایانه ای علی الخصوص طراحان خلاقی، و فرهنگ پیشرو در زبان فارسی ایجاد کرد، در این صورت می توان امید داشت که تمام و دشواری موجود در ارائه راهکارها، و شرایط سخت تایپ به پایان رسد و زمان مورد نیاز شامل حروفچینی دستاوردهای اصلی، و جوابگوی سوالات پیوسته اهل دنیای موجود طراحی اساسا مورد استفاده قرار گیرد.
                                        </h6>
                                    </div>
                                    <div class="overFlowHidden mx-3 mb-3">
                                        <p>تاریخ امروز 8 آبان</p>
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
                }
            });

            function filter() {
                
                $.ajax({
                    type: 'get',
                    url: '{{ route('api.blog.list') }}' + "?" + buildQuery(),
                    success: function(res) {
                        console.log(res);
                    }
                });

            }
        });

    </script>

@stop