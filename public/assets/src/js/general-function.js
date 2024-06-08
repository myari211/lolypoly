$(document).ready(function () {
    // $('.select2').select2();
    transactionStatus();
    shippingStatus();
    transactionStatusCheck();
    setInterval(function () {
        transactionStatus();
        shippingStatus();
        transactionStatusCheck();
    }, 30000);
    if ($("#checkout-page").length < 1) {
        if ($(".login-page").length < 1) {
            $(".select2").select2({
                dropdownParent: $("#modalAdd .modal-content"),
            });
            $(".select2-default").select2();
            $(".select2-multiple").select2();
            $(".select2-icon").select2({
                width: "100%",
                templateSelection: iformat,
                templateResult: iformat,
                allowHtml: true,
            });
            $(".summernote").summernote({
                tabsize: 2,
                height: 150,
                toolbar: [
                    // [groupName, [list of button]]
                    ["style", ["bold", "italic", "underline", "clear"]],
                    ["font", ["strikethrough", "superscript", "subscript"]],
                    ["fontsize", ["fontsize"]],
                    ["color", ["color"]],
                    ["para", ["ul", "ol", "paragraph"]],
                    ["height", ["height"]],
                ],
            });
        }
    }
    function iformat(icon) {
        var originalOption = icon.element;
        return $(
            '<span><i class="' +
                $(originalOption).data("iconclass") +
                " " +
                $(originalOption).data("iconname") +
                '"></i> ' +
                icon.text +
                "</span>"
        );
    }

    $("#filter_date")
        .dateRangePicker({
            language: "id",
            format: "DD-MM-YYYY",
            maxDays: 90,
            autoClose: true,
            monthSelect: true,
            yearSelect: true,
            separator: " - ",
            endDate: moment().format("DD-MM-YYYY"),
        })
        .bind("datepicker-change", function (event, obj) {
            // console.log("date",obj);
            var format = "YYYY-MM-DD";
            var start_date = obj.date1;
            var end_date = obj.date2;
            start_date = moment(start_date).format(format);
            end_date = moment(end_date).format(format);
            $("#filter_start_date").val(start_date);
            $("#filter_end_date").val(end_date);
        });
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

function transactionStatus() {
    var baseUrl = window.location.protocol + "//" + window.location.host;
    if (window.location.host == "lolypoly.co.id") {
        var url = baseUrl + "/public/paymentStatus";
    } else {
        var url = baseUrl + "/paymentStatus";
    }
    $.ajax({
        url: url,
        type: "GET",
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        // data: dataForm,
        dataType: "JSON",
        contentType: false,
        cache: false,
        processData: false,
        success: function success(result) {
            // console.log("paymentStatus : OK!");
        },
        error: function error(result) {
            // console.log("paymentStatus : FAIL!");
        },
    });
}

function transactionStatusCheck() {
    var baseUrl = window.location.protocol + "//" + window.location.host;
    if (window.location.host == "lolypoly.co.id") {
        var url = baseUrl + "/public/paymentStatusUpdate";
    } else {
        var url = baseUrl + "/paymentStatusUpdate";
    }
    $.ajax({
        url: url,
        type: "GET",
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        // data: dataForm,
        dataType: "JSON",
        contentType: false,
        cache: false,
        processData: false,
        success: function success(result) {
            // console.log("paymentStatusUpdate : OK!");
        },
        error: function error(result) {
            // console.log("paymentStatusUpdate : FAIL!");
        },
    });
}

function shippingStatus() {
    var baseUrl = window.location.protocol + "//" + window.location.host;
    if (window.location.host == "lolypoly.co.id") {
        var url = baseUrl + "/public/checkOrder";
    } else {
        var url = baseUrl + "/checkOrder";
    }
    $.ajax({
        url: url,
        type: "GET",
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        // data: dataForm,
        dataType: "JSON",
        contentType: false,
        cache: false,
        processData: false,
        success: function success(result) {
            // console.log("checkOrder : OK!");
        },
        error: function error(result) {
            // console.log("checkOrder : FAIL!");
        },
    });
}

function checkValidation(params) {
    var id_form = "#" + $(params).attr("id");
    var total = $(id_form + " .form-control").length;
    var pass = 1;
    $("input").removeClass("is-invalid");
    $("input").removeClass("invalid-error");
    $("textarea").removeClass("is-invalid");
    $("textarea").removeClass("invalid-error");
    $("span").removeClass("is-invalid");
    $("span").removeClass("invalid-error");
    $("div").removeClass("is-invalid");
    $("div").removeClass("invalid-error");
    $(params).parent().find("span.invalid-feedback").remove();

    $(id_form + " .form-control").each(function (index) {
        var id_ele = this.id;
        console.log(id_ele);
        var class_ele = $("#" + id_ele).attr("class");
        var validation = $("#" + id_ele).attr("data-validation");
        if ($("#" + id_ele).val() == "" && validation == "required") {
            if (class_ele.includes("select2")) {
                var ele = $("#select2-" + id_ele + "-container")
                    .parent()
                    .parent()
                    .parent()
                    .first();
            } else {
                var ele = $("#" + id_ele);
            }

            $(ele).addClass("is-invalid");
            $(ele).addClass("invalid-error");
            var msg = $('label[for="' + id_ele + '"]').text() + " Harus diisi";
            $(ele).after(
                "<span class='error invalid-feedback'>" + msg + "</span>"
            );

            if (index === 0) {
                $("#" + id_ele).focus();
            }
            pass = 0;
        }
    });
    return pass;
}

function resetForm(params) {
    params[0].reset();
    $("#id").val("");
    $(".select2").val("").trigger("change");
    $(".select2-modal").val("").trigger("change");

    $("input").removeClass("is-invalid");
    $("input").removeClass("invalid-error");
    $("textarea").removeClass("is-invalid");
    $("textarea").removeClass("invalid-error");
    $("span").removeClass("is-invalid");
    $("span").removeClass("invalid-error");
    $("div").removeClass("is-invalid");
    $("div").removeClass("invalid-error");
    $(params).parent().find("span.invalid-feedback").remove();
}

function swalClose() {
    $(".swal2-container").remove();
}

function swalSuccess(result) {
    Swal.fire({
        title: "Berhasil",
        html: result.message,
        icon: "success",
        allowOutsideClick: false,
        confirmButtonColor: "#4395d1",
    });
}

function swalSuccessRedirect(result) {
    var redirectTo = result.redirectTo;
    Swal.fire({
        title: "Berhasil",
        html: result.message,
        icon: "success",
        allowOutsideClick: false,
        confirmButtonColor: "#4395d1",
    }).then(function (result) {
        window.location.href = redirectTo;
    });
}

function swalSuccessReload(result) {
    Swal.fire({
        title: "Berhasil",
        html: result.message,
        icon: "success",
        allowOutsideClick: false,
        confirmButtonColor: "#4395d1",
    }).then(function (result) {
        location.reload();
    });
}

function swalSuccessHideModal(result) {
    Swal.fire({
        title: "Berhasil",
        html: result.message,
        icon: "success",
        allowOutsideClick: false,
        confirmButtonColor: "#4395d1",
    }).then(function (result) {
        table.draw();
        $("#modalAdd").modal("hide");
    });
}

function swalWarning(result) {
    if (result.error_message) {
        $.each(result.error_message, function (key, val) {
            var id_ele = key;
            var ele = $("#" + id_ele);
            $(ele).addClass("is-invalid");
            $(ele).addClass("invalid-error");
            var msg = val;
            $(ele).after(
                "<span class='error invalid-feedback'>" + msg + "</span>"
            );
            $("#" + id_ele).focus();
        });
    }
    Swal.fire({
        title: "Gagal",
        html: result.message,
        icon: "warning",
        allowOutsideClick: false,
        confirmButtonColor: "#4395d1",
    });
}

function swalWarningRedirect(result) {
    if (result.error_message) {
        $.each(result.error_message, function (key, val) {
            var id_ele = key;
            var ele = $("#" + id_ele);
            $(ele).addClass("is-invalid");
            $(ele).addClass("invalid-error");
            var msg = val;
            $(ele).after(
                "<span class='error invalid-feedback'>" + msg + "</span>"
            );
            $("#" + id_ele).focus();
        });
    }
    var redirectTo = result.redirectTo;
    Swal.fire({
        title: "Gagal",
        html: result.message,
        icon: "warning",
        allowOutsideClick: false,
        confirmButtonColor: "#4395d1",
    }).then(function (result) {
        window.location.href = redirectTo;
    });
}

$("#modalAdd").on("hidden.bs.modal", function () {
    resetForm($("#submit-form"));
    resetForm($("#submit-form-register"));
    resetForm($("#submit-form-variant"));
});
// SUBMIT FORM
$(".btn-submit").click(function (e) {
    e.preventDefault();
    var url = $(this).data("action");
    $("#submit-form").attr("action", url);
    $("#submit-form").submit();
});
$("#submit-form").submit(function (e) {
    e.preventDefault();
    var url = $(this).attr("action");
    var dataForm = new FormData(this);
    var vaildation = checkValidation(this);
    if (vaildation > 0) {
        submitForm(url, dataForm);
    }
});

$("#submit-form-variant").submit(function (e) {
    e.preventDefault();
    var url = $(this).attr("action");
    var dataForm = new FormData(this);
    var vaildation = checkValidation(this);
    if (vaildation > 0) {
        submitForm(url, dataForm);
    }
});

$("#submit-form-register").submit(function (e) {
    e.preventDefault();
    var url = $(this).attr("action");
    var dataForm = new FormData(this);
    var vaildation = checkValidation(this);
    if (vaildation > 0) {
        submitForm(url, dataForm);
    }
});
$("#submit-form-forgot-password").submit(function (e) {
    e.preventDefault();
    var url = $(this).attr("action");
    var dataForm = new FormData(this);
    var vaildation = checkValidation(this);
    if (vaildation > 0) {
        submitForm(url, dataForm);
    }
});
$("#change-password-form").submit(function (e) {
    e.preventDefault();
    var url = $(this).attr("action");
    var dataForm = new FormData(this);
    var vaildation = checkValidation(this);
    if (vaildation > 0) {
        submitForm(url, dataForm);
    }
});

function submitForm(url, dataForm) {
    $.ajax({
        url: url,
        type: "POST",
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        data: dataForm,
        dataType: "JSON",
        contentType: false,
        cache: false,
        processData: false,
        beforeSend: function beforeSend() {
            Swal.showLoading();
        },
        success: function success(result) {
            if (result.code == 200) {
                if (result.redirectTo != "") {
                    if (result.redirectTo == "reload") {
                        swalSuccessReload(result);
                    } else if (result.redirectTo == "modalAdd") {
                        swalSuccessHideModal(result);
                    } else {
                        swalSuccessRedirect(result);
                    }
                    // swalSuccess(result);
                } else {
                    swalSuccess(result);
                }
            } else {
                if (typeof result.redirectTo === "undefined") {
                    swalWarning(result);
                } else {
                    if (result.redirectTo != "") {
                        swalWarningRedirect(result);
                    } else {
                        swalWarning(result);
                    }
                }
            }
        },
        error: function error(result) {
            Swal.fire({
                icon: "error",
                title: "Oops...",
                text: "Terjadi Kesalahan!",
            });
        },
    });
}
// SUBMIT FORM

// EDIT FORM
$(document).on("click", ".edit-button", function () {
    var id = $(this).data("id");
    var url = $(this).data("url");
    if ($(".btn-startcall").length > 0) {
        $(".btn-startcall").fadeIn();
    }
    $.ajax({
        url: url,
        type: "GET",
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        // data: dataForm,
        dataType: "JSON",
        contentType: false,
        cache: false,
        processData: false,
        beforeSend: function beforeSend() {
            Swal.showLoading();
        },
        success: function success(result) {
            if (result.code == 200) {
                $.each(result.data, function (key, val) {
                    var check_arr = Array.isArray(val);

                    if (check_arr) {
                        $.each(val, function (k, v) {
                            var ele = $("#" + key + "_" + v);
                            var check_ele = ele.length;
                            if (check_ele > 0) {
                                var type_ele = ele.attr("type");
                                if (type_ele == "checkbox") {
                                    ele.prop("checked", true);
                                }
                            }
                        });
                    } else {
                        var ele = $("#" + key);
                        var check_ele = ele.length;
                        if (check_ele > 0) {
                            var check_text = ele.hasClass("edit-text");
                            if (check_text) {
                                ele.text(val);
                            } else {
                                var check_select2 = ele.hasClass("select2");
                                if (check_select2) {
                                    ele.val(val).trigger("change");
                                } else {
                                    ele.val(val);
                                }
                            }
                        }
                    }
                });
                $("#modalAdd").modal("show");
                Swal.close();
            } else {
                swalWarning(result);
            }
        },
        error: function error(result) {
            Swal.fire({
                icon: "error",
                title: "Oops...",
                text: "Terjadi Kesalahan!",
            });
        },
    });
});
// EDIT FORM

// DELETE DATA
$(document).on("click", ".delete-button", function (e) {
    var dataId = $(this).data("id");
    var url = $(this).data("url");
    Swal.fire({
        title: "Apakah Anda yakin?",
        text: "Data yang sudah terhapus tidak dapat dikembalikan.",
        icon: "warning",
        showCancelButton: true,
        confirmButtonText: "Ya, Hapus",
        cancelButtonText: "Batal",
        reverseButtons: true,
    }).then(function (result) {
        if (result.isConfirmed) {
            $.ajax({
                type: "DELETE",
                url: url,
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                        "content"
                    ),
                },
                beforeSend: function beforeSend() {
                    Swal.showLoading();
                },
                success: function success(data) {
                    swalSuccessReload(data);
                },
                error: function error(eventError, textStatus, errorThrown) {
                    Swal.fire({
                        title: eventError,
                        html: errorThrown,
                        icon: "error",
                        allowOutsideClick: false,
                    });
                },
            });
        }
    });
});
// DELETE DATA

