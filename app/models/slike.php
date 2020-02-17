<?php


namespace app\models;


class slike
{
    private $db;

    public function __construct(db $db)
    {
        $this->db=$db;
    }

    public function uploadImage($fileName,$directory)
    {
        $dozvoljeneEks = array("gif", "jpeg", "jpg", "png", "swf", "JPG", "PNG", "JPEG", "GIF");
        $temp = explode(".", $_FILES[$fileName]['name']);
        $extension = end($temp); //Ekstenzija
        if($_FILES[$fileName]['size'] < 200000000 && in_array($extension, $dozvoljeneEks)){

            if(file_exists("../app/assets/images" . $directory . "/" . $_FILES[$fileName]['name']))
            {
                $split = explode(".", $_FILES[$fileName]['name']);
                $split[0] = $split[0] . rand();
                $file = implode('.', $split);
            }
            else
            {
                $file = $_FILES[$fileName]['name'];
            }
            $_SESSION[$fileName] = $file;
            $ok=move_uploaded_file($_FILES[$fileName]['tmp_name'], "../app/assets/images" . $directory . "/" . $_SESSION[$fileName]);
            return $ok;
        }

    }

    public function insert($putanja,$alt,$datum)
    {
        $params=[$putanja,$alt,$datum];
        return $this->db->executeQueryWithParamsGetLastId('INSERT INTO slike(putanja,alt,datum) VALUES(?,?,?)',$params);
    }

    public function update($id,$data)
    {
        return $this->db->updateTable('slike',$id,$data);
    }

    public function delete($idSlike)
    {
        return $this->db->deleteTable('slike',$idSlike);

    }

}