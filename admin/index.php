<?php
  //Osn
  session_start();
  require_once 'config/autoload.php';
  require_once '../app/config/database.php';

  use app\models\db;
  use app\controllers\adminController;

  //Baza i osnovni kontroler
  $db=new db(SERVER,DATABASE,USERNAME,PASSWORD);
  $adminController=new adminController($db);

  if(isset($_SESSION['korisnik']) && $_SESSION['korisnik']->uloga=1)
  {
    if(isset($_GET['adminpage']))
    {
      switch ($_GET['adminpage'])
      {
        case 'home':
          $adminController->home();
          break;
        case 'komentari':
          $adminController->komentari();
          break;
        case 'komentarlogika':
          if(isset($_GET['idk']))
          {
            $idk=$_GET['idk'];
            if(!isset($_GET['delete']))
            {
              $adminController->activateComment($idk);
            }
            else
            {
              $adminController->deleteComment($idk);
            }
          }
          else
          {
            $adminController->home();
          }
          break;
        case 'narudzbe':
          $adminController->narudzbe();
          break;
        case 'narudzbainfo':
          if(isset($_GET['id']))
          {
            $id=$_GET['id'];
            $adminController->narudzbainfo($id);
          }
          else
          {
            $adminController->home();
          }

          break;
        case 'proizvodi':
          $adminController->proizvodi();
          break;
        case 'dodajproizvod':
          $adminController->dodajproizvod();
          break;
        case 'azurirajproizvod':
          if(isset($_GET['idp']))
          {
            $idp=$_GET['idp'];
            $adminController->azurirajproizvod($idp);
          }
          else
          {
            $adminController->home();
          }


          break;
        case 'dodajproizvodlogika':
          if(isset($_POST['subDodaj']))
          {
            $naziv=$_POST['naziv'];
            $opis=$_POST['opis'];
            $kategorija_id=$_POST['kategorija_id'];
            $tip_p_id=$_POST['tip_p_id'];
            if(isset($_POST['istaknuti_p']))
            {
              $istaknuti_p=$_POST['istaknuti_p'];
            }
            else
            {
              $istaknuti_p=0;
            }
            $alt=$_POST['alt'];
            if($tip_p_id==1)
            {
              $data['cene']=[
                'idCene'=>$_POST['cena_id'],
                'kolicina'=>$_POST['kolicina'],
                'cena'=>$_POST['cena'],
                'cena_popust'=>$_POST['cena_popust']
              ];
            }
            else
            {
              $brojcena=$_POST['brojcena'];
              $glavnaCena=$_POST['glavna_cena'];
              $glavnaCenaIns=0;
              $data=[];
              for($i=1;$i<=$brojcena;$i++)
              {
                if($glavnaCena==$i)
                {
                  $glavnaCenaIns=1;
                }
                else
                {
                  $glavnaCenaIns=0;
                }

                $nizcena=[
                  'id'=>$i,
                  'idCene'=>$_POST["cena_id{$i}"],
                  'kolicina'=>$_POST["kolicina{$i}"],
                  'cena'=>$_POST["cena{$i}"],
                  'cena_popust'=>$_POST["cena_popust{$i}"],
                  'glavna_cena'=>$glavnaCenaIns
                ];
                array_push($data,$nizcena);
              }
            }
            $datum=date("Y-m-d H:i:s");
            $slikaInfo=$_FILES;


            if(isset($_POST['azuriras']) && $_POST['azuriras']==1)
            {

              $idProizvoda=$_POST['idp'];
              $adminController->azurirajproizvodlogika($naziv,$opis,$kategorija_id,$tip_p_id,$istaknuti_p,$alt,$datum,$data,$slikaInfo,$idProizvoda);
            }
            else
            {
              $adminController->dodajproizvodlogika($naziv,$opis,$kategorija_id,$tip_p_id,$istaknuti_p,$alt,$datum,$data,$slikaInfo);
            }



          }
          else
          {
            $adminController->home();
          }

          break;

        case 'obrisiproizvod':
          if(isset($_GET['idp']))
          {
            $idp=$_GET['idp'];
            $adminController->obrisiproizvod($idp);
          }
          else
          {
            $adminController->home();
          }

          break;


        //AJAX
        case 'ajaxstatus':
          if(isset($_POST['vrednost']))
          {
            $vrednost=$_POST['vrednost'];
            $idnar=$_POST['idnarudzbenice'];

            $adminController->ajaxstatus($vrednost,$idnar);
          }
          else
          {
            $adminController->home();
          }


        default:
          $adminController->home();
      }
    }
    else
    {
      $adminController->home();
    }
  }
  else
  {
    header("Location:/");
  }

?>