// SUBMIT SETTING
$(document).on("click", ".tab-form", function (e) {
    e.preventDefault();
    var id_form = $(this).data("form");
    $("#btn-submit-form").data("form", id_form);
});

$(document).on("click", "#btn-submit-form", function (e) {
    e.preventDefault();
    var id_form = $(this).data("form");
    // console.log(id_form);
    $("#" + id_form).submit();
});

$(document).ready(function () {
    $("#form-general").submit(function (e) {
        e.preventDefault();
        var url = $(this).attr("action");
        submitForm(url, new FormData(this));
    });
    $("#form-home").submit(function (e) {
        e.preventDefault();
        var url = $(this).attr("action");
        submitForm(url, new FormData(this));
    });
    $("#form-aboutus").submit(function (e) {
        e.preventDefault();
        var url = $(this).attr("action");
        submitForm(url, new FormData(this));
    });
});
// SUBMIT SETTING

$(document).on("click", "#reset-filter", function (e) {
    e.preventDefault();
    var id_form = $(this).data("form");
    $("#" + id_form)[0].reset();
    $(".select2-default").val("").trigger("change");
});

$("#modalDaftar").click(function (e) {
    e.preventDefault();
    $("#loginModal").modal("hide");
    $("#registerModal").modal("show");
});
$(".modalMasuk").click(function (e) {
    e.preventDefault();
    $("#loginModal").modal("show");
    $("#registerModal").modal("hide");
});

