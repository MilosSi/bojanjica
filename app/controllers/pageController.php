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
use app\models\newsletter;

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

// Load Composer's autoloader
require 'vendor/autoload.php';

class pageController extends controllers
{
    private $db;

    public function __construct($db)
    {
        $this->db=$db;
    }

    public function  home()
    {
        //Slider
        $slider=new slider($this->db);
        //Kategorije
        $kategorije=new kategorija($this->db);
        //Utisci
        $utisci=new utisci($this->db);
        //Proizvodi
        $proizovdi=new proizvodi($this->db);

        $data['sliders']=$slider->getAll();
        $data['kategorije']=$kategorije->getAll();
        $data['utisci']=$utisci->getAll();
        $data['istaknutiProizvodi']=$proizovdi->getFeaturedProducts();
        $data['ponudaDana']=$proizovdi->getDealOfTheDay();
        $this->view('home',$data);
    }

    public function proizvod($idp)
    {
        //Proizvod po idu
        $proizvod=new proizvodi($this->db);
        $komentari=new komentari($this->db);
        $kategorijaProizvoda=$proizvod->getProductById($idp)->kat_id;



        $data['proizvod']=$proizvod->getProductById($idp);
        $data['ceneProizvoda']=$proizvod->getPricesById($idp);
        $data['komentari']=$komentari->getAllByProductId($idp);
        $data['proizvodiPoKategoriji']=$proizvod->getProductsByCategory($kategorijaProizvoda,4,0);
        $this->view('proizvod',$data);
    }

    public function proizvodi($brstrane)
    {
        $limit=9;
        $offset=($brstrane-1)*$limit;
        $proizvod=new proizvodi($this->db);
        $ukupanBrojProizvoda=sizeof($proizvod->getAll());
        $brojStranica=round($ukupanBrojProizvoda/$limit);

        $kategorije=new kategorija($this->db);


        $data['kategorije']=$kategorije->getAll();
        $data['proizvodi']=$proizvod->getAll($limit,$offset);
        $data['brojStranica']=$brojStranica;
        $data['brojStrane']=$brstrane;
        $this->view('proizvodi',$data);
    }

    public function onama()
    {
        //Utisci
        $utisci=new utisci($this->db);
        $data['utisci']=$utisci->getAll();
        $this->view('onama',$data);
    }

    public function reglog()
    {
        $this->view('reglog');
    }
    public function autor()
    {
        $this->view('autor');
    }

    public function korpa()
    {
        $this->view('korpa');
    }
    public function placanje()
    {
        if(isset($_SESSION['korisnik']))
        {
            $dodatnaadresa=new registracia_login($this->db);
            $korisnikid=$_SESSION['korisnik']->id;
            $data['dod_adresa']=$dodatnaadresa->getAdressByUserId($korisnikid);
        }
        else
        {
            $data=[];
        }
        $this->view('placanje',$data);
    }
    public function mojnalog($korisnikid)
    {
        $registracija=new registracia_login($this->db);
        $data['dod_adresa']=$registracija->getAdressByUserId($korisnikid);
        $this->view('mojnalog',$data);
    }

    public function potvrdanarudzbenice($idNarudzbenice,$tipPlacanja)
    {

        $data['idNarudzbenice']=$idNarudzbenice;
        $data['tipPlacanja']=$tipPlacanja;
        $this->view('potvrdanarudzbenice',$data);
    }

