let page = 1;

function buildQuery() {
    let query = new URLSearchParams();
    if (catId != "-1") query.append("parent", catId);

    // let off = $("#has_selling_offs").prop("checked") ? 1 : 0;
    // let min = $("#has_selling_stock").prop("checked") ? 1 : 0;
    let minPrice = $("#skip-value-lower").val().replaceAll(",", "");
    let maxPrice = $("#skip-value-upper").val().replaceAll(",", "");
    // let orderBy = $("#orderBy").val();
    // let searchKey = $("#searchBoxInput").val();

    var total_filters_count = 0;

    // if (min > 0) query.append("min", min);

    if (minPrice !== "") query.append("minPrice", minPrice);

    if (maxPrice !== "") query.append("maxPrice", maxPrice);

    // if (off !== 0) query.append("off", off);

    // if (orderBy === "sell_count_desc") {
    //     query.append("orderBy", "sell_count");
    //     query.append("orderByType", "desc");
    // } else {
    //     let s = orderBy.split("_");
    //     query.append("orderBy", s[0]);
    //     query.append("orderByType", s[1]);
    // }

    // if (searchKey !== "") query.append("key", searchKey);

    // let categories = [];
    // $("input[name='categories']").each(function () {
    //     if ($(this).prop("checked")) categories.push($(this).attr("value"));
    // });
    // if (categories.length > 0) {
    //     $("#categories_filters_count_container").removeClass("hidden");
    //     $("#categories_filters_count").empty().append(categories.length);
    //     query.append("category", categories);
    //     total_filters_count += categories.length;
    // } else {
    //     $("#categories_filters_count_container").addClass("hidden");
    // }

    let levels = [];
    $("input[name='levels']").each(function () {
        if ($(this).prop("checked")) levels.push($(this).attr("value"));
    });

    if (levels.length > 0) {
        $("#levels_filters_count_container").removeClass("hidden");
        $("#levels_filters_count").empty().append(levels.length);
        query.append("levels", levels);
        total_filters_count += levels.length;
    } else {
        $("#levels_filters_count_container").addClass("hidden");
    }

    let facilities = [];
    $("input[name='facilities']").each(function () {
        if ($(this).prop("checked")) facilities.push($(this).attr("value"));
    });
    if (facilities.length > 0) {
        $("#facilities_filters_count_container").removeClass("hidden");
        $("#facilities_filters_count").empty().append(facilities.length);
        query.append("facilities", facilities);
        total_filters_count += facilities.length;
    } else {
        $("#facilities_filters_count_container").addClass("hidden");
    }

    // var features = [];
    // $("select[name='feature_filter']").each(function () {
    //     var selected = $(this).find(":selected").val();
    //     if (selected === "all") return;
    //     var featureId = $(this).attr("data-id");
    //     features.push(featureId + "_" + selected);
    // });
    // if (features.length > 0) {
    //     $("#features_filters_count_container").removeClass("hidden");
    //     $("#features_filters_count").empty().append(brands.length);
    //     query.append("features", features);
    //     total_filters_count += features.length;
    // } else {
    //     $("#features_filters_count_container").addClass("hidden");
    // }

    // if (total_filters_count > 0) {
    //     $("#total_filters").removeClass("hidden");
    //     $("#remove_all_filters").removeClass("hidden");
    //     $("#total_filters_count").empty().append(total_filters_count);
    // } else {
    //     $("#total_filters").addClass("hidden");
    //     $("#remove_all_filters").addClass("hidden");
    // }

    return query;
}

function fetchMore(call_back) {
    page++;
    $.ajax({
        type: "get",
        url: LIST_API + "?page=" + page + "&" + buildQuery().toString(),
        success: function (res) {
            if (res.status !== "ok") return;
            var length = res.data.length;
            if (length == 0) {
                return;
            }
            let html = renderProducts(res.data, "sample");
            $("#events_div").append(html).removeClass("hidden");
            call_back();
        },
    });
}

function filter() {
    $("#events_div").addClass("hidden");
    $("#shimmer").removeClass("hidden");

    $.ajax({
        type: "get",
        url: LIST_API + "?" + buildQuery().toString(),
        success: function (res) {
            if (res.status !== "ok") return;

            var length = res.data.length;
            if (length == 0) {
                $("#shimmer").addClass("hidden");
                $("#nothingToShow").removeClass("hidden");
                return;
            }
            let html = renderEvents(res.data, "sampleEvent");
            $("#events_div").empty().append(html).removeClass("hidden");
            $("#shimmer").addClass("hidden");
            $("#nothingToShow").addClass("hidden");
            $("#total_count")
                .empty()
                .append(res.count + " کالا");
        },
    });
}

function renderEvents(data, prefix) {
    let html = "";
    if (data === undefined) return "";

    data.forEach((elem) => {
        setEventVals(prefix, elem);
        let id = elem.id;

        var newElem = $("#sample_event_div").html();

        newElem = newElem
            .replace(prefix + "Img", prefix + "Img_" + id)
            .replace(prefix + "Header", prefix + "Header_" + id)
            .replace(prefix + "Tag", prefix + "Tag_" + id)
            .replace(prefix + "Critical", prefix + "Critical_" + id)
            .replace(prefix + "CriticalCount", prefix + "CriticalCount_" + id)
            .replace(prefix + "Rate", prefix + "Rate_" + id)
            .replace(prefix + "MultiColor", prefix + "MultiColor_" + id);

        html +=
            "<div onclick=\"redirect('" +
            id +
            "', '" +
            elem.slug +
            '\')" class="cursorPointer">' +
            newElem +
            "</div>";
    });

    return html;
}

$(document).ready(function () {
    $(document).on("change", "input[name='languages']", function () {
        filter();
    });
    $(document).on("change", "input[name='levels']", function () {
        filter();
    });
    $(document).on("change", "input[name='facilities']", function () {
        filter();
    });
    $(document).on("change", "input[name='cities']", function () {
        filter();
    });
});

function clearAllFilters() {
    $("input[name='sellers']").prop("checked", false);
    $("input[name='brands']").prop("checked", false);
    $("input[name='categories']").prop("checked", false);
    $("input[name='features']").prop("checked", false);
    $("#has_selling_stock").prop("checked", false);
    $("#has_selling_offs").prop("checked", false);
    $("#searchBoxInput").val("");
    $("#skip-value-lower").val(defaultMinPrice);
    $("#skip-value-upper").val(defaultMaxPrice);

    $(".noUi-connect").css("transform", "translate(0%, 0px) scale(1, 1)");
    $(".noUi-origin").first().css("transform", "translate(0, 0px)");
    $(".noUi-origin:last-child").css("transform", "translate(-1000%, 0px)");
    $(".noUi-handle-lower")
        .attr("aria-valuenow", parseInt(defaultMinPrice.replaceAll(",", "")))
        .attr("aria-valuetext", defaultMinPrice);

    $(".noUi-handle-upper")
        .attr("aria-valuenow", parseInt(defaultMaxPrice.replaceAll(",", "")))
        .attr("aria-valuetext", defaultMaxPrice);

    filter();
}
