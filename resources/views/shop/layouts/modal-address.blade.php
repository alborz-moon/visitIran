<div class="remodal remodal-lg" data-remodal-id="add-address-modal-fields-with-map"
    data-remodal-options="hashTracking: false">
    <div class="remodal-header">
        <button data-remodal-action="close" class="remodal-close"></button>
        <div class="remodal-title">افزودن آدرس جدید</div>
    </div>
    <div class="remodal-content">
        <div class="row">
            <div class="col-md-8 mb-md-0 mb-4">
                <!-- start of add-address-form -->
                <form action="#" class="add-address-form">
                    <div class="row">
                        <!-- start of form-element -->
                            <div class="form-element-row">
                                <label class="label fs-7">نام آدرس</label>
                                <input id="name" type="text" class="form-control" placeholder="نام">
                            </div>

                        <div class="col-lg-6 mb-3">
                            <!-- start of form-element -->
                            <div class="form-element-row">
                                <label class="label fs-7">نام گیرنده</label>
                                <input id="recv_name" type="text" class="form-control" placeholder="نام">
                            </div>
                            <!-- end of form-element -->
                        </div>
                        <div class="col-lg-6 mb-3">
                            <!-- start of form-element -->
                            <div class="form-element-row">
                                <label class="label fs-7">نام خانوادگی گیرنده</label>
                                <input id="lastName" type="text" class="form-control" placeholder="نام خانوادگی">
                            </div>
                            <!-- end of form-element -->
                        </div>
                        <div class="col-lg-6 mb-3">
                            <!-- start of form-element -->
                            <div class="form-element-row">
                                <label class="label fs-7">استان</label>
                                
                                <select onchange="getCities($(this).val())" class="select2" name="state02" id="state02">
                                    <option value="0">انتخاب کنید</option>
                                    @foreach ($states as $state)
                                        <option value="{{ $state->id }}">{{ $state->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <!-- end of form-element -->
                        </div>
                        <div class="col-lg-6 mb-3">
                            <!-- start of form-element -->
                            <div class="form-element-row">
                                <div class="form-element-row">
                                    <label class="label fs-7">شهر</label>
                                    <select class="select2" name="city02" id="city02">
                                    </select>
                                </div>
                            </div>
                            <!-- end of form-element -->
                        </div>
                        <div class="col-lg-6 mb-3">
                            <!-- start of form-element -->
                            <div class="form-element-row">
                                <label class="label fs-7">شماره موبایل</label>
                                <input id="phone" type="text" class="form-control" placeholder="مثال: ۰۹۱۲۳۴۵۶۷۸۹">
                            </div>
                            <!-- end of form-element -->
                        </div>
                        <div class="col-lg-6 mb-3">
                            <!-- start of form-element -->
                            <div class="form-element-row">
                                <label  class="label fs-7">کدپستی</label>
                                <input id="postalCode" type="text" class="form-control"
                                    placeholder="کدپستی باید ۱۰ رقم و بدون خط تیره باشد">
                            </div>
                            <!-- end of form-element -->
                        </div>
                        <div class="col-12 mb-3">
                            <!-- start of form-element -->
                            <div class="form-element-row">
                                <label  class="label fs-7">آدرس</label>
                                <textarea id="fullAddress" rows="5" class="form-control" placeholder="آدرس کامل"></textarea>
                            </div>
                            <!-- end of form-element -->
                        </div>
                    </div>
                </form>
                <!-- end of add-address-form -->
            </div>
            <div class="col-md-4">
                <div class="map-container bg-light my-3">
                    <!-- map -->
                    <div class="hoverBoxShadow backgroundColorBlue textColor w-100 h-100 d-flex justify-content-center align-items-center colorWhite">نقشه</div>
                </div>
            </div>
        </div>
    </div>
    <div class="remodal-footer">
        <button id="closeAddressModal" data-remodal-action="cancel" class="btn btn-sm btn-outline-light px-3 me-2">بستن</button>
        <button id="submitAddress" class="btn btn-sm btn-primary px-3">ثبت</button>
    </div>
</div>
    <script>
        
        function asd() {
            alert("dqw");
            $("#recv_name").val('');
            $("#lastName").val('');
            $("#name").val('');
            $("#postalCode").val('');
            $("#fullAddress").val('');
            $("#phone").val('');
            $("#state02").val('');
            $("#city02").val('');
            $("#x").val('');
            $("#y").val('');
            mode = 'create';
        }

        function getCities(stateId, selectedCity=undefined) {

            if(stateId == 0) {
                $("#city02").empty();
                return;
            }
            $.ajax({
                type: 'get',
                url: '{{ route('api.cities') }}',
                data: {
                    state_id: stateId
                },
                success: function(res) {

                    if(res.status !== 'ok') {
                        $("#city02").empty();
                        return;
                    }

                    let html = '<option value="0">انتخاب کنید</option>';
                    res.data.forEach(elem => {
                        
                        if(selectedCity !== undefined && elem.id === selectedCity)
                            html += '<option selected value="' + elem.id + '">' + elem.name + '</option>';
                        else
                            html += '<option value="' + elem.id + '">' + elem.name + '</option>';
                    });
                    
                    $("#city02").empty().append(html);
                }
            })

        }

        $(document).ready(function() {

            // $.ajax({
            //     type: 'get',
            //     url: '{{ route('address.index') }}',
            //     headers: {
            //         'accept': 'application/json'
            //     },
            //     success: function(res) {
            //         console.log(res);
            //     }
            // });

            $("#submitAddress").on('click', function() {
                let recv_name = $('#recv_name').val();
                let lastName = $('#lastName').val();
                let phone = $('#phone').val();
                let name = $('#name').val();
                let address = $('#fullAddress').val();
                let postalCode = $('#postalCode').val();
                let cityId = $("#city02").val();

                $.ajax({
                    type: 'post',
                    url: mode === 'create' ? '{{ route('address.store') }}' : '{{ route('address.update') }}' + '/' + selectedAddrId,
                    data: {
                        x: 23.3,
                        y: 43.44,
                        name: name,
                        postal_code: postalCode,
                        address: address,
                        recv_name: recv_name,
                        recv_last_name: lastName,
                        recv_phone: phone,
                        city_id: cityId,
                    },
                    success: function(res) {
                        if(res.status === "ok") {
                            $('#closeAddressModal').click();
                            location.reload(true);
                        }
                        else
                            showErr(res.msg);
                    },
                    error: function(XMLHttpRequest, textStatus, errorThrown) {
                        
                        var errs = XMLHttpRequest.responseJSON.errors;

                        if(errs instanceof Object) {
                            var errsText = '';

                            Object.keys(errs).forEach(function(key) {
                                errsText += key + " : " + errs[key];
                            });
                            showErr(errsText);    
                        }
                        else {
                            var errsText = '';

                            for(let i = 0; i < errs.length; i++)
                                errsText += errs[i].value;
                            
                            showErr(errsText);
                        }
                    }
                });
            });
        });


    </script>