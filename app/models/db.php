<?php


namespace app\models;


class db
{
    private $server;
    private $database;
    private $username;
    private $password;


    private $conn;

    public function __construct($server,$database,$username,$password)
    {
        $this->server=$server;
        $this->database=$database;
        $this->username=$username;
        $this->password=$password;

        $this->connect();
    }

    public function connect(){
        try
        {
            $dsn='mysql:host='.$this->server.';dbname='.$this->database.';charset=utf8';
            $options = [
                \PDO::ATTR_ERRMODE            => \PDO::ERRMODE_EXCEPTION,
                \PDO::ATTR_DEFAULT_FETCH_MODE => \PDO::FETCH_OBJ,
                \PDO::ATTR_EMULATE_PREPARES   => false,
            ];
            $this->conn=new \PDO($dsn,$this->username,$this->password,$options);
//            $this->conn->setAttribute(\PDO::ATTR_DEFAULT_FETCH_MODE,\PDO::FETCH_OBJ);
//            $this->conn->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);


        }
        catch(PDOException $e)
        {
            echo $e->getMessage();
        }
    }

    //Osnovni sa promenljivim upitom
    public function executeQuery($query)
    {
        return $this->conn->query($query)->fetchAll();
    }

    public function executeQuerySingle($query)
    {
        return $this->conn->query($query)->fetch();
    }


    public function  executeQueryWithParams($query,$params)
    {
        $prepare=$this->conn->prepare($query);
        $prepare->execute($params);

        return $prepare->fetchAll();

        //Query koristi ? a params mora biti niz ['Ime',1];
    }
    public function  executeQueryWithParamsOneResault($query,$params)
    {
        $prepare=$this->conn->prepare($query);
        $prepare->execute($params);


        return $prepare->fetch();


    }

    public function  executeQueryWithParamsGetLastId($query,$params)
    {
        $prepare=$this->conn->prepare($query);
        $prepare->execute($params);


        return $this->conn->lastInsertId();
    }



    //Custom
    public function getAll($table)
    {
        return $this->conn->query("SELECT * FROM {$table}")->fetchAll();
    }
    public function getSingle($table,$id)
    {
        $prepare=$this->conn->prepare("SELECT * FROM {$table} WHERE id=?");

        $prepare->execute(array($id));

        return $prepare->fetch();
    }
    public function getSingleWhere($table,$column,$param)
    {
        $prepare=$this->conn->prepare("SELECT * FROM {$table} WHERE {$column}=?");

        $prepare->execute(array($param));

        return $prepare->fetch();
    }

    public function updateTable($table, $id, $data)
    {
        $s = '';
        $params=[];
        foreach ($data as $key => $value) {
            $s .= $key . ' = ?,';
            array_push($params,$value);
        }
        $set =  substr($s, 0, -1);

        $prepare=$this->conn->prepare("UPDATE {$table} SET {$set} WHERE id = ?");


        array_push($params,$id);
        $ok=$prepare->execute($params);

        if($ok==true)
        {
            return true;
        }
        else
        {
            return false;
        }
    }

    public  function deleteTable($table,$id)
    {
        $prepare=$this->conn->prepare("DELETE FROM {$table} WHERE id=?");

        $ok=$prepare->execute(array($id));

        if($ok)
        {
            return true;
        }
        else
        {
            return false;
        }
    }






}