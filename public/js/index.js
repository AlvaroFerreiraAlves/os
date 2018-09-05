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
           $(".customer").load(location.href+" .customer>*","");
           $('.print-error-msg').hide();
        } else {
            printErrorMsg(data.error);
           $('.print-success-msg').hide();

        }
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

function hideMessage(){
    $('.print-error-msg').hide();
    $('.print-success-msg').hide();
}
