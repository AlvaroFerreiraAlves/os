function saveCustomer() {
    var data = $('#form-customer-modal').serialize();

    $.ajax({
        url: "customer/store",
        method: "POST",
        data: data,
    }).done(function (data) {

        if ($.isEmptyObject(data.error)) {
            printSuccessMsg(data);
            $("#form-customer-modal").trigger('reset');
            $(".customer").load(location.href + " .customer>*", "");
            $('.print-error-msg').hide();
        } else {
            printErrorMsg(data.error);
            $('.print-success-msg').hide();

        }
    })
}


function updateCustomer(id) {
    var data = $('#form-customer').serialize();

    $.ajax({
        url: "../customer/update/" + id,
        method: "PUT",
        data: data,
    }).done(function (data) {

        if ($.isEmptyObject(data.error)) {
            printSuccessMsg(data);
            $('.print-error-msg').hide();
        } else {
            printErrorMsg(data.error);
            $('.print-success-msg').hide();

        }
    })
}


function saveItem() {
    var data = $('#form-item-modal').serialize();

    $.ajax({
        url: "items/store",
        method: "POST",
        data: data,
    }).done(function (data) {

        if ($.isEmptyObject(data.error_description)) {
            printSuccessMsg(data);
            $("#form-item-modal").trigger('reset');
            $(".item").load(location.href + " .item>*", "");
            $('.print-error-msg').hide();
        } else {
            printErrorMsg(data.error_description);
            $('.print-success-msg').hide();

        }

        console.log(data.error_description);
    })
}

function updateItem(id) {
    var data = $('#form-item').serialize();

    $.ajax({
        url: "../items/update/" + id,
        method: "PUT",
        data: data,
    }).done(function (data) {

        if ($.isEmptyObject(data.error_description)) {
            printSuccessMsg(data);
            $('.print-error-msg').hide();
        } else {
            printErrorMsg(data.error_description);
            $('.print-success-msg').hide();

        }

        console.log(data.error_description);
    })
}

function printErrorMsg(msg) {
    $(".print-error-msg").find("ul").html('');
    $(".print-error-msg").css('display', 'block');
    $.each(msg, function (key, value) {
        $(".print-error-msg").find("ul").append('<li>' + value + '</li>');
    });
}

function printSuccessMsg(msg) {
    $(".print-success-msg").find("ul").html('');
    $(".print-success-msg").css('display', 'block');
    $(".print-success-msg").find("ul").append('<li>' + msg + '</li>');

}

function hideMessage() {
    $('.print-error-msg').hide();
    $('.print-success-msg').hide();
}
