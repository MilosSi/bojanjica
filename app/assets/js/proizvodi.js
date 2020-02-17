$(document).ready(function () {

    //Kolicina cena
    $(".kolicinacena").change(function () {
        let tip_proizovda=$(this).data('tid');
        let proizvod_id=$(this).data('idp')


        if(tip_proizovda==1)
        {
            let kolicina=$(this).val();

            $.ajax({
                type:"POST",
                url:"index.php?page=ajaxgramaza",
                data:{
                    proizvod_id,
                    kolicina
                },
                success:function(podaci,jq,kod)
                {


                    console.log(podaci);
                    $(".price").html(`<span id="mainprice" data-mainp="${podaci}">${podaci} DIN </span>`);


                },
                error:function(err)
                {
                    console.log(`${err.status}`);
                }
            })
        }
        else
        {
            let cenaid=$(this).val();
            $.ajax({
                type:"POST",
                url:"index.php?page=ajaxdefinisanacena",
                data:{
                    cenaid
                },
                success:function(podaci,jq,kod)
                {


                    console.log(podaci);
                    $(".price").html(`<span id="mainprice" data-mainp="${podaci}">${podaci} DIN </span>`);


                },
                error:function(err)
                {
                    console.log(`${err.status}`);
                }
            })
        }

    });


    //Dodaj u korpu
    $("#dodajukorpu").click(function (e) {
        e.preventDefault();
        let idProizvoda=$(this).data('idproizvoda');
        let cena=$("#mainprice").data("mainp");
        let kolicina=$("#quantity").val();


        $.ajax({
            type:"POST",
            url:"index.php?page=ajaxkorpa",
            data:{
                idProizvoda,
            },
            success:function(podaci,jq,kod)
            {

                let data=JSON.parse(podaci);
                addToOrder(idProizvoda,data.naziv,data.putanja,data.opis,cena,kolicina);
                location.reload()

            },
            error:function(err)
            {
                console.log(`${err.status}`);
            }
        })

    })

    var quantitiy=0;
    $('.quantity-right-plus').click(function(e){

        // Stop acting like a button
        e.preventDefault();
        // Get the field name
        var quantity = parseInt($('#quantity').val());

        // If is not undefined

        $('#quantity').val(quantity + 1);


        // Increment

    });

    $('.quantity-left-minus').click(function(e){
        // Stop acting like a button
        e.preventDefault();
        // Get the field name
        var quantity = parseInt($('#quantity').val());

        // If is not undefined

        // Increment
        if(quantity>0){
            $('#quantity').val(quantity - 1);
        }
    });
});