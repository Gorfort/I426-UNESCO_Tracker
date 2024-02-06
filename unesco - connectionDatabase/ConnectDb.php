<?php

 class Database {
    private $connector;
    private $connection;

    public function __construct(){

        try
        {
            $connector = new PDO('mysql:host=localhost;dbname=dbdurabilite;charset=utf8', 'root', 'root');
        }
        catch (PDOException $e)
        {
            die('Erreur : ' . $e->getMessage());
        }
    }

    private function querySimpleExecute($query){

        $req = $this->connector->query($query);
        return $req;
    }

    public function getAllDatas(){
        $query = "SELECT * FROM t_site_unesco";
        $req = $this->querySimpleExecute($query);
        $datas = $req->fetchALL(PDO::FETCH_ASSOC);
        return $datas;
    }
 }
?>