    public function kontakt()
    {
        $this->view('kontakt');
    }
    //Logika
    public function newsletter($email)
    {
        $regex=new regex();
        $news=new newsletter($this->db);
        $emailP=$news->getNewsletterByEmail($email);
        if($emailP==null)
        {
          $proveraMail=$regex->checkEmail($email);
          if($proveraMail)
          {
              $ok=$news->insertNews($email);
              if($ok)
              {
                  header("Location:index.php?page=home&news=true");
              }
              else
              {
                  header("Location:index.php?page=home&news=false");
              }
          }
          else
          {
              header("Location:index.php?page=home&check=fail");
          }
        }
        else
        {
            header("Location:index.php?page=home&news=falseexists");
        }

    }
    public function kontakt_logika($imeKorisnika,$emailKorisnika,$temaPoruke,$poruka)
    {
        $regex=new regex();
        $proveraIme=$regex->checkName($imeKorisnika);
        $proveraEmail=$regex->checkEmail($emailKorisnika);

        if($proveraIme==true && $proveraEmail==true)
        {
//            $subject = $temaPoruke;
//            $message = "Poštovani, imate novu poruku sa sajta bojanjica.rs <br>";
//            $message.= "Email korisnika: {$emailKorisnika} <br>
//            Poruka: <br>
//            {$poruka}";
//            $to='milossimicbz@gmail.com';
//            $mail = new PHPMailer(true);
//            $mail->IsSMTP(); // enable SMTP
//            $mail->SMTPDebug = 1; // debugging: 1 = errors and messages, 2 = messages only
//            $mail->SMTPAuth = true; // authentication enabled
//            $mail->SMTPSecure = 'tls'; // secure transfer enabled REQUIRED for Gmail
//            $mail->Host = "smtp.gmail.com";
//            $mail->Port = 587; // or 587
//            $mail->IsHTML(true);
//            $mail->Username = "milossimic1998@gmail.com";
//            $mail->Password = "supertajnalozinka";
//            $mail->SetFrom("no-reply@bojanjica.rs");
//            $mail->Subject = $subject;
//            $mail->Body = $message;
//            $mail->AddAddress($to);
//
//            if(!$mail->Send()) {
//                echo "Mailer Error: " . $mail->ErrorInfo;
//                header("Location:index.php?page=home&mail=false");
//            } else {
//                header("Location:index.php?page=home&mail=ok");
//            }
            header("Location:index.php?page=home&mail=ok");
        }
        else
        {
            header("Location:index.php?page=home&error=check");
        }

    }

    public function dodaj_komentar($naslov,$ocena,$komentar,$idProizvoda){

        $komentarKlasa=new komentari($this->db);
        $korisnikId=$_SESSION['korisnik']->id;
        $datumKreiranja=date("Y-m-d H:i:s");
        $idKomentara=$komentarKlasa->addComment($naslov,$komentar,$ocena,$korisnikId,$datumKreiranja,$idProizvoda);
        if($idKomentara)
        {
            header("Location:index.php?page=home&comm=true");
        }
        else
        {
            header("Location:index.php?page=home&comm=false");
        }

    }

    public function registracija($ime,$prezime,$email,$lozinka,$grad,$adresa,$posbr,$telefon){
        $regex=new regex();

        $proveraIme=$regex->checkName($ime);
        $proveraPrezime=$regex->checkSurname($prezime);
        $proveraEmail=$regex->checkEmail($email);
        $proveraLozinka=$regex->checkPassword($lozinka);
        $proveraGrad=$regex->checkCity($grad);
        $proveraAdresa=$regex->checkStreet($adresa);
        $proveraPosBr=$regex->checkZip($posbr);
        $proveraTelefon=$regex->checkTelephone($telefon);


        if($proveraIme==true && $proveraPrezime==true && $proveraEmail==true && $proveraLozinka==true && $proveraGrad==true && $proveraAdresa==true && $proveraPosBr==true && $proveraTelefon==true)
        {
            $registracija=new registracia_login($this->db);
            $id=$registracija->registruj($ime,$prezime,$email,$lozinka,$grad,$adresa,$posbr,$telefon);
            if($id!=null)
            {
                header("Location:index.php?page=home&reg=true");
            }
            else
                header("Location:index.php?page=home&reg=false");

        }
        else
        {
            header("Location:index.php?page=home&error=check");
        }
    }

