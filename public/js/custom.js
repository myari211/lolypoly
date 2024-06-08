$(document).ready(function () {


    // SEARCH BAR

    const searchBar = $("#searchBar");

    $("#searchToggle").on("click", function () {
        if (searchBar.hasClass("show")) {
            searchBar.removeClass("show");
            $(".search-bar-container").removeClass("show");
        } else {
            searchBar.addClass("show");
            $(".search-bar-container").addClass("show");
        }
    });

    $("#searchBar").submit(function (event) {
        event.preventDefault();

        var paramValue = $('input[name="name_search"]').val();

        var baseUrl = window.location.protocol + "//" + window.location.host;
        if (window.location.host == "lolypoly.co.id") {
            var url = baseUrl + "/public/shopping/all/1/";
        } else {
            var url = baseUrl + "/shopping/all/1/";
        }
        var url = url + encodeURIComponent(paramValue);
        window.location.href = url;
    });

    // CART SECTION
    const cartSection = $("#cartSection");

    $("#cartToggle").on("click", function () {
        if (cartSection.hasClass("show")) {
            cartSection.removeClass("show");
            $(".cart-overlay").addClass("dp-none");
        } else {
            cartSection.addClass("show");
            $(".cart-overlay").removeClass("dp-none");
        }
    });

    $(".cart-overlay").click(function () {
        if (cartSection.hasClass("show")) {
            cartSection.removeClass("show");
            $(".cart-overlay").addClass("dp-none");
        } else {
            cartSection.addClass("show");
            $(".cart-overlay").removeClass("dp-none");
        }
    });

    $("#addButton").on("click", function () {
        modifyData(2, 5);
    });

    $("#subtractButton").on("click", function () {
        modifyData(3, -10);
    });

    function modifyData(id, value) {
        $(".myClass").each(function () {
            var dataId = $(this).data("id");
            var dataValue = parseInt($(this).data("value"));

            if (dataId == id) {
                // Add or subtract the value
                var newDataValue = dataValue + value;
                $(this).data("value", newDataValue);
                console.log(
                    "Modified data-value of data-id " +
                        id +
                        " to " +
                        newDataValue
                );
                return false; // Exit the loop since we found the element
            }
        });
    }

    // NAVBAR RESIZE

    $(window).on("resize", function () {
        var icons = $(".navbar-icon");

        icons.each(function () {
            var textSpan = $(this).find(".text");
            var iconSpan = $(this).find(".icon");

            if ($(window).width() <= 768) {
                textSpan.css("display", "inline");
                iconSpan.css("display", "none");
            } else {
                textSpan.css("display", "none");
                iconSpan.css("display", "inline");
            }
        });
    });

    // Trigger the resize event on page load
    $(window).trigger("resize");

    // INPUT MASK
    $(".numeric-mask").inputmask({
        alias: "integer",
        integerDigits: 5,
        allowMinus: false,
        placeholder: "",
        shortcuts: null,
        min: 0,
        groupSeparator: ".",
        autoGroup: true,
        autoUnmask: true,
        rightAlign: false,
        max: 99999999999999999999,
    });
    $(".numeric-mask-month").inputmask({
        alias: "integer",
        integerDigits: 5,
        allowMinus: false,
        placeholder: "",
        shortcuts: null,
        min: 0,
        max: 99,
    });
    $(".decimal-mask").inputmask({
        alias: "decimal",
        integerDigits: 5,
        digits: 2,
        allowMinus: false,
        digitsOptional: false,
        placeholder: "0",
        min: 0,
        max: 100,
    });
    $(".decimal-mask-four").inputmask({
        alias: "decimal",
        integerDigits: 5,
        digits: 4,
        allowMinus: false,
        digitsOptional: false,
        placeholder: "0",
        min: 0,
        max: 100,
    });
});

