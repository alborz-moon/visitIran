<style>

    .myModal {
        position: fixed;
        z-index: 1000000000;
        top: 40%;
        left: 20%;
        width: 60%;
        padding: 40px;
        background-color: white;
        border: 1px solid;
    }

</style>

<div id="drop_zone_parent_{{ $key }}" class="col-lg-6 mb-3 zIndex0">
    <div class="d-flex spaceBetween justifyContentCenter">
        <div class="uploadTitleText">{{$label}}</div>
        {{-- data-remodal-target="dropZoneModal" --}}
        {{-- onclick="cloneElemToModal('{{ $key }}')" --}}
        <button onclick="show_modal('{{ $key }}')" id="edit_btn_{{ $key }}" class="hidden colorBlue b-0 backgroundColorTransparent backgroundColorTransparent">ویرایش</button>
    </div>
    <div id="gallery_container_{{$key}}" class="boxGallery">
    </div>

    <div id="drop_zone_container_{{ $key }}">
        <div class="uploadBody">
            <div class="uploadBorder">
                <div class="uploadBodyBox">
                    
                    <form action="{{ route('launcher.update',['launcher' => $formId]) }}" class="dropzone uploadBox" id="{{$key}}">
                        {{csrf_field()}}
                    </form>
                    {{-- <div id="dropZoneErr" style="margin-top: 25px; font-size: 1.2em; color: red;" class="hidden">شما اجازه بارگذاری چنین فایلی را ندارید.</div>
                    <div class="uploadّFileAllowed">حداکثر فایل مجاز: 100 مگابایت</div> --}}
                </div>
            </div>
        </div>
    </div>

</div>

<script>

    function closeMyModal(key) {
        $("#drop_zone_parent_" + key).addClass('zIndex0');
        $("#drop_zone_container_" + key).removeClass('myModal').addClass('hidden');
        $("#close_my_modal_" + key).remove();
        $(".dark").addClass('hidden');
    }

    function show_modal(key) {
        $("#drop_zone_parent_" + key).removeClass('zIndex0');
        $("#drop_zone_container_" + key).append('<button id="close_my_modal_' + key + '" onclick="closeMyModal(\'' + key + '\')">انصراف</button>').addClass('myModal').removeClass('hidden');
        $(".dark").removeClass('hidden');
    }

    Dropzone.options.{{$camelKey}} = {
        paramName: '{{$key}}', // The name that will be used to transfer the file
        maxFilesize: 2, // MB
        timeout: 180000,
        parallelUploads: 1,
        chunking: false,
        forceChunking: false,
        uploadMultiple: false,
        maxFiles: 1,
        acceptedFiles: ".jpeg,.jpg,.png,.gif",
        accept: function(file, done) {
            done();
        },
        init: function () {
            this.hiddenFileInput.removeAttribute('multiple');
            this.on("success", function (file) {
                
                uploadedFiles.push({
                    name: file.name,
                    id: '{{$key}}'
                });
                
                $(".dz-message").removeClass('block');
                showSuccess('فایل شما با موفقیت آپلود شد');
                $("#gallery_container_{{$key}}").remove();
                setTimeout(() => {
                    window.location.reload();
                }, 500);
            });
        }
    };


</script>