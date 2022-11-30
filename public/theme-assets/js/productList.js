let page = 1;

function buildQuery() {
    let query = new URLSearchParams();
    if (catId != "-1") query.append("parent", catId);

    // let brand = $("#brandFilter").val();
    let off = $("#has_selling_offs").prop("checked") ? 1 : 0;
    let min = $("#has_selling_stock").prop("checked") ? 1 : 0;
    let minPrice = $("#skip-value-lower").val().replaceAll(",", "");
    let maxPrice = $("#skip-value-upper").val().replaceAll(",", "");
    let orderBy = $("#orderBy").val();

    // if(brand !== 'all')
    //     query.append('brand', brand);

    if (min > 0) query.append("min", min);

    if (minPrice !== "") query.append("minPrice", minPrice);

    if (maxPrice !== "") query.append("maxPrice", maxPrice);

    if (off !== 0) query.append("off", off);

    if (orderBy === "sell_count_desc") {
        query.append("orderBy", "sell_count");
        query.append("orderByType", "desc");
    } else {
        let s = orderBy.split("_");
        query.append("orderBy", s[0]);
        query.append("orderByType", s[1]);
    }

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
            $("#products_div").append(html).removeClass("hidden");
            call_back();
        },
    });
}

function filter() {
    $("#products_div").addClass("hidden");
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
            let html = renderProducts(res.data, "sample");
            $("#products_div").empty().append(html).removeClass("hidden");
            $("#shimmer").addClass("hidden");
            $("#nothingToShow").addClass("hidden");
            $("#total_count")
                .empty()
                .append(res.count + " کالا");

            html = '<div class="parent form-check">';
            html +=
                '<input class="form-check-input" type="checkbox" value=""/>برند';
            html += '<ul class="child form-check">';

            for (var i = 0; i < res.brands.length; i++) {
                html += '<li class="form-check">';
                html +=
                    '<input class="form-check-input" type="checkbox" value="" />' +
                    res.brands[i]["name"];
                html += "</li>";
            }

            html += "</ul>";
            html += "</div>";

            $("#brands").empty().append(html);

            html = '<div class="parent form-check">';
            html +=
                '<input class="form-check-input" type="checkbox" value=""/>فروشنده';
            html += '<ul class="child form-check">';

            for (var i = 0; i < res.sellers.length; i++) {
                html += '<li class="form-check">';
                html +=
                    '<input class="form-check-input" type="checkbox" value="" />' +
                    res.sellers[i]["name"];
                html += "</li>";
            }

            html += "</ul>";
            html += "</div>";

            $("#sellers").empty().append(html);
        },
    });
}

function renderProducts(data, prefix) {
    let html = "";
    if (data === undefined) return "";

    data.forEach((elem) => {
        $("#" + prefix + "Img")
            .attr("src", elem.img)
            .attr("alt", elem.alt);
        $("#" + prefix + "Header").text(elem.name);
        $("#" + prefix + "Tag").text(elem.category);

        if (elem.seller !== "") {
            $("#" + prefix + "SellerParent").removeClass("hidden");
            $("#" + prefix + "Seller").text(elem.seller);
        }

        let starHtml = "";

        for (let i = 0; i < 5 - elem.rate; i++)
            starHtml += '<i class="icon-visit-staroutline"></i>';

        for (let i = 0; i < elem.rate; i++)
            starHtml += '<i class="icon-visit-star"></i>';

        $("#" + prefix + "Rate")
            .empty()
            .append(starHtml);

        if (elem.has_multi_color)
            $("#" + prefix + "MultiColor").removeClass("hidden");
        else $("#" + prefix + "MultiColor").addClass("hidden");

        let zeroAvailableCount = false;

        if (elem.is_in_critical) {
            $("#" + prefix + "CriticalCount").text(elem.available_count);
            if (elem.available_count == 0) zeroAvailableCount = true;
            $("#" + prefix + "Critical").removeClass("invisible");
            if (zeroAvailableCount)
                $("#" + prefix + "Critical").text("اتمام موجودی");
        } else $("#" + prefix + "Critical").addClass("invisible");

        if (elem.off != null && !zeroAvailableCount) {
            $("#" + prefix + "OffSection").removeClass("hidden");
            $("#" + prefix + "PriceBeforeOff").text(elem.price);
            if (elem.off.type === "percent")
                $("#" + prefix + "Off").text(elem.off.value + "%");
            else $("#" + prefix + "Off").text(elem.off.value + " تومان");

            $("#" + prefix + "Price").text(elem.priceAfterOff);
        } else {
            $("#" + prefix + "OffSection").addClass("hidden");
            if (!zeroAvailableCount) $("#" + prefix + "Price").text(elem.price);
        }
        if (!zeroAvailableCount)
            $("#" + prefix + "PriceParent").removeClass("hidden");

        let id = elem.id;
        var newElem = $("#sample_product_div").html();

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

function redirect(id, name) {
    window.open(HOME_API + "/product/" + id + "/" + name, "_blank");
}
