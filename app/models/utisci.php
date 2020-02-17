<?php


namespace app\models;


class utisci
{
    private $db;

    public function __construct(db $db)
    {
        $this->db=$db;
    }

    public function getAll()
    {
        return $this->db->executeQuery('SELECT * FROM utisak u INNER JOIN slike s ON u.slika_id=s.id');
    }
}