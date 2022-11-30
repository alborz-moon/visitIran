function getCities(stateId, selectedCity = undefined) {
    if (stateId == 0) {
        $("#city02").empty();
        return;
    }
    $.ajax({
        type: "get",
        url: GET_CITIES_URL,
        data: {
            state_id: stateId,
        },
        success: function (res) {
            initialing = false;

            if (res.status !== "ok") {
                $("#city02").empty();
                return;
            }
            let html = '<option value="0">انتخاب کنید</option>';
            res.data.forEach((elem) => {
                if (selectedCity !== undefined && elem.id === selectedCity)
                    html +=
                        '<option selected value="' +
                        elem.id +
                        '">' +
                        elem.name +
                        "</option>";
                else
                    html +=
                        '<option value="' +
                        elem.id +
                        '">' +
                        elem.name +
                        "</option>";
            });
            $("#city02").empty().append(html);
        },
    });
}
