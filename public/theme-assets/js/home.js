function renderProductSlider(data, prefix) {
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
            '\')" class="cursorPointer">' +
            newElem +
            "</div>";
    });

    return html;
}

function redirect(id, name) {
    window.open(productPrefixRoute + "/" + id + "/" + name, "_blank");
}
