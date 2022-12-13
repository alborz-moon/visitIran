function setProductVals(prefix, elem) {
    $("#" + prefix + "Img")
        .attr("src", elem.img)
        .attr("alt", elem.alt);

    $("#" + prefix + "Header").text(elem.name);

    if (elem.category !== "") {
        $("#" + prefix + "Tag").removeClass("hidden");
        $("#" + prefix + "Tag").text(elem.category);
    } else {
        $("#" + prefix + "Tag").addClass("hidden");
    }

    if (elem.seller !== "" && elem.seller != null) {
        $("#" + prefix + "SellerParent").removeClass("hidden");
        $("#" + prefix + "Seller").text(elem.seller);
    } else {
        $("#" + prefix + "SellerParent").addClass("hidden");
        $("#" + prefix + "Seller").text("");
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

        if (zeroAvailableCount) {
            $("#" + prefix + "AvailableJust").addClass("hidden");
            $("#" + prefix + "FinishAvailable").removeClass("hidden");
        } else {
            $("#" + prefix + "AvailableJust").removeClass("hidden");
            $("#" + prefix + "FinishAvailable").addClass("hidden");
        }
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
}

function setEventVals(prefix, elem) {
    $("#" + prefix + "Img")
        .attr("src", elem.img)
        .attr("alt", elem.alt);
    $("#" + prefix + "Header").text(elem.name);
    $("#" + prefix + "Header2").text(elem.name);
    $("#" + prefix + "Tag").text(elem.category);

    if (elem.place !== "") {
        $("#" + prefix + "LauncherParent").removeClass("hidden");
        $("#" + prefix + "Launcher").text(elem.place);
    }
    if (elem.launcher2 !== "") {
        $("#" + prefix + "LauncherParent2").removeClass("hidden");
        $("#" + prefix + "Launcher2").text(elem.launcher);
    }

    let starHtml = "";

    for (let i = 0; i < 5 - elem.rate; i++)
        starHtml += '<i class="icon-visit-staroutline"></i>';

    for (let i = 0; i < elem.rate; i++)
        starHtml += '<i class="icon-visit-star"></i>';

    $("#" + prefix + "Rate")
        .empty()
        .append(starHtml);

    let zeroCapacity = false;

    if (elem.is_in_critical) {
        $("#" + prefix + "CriticalCount").text(elem.capacity);
        if (elem.capacity == 0) zeroCapacity = true;
        $("#" + prefix + "Critical").removeClass("invisible");
        if (zeroCapacity) $("#" + prefix + "Critical").text("اتمام ظرفیت");
    } else $("#" + prefix + "Critical").addClass("invisible");

    if (elem.off != null && !zeroCapacity) {
        $("#" + prefix + "OffSection").removeClass("hidden");
        $("#" + prefix + "PriceBeforeOff").text(elem.price);
        if (elem.off.type === "percent")
            $("#" + prefix + "Off").text(elem.off.value + "%");
        else $("#" + prefix + "Off").text(elem.off.value + " تومان");

        $("#" + prefix + "Price").text(elem.priceAfterOff);
    } else {
        $("#" + prefix + "OffSection").addClass("hidden");
        if (!zeroCapacity) $("#" + prefix + "Price").text(elem.price);
    }
    if (!zeroCapacity) $("#" + prefix + "PriceParent").removeClass("hidden");
}

function renderProductSlider(data, prefix) {
    let html = "";
    if (data === undefined) return "";

    data.forEach((elem) => {
        setProductVals(prefix, elem);

        let id = elem.id;
        var newElem = $("#" + prefix + "sSample").html();

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
            '\')" class="cursorPointer swiper-slide customBox customWidthBox">' +
            newElem +
            "</div>";
    });

    return html;
}

function renderEventSlider(data, prefix) {
    let html = "";
    if (data === undefined) return "";

    data.forEach((elem) => {
        setEventVals(prefix, elem);

        let id = elem.id;
        var newElem = $("#" + prefix + "sSample").html();

        newElem = newElem
            .replace(prefix + "Img", prefix + "Img_" + id)
            .replace(prefix + "Header", prefix + "Header_" + id)
            .replace(prefix + "Header2", prefix + "Header2_" + id)
            .replace(prefix + "Tag", prefix + "Tag_" + id)
            .replace(prefix + "Critical", prefix + "Critical_" + id)
            .replace(prefix + "CriticalCount", prefix + "CriticalCount_" + id)
            .replace(prefix + "Rate", prefix + "Rate_" + id);

        html +=
            "<div onclick=\"redirect('" +
            id +
            "', '" +
            elem.slug +
            '\')" class="cursorPointer swiper-slide customBox customEventWidthBox">' +
            newElem +
            "</div>";
    });

    return html;
}

function redirect(id, name) {
    window.open(productPrefixRoute + "/" + id + "/" + name, "_blank");
}

function event_redirect(id, name) {
    window.open(eventPrefixRoute + "/" + id + "/" + name, "_blank");
}