$("#province_id").change(function (e) {
    var url = $(this).data("url");
    $.ajax({
        url: url,
        type: "GET",
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        // data: dataForm,
        dataType: "JSON",
        contentType: false,
        cache: false,
        processData: false,
        beforeSend: function beforeSend() {
            Swal.showLoading();
        },
        success: function success(result) {
            if (result.code == 200) {
                $("#city").append(
                    $("<option></option>")
                        .prop("value", "")
                        .text("-- Choose City --")
                );
                $.each(result.data, function (key, val) {
                    $("#city").append(
                        $("<option></option>")
                            .prop("value", val.id)
                            .text(val.name)
                    );
                });
                Swal.close();
            } else {
                swalWarning(result);
            }
        },
        error: function error(result) {
            Swal.fire({
                icon: "error",
                title: "Oops...",
                text: "Terjadi Kesalahan!",
            });
        },
    });
    $.ajax({
        url: baseUrl + "/getCities/" + $(_this).val(),
        type: "GET",
        dataType: "JSON",
        success: function success(result) {
            if (result.metaData.code == 200) {
                $("#city").empty().prop("disabled", false);
                $("#city").append(
                    $("<option></option>")
                        .prop("value", "")
                        .text("-- Choose City --")
                );
                $.each(result.response, function (key, value) {
                    $("#city").append(
                        $("<option></option>")
                            .prop("value", value.id)
                            .text(value.name)
                    );
                });
            }
        },
    });
});

