jQuery(document).ready(function($){
$(document).on('click', '#Next', function(){
    that = $(this);
    $.ajax({
        url:'/test',
        type: "POST",
        dataType: "json",
        data: {
            "Next": "Next"
        },
        async: true,
        success: function (data)
        {
            console.log(data.ok);
            $('div#ajax-results').html(data.ok);

        }
    });

    return false;

});
})