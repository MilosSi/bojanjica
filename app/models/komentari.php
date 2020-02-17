<?php


namespace app\models;


class komentari
{
    private $db;

    public function __construct(db $db)
    {
        $this->db=$db;
    }

    public function getAllOrderBy($limit=5200,$offset=0,$order='komentar_id',$ordertype='ASC')
    {
        $params=[$limit,$offset];
        return $this->db->executeQueryWithParams("SELECT *,ka.id as komentar_id FROM komentari ka INNER JOIN korisnik k ON ka.korisinik_id=k.id INNER JOIN proizvod p ON ka.prozivod_id=p.id ORDER BY {$order} {$ordertype} LIMIT ? OFFSET ?",$params);
    }

    public function getAllByProductId($id)
    {
        $params=[$id];
        return $this->db->executeQueryWithParams('SELECT * FROM komentari k INNER JOIN korisnik ko ON k.korisinik_id=ko.id WHERE k.prozivod_id=?',$params);
    }

    public function addComment($naslov,$komentar,$ocena,$korisnikid,$datum,$proizvodid)
    {
        $params=[$naslov,$komentar,$ocena,$korisnikid,$datum,$proizvodid];
        $query='INSERT INTO komentari(naslov,komentar,ocena,korisinik_id,datum_komentara,prozivod_id) VALUES (?,?,?,?,?,?);';

        $idK=$this->db->executeQueryWithParamsGetLastId($query,$params);
        return $idK;
    }

    public function activateComment($id)
    {
        $data['aktivan']=1;
        return $this->db->updateTable('komentari',$id,$data);
    }

    public function deleteComment($idk)
    {
        return $this->db->deleteTable('komentari',$idk);
    }
}