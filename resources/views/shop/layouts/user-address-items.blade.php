<!-- start of user-address-items -->
<div  class="user-address-items">
    <div class="d-flex" id="user-address-items"></div>
    <div class="d-flex" id="newAddress">
        <div class="user-address-item user-add-address-btn-container">
            <button onclick="emptyFields()" class="user-add-address-btn" data-remodal-target="add-address-modal-fields-with-map">
                <i class="ri-add-line icon"></i>
                <span>آدرس جدید</span>
            </button>
        </div>
    </div>
    <!-- start of user-add-address-btn-container -->
    
    <!-- end of user-add-address-btn-container -->
</div>
<!-- end of user-address-items -->

 <!-- start of remove-from-addresses-modal -->
 <div class="remodal remodal-xs" data-remodal-id="remove-from-addresses-modal"
     data-remodal-options="hashTracking: false">
     <div class="remodal-header">
         <button data-remodal-action="close" class="remodal-close"></button>
     </div>
     <div class="remodal-content">
         <div class="text-muted fs-7 fw-bold mb-3">
             آیا مطمئنید که این آدرس حذف شود؟
         </div>
     </div>
     <div class="remodal-footer">
         <button id="remove-modal-cancel-btn" data-remodal-action="cancel" class="btn btn-sm btn-outline-light px-3 me-2">خیر</button>
         <button id="sure-delete" class="btn btn-sm btn-primary px-3">بله</button>
     </div>
 </div>
 <!-- end of remove-from-addresses-modal -->

<script>
    $(document).ready(function() {

        let myAddresses;

        $.ajax({
            type: 'get',
            url: '{{ route('address.index') }}',
            headers: {
                'accept': 'application/json'
            },
            success: function(res) {
                var html = '';
                if(res.status == "ok") {
                    myAddresses = res.data;
                    for(var i = 0; i < res.data.length; i++) {
                        html +='<div id="address-card-' + res.data[i].id + '" class="user-address-item">';
                        html +='<div class="custom-radio-box">';
                        html +='<input type="radio" class="custom-radio-box-input" name="userAddress" value="' + res.data[i].id + '" id="userAddress' + res.data[i].id + '">';
                        html +='<label for="userAddress' + res.data[i].id + '" class="custom-radio-box-label" data-placeholder="انتخاب به عنوان آدرس پیش فرض" data-placeholder-checked="آدرس پیش فرض من است">';
                        html +='<span class="d-block user-address-recipient mb-2">' + res.data[i].name + '</span>';
                        html +='<span class="d-block user-contact-items fa-num mb-3">';
                        html +='<span class="user-contact-item"><i class="ri-phone-line icon"></i><span class="value">' + res.data[i].recv_phone + '</span></span>';
                        html +='<span class="user-contact-item"><i class="ri-user-line icon"></i><span class="value">' + res.data[i].recv_name + res.data[i].recv_last_name + '</span></span>';
                        html +='</span>';
                        html +='<span class="d-flex align-items-center justify-content-end">';
                        html +='<a href="#" data-id=' + res.data[i].id + ' class="remove-modal-address link border-bottom-0 fs-7 fw-bold" data-remodal-target="remove-from-addresses-modal">حذف</a>';
                        html +='<span class="text-secondary mx-2">|</span>';
                        html +='<a href="#" data-id=' + res.data[i].id + ' class="edit-modal-address link border-bottom-0 fs-7 fw-bold" data-remodal-target="add-address-modal-fields-with-map">ویرایش</a>';
                        html +='</span>';
                        html +='</label>';
                        html +='</div>';
                        html +='</div>';
                    }

                    $("#user-address-items").empty().append(html);
                }
            }
        });
        
        $(document).on('click', '#sure-delete', function() {
            $.ajax({
                type: 'delete',
                url: '{{ route('address.destroy') }}' + '/' + selectedAddrId,
                headers: {
                    'accept': 'application/json'
                },
                success: function(res) {
                    if(res.status == "ok") {
                        $("#address-card-" + selectedAddrId).remove();
                        $("#remove-modal-cancel-btn").click();
                    }
                }
            });
        });
        $(document).on('click', '.remove-modal-address', function() {
            selectedAddrId = $(this).attr('data-id');
        });

        $(document).on('click', '.edit-modal-address', function() {

            selectedAddrId = $(this).attr('data-id');
            mode = 'edit;'

            let address = myAddresses.find((elem, index) => {
                return elem.id == selectedAddrId;
            });

            $("#recv_name").val(address.recv_name);
            $("#lastName").val(address.recv_last_name);
            $("#name").val(address.name);
            $("#postalCode").val(address.postal_code);
            $("#fullAddress").val(address.address);
            $("#phone").val(address.recv_phone);
            $("#state02").val(address.state_id).change();
            $("#x").val(address.x);
            $("#y").val(address.y);
            x = address.x;
            y = address.y;
            getCities(address.state_id, address.city_id);
        });
    })
</script>