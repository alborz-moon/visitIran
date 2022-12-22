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

function checkInputs(required_list) {
    let isValid = true;

    required_list.forEach((elem) => {
        let tmpVal = $("#" + elem).val();
        if (tmpVal.length == 0) {
            $("#" + elem)
                .addClass("errEmpty")
                .removeClass("haveValue");
            isValid = false;
        } else if (tmpVal.length > 0) {
            $("#" + elem)
                .addClass("haveValue")
                .removeClass("errEmpty");
        }
    });

    return isValid;
}

function checkSelect(required_list_Select) {
    let isValid = true;

    required_list_Select.forEach((elem) => {
        let tmpVal = $("#" + elem).val();
        if (tmpVal === undefined || tmpVal === null || tmpVal == 0) {
            $("#select2-" + elem + "-container")
                .addClass("errEmpty")
                .removeClass("haveValue");
            isValid = false;
        } else if (tmpVal.length > 0) {
            $("#select2-" + elem + "-container")
                .addClass("haveValue")
                .removeClass("errEmpty");
        }
    });

    return isValid;
}

function checkArr(required_Arr, Arr) {
    let isValid = true;

    for (let i = 0; i < required_Arr.length; i++) {
        let elem = required_Arr[i];
        if (Arr[i].length == 0) {
            $("#select2-" + elem + "-container")
                .addClass("errEmpty")
                .removeClass("haveValue");
            isValid = false;
        } else if (Arr[i].length > 0) {
            $("#select2-" + elem + "-container")
                .addClass("haveValue")
                .removeClass("errEmpty");
        }
    }

    return isValid;
}

$(document).ready(function () {
    $("input").on("keypress", function () {
        if (
            $(this).attr("data-editable") !== undefined &&
            $(this).attr("data-editable") == "false"
        ) {
            return false;
        }
    });
    $("textarea").on("keypress", function () {
        if (
            $(this).attr("data-editable") !== undefined &&
            $(this).attr("data-editable") == "false"
        ) {
            return false;
        }
    });

    $(".toggle-editable-btn").on("click", function () {
        let id = $(this).attr("data-input-id");
        if ($("#" + id).attr("data-editable") == "false")
            $("#" + id).attr("data-editable", "true");
        else $("#" + id).attr("data-editable", "false");
    });
});
