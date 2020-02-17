<?php


namespace app\models;


class proizvodi
{
    private $db;

    public function  __construct(db $db)
    {
        $this->db=$db;
    }

    //Osnovne
    public function getAll($limit=5200,$offset=0)
    {
        $params=[$limit,$offset];
        return $this->db->executeQueryWithParams('SELECT p.id,p.naziv,p.opis,p.istaknuti_p,s.putanja,s.alt,cp.id as cp_id,cp.kolicina,cp.cena,cp.cena_popust,k.id as kat_id,k.naziv as kat_naziv FROM proizvod p INNER JOIN kategorije k ON p.kategorija_id=k.id INNER JOIN slike s ON p.slika=s.id INNER JOIN cena_proizvod cp ON p.id=cp.proizvod_id WHERE cp.glavna_cena=1 LIMIT ? OFFSET ?',$params);
    }

    public function getAllOrderBy($limit=5200,$offset=0,$order='id',$ordertype='ASC')
    {
        $params=[$limit,$offset];
        return $this->db->executeQueryWithParams("SELECT p.id,p.naziv,p.opis,p.istaknuti_p,s.putanja,s.alt,cp.id as cp_id,cp.kolicina,cp.cena,cp.cena_popust,k.id as kat_id,k.naziv as kat_naziv FROM proizvod p INNER JOIN kategorije k ON p.kategorija_id=k.id INNER JOIN slike s ON p.slika=s.id INNER JOIN cena_proizvod cp ON p.id=cp.proizvod_id WHERE cp.glavna_cena=1 ORDER BY {$order} {$ordertype} LIMIT ? OFFSET ?",$params);
    }




    public function getFeaturedProducts()
    {
        return $this->db->executeQuery('SELECT p.id,p.naziv,p.opis,p.istaknuti_p,s.putanja,s.alt,cp.id as cp_id,cp.kolicina,cp.cena,cp.cena_popust,k.id as kat_id,k.naziv as kat_naziv FROM proizvod p INNER JOIN kategorije k ON p.kategorija_id=k.id INNER JOIN slike s ON p.slika=s.id INNER JOIN cena_proizvod cp ON p.id=cp.proizvod_id WHERE cp.glavna_cena=1 AND p.istaknuti_p=1');
    }

    public function getProductById($id)
    {
        $params=[$id];
        return $this->db->executeQueryWithParamsOneResault('SELECT p.id,p.naziv,p.opis,p.istaknuti_p,s.putanja,s.alt,s.id as slika_id,cp.id as cp_id,cp.kolicina,cp.cena,cp.cena_popust,k.id as kat_id,k.naziv as kat_naziv,tp.id as tp_id,tp.naziv as tip_p_naziv FROM proizvod p INNER JOIN kategorije k ON p.kategorija_id=k.id INNER JOIN slike s ON p.slika=s.id INNER JOIN cena_proizvod cp ON p.id=cp.proizvod_id INNER JOIN tip_proizvoda tp ON p.tip_p_id=tp.id WHERE cp.glavna_cena=1 AND p.id=?',$params);
    }

    public function getProductsByCategory($idk,$limit,$offset)
    {
        $params=[$idk,$limit,$offset];
        return $this->db->executeQueryWithParams('SELECT p.id,p.naziv,p.opis,p.istaknuti_p,s.putanja,s.alt,cp.id as cp_id,cp.kolicina,cp.cena,cp.cena_popust,k.id as kat_id,k.naziv as kat_naziv FROM proizvod p INNER JOIN kategorije k ON p.kategorija_id=k.id INNER JOIN slike s ON p.slika=s.id INNER JOIN cena_proizvod cp ON p.id=cp.proizvod_id WHERE cp.glavna_cena=1 AND p.kategorija_id=? LIMIT ? OFFSET ?',$params);
    }

    //Cene
    public function getPricesById($id) //ID PROIZOVDA
    {
        $params=[$id];
        return $this->db->executeQueryWithParams('SELECT * FROM cena_proizvod WHERE proizvod_id=?',$params);
    }
    public function getPriceByIdSingle($id)
    {
        return $this->db->getSingle('cena_proizvod',$id);
    }
    public function getWByProductId($proizvodid,$izabranacena)
    {
        $params=[$proizvodid,$izabranacena];
        return $this->db->executeQueryWithParamsOneResault('SELECT cp.proizvod_id,cp.kolicina FROM cena_proizvod cp WHERE cp.proizvod_id=? and cp.cena=?',$params);

    }



    //Ponuda dana
    public function getDealOfTheDay()
    {
        return $this->db->executeQuerySingle('SELECT * FROM ponuda_dana pd INNER JOIN proizvod p ON pd.proizvod_id=p.id INNER JOIN slike s ON pd.slika_ponuda_id=s.id INNER JOIN cena_proizvod cp ON pd.proizvod_id=cp.proizvod_id WHERE pd.aktivna=1');
    }


    //Filteri

    public function getProductsBySearchParam($searchParam)
    {
        $params=array("%{$searchParam}%");
        return $this->db->executeQueryWithParams("SELECT p.id,p.naziv,p.opis,p.istaknuti_p,s.putanja,s.alt,cp.id as cp_id,cp.kolicina,cp.cena,cp.cena_popust,k.id as kat_id,k.naziv as kat_naziv FROM proizvod p INNER JOIN kategorije k ON p.kategorija_id=k.id INNER JOIN slike s ON p.slika=s.id INNER JOIN cena_proizvod cp ON p.id=cp.proizvod_id WHERE cp.glavna_cena=1 AND p.naziv LIKE ?",$params);
    }

