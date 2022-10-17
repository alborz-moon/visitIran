{{-- Modal     --}}
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">دیدگاه شما</h5>
          {{-- <div class="d-flex" style="flex-direction:column">
              <img src="#">
              <p>عکس محصول</p>
          </div> --}}
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body p-0">
  <main class="page-content p-0">
      <div class="container">
          <!-- start of box -->
          <div class="ui-box bg-white product-detail-container p-0 b-0">
              <div class="ui-box-content">
                  <div class="row">
                      <div class="col-md-6 mb-md-0 mb-4">
                          <form action="#" class="add-comment-product">
                              <!-- start of form-element -->
                              <div class="d-flex justify-content-center align-items-center">
                                  @include('layouts.ratting')
                              </div>
                              <div class="form-element-row mb-3">
                                  <label class="label">عنوان نظر شما</label>
                                  <input type="text" class="form-control"
                                      placeholder="عنوان نظر خود را بنویسید..">
                              </div>
                              <!-- end of form-element -->
                              <!-- start of form-element -->
                              <div class="form-element-row mb-3">
                                  <label class="label">نقاط قوت</label>
                                  <div class="add-point-container" id="advantages">
                                      <div class="add-point-field">
                                          <input type="text" class="form-control" id="advantage-input"
                                              autocomplete="off">
                                          <button type="button"
                                              class="btn btn-primary btn-add-point js-icon-form-add"><i
                                                  class="ri-add-line"></i></button>
                                      </div>
                                      <div class="comment-dynamic-labels js-advantages-list"></div>
                                  </div>
                              </div>
                              <!-- end of form-element -->
                              <!-- start of form-element -->
                              <div class="form-element-row mb-3">
                                  <label class="label">نقاط ضعف</label>
                                  <div class="add-point-container" id="disadvantages">
                                      <div class="add-point-field">
                                          <input type="text" class="form-control" id="disadvantage-input"
                                              autocomplete="off">
                                          <button type="button"
                                              class="btn btn-primary btn-add-point js-icon-form-add"><i
                                                  class="ri-add-line"></i></button>
                                      </div>
                                      <div class="comment-dynamic-labels js-disadvantages-list"></div>
                                  </div>
                              </div>
                              <!-- end of form-element -->
                              <!-- start of form-element -->
                              <div class="form-element-row mb-3">
                                  <label class="label">متن نظر شما (اجباری)</label>
                                  <textarea rows="5" class="form-control"
                                      placeholder="متن نظر خود را بنویسید.."></textarea>
                              </div>
                              <!-- end of form-element -->
                          </form>
                          
                      </div>
                      <div class="col-md-6 p-0">
                          <div class="fs-8 fw-bold text-dark mb-3">
                              دیگران را با نوشتن نظرات خود، برای انتخاب این محصول راهنمایی کنید.
                          </div>
                          <div class="fs-7 fw-bold text-info mb-3">
                              لطفا پیش از ارسال نظر، خلاصه قوانین زیر را مطالعه کنید:
                          </div>
                          <ul class="ps-4 text-secondary">
                              <li class="mb-3">لازم است محتوای ارسالی منطبق برعرف و شئونات جامعه و با بیانی رسمی و
                                  عاری از لحن
                                  تند، تمسخرو توهین باشد.</li>
                              <li class="mb-3">از ارسال لینک‌های سایت‌های دیگر و ارایه‌ی اطلاعات شخصی خودتان مثل
                                  شماره تماس،
                                  ایمیل و آی‌دی شبکه‌های اجتماعی پرهیز کنید.</li>
                              <li class="mb-3">در نظر داشته باشید هدف نهایی از ارائه‌ی نظر درباره‌ی کالا ارائه‌ی
                                  اطلاعات مشخص و
                                  دقیق برای راهنمایی سایر کاربران در فرآیند خرید یک محصول توسط ایشان است.</li>
                              <li class="mb-3">با توجه به ساختار بخش نظرات، از پرسیدن سوال یا درخواست راهنمایی در
                                  این بخش
                                  خودداری کرده و سوالات خود را در بخش «پرسش و پاسخ» مطرح کنید.</li>
                          </ul>
                      </div>
                  </div>
              </div>
          </div>
          <!-- end of box -->
      </div>
  </main>
        </div>
        <div class="modal-footer between">
            <div class="d-flex align-items-center justify-content-between flex-wrap">
              <div>
                با “ثبت نظر” موافقت خود را با <a href="#" class="link">قوانین انتشار نظرات</a>
                در سایت اعلام می‌کنم.
              </div>
              <div>
                  <a href="#" class="link">انصراف و بازگشت</a>
              </div>
          </div>
          <div class="text-end">
              <button class="btn btn-primary">ثبت نظر 
                  <i class="ri-send-plane-fill ms-2"></i>
              </button>
          </div>
          </div>
      </div>
    </div>
  </div>