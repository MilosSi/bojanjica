<?php


namespace app\models;


class registracia_login
{

    private $db;

    public  function __construct(db $db)
    {
        $this->db=$db;
    }

    public function registruj($ime,$prezime,$email,$lozinka,$grad,$adresa,$posbr,$telefon)
    {
        $uloga=0;
        $lozinka=md5($lozinka);
        $params=[$ime,$prezime,$email,$lozinka,$adresa,$grad,$posbr,$telefon,$uloga];
        return $this->db->executeQueryWithParamsGetLastId('INSERT INTO korisnik(ime,prezime,email,lozinka,brulica,grad,post_br,telefon,uloga) VALUES (?,?,?,?,?,?,?,?,?)',$params);
    }

    public function getUser($email,$lozinka)
    {
        $lozinka=md5($lozinka);
        $params=[$email,$lozinka];
        return $this->db->executeQueryWithParamsOneResault('SELECT id,ime,prezime,uloga,brulica,grad,post_br,telefon,email FROM korisnik WHERE email=? AND lozinka=?',$params);
    }

    //Adresa dodatna
    public function getAdressByUserId($id){
        $params=[$id];
        return $this->db->executeQueryWithParams('SELECT * FROM dodatna_adresa WHERE korisnik_id=?',$params);
    }
    public function addAddress($grad,$adresa,$posbr,$telefon,$id)
    {
        $params=[$grad,$adresa,$posbr,$telefon,$id];
        return $this->db->executeQueryWithParamsGetLastId('INSERT INTO dodatna_adresa(grad,brulica,post_br,telefon,korisnik_id) VALUES(?,?,?,?,?)',$params);
    }
    public function getAdressById($idAdrese)
    {
        $params=[$idAdrese];
        return $this->db->executeQueryWithParams('SELECT * FROM dodatna_adresa WHERE id=?',$params);
    }


    //korisnik info

    public function numberOfUsers()
    {
        return $this->db->executeQuerySingle('SELECT COUNT(*) AS broj_korisnika FROM korisnik WHERE uloga=0');
    }

}