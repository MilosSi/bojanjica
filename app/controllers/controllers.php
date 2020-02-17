<?php


namespace app\controllers;


class controllers
{



    public function view($filename,$data=[]){
        extract($data);

        require_once "app/views/head.php";
        require_once "app/views/nav.php";
        require_once "app/views/pages/$filename.php";
        require_once "app/views/footer.php";
    }
}