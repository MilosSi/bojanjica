<?php


namespace app\controllers;

use app\models\seo;

class seoController
{
    private $slug;
    private $db;


    public function  __construct($db,$slug)
    {
        $this->db=$db;
        $this->slug=$slug;

        $this->setSeo();
    }

    private function  setSeo()
    {
        $seo=new seo($this->db);
        $seoInfo=$seo->getSeoBySlug($this->slug);
        //OVDE PITAJ DA LI JE OBJ OK
        if($seoInfo!=null)
        {
            $_SESSION["h1"] = $seoInfo->h1;
            $_SESSION["title"] = $seoInfo->title;
            $_SESSION["description"] = $seoInfo->description;
            $_SESSION["keywords"] = $seoInfo->keywords;
        }
        else
        {
            $_SESSION["h1"] = "Bojanjica";
            $_SESSION["title"] = "Bojanjica";
            $_SESSION["description"] = "Bojanjica";
            $_SESSION["keywords"] = "Bojanjica";
        }



    }


}