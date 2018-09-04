function saveCustomer() {
    var data = $('#form-customer-modal').serialize();

    $.ajax({
        url: "customer/store",
        method: "POST",
        data: data,
        /*success: function () {
            $(".customer").load(location.href+" .customer>*","");

            $('#form-customer-modal').each (function(){
                this.reset();
            });
            $('#customermodal').modal('hide');

        }*/

        success: function(data) {
            if($.isEmptyObject(data.error)){
                alert(data.success);
            }else{
                printErrorMsg(data.error);
            }
        }
    })


}

function printErrorMsg (msg) {
    $(".print-error-msg").find("ul").html('');
    $(".print-error-msg").css('display','block');
    $.each( msg, function( key, value ) {
        $(".print-error-msg").find("ul").append('<li>'+value+'</li>');
    });
}
});
