@section('header')
    @parent
    <link rel="stylesheet" href="{{URL::asset('theme-assets/bootstrap-datepicker.css?v=1')}}">
    <script src="{{URL::asset("theme-assets//bootstrap-datepicker.js")}}"></script>
@stop
<div class="container">
    <span class="ui-box-title fontSize20 mb-3">
        <img class="p-2" src="http://myshop.com/./theme-assets/images/svg/headlineTitle.svg" alt="">
        رویداد خود را بیابید
    </span>
    <div class="row">
        <div class="col-sm-12 col-md-3 mb-3">
            <select class="select2 seachbar-select w-100" placeholder="asdf" name="state">
                <option selected value="1">نام رویداد</option>
                <option value="2">Two</option>
                <option value="3">Three</option>
                <option value="4">Four</option>
            </select>
        </div>
        <div class="col-sm-12 col-md-3 mb-3">
            <select class="select2 seachbar-select w-100" aria-placeholder="asdadw" name="">
                <option selected value="1">برگزار کننده</option>
                <option value="2">Two</option>
                <option value="3">Three</option>
                <option value="4">Four</option>
            </select>
        </div>
        <div class="col-sm-12 col-md-3 mb-3">
            <select class="select2 seachbar-select w-100" aria-placeholder="asdadw" name="">
                <option selected value="1">محل برگزاری</option>
                <option value="2">Two</option>
                <option value="3">Three</option>
                <option value="4">Four</option>
            </select>
        </div>
        <div class="col-sm-6 col-md-2 mb-3">
            <label class="tripCalenderSection">
                <span class="calendarIcon"></span>
                <input id="date_input_start" class="tripDateInput form-control customBackgroundWhite" placeholder="تاریخ برگزاری" required readonly type="text">
            </label>
        </div>
        <div class="col-sm-6 col-md-1 mb-3 m-auto">
            <button class="btn btn-primary whiteSpaceNoWrap">جست و جو</button>
        </div>
    </div>
</div>

<script>
    var datePickerOptions = {
            numberOfMonths: 1,
            showButtonPanel: true,
            dateFormat: "yy/mm/dd"
        };
        $("#date_input_start").datepicker(datePickerOptions);
</script>