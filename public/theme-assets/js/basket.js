function refreshBasket() {
    let basket = window.localStorage.getItem("basket");

    if (basket === null || basket === undefined) {
        $("#basket-items-count").empty().append("0 کالا");
        $("#basket-items").empty();
        return;
    }

    basket = JSON.parse(basket);
    let prefix = "mini-cart-products";
    let html = "";

    basket.forEach((elem) => {
        $("#" + prefix + "-img")
            .attr("src", elem.detail.img)
            .attr("alt", elem.detail.alt);
        $("#" + prefix + "-href")
            .text(elem.detail.title)
            .attr("href", elem.detail.href);

        let id = elem.id;
        var newElem = $("#sample-mini-cart-products").html();

        newElem = newElem
            .replace(prefix + "-img", prefix + "-img-" + id)
            .replace(prefix + "-href", prefix + "-href-" + id)
            .replace(prefix + "-brand", prefix + "-brand-" + id)
            .replace(prefix + "-count", prefix + "-count-" + id)
            .replace(prefix + "-price", prefix + "-price-" + id);

        html += newElem;
    });

    $("#basket-items-count")
        .empty()
        .append(basket.length + " کالا");
    $("#basket-items").empty().append(html);
}
