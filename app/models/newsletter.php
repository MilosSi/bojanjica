<?php


namespace app\models;


class newsletter
{
    private $db;

    public function __construct(db $db)
    {
        $this->db=$db;
    }

    public function getNewsletterByEmail($email)
    {
        $params=array("{$email}");
        return $this->db->executeQueryWithParams("SELECT * FROM newsletter WHERE email LIKE ?",$params);
    }

    public function insertNews($email)
    {
        $datum=date("Y-m-d H:i:s");
        $params=[$email,$datum];
        return $this->db->executeQueryWithParamsGetLastId('INSERT INTO newsletter(email,datum) VALUES(?,?)',$params);


    }
}