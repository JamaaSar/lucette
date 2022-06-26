jQuery(document).ready(function($){
    if($("#voiture").val() != ""){
        getProd();
    }


    $("#voiture").on('change', function() {
        $("#NextStep1").prop("disabled", true);
        if($("#voiture").val() == ""){
            $("#produit").html('<option value selected="selected">Choose a Product</option>');
        }
        else {
            //console.log('ok');
            getProd()
        }
    });



    $("#produit").on('change', function() {
        if($("#produit").val() == ""){
            $("#NextStep1").prop("disabled", true);
        }
        else {
            getOption()
        }

    });


    function getProd(){
        $("#NextStep1").prop("disabled", false);
        $.ajax({
            url:'/PlanACleaning/',
            type: "POST",
            dataType: "json",
            data: {
                "idCar": $("#voiture").val(),
                "availability": $("#availability").val(),
            },
            async: true,
            success: function (data)
            {
                //console.log(data.output);
                $("#produit").html(data.output);
                $(".car-title").html("Car: " + data.plat);
                $(".car-body").html(data.brand + " - " + data.model + " - " + data.cat + data.place);

                if(data.next == 1){
                    getOption()
                }

            }
        });
    }

    function getOption() {
        $.ajax({
            url:'/PlanACleaning/',
            type: "POST",
            dataType: "json",
            data: {
                "idproduit": $("#produit").val(),
                "idCar2": $("#voiture").val()
            },
            async: true,
            success: function (data)
            {

                $("table .RowProduct").remove();

                $("#description").html(data.desc);
                $(".product-title").html(data.name);



                $("table #resume").append(data.row);


                //console.log(data.value);
                if(data.value == ""){
                    $("#options").html("No Options Available!");
                }
                else {
                    $("#options").html(data.value);
                }



            }
        });
    }








});