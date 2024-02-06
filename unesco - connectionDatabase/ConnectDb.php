<?php

 class Database {
    private $connector;
    private $connection;

    public function __construct(){

        try
        {
            $connector = new PDO('mysql:host=localhost;dbname=db_unesco;charset=utf8', 'root', 'root');
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

    public function getAllUnescoSite(){
        $query = "SELECT * FROM t_site_unesco";
        $req = $this->querySimpleExecute($query);
        $datas = $req->fetchALL(PDO::FETCH_ASSOC);
        return $datas;
    }

    public function getAllUser() {
     $query = "SELECT * FROM t_user";
     $req = $this->querySimpleExecute($query);
     $datas = $req->fetchAll(PDO::FETCH_ASSOC);
     return $datas;
    }

  public function getOneUser(var user_id) {
     $query = "SELECT * FROM t_user WHERE t_user.id=" . user_id . ";";
     $req = $this->querySimpleExecute($query);
     $datas = $req->fetchAll(PDO::FETCH_ASSOC);
     return $datas;
  }
 }
?>