    public  function logovanje($email,$lozinka)
    {
        $regex=new regex();
        $proveraEmail=$regex->checkEmail($email);
        $proveraLozinka=$regex->checkPassword($lozinka);
        if($proveraLozinka==true && $proveraEmail==true)
        {
            $logovanje=new registracia_login($this->db);
            $korisnik=$logovanje->getUser($email,$lozinka);
            if($korisnik)
            {
                $_SESSION['korisnik'] = $korisnik;
                header("Location:index.php?page=home&login=true");
            }
            else
            {
                header("Location:index.php?page=home&login=false");
            }
        }
        else
        {
            header("Location:index.php?page=home&error=check");
        }

    }

    public function logout()
    {
        if(isset($_SESSION['korisnik']))
        {
            unset($_SESSION["korisnik"]);
            header("Location:index.php?page=home&logout=true");
        }
    }

    public function dodatnaadresa($grad,$adresa,$posbr,$telefon)
    {
        $regex=new regex();
        $proveraGrad=$regex->checkCity($grad);
        $proveraAdresa=$regex->checkStreet($adresa);
        $proveraPosBr=$regex->checkZip($posbr);
        $proveraTelefon=$regex->checkTelephone($telefon);
        $id=$_SESSION['korisnik']->id;

        if($proveraGrad==true && $proveraAdresa==true && $proveraPosBr==true && $proveraTelefon==true)
        {
            $dodAdresa=new registracia_login($this->db);
            $idA=$dodAdresa->addAddress($grad,$adresa,$posbr,$telefon,$id);
            if($idA!=null)
            {
                header("Location:index.php?page=home&doda=true");
            }
            else
            {
                header("Location:index.php?page=home&doda=false");
            }

        }
        else
        {
            header("Location:index.php?page=home&error=check");
        }


    }
    //AJAX
    public function ajaxgramaza($idp,$kolicina)
    {
        $proizvod=new proizvodi($this->db);
        $cene=$proizvod->getPricesById($idp);

        foreach ($cene as $cc)
        {
            if($cc->cena_popust!=null)
            {
                $cenaZaObradu=$cc->cena_popust;
            }
            else
            {
                $cenaZaObradu=$cc->cena;
            }

            $novaCena=($kolicina*$cenaZaObradu)/1000;
        }
        echo $novaCena;
    }

    public function  ajaxdefinisanacena($cenaid)
    {
        $proizvod=new proizvodi($this->db);

        $cena=$proizvod->getPriceByIdSingle($cenaid);

        if($cena->cena_popust!=null)
        {
            $novaCena=$cena->cena_popust;
        }
        else
        {
            $novaCena=$cena->cena;
        }

        echo  $novaCena;

    }

    public function ajaxpretraga($pretragavrednost)
    {
        $proizvod=new proizvodi($this->db);


        echo \json_encode($proizvod->getProductsBySearchParam($pretragavrednost));
    }
    public  function  ajaxfilteri($nizKat,$min,$max)
    {
        $proizvod=new proizvodi($this->db);

        echo \json_encode($proizvod->getProductsByFilters($nizKat,$min,$max));
    }

    public function ajaxkorpa($idProizvoda)
    {
        $proizvod=new proizvodi($this->db);

        echo  \json_encode($proizvod->getProductById($idProizvoda));
    }


    public function ajaxadresa($idAdresa)
    {
        $adresaDodatna=new registracia_login($this->db);

        echo  \json_encode($adresaDodatna->getAdressById($idAdresa));
    }


    public function createorder($idAdreseTip,$narudzbe,$nacinPlacanja)
    {
        $order=new narudzbe($this->db);
        $idKorisnika=$_SESSION['korisnik']->id;
        $idPorudzbenice=$order->createPrimaryOrder($idKorisnika,$idAdreseTip,$nacinPlacanja);

        $ok=$order->createProductsOrders($narudzbe,$idPorudzbenice);

        if($ok!=0)
        {
            $okUpdate=$order->updateFinalPrice($idPorudzbenice,$narudzbe);
            if($okUpdate)
            {
                echo $idPorudzbenice;
                http_response_code(200);


            }
            else
            {
                http_response_code(500);
            }

        }
        else
        {
            http_response_code(500);
        }
    }



}