$(".btn-product-type").click(function (e) {
    e.preventDefault();
    $(".btn-product-type").removeClass("active");
    $("#btn-add-to-cart").prop("disabled", true);
    $("#btn-buy").prop("disabled", true);
    $("#product_type_id").val("");
    $("#product_variant_id").val("");
    $("#list_product_variant").empty();
    var id = $(this).data("id");
    var url = $(this).data("url");
    $(this).addClass("active");
    $("#priceProduct").html(formatRupiah($(this).data("price")));
    $.ajax({
        url: url,
        type: "GET",
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        // data: dataForm,
        dataType: "JSON",
        contentType: false,
        cache: false,
        processData: false,
        beforeSend: function beforeSend() {
            $("#list_product_variant").html(bootstrapCenterLoading());
        },
        success: function success(result) {
            if (result.code == 200) {
                $("#product_type_id").val(id);
                console.log(result);
                if (result.data.length) {
                    var html = "<h4>Warna</h4>";
                    html += '<div class="d-flex flex-wrap">';
                    $.each(result.data, function (key, val) {
                        html +=
                            '<h4 class="border rounded my-3 me-2 p-3 btn-product-variant" data-id="' +
                            val.id +
                            '" data-price="' +
                            val.price +
                            '" role="button"><b> ' +
                            val.title +
                            " </b></h4>";
                    });
                    html += "</div>";
                    $("#list_product_variant").html(html);
                } else {
                    $("#list_product_variant").html("");
                    $("#btn-add-to-cart").prop("disabled", false);
                    $("#btn-buy").prop("disabled", false);
                }
                Swal.close();
            } else {
                swalWarning(result);
            }
        },
        error: function error(result) {
            Swal.fire({
                icon: "error",
                title: "Oops...",
                text: "Terjadi Kesalahan!",
            });
        },
    });
});
$("#list_product_variant").on("click", ".btn-product-variant", function () {
    var id = $(this).data("id");
    $(".btn-product-variant").removeClass("active");
    $("#btn-add-to-cart").prop("disabled", false);
    $("#btn-buy").prop("disabled", false);
    $("#product_variant_id").val(id);
    $(this).addClass("active");
    $("#priceProduct").html(formatRupiah($(this).data("price")));
});

