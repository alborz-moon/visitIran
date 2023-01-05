@section('header')
    @parent
    <link rel="stylesheet" href="{{URL::asset('theme-assets/bootstrap-datepicker.css?v=1')}}">
    <script src="{{URL::asset("theme-assets//bootstrap-datepicker.js")}}"></script>
@stop
<div class="w-100 backgroundWhite mb-5">
    <div class="container pb-1">
        <span class="ui-box-title fontSize20 mb-3">
            <img class="p-2" src="http://myshop.com/./theme-assets/images/svg/headlineTitle.svg" alt="">
            رویداد خود را بیابید
        </span>
        <div class="row mb-5">
            <div class="col-sm-12 col-md-3 ">
                <select class="select2 seachbar-select w-100" placeholder="" id="tagFilter">
                    <option selected value="0">موضوع رویداد</option>
                    @foreach ($tags as $tag)
                        <option value="{{ $tag->label }}">{{ $tag->label }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-sm-12 col-md-3 ">
                <select class="select2 seachbar-select w-100" aria-placeholder="" id="launcherFilter">
                    <option selected value="0">برگزار کننده</option>
                    @foreach ($launchers as $launcher)
                        <option value="{{ $launcher->id }}">{{ $launcher->company_name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-sm-12 col-md-3 ">
                <select class="select2 seachbar-select w-100" aria-placeholder="" id="cityFilter">
                    <option selected value="0">محل برگزاری</option>
                    @foreach ($cities as $city)
                        <option value="{{ $city->id }}">{{ $city->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-sm-6 col-md-2 ">
                <label class="tripCalenderSection">
                    <span class="calendarIcon"></span>
                    <input id="date_input_start" class="tripDateInput form-control customBackgroundWhite" placeholder="تاریخ برگزاری" required readonly type="text">
                </label>
            </div>
            <div class="col-sm-6 col-md-1  m-auto">
                <button onclick="goToListPage()" class="btn btn-primary whiteSpaceNoWrap">جست و جو</button>
            </div>
        </div>
    </div>
</div>

<script>
    var datePickerOptions = {
        numberOfMonths: 1,
        showButtonPanel: true,
        dateFormat: "DD d M سال yy"
    };
    $("#date_input_start").datepicker(datePickerOptions).on('change', function () {});

    function goToListPage() {

        let query = new URLSearchParams();
        
        let tag = $('#tagFilter').val();
        let launcher = $('#launcherFilter').val();
        let city = $('#cityFilter').val();

        if(tag != 0)
            query.append('tag', tag);

        if(launcher != 0)
            query.append('launcher', launcher);

        if(city != 0)
            query.append('city', city);

        document.location.href = '{{ route('event.category.list', ['orderBy' => 'createdAt']) }}' + "?" + query.toString();
    }

</script>