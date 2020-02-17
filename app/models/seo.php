<?php


namespace app\models;


class seo
{
    private $db;

    public function __construct(db $db)
    {
        $this->db=$db;
    }

    public function getAllSeo()
    {
        return $this->db->getAll('seo');
    }

    public  function  getSeoBySlug($slug)
    {
        return $this->db->getSingleWhere('seo','slug',$slug);
    }


}