$(document).ready(function () {

})

function provera() {
    /* Grad */
    var regCty=/^[ČĆŠĐŽA-zčćšđž]+([\s-]?[ČĆŠĐŽA-zčćšđž]+)*$/;
    var ctyVal=$("#grad").val();
    var resCty=regCty.test(ctyVal);

    /* Ulica i broj*/
    var regAdr=/^[ČĆŠĐŽA-zčćšđž0-9]+(\s+[ČĆŠĐŽA-zčćšđž0-9]+)*$/;
    var addVal=$("#adresa").val();
    var resAdd=regAdr.test(addVal);

    /*ZIP CODE */
    var regZip=/^\d{5}(?:[-\s]\d{4})?$/;
    var zipVal=$("#posbr").val();
    var resZip=regZip.test(zipVal);


    /*Telefon*/
    var regTel=/^(\(?\+?[0-9]*\)?)?[0-9_\- \(\)]+$/;
    var telefon=$("#telefon").val();
    var resTel=regTel.test(telefon);




    var error=true;
    if(resCty!=true)
    {
        $("#gradLabel").css("color","#82ae46");
        error=false;
    }
    if(resAdd!=true)
    {
        $("#adresaLabel").css("color","#82ae46");
        error=false;
    }
    if(resZip!=true)
    {
        $("#posbrLabel").css("color","#82ae46");
        error=false;
    }
    if(resTel!=true)
    {
        $("#telefonLabel").css("color","#82ae46");
        error=false;
    }


    return error;
}