jQuery(document).ready(function($){
    var UserCarId = $("#order_UserCarId");
    var Produit = $("#order_produit");
    var token = $("#post_token");



    UserCarId.change(function () {
        var form = $(this.closest('form'))

        var data = {}

        data[token.attr('name')] = token.val()
        data[UserCarId.attr('name')] = UserCarId.val()

        $.post(form.attr('action'), data).then(function (response) {
            $("#order_produit").replaceWith(
                $(response).find("#order_produit")

            )

        })
    });

    $(document).on('change', '#order_produit', function (){

        //console.log($("#order_produit option:selected").val());

        if($("#order_produit option:selected").val() !== ""){
            $("#order_next1").show();

        }
        else {
            $("#order_next1").hide();

        }

    })
})