<?php


namespace app\controllers;

use app\models\slider;
use app\models\kategorija;
use app\models\utisci;
use app\models\proizvodi;
use app\models\regex;
use app\models\registracia_login;
use app\models\narudzbe;
use app\models\komentari;
use app\models\tipovi_proizvoda;
use app\models\slike;

class adminController
{
    private $db;

    public function __construct($db)
    {
        $this->db=$db;
    }

    private function view($filename,$data=[]){
        extract($data);

        require_once "view/head.php";
        require_once "view/navbar.php";
        require_once "view/sidebar.php";
        require_once "view/pages/$filename.php";
        require_once "view/footer.php";
    }

    public function home(){
        $korisnik=new registracia_login($this->db);
        $narudzbe=new narudzbe($this->db);
        $proizvodi=new proizvodi($this->db);
        $komentari=new komentari($this->db);

        $data['brojNovihNarudzba']=$narudzbe->getNumberOfNewOrders();
        $data['brojKorisnika']=$korisnik->numberOfUsers();
        $data['narudzbe']=$narudzbe->getAllOrders('datum_narudzbe','DESC');
        $data['noviProizvodi']=$proizvodi->getAllOrderBy(4,0,'p.datum_postavke','DESC');
        $data['noviKomentari']=$komentari->getAllOrderBy(3,0,'datum_komentara','DESC');
        $this->view('home',$data);
    }

    public function narudzbe()
    {
        $narudzbe=new narudzbe($this->db);
        $data['narudzbe']=$narudzbe->getAllOrders('datum_narudzbe','DESC');
        $this->view('narudzbe',$data);
    }

    public function narudzbainfo($idn)
    {
        $adresa=new registracia_login($this->db);
        $narudzbe=new narudzbe($this->db);
        $proizvodi=new proizvodi($this->db);

        $narudzbainfo=$narudzbe->getSingleOrderById($idn);
        if($narudzbainfo->dodatna_adresa!=null)
        {
            $adresaDodatna=$adresa->getAdressById($narudzbainfo->dodatna_adresa);
            $data['dodatna_adresa']=$adresaDodatna;
        }
        $data['narudzbainfo']=$narudzbainfo;
        $data['naruceni_proizvodi']=$proizvodi->getProductByOrderId($idn);
        $nar=$proizvodi->getProductByOrderId($idn);
        //Kolicina za pakovanja i sokove
        $data['kolicinas']=[];
        foreach ($nar as $np)
        {
            if($np->tip_p_id!=1)
            {
                $kolicinaInfo=$proizvodi->getWByProductId($np->proizvod_id,$np->izabrana_cena);
                array_push($data['kolicinas'],$kolicinaInfo);
            }
        }


        $this->view('narudzbainfo',$data);
    }

    public function komentari()
    {
        $komentari=new komentari($this->db);
        $data['noviKomentari']=$komentari->getAllOrderBy(520,0,'datum_komentara','DESC');
        $this->view('komentari',$data);
    }

    public function activateComment($idk)
    {
        $komentari=new komentari($this->db);
        $okAktivacija=$komentari->activateComment($idk);
        if($okAktivacija)
        {
            header("Location:index.php?adminpage=komentari&aktivacije=true");
        }
        else
        {
            header("Location:index.php?adminpage=komentari&aktivacije=false");
        }
    }

    public function deleteComment($idk)
    {
        $komentari=new komentari($this->db);
        $okDeleteCom=$komentari->deleteComment($idk);
        if($okDeleteCom)
        {
            header("Location:index.php?adminpage=komentari&brisanje=true");
        }
        else
        {
            header("Location:index.php?adminpage=komentari&brisanje=false");
        }
    }
    public function proizvodi()
    {
        $proizvodi=new proizvodi($this->db);
        $data['proizvodi']=$proizvodi->getAllOrderBy();
        $this->view('proizvodi',$data);
    }
    public function dodajproizvod()
    {
        $kategoraija=new kategorija($this->db);
        $tipovi=new tipovi_proizvoda($this->db);
        $data['tipovi']=$tipovi->getAll();
        $data['kategorija']=$kategoraija->getAll();
        $this->view('dodajproizvod',$data);
    }
    public function azurirajproizvod($idp)
    {
        $proizvod=new proizvodi($this->db);


        $kategoraija=new kategorija($this->db);
        $tipovi=new tipovi_proizvoda($this->db);
        $data['tipovi']=$tipovi->getAll();
        $data['kategorija']=$kategoraija->getAll();
        $data['proizvod']=$proizvod->getProductById($idp);
        $data['ceneProizvoda']=$proizvod->getPricesById($idp);
        $this->view('azurirajproizvod',$data);
    }

