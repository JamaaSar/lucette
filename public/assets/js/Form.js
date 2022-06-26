jQuery(document).ready(function($) {
var $UserCarId = $("#order_UserCarId");
var $token = $("#post_token");

$UserCarId.change(function (){
    var $form = $(this).closest('form')

    var data = {}

    data[$token.attr('name')] = $token.val()
    data[$UserCarId.attr('name')] = $UserCarId.val()

    $.post($form.attr('action'), data).then(function (response)
    {
        $("#order_produit").replaceWith(
            $(response).find("#order_produit")
        )
    })
})
});