$("#add-to-cart").submit(function (e) {
    e.preventDefault();
    var url = $(this).attr("action");
    var dataForm = new FormData(this);
    submitForm(url, dataForm);
});

$("#btn-buy").click(function (e) {
    e.preventDefault();
    if ($(this).data("session") > 0) {
        if ($(this).data("address") > 0) {
            Swal.fire({
                title: "Apakah Anda Yakin Ingin Membeli Produk Ini ?",
                text: "Jika Ya, product yang ada dicart anda akan hilang!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "YA",
                cancelButtonText: "TIDAK",
            }).then((result) => {
                if (result.isConfirmed) {
                    Swal.showLoading();
                    var dataObj = {
                        product_stock: $("#product_stock").val(),
                        product_id: $("#product_id").val(),
                        product_variant_id: $("#product_variant_id").val(),
                        product_type_id: $("#product_type_id").val(),
                    };
                    var jsonData = JSON.stringify(dataObj);
                    var encodedData = btoa(jsonData);
                    $("#id_encode").val(encodedData);
                    setTimeout($("#submit-form-buy").submit(), 3000);
                }
            });
        } else {
            var baseUrl =
                window.location.protocol + "//" + window.location.host;
            if (window.location.host == "lolypoly.co.id") {
                var redirectTo = baseUrl + "/public/account";
            } else {
                var redirectTo = baseUrl + "/account";
            }
            Swal.fire({
                title: "Gagal",
                html: "Silahkan Input Alamat Terlebih Dahulu.",
                icon: "warning",
                allowOutsideClick: false,
                confirmButtonColor: "#4395d1",
            }).then(function (result) {
                window.location.href = redirectTo;
            });
        }
    } else {
        Swal.fire({
            title: "Gagal",
            html: "Silahkan Login Terlebih Dahulu!",
            icon: "warning",
            allowOutsideClick: false,
            confirmButtonColor: "#4395d1",
        });
    }
});