    //AJAX
    public function ajaxstatus($vrednost,$idn)
    {
        $narudzbe=new narudzbe($this->db);
        $statusAzu=$narudzbe->updateStatus($vrednost,$idn);
        if($statusAzu)
        {
            http_response_code(200);
        }
        else
        {
            http_response_code(500);
        }


    }


    //LOGIKA

    public function dodajproizvodlogika($naziv,$opis,$kategorija_id,$tip_p_id,$istaknuti_p,$alt,$datum,$data,$slikaInfo)
    {

        $slika=new  slike($this->db);
        $proizvod=new proizvodi($this->db);

        $ok=$slika->uploadImage('slika','/proizvodi');
        if($ok)
        {
            $idSlike=$slika->insert($_SESSION['slika'],$alt,$datum);
            unset($_SESSION['slika']);
            $idProizvoda=$proizvod->insert($naziv,$idSlike,$opis,$istaknuti_p,$tip_p_id,$kategorija_id,$datum);
            $proizvod->insertPrice($data,$idProizvoda,$tip_p_id);
            header("Location:index.php?adminpage=proizvodi");
        }
        else
        {
            header("Location:index.php?adminpage=home");
        }


    }
    public function azurirajproizvodlogika($naziv,$opis,$kategorija_id,$tip_p_id,$istaknuti_p,$alt,$datum,$data,$slikaInfo,$idProizvoda)
    {
        $proizvodi=new proizvodi($this->db);
        $slike=new slike($this->db);
        $proizvod=$proizvodi->getProductById($idProizvoda);


        $slikaOk=true;

        if(!empty($_FILES['slika']['name']))
        {
            $idSlike=$proizvod->slika_id;
           $dataSlike['putanja']=$_FILES['slika']['name'];
           $dataSlike['alt']=$alt;
           $dataSlike['datum']=$datum;

           $ok=$slike->update($idSlike,$dataSlike);
           if($ok)
           {
               unlink('../app/assets/images/proizvodi/'.$proizvod->putanja);
               $okPomeraj=$slike->uploadImage('slika','/proizvodi');

               if($okPomeraj!=true)
               {
                   $slikaOk=false;
               }
           }
           else
           {
              $slikaOk=false;
           }
        }

        $okCene=$proizvodi->updatePrice($data,$tip_p_id);

        if($okCene && $slikaOk)
        {
            $idP=$proizvod->id;

            $okProizvod=$proizvodi->updateProduct($idP,$naziv,$opis,$istaknuti_p,$tip_p_id,$kategorija_id,$datum);
        }

        if($okProizvod)
        {
            header("Location:index.php?adminpage=proizvodi&update=true");
        }
        else
        {
            header("Location:index.php?adminpage=proizvodi&update=false");
        }
    }

    public function obrisiproizvod($idp)
    {
        $proizvodi=new proizvodi($this->db);
        $proizvod=$proizvodi->getProductById($idp);
        $slike=new slike($this->db);
        $ceneProizvoda=$proizvodi->getPricesById($proizvod->id);
        foreach ($ceneProizvoda as $cp)
        {
            $okCena=$proizvodi->deletePrice($cp->id);
        }

        if($okCena)
        {
            $okProizvod=$proizvodi->deleteProduct($proizvod->id);
            if($okProizvod)
            {
                $slikaDelete=$slike->delete($proizvod->slika_id);
                if($slikaDelete)
                {
                    unlink('../app/assets/images/proizvodi/'.$proizvod->putanja);
                    header("Location:index.php?adminpage=proizvodi&proizvoddelete=true");
                }
                else
                {
                    header("Location:index.php?adminpage=proizvodi&slikadelete=false");
                }
            }
            else
            {
                header("Location:index.php?adminpage=proizvodi&proizvoddelete=false");
            }
        }
        else
        {
            header("Location:index.php?adminpage=proizvodi&cenadelete=false");
        }



    }
}