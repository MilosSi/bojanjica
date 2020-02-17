<?php


namespace app\models;


class regex
{

    private $imeRegex="/^[ČĆŠĐŽA-zčćšđž]{1,40}$/";
    private $emailRegex="/^\w+[\w\-\.]*\@\w+((\-\w+)|(\w*))\.[a-z]{2,3}$/";
    private $lozinkaRegex="/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/";
    private $gradRegex="/^[ČĆŠĐŽA-zčćšđž]+([\s-]?[ČĆŠĐŽA-zčćšđž]+)*$/";
    private $ulicaRegex="/^[ČĆŠĐŽA-zčćšđž0-9]+(\s+[ČĆŠĐŽA-zčćšđž0-9]+)*$/";
    private $zipRegex="/^\d{5}(?:[-\s]\d{4})?$/";
    private $telefonRegex="/^(\(?\+?[0-9]*\)?)?[0-9_\- \(\)]+$/";

    public  function  checkName($ime)
    {
        return preg_match($this->imeRegex,$ime);
    }

    public function checkSurname($prezime)
    {
        return preg_match($this->imeRegex,$prezime);
    }

    public function checkEmail($email)
    {
        return preg_match($this->emailRegex,$email);
    }

    public function checkPassword($lozinka)
    {
        return preg_match($this->lozinkaRegex,$lozinka);
    }

    public  function checkCity($grad)
    {
        return preg_match($this->gradRegex,$grad);
    }

    public  function checkStreet($ulica)
    {
        return preg_match($this->ulicaRegex,$ulica);
    }

    public function checkZip($posbr)
    {
        return preg_match($this->zipRegex,$posbr);
    }

    public function checkTelephone($telefon)
    {
        return preg_match($this->telefonRegex,$telefon);
    }






}