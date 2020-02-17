<?php


namespace app\models;


class tipovi_proizvoda
{
    private $db;

    public function __construct(db $db)
    {
        $this->db=$db;
    }

    public function getAll()
    {
        return $this->db->executeQuery('SELECT * FROM `tip_proizvoda`');
    }
}