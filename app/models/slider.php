<?php


namespace app\models;



class slider
{
    private $db;

    public function  __construct(db $db)
    {
        $this->db=$db;
    }

    public function getAll()
    {
        return $this->db->executeQuery('SELECT * FROM slider s INNER JOIN slike sk ON s.id_slike=sk.id');
    }
}