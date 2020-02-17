$(document).ready(function () {
    
})

function provera() {

    //ime
    var regUser=/^[ČĆŠĐŽA-zčćšđž]{1,40}$/;
    var ime=$("#ime").val();
    var resUser = regUser.test(ime);

    //Prezime
    var prezime=$("#prezime").val();
    var resSurname = regUser.test(prezime);

    /*EMAIL */
    var regEmail=/^\w+[\w-\.]*\@\w+((-\w+)|(\w*))\.[a-z]{2,3}$/;
    var emailVal=$("#email").val();
    var resEmail=regEmail.test(emailVal);

    /*PASS REG */
    var regPass=/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/; /* MIN 1 NUM I 1 BR*/
    var passVal=$("#lozinka").val();
    var resPass=regPass.test(passVal);

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


    //Provera
    var error=true;
    if(resUser!=true)
    {
        $("#ime").css("border","3px solid #82ae46");
        error=false;
    }
    if(resSurname!=true)
    {
        $("#prezime").css("border","3px solid #82ae46");
        error=false;
    }
    if(resEmail!=true)
    {
        $("#email").css("border","3px solid #82ae46");
        error=false;
    }
    if(resPass!=true)
    {
        $("#lozinka").css("border","3px solid #82ae46");
        error=false;
    }
    if(resCty!=true)
    {
        $("#grad").css("border","3px solid #82ae46");
        error=false;
    }
    if(resAdd!=true)
    {
        $("#adresa").css("border","3px solid #82ae46");
        error=false;
    }
    if(resZip!=true)
    {
        $("#posbr").css("border","3px solid #82ae46");
        error=false;
    }
    if(resTel!=true)
    {
        $("#telefon").css("border","3px solid #82ae46");
        error=false;
    }


    return error;
}


function proveraLogin() {

    /*EMAIL */
    var regEmail=/^\w+[\w-\.]*\@\w+((-\w+)|(\w*))\.[a-z]{2,3}$/;
    var emailVal=$("#emailLogin").val();
    var resEmail=regEmail.test(emailVal);

    /*PASS REG */
    var regPass=/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/; /* MIN 1 NUM I 1 BR*/
    var passVal=$("#lozinkaLogin").val();
    var resPass=regPass.test(passVal);

    var error=true;
    if(resEmail!=true)
    {
        $("#emailLogin").css("border","3px solid #82ae46");
        error=false;
    }
    if(resPass!=true)
    {
        $("#lozinkaLogin").css("border","3px solid #82ae46");
        error=false;
    }

    return error;
}