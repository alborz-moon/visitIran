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
        let id = elem.id;

        $("#" + prefix + "-img")
            .attr("src", elem.detail.img)
            .attr("alt", elem.detail.alt);
        $("#" + prefix + "-href")
            .text(elem.detail.title)
            .attr("href", elem.detail.href);

        $("#" + prefix + "-remove-btn").attr("data-id", id);

        let newElem = $("#sample-mini-cart-products").html();
        console.log(newElem);

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

$(document).ready(function () {
    $(document).on("click", ".mini-cart-product-remove", function () {
        let basket = window.localStorage.getItem("basket");

        if (basket === null || basket === undefined) return;

        basket = JSON.parse(basket);
        let wantedId = $(this).attr("data-id");

        basket = basket.filter((elem) => {
            return elem.id !== wantedId;
        });
        console.log(basket);

        window.localStorage.setItem("basket", JSON.stringify(basket));
        refreshBasket();
    });
});

function renderBasket() {
    let basket = window.localStorage.getItem("basket");

    if (basket === null || basket === undefined) {
        $("#full_basket_count_items").empty().append("0 کالا");
        $("#full_basket_items").empty();
        return;
    }

    basket = JSON.parse(basket);
    let prefix = "full-basket-item";
    let html = "";

    basket.forEach((elem) => {
        $("#" + prefix + "-img")
            .attr("src", elem.detail.img)
            .attr("alt", elem.detail.alt);
        $("#" + prefix + "-href")
            .text(elem.detail.title)
            .attr("href", elem.detail.href);

        let id = elem.id;
        var newElem = $("#sample_full_basket_item").html();

        newElem = newElem
            .replace(prefix + "-img", prefix + "-img-" + id)
            .replace(prefix + "-href", prefix + "-href-" + id)
            .replace(prefix + "-brand", prefix + "-brand-" + id)
            .replace(prefix + "-count", prefix + "-count-" + id)
            .replace(prefix + "-price", prefix + "-price-" + id);

        html += newElem;
    });

    $("#full_basket_count_items")
        .empty()
        .append(basket.length + " کالا");
    $("#full_basket_items").empty().append(html);
}