$(".plus").click(function () {
    if ($(".value").text() * 1 < $(this).data("max")) {
        $(".value").text($(".value").text() * 1 + 1);
        var stock = $(".value").text();
        $("#product_stock").val(stock);
    }
});
$(".minus").click(function () {
    if ($(".value").text() * 1 > 1) {
        $(".value").text($(".value").text() - 1);
        var stock = $(".value").text();
        $("#product_stock").val(stock);
    }
});

$(".cart-delete").click(function () {
    var url = $(this).data("url");
    var id = $(this).data("id");
    var product_id = $("#product_id_" + id).val();
    var product_variant_id = $("#product_variant_id_" + id).val();
    var product_type_id = $("#product_type_id_" + id).val();
    var thisValue = $(".cart-stock#" + id + "");
    var qty_new = thisValue.text() * 1 + 1;
    var dataForm = {
        product_id: product_id,
        product_variant_id: product_variant_id,
        product_stock: qty_new,
        product_type_id: product_type_id,
    };
    cartTotal(dataForm, url).then(function (result) {
        if (result.code == 200) {
            var cartItem = Object.keys(result.data).length;
            $("#cartCounter").text(cartItem);
            $(".cart-item-" + id + "").remove();
        }
    });
});

$(".cart-plus").click(function () {
    var url = $(this).data("url");
    var id = $(this).data("id");
    var product_id = $("#product_id_" + id).val();
    var product_variant_id = $("#product_variant_id_" + id).val();
    var product_type_id = $("#product_type_id_" + id).val();
    var thisValue = $(".cart-stock#" + id + "");
    var qty_new = thisValue.text() * 1 + 1;
    var dataForm = {
        product_id: product_id,
        product_variant_id: product_variant_id,
        product_stock: qty_new,
        product_type_id: product_type_id,
    };
    if ($(this).data("max") >= qty_new) {
        thisValue.text(qty_new);
        thisValue.data("value", thisValue.text() * 1);
        cartTotal(dataForm, url);
    }
});

$(".cart-minus").click(function () {
    var url = $(this).data("url");
    var id = $(this).data("id");
    var product_id = $("#product_id_" + id).val();
    var product_variant_id = $("#product_variant_id_" + id).val();
    var product_type_id = $("#product_type_id_" + id).val();
    var thisValue = $(".cart-stock#" + id + "");
    cartTotal(dataForm, url);

    var thisValue = $(".cart-stock#" + id + "");
    if (thisValue.text() * 1 > 1) {
        var qty_new = thisValue.text() - 1;
        var dataForm = {
            product_id: product_id,
            product_variant_id: product_variant_id,
            product_stock: qty_new,
            product_type_id: product_type_id,
        };
        cartTotal(dataForm, url);
        thisValue.text(thisValue.text() - 1);
        thisValue.data("value", thisValue.text() * 1);
    }
});

function cartTotal(dataForm, url) {
    return $.ajax({
        url: url,
        type: "POST",
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
        data: dataForm,
        // dataType: "JSON",
        // contentType: false,
        // cache: false,
        // processData: false,
        beforeSend: function beforeSend() {
            Swal.showLoading();
        },
        success: function success(result) {
            if (result.code == 200) {
                Swal.close();
                $("#cart_total").text(result.data.total);
            } else {
                swalWarning(result);
            }
        },
        error: function error(result) {
            Swal.fire({
                icon: "error",
                title: "Oops...",
                text: "Terjadi Kesalahan!",
            });
        },
    });
}

function getFormData($form) {
    var unindexed_array = $form.serializeArray();
    var indexed_array = {};
    $.map(unindexed_array, function (n, i) {
        indexed_array[n["name"]] = n["value"];
    });
    return indexed_array;
}
function formatRupiah(number) {
    const formatter = new Intl.NumberFormat("id-ID", {
        style: "currency",
        currency: "IDR",
        minimumFractionDigits: 0,
        maximumFractionDigits: 0,
    });

    return formatter.format(number);
}

// COPY FORM
$(document).on("click", ".copy-button", function () {
    var url = $(this).data("url");
    var $temp = $("<input>");
    $("body").append($temp);
    $temp.val(url).select();
    document.execCommand("copy");
    $temp.remove();
});
// COPY FORM

$(document).ready(function(){
    $('.carousel').slick({
    slidesToShow: 3,
    dots:true,
    centerMode: true,
    });
  });
  