    public function getProductsByFilters($nizKat,$min,$max)
    {
        $in  = str_repeat('?,', count($nizKat) - 1) . '?';
        $params=array_merge($nizKat,[$min,$max]);
        $sql="SELECT p.id,p.naziv,p.opis,p.istaknuti_p,s.putanja,s.alt,cp.id as cp_id,cp.kolicina,cp.cena,cp.cena_popust,k.id as kat_id,k.naziv as kat_naziv FROM proizvod p INNER JOIN kategorije k ON p.kategorija_id=k.id INNER JOIN slike s ON p.slika=s.id INNER JOIN cena_proizvod cp ON p.id=cp.proizvod_id WHERE cp.glavna_cena=1 AND k.id IN ({$in}) AND cp.cena>? and cp.cena<?";

        return $this->db->executeQueryWithParams($sql,$params);
    }


    //Proizvodi koji su naruceni

    public  function getProductByOrderId($orderid)
    {
        $params=[$orderid];
        return $this->db->executeQueryWithParams('SELECT *,np.kolicina as narudzba_kolicina FROM narudzba_proizvod np INNER JOIN proizvod p ON np.proizvod_id=p.id INNER JOIN cena_proizvod cp ON p.id=cp.proizvod_id WHERE cp.glavna_cena=1 AND np.narudzba_id=?',$params);
    }

    //CRUD
    public function  insert($naziv,$slikaid,$opis,$istaknuti_p,$tip_p_id,$kategorija_id,$datum)
    {
        $params=[$naziv,$slikaid,$opis,$istaknuti_p,$tip_p_id,$kategorija_id,$datum];
        return $this->db->executeQueryWithParamsGetLastId('INSERT INTO proizvod(naziv,slika,opis,istaknuti_p,tip_p_id,kategorija_id,datum_postavke) VALUES(?,?,?,?,?,?,?)',$params);
    }

    public function updateProduct($id,$naziv,$opis,$istaknuti_p,$tip,$kategorija,$datum)
    {
        $dataProizvod['naziv']=$naziv;
        $dataProizvod['opis']=$opis;
        $dataProizvod['istaknuti_p']=$istaknuti_p;
        $dataProizvod['tip_p_id']=$tip;
        $dataProizvod['kategorija_id']=$kategorija;
        $dataProizvod['datum_postavke']=$datum;
        return $this->db->updateTable('proizvod',$id,$dataProizvod);

    }

    public function deleteProduct($proizvodId)
    {
        return $this->db->deleteTable('proizvod',$proizvodId);
    }

    public function insertPrice($data,$proizvod_id,$tip)
    {
        if($tip==1)
        {
            $kolicina=$data['cene']['kolicina'];
            $cena=$data['cene']['cena'];
            if($data['cene']['cena_popust']!=null)
            {
                $cena_popust=$data['cene']['cena_popust'];
            }
            else
            {
                $cena_popust=null;
            }
            $aktivna=1;
            $glavna_cena=1;
            $params=[$kolicina,$cena,$cena_popust,$aktivna,$glavna_cena,$proizvod_id];
            $this->db->executeQueryWithParamsGetLastId('INSERT INTO cena_proizvod(kolicina,cena,cena_popust,aktivna,glavna_cena,proizvod_id)VALUES(?,?,?,?,?,?)',$params);
        }
        else
        {
            for($i=0;$i<count($data);$i++)
            {

                $kolicina=$data[$i]['kolicina'];
                $cena=$data[$i]['cena'];
                if($data[$i]['cena_popust']!=null)
                {
                    $cena_popust=$data[$i]['cena_popust'];
                }
                else
                {
                    $cena_popust=null;
                }
                $aktivna=1;
                $glavna_cena=$data[$i]['glavna_cena'];
                $params=[$kolicina,$cena,$cena_popust,$aktivna,$glavna_cena,$proizvod_id];
                $this->db->executeQueryWithParamsGetLastId('INSERT INTO cena_proizvod(kolicina,cena,cena_popust,aktivna,glavna_cena,proizvod_id)VALUES(?,?,?,?,?,?)',$params);
            }

        }

    }

    public function updatePrice($data,$tip)
    {
        $okCene=true;
        if($tip==1)
        {
            $id=$data['cene']['idCene'];
            $dataCena['kolicina']=$data['cene']['kolicina'];
            $dataCena['cena']=$data['cene']['cena'];
            if($data['cene']['cena_popust']!=null)
            {
                $dataCena['cena_popust']=$data['cene']['cena_popust'];
            }
            else
            {
                $dataCena['cena_popust']=null;
            }
            $dataCena['aktivna']=1;
            $dataCena['glavna_cena']=1;
            $okCene= $this->db->updateTable('cena_proizvod',$id,$dataCena);

        }
        else
        {
            for($i=0;$i<count($data);$i++)
            {
                $id=$data[$i]['idCene'];
                $dataCena['kolicina']=$data[$i]['kolicina'];
                $dataCena['cena']=$data[$i]['cena'];
                if($data[$i]['cena_popust']!=null)
                {
                    $dataCena['cena_popust']=$data[$i]['cena_popust'];
                }
                else
                {
                    $dataCena['cena_popust']=null;
                }
                $dataCena['aktivna']=1;

                $dataCena['glavna_cena']=$data[$i]['glavna_cena'];


                $okCene= $this->db->updateTable('cena_proizvod',$id,$dataCena);
            }

        }
        return $okCene;
    }

    public function deletePrice($priceId)
    {
        return $this->db->deleteTable('cena_proizvod',$priceId);
    }
}