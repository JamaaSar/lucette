jQuery(document).ready(function($) {
    $(document).on('click', '#NextStep1', function () {
        $(".step1").hide();
        $(".step2").show();
        //console.log("ok");
    });

    $(document).on('click', '#NextStep2', function () {
        //console.log('ok');
        var options = [];
        $.each($("input[type=checkbox]:checked"), function(){
            options.push($(this).val());
        });
        if(options.length == 0){
            var options = 'no';
        }
        $.ajax({
            url:'/PlanACleaning/',
            type: "POST",
            dataType: "json",
            data: {
                "options": options,
                "idCar3": $("#voiture").val(),
                "idproduit2": $("#produit").val(),
                "availability": $("#availability").val(),
            },
            async: true,
            success: function (data)
            {
                 $("#horraire").html(time_convert(data.start) + " To " + time_convert(data.end));
                $("table #resume").append(data.row);
                 $("#list-option").html(data.list);


                //console.log(data);

                $(".step2").hide();
                $(".step3").show();
                $("#title").html("Order Summary")


            }
        });



        //console.log("ok");
    });

    $(document).on('click', '#BackStep2', function () {
        $(".step2").hide();
        $(".step1").show();

        //console.log("ok");
    });

    $(document).on('click', '#BackStep3', function () {
        $(".step3").hide();
        $(".step2").show();
        $("#title").html("Book a service")
        $("table .RowOption").remove();
        //console.log("ok");
    });





    /*
    $(document).on("click", "input[name='options']", function(){
        alert("ok");
        console.log("ok");
    });
    */
    $(document).on('click', '#btn_discount', function () {
        //console.log('ok');

        if($("#discount").val() != ""){
            var reduc = $("#discount").val();
            //console.log("pas null");
            //console.log($("#discount").val());
        }
        else{
            //console.log("null");
            var reduc = " ";
        }
        $.ajax({
            url:'/PlanACleaning/',
            type: "POST",
            dataType: "json",
            data: {
                "reduction": reduc,
            },
            async: true,
            success: function (data)

            {
                $("#after_validate").html(data.verify);
                $("#validate_discount").val(data.code);


                //console.log(data);




            }
        });



        //console.log("ok");
    });

    function time_convert(num)
    {
        var hours = Math.floor(num / 60);
        var minutes = num % 60;
        if(minutes < 10){
            return hours + ":0" + minutes;
        }
        else{
            return hours + ":" + minutes;
        }

    }
});