function getProvinsiData(destination, param) {
    var baseUrl = window.location.protocol + "//" + window.location.host;
    if (window.location.host == "lolypoly.co.id") {
        var url = baseUrl + "/public/area/provinsi";
    } else {
        var url = baseUrl + "/area/provinsi";
    }
    $.ajax({
        url: url,
        type: "POST",
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        data: param,
        dataType: "JSON",
        beforeSend: function beforeSend() {
            $(destination).find("option").remove();
            $(destination)
                .append(
                    '<option value="" disabled selected>Pilih Provinsi</option>'
                )
                .prop("disabled", true);
        },
        success: function success(result) {
            result.data.forEach(function (data) {
                var option =
                    '<option value="' +
                    data.provinsi_id +
                    '">' +
                    capitalizeFirstLetter(data.provinsi_name) +
                    "</option>";
                $(destination).append(option);
            });
            $(destination).prop("disabled", false);
        },
        error: function error(result) {
            console.log(result);
        },
    });
}
function getKabupatenKotaData(destination, param) {
    var baseUrl = window.location.protocol + "//" + window.location.host;
    if (window.location.host == "lolypoly.co.id") {
        var url = baseUrl + "/public/area/kabupaten-kota";
    } else {
        var url = baseUrl + "/area/kabupaten-kota";
    }
    $.ajax({
        method: "POST",
        url: url,
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        data: param,
        dataType: "JSON",
        beforeSend: function beforeSend() {
            $(destination).find("option").remove();
            $(destination).append(
                '<option value="" disabled selected>Pilih Kabupaten / Kota</option>'
            );
            $(destination).prop("disabled", true);
        },
        success: function success(result) {
            result.data.forEach(function (data) {
                var option =
                    '<option value="' +
                    data.kabupaten_kota_id +
                    '">' +
                    capitalizeFirstLetter(data.kabupaten_kota_name) +
                    "</option>";
                $(destination).append(option);
            });
            $(destination).prop("disabled", false);
        },
        error: function error(result) {
            console.log(result);
        },
    });
}

function getKecamatanData(destination, param) {
    var baseUrl = window.location.protocol + "//" + window.location.host;
    if (window.location.host == "lolypoly.co.id") {
        var url = baseUrl + "/public/area/kecamatan";
    } else {
        var url = baseUrl + "/area/kecamatan";
    }
    $.ajax({
        url: url,
        type: "POST",
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        data: param,
        dataType: "JSON",
        beforeSend: function beforeSend() {
            $(destination).find("option").remove();
            $(destination).append(
                '<option value="" disabled selected>Pilih Kecamatan</option>'
            );
            $(destination).prop("disabled", true);
        },
        success: function success(result) {
            result.data.forEach(function (data) {
                var option =
                    '<option value="' +
                    data.kecamatan_id +
                    '">' +
                    capitalizeFirstLetter(data.kecamatan_name) +
                    "</option>";
                $(destination).append(option);
            });
            $(destination).prop("disabled", false);
        },
        error: function error(result) {
            console.log(result);
        },
    });
}
function getKelurahanDesaData(destination, param) {
    var baseUrl = window.location.protocol + "//" + window.location.host;
    if (window.location.host == "lolypoly.co.id") {
        var url = baseUrl + "/public/area/kelurahan-desa";
    } else {
        var url = baseUrl + "/area/kelurahan-desa";
    }
    $.ajax({
        url: url,
        type: "POST",
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        data: param,
        dataType: "JSON",
        beforeSend: function beforeSend() {
            $(destination).find("option").remove();
            $(destination).append(
                '<option value="" disabled selected>Pilih Kelurahan / Desa</option>'
            );
            $(destination).prop("disabled", true);
        },
        success: function success(result) {
            console.log(result);
            result.data.forEach(function (data) {
                var option =
                    '<option value="' +
                    data.kelurahan_desa_id +
                    '" data-postal="' +
                    data.kode_pos +
                    '">' +
                    capitalizeFirstLetter(data.kelurahan_desa_name) +
                    "</option>";
                $(destination).append(option);
            });
            $(destination).prop("disabled", false);
        },
        error: function error(result) {
            console.log(result);
        },
    });
}

function capitalizeFirstLetter(string) {
    return string.toLowerCase().replace(/^.|\s\S/g, function (match) {
        return match.toUpperCase();
    });
}

function bootstrapCenterLoading() {
    return (
        '<div class="d-flex justify-content-center" id="loader">' +
        '<div class="lds-ellipsis"><div></div><div></div><div></div><div></div></div>' +
        "</div>"
    );
}
