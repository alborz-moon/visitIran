<div class="col-lg-6 mb-3 zIndex0">
    <div class="d-flex spaceBetween justifyContentCenter">
        <div class="uploadTitleText">{{$label}}</div>
        <button onclick="" class="colorBlue b-0 backgroundColorTransparent backgroundColorTransparent">ویرایش</button>
    </div>
    <div id="gallery_container_{{$key}}" class="boxGallery">
    </div>
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

<script>

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
                });
            }
        };

</script>