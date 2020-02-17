<?php


namespace app\models;


class kategorija
{
    private $db;

    public function __construct(db $db)
    {
        $this->db=$db;
    }

    public function getAll()
    {
          return $this->db->executeQuery('SELECT *,k.id as kat_id FROM kategorije k INNER JOIN slike s ON k.slika_id=s.id');
    }

}