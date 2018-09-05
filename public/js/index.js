function saveCustomer() {
    var data = $('#form-customer-modal').serialize();

    $.ajax({

        
        url: "customer/store",
        method: "POST",
        data: data,

    }).done(function (data) {
        console.log(data);
    })

}