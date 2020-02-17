<?php 
    //Osnovne Stavke
    session_start();
    require_once 'app/config/autoload.php';
    require_once 'app/config/database.php';

    use app\models\db;
    use app\controllers\pageController;
    use app\controllers\seoController;

    //Baza i osnovni kontroler
    $db=new db(SERVER,DATABASE,USERNAME,PASSWORD);
    $pageController=new pageController($db);

    //SEO

    if(isset($_GET['page']))
    {
        $trenutnaStrana=$_GET['page'];
    }
    else
    {
        $trenutnaStrana='home';
    }
    new seoController($db,$trenutnaStrana);


    if(isset($_GET['page'])){
        switch($_GET['page']) {
            case "home":
                $pageController->home();
                break;
            case "proizvod":
                $proizvodId = $_GET['idp'];
                $pageController->proizvod($proizvodId);
                break;
            case "proizvodi":
                if (isset($_GET['s'])) {
                    $brstrane = $_GET['s'];
                } else {
                    $brstrane = 1;
                }
                $pageController->proizvodi($brstrane);
                break;
            case "onama":
                $pageController->onama();
                break;
            case "autor":
                $pageController->autor();
                break;
            case "reglog":
                $pageController->reglog();
                break;
            case "korpa":
                $pageController->korpa();
                break;
            case "placanje":
                $pageController->placanje();
                break;
            case "mojnalog":
                if (isset($_SESSION['korisnik'])) {
                    $korisnikid = $_SESSION['korisnik']->id;
                    $pageController->mojnalog($korisnikid);
                } else {
                    $pageController->home();
                }

                break;
            case "kontakt":
                $pageController->kontakt();
                break;

            //Logika
            case 'newsletter':
                if(isset($_POST['subNews']))
                {
                    $email=$_POST['mail'];
                    $pageController->newsletter($email);
                }
                break;
            case 'dodajkomentar':
                if(isset($_POST['subKomentar']))
                {
                    $idProizvoda=$_POST['idProzivda'];
                    $naslov=$_POST['naslov'];
                    $ocena=$_POST['ocenaProizvoda'];
                    $komentar=$_POST['komentar'];
                    $pageController->dodaj_komentar($naslov,$ocena,$komentar,$idProizvoda);
                }
                else
                {
                    $pageController->home();
                }

            case "kontaktlogika":
                if(isset($_POST['subKontakt']))
                {
                    $imeKorisnika=$_POST['ime'];
                    $emailKorisnika=$_POST['email'];
                    $temaPoruke=$_POST['tema'];
                    $poruka=$_POST['poruka'];
                    $pageController->kontakt_logika($imeKorisnika,$emailKorisnika,$temaPoruke,$poruka);
                }
                else
                {
                    $pageController->home();
                }
                break;

            case "registracija_logika":
                if($_POST)
                {
                    $ime=$_POST['ime'];
                    $prezime=$_POST['prezime'];
                    $email=$_POST['email'];
                    $lozinka=$_POST['lozinka'];
                    $grad=$_POST['grad'];
                    $adresa=$_POST['adresa'];
                    $posbr=$_POST['posbr'];
                    $telefon=$_POST['telefon'];
                    $pageController->registracija($ime,$prezime,$email,$lozinka,$grad,$adresa,$posbr,$telefon);
                }
                else
                {
                    $pageController->home();
                }
                //if($_post)?
                break;
            case "logovanje_logika":
                if($_POST)
                {
                    $email=$_POST['emailLogin'];
                    $lozinka=$_POST['lozinkaLogin'];
                    $pageController->logovanje($email,$lozinka);
                }
                else
                {
                    $pageController->home();
                }

                break;
            case "logout":
                $pageController->logout();
                break;
            case "dodatnaadresa":
                if($_POST)
                {
                    $grad=$_POST['grad'];
                    $adresa=$_POST['adresa'];
                    $posbr=$_POST['posbr'];
                    $telefon=$_POST['telefon'];
                    $pageController->dodatnaadresa($grad,$adresa,$posbr,$telefon);
                }
                else
                {
                    $pageController->home();
                }

                break;
            case "potvrdanarudzbenice":
                if(isset($_GET['idnnaru']))
                {
                    $idNarudzbenice=$_GET['idnnaru'];
                    $tipPlacanja=$_GET['tipp'];
                    $pageController->potvrdanarudzbenice($idNarudzbenice,$tipPlacanja);
                }
                else
                {
                    $pageController->home();
                }
                break;
            //AJAX
            case 'ajaxgramaza':
                $proizvodId=$_POST['proizvod_id'];
                $kolicina=$_POST['kolicina'];
                $pageController->ajaxgramaza($proizvodId,$kolicina);
                break;
            case 'ajaxdefinisanacena':
                $cenaid=$_POST['cenaid'];
                $pageController->ajaxdefinisanacena($cenaid);
                break;
            case 'ajaxpretraga':
                $pretraga=$_POST['vrednost'];
                $pageController->ajaxpretraga($pretraga);
                break;
            case 'ajaxfilteri':
                $nizKategorija=$_POST['nizCbx'];
                $minVrednost=$_POST['minVrednost'];
                $maxVrednost=$_POST['maxVrednost'];
                $pageController->ajaxfilteri($nizKategorija,$minVrednost,$maxVrednost);
                break;
            case 'ajaxkorpa':
                $idProizvoda=$_POST['idProizvoda'];
                $pageController->ajaxkorpa($idProizvoda);
                break;
            case 'ajaxadresa':
                $idAdresa=$_POST['idAdrese'];
                $pageController->ajaxadresa($idAdresa);
                break;
            case 'createorder':
                if(isset($_SESSION['korisnik']))
                {
                    if($_POST)
                    {
                        $idAdreseTip=$_POST['idAdrese'];
                        $narudzbe=$_POST['narudzbeNiz'];
                        $nacinPlacanja=$_POST['nacinPlacanja'];
                        $pageController->createorder($idAdreseTip,$narudzbe,$nacinPlacanja);
                    }
                    else
                    {
                        $pageController->home();
                    }


                }
                else
                {
                    $pageController->home();
                }


                break;
            case 'admin':
                if(isset($_SESSION['korisnik']))
                {
                    if($_SESSION['korisnik']->uloga==1)
                    {
                        header("Location:admin/");
                    }
                    else
                    {
                        $pageController->home();
                    }

                }
                else
                {
                    $pageController->home();
                }
                break;
            default:
                $pageController->home();
        }
    } else {
        $pageController->home();
    }
?>