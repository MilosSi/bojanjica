$(document).ready(function () {
    ukupnoZaPlacanje(narudzbe);

    $("#adrese").change(function () {
        let idAdrese=$(this).val();
        if(idAdrese==0)
        {
            let grad=$("#gradGlavna").val();
            let adresa=$("#ulbrGlavna").val();
            let posta=$("#posbrGlavna").val();
            let telefon=$("#teleGlavna").val();

            napraviInfoAdrese(grad,adresa,posta,telefon);
        }
        else
        {
            $.ajax({
                type:"POST",
                url:"index.php?page=ajaxadresa",
                data:{
                    idAdrese,
                },
                success:function(podaci,jq,kod)
                {

                    let data=JSON.parse(podaci);

                    data.forEach(function (elem) {
                        napraviInfoAdrese(elem.grad,elem.brulica,elem.post_br,elem.telefon);
                    })


                },
                error:function(err)
                {
                    console.log(`${err.status}`);
                }
            })
        }
    })


    $("#naruci").click(function (e) {
        e.preventDefault();
        let idAdrese=$("#adrese").val();

        let nacinPlacanja=$('input[name="nacinplacanja"]:checked').val();

        let nacinId=$('input[name="nacinplacanja"]:checked').data('tipp');

        if($('#uslovi').is(':checked'))
        {
            $.ajax({
                type:"POST",
                url:"index.php?page=createorder",
                data:{
                    idAdrese,
                    nacinPlacanja,
                    narudzbeNiz:narudzbe
                },
                success:function(podaci,jq,kod)
                {
                    console.log(podaci);

                    let idNarudzbenice=podaci;
                    if(kod.status==200)
                    {
                        deleteCart();
                        window.location = "index.php?page=potvrdanarudzbenice&idnnaru="+idNarudzbenice+"&tipp="+nacinId;
                    }
                    else
                    {
                        console.log("ERROR 500");
                    }
                },
                error:function(err)
                {
                    console.log(`${err.status}`);
                }
            });
        }
        else
        {
            alert("Molimo vas da prihvatite uslove i odredbe");
        }



        //ID KORISNIKA JE U SESIJI

    })
})

function napraviInfoAdrese(grad,adresa,posta,telefon) {
    let ispis=`
        <p>Grad</p><p>${grad}</p>
        <p>Ulica i broj</p><p>${adresa}</p>
        <p>Poštanski broj</p><p>${posta}</p>
        <p>Telefon</p><p>${telefon}</p>
    `;

    $("#dodatnaAdresaIzmena").html(ispis);


}