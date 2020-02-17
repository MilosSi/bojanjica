<?php


namespace app\models;


class narudzbe
{
    private $db;

    public function __construct(db $db)
    {
        $this->db=$db;
    }

    public function getAllOrders($order='id',$ordertype='ASC')
    {
        return $this->db->executeQuery("SELECT *,n.id as narudzba_id FROM narudzba n INNER JOIN korisnik k ON n.korisnik_id=k.id ORDER BY {$order} {$ordertype}");
    }

    public function getSingleOrderById($id)
    {
        $params=[$id];
        return $this->db->executeQueryWithParamsOneResault('SELECT *,n.id as narudzba_id FROM narudzba n INNER JOIN korisnik k ON n.korisnik_id=k.id WHERE n.id=?',$params);
    }

    public function createPrimaryOrder($userId,$tipAdrese,$nacinPlacanja)
    {
        $datumKreiranja=date("Y-m-d H:i:s");
        $params=[$userId,$datumKreiranja,$tipAdrese,$nacinPlacanja];
        $idPoru=0;
        if($tipAdrese==0)
        {
            $tipAdrese=1;
            $params2=[$userId,$datumKreiranja,$tipAdrese,$nacinPlacanja];
            $idPoru=$this->db->executeQueryWithParamsGetLastId('INSERT INTO narudzba(korisnik_id,datum_narudzbe,glavna_adresa,nacina_placanja) VALUES(?,?,?,?)',$params2);
        }
        else
        {
            $idPoru=$this->db->executeQueryWithParamsGetLastId('INSERT INTO narudzba(korisnik_id,datum_narudzbe,dodatna_adresa,nacina_placanja) VALUES(?,?,?,?)',$params);
        }

        return $idPoru;

    }

    public function createProductsOrders($narudzbe,$narudzbaid)
    {
        $error=0;
        foreach ($narudzbe as $narudzbaInfo)
        {
            $params=[$narudzbaInfo['idProizovda'],$narudzbaid,$narudzbaInfo['kolicinaP'],$narudzbaInfo['cenaP']];
            $error=$this->db->executeQueryWithParamsGetLastId('INSERT INTO narudzba_proizvod(proizvod_id,narudzba_id,kolicina,izabrana_cena) VALUES(?,?,?,?)',$params);
        }
        return $error;
    }

    public function updateFinalPrice($narudzbaid,$narudzbe)
    {
        $ukupnaCena=0;
        foreach ($narudzbe as $narudzba)
        {
            $ukupnaCena=$ukupnaCena+($narudzba['kolicinaP']*$narudzba['cenaP']);
        }
        $data['ukupna_cena']=$ukupnaCena;
        return $this->db->updateTable('narudzba',$narudzbaid,$data);
    }

    public function updateStatus($vrednost,$idn)
    {
        $data['narudzba_obradjena']=$vrednost;
        return $this->db->updateTable('narudzba',$idn,$data);
    }


    public function getNumberOfNewOrders()
    {
        return $this->db->executeQuerySingle('SELECT COUNT(*) as broj_novih FROM narudzba WHERE narudzba_obradjena=0');
    }
}