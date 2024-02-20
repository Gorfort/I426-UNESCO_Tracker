<?php

 class Database {
    private $connector;
    private $connection;

    public function __construct(){

        try
        {
            $connection = 'mysql:host=localhost;dbname=dbdurabilite;charset=utf8', 'root', 'root';
            $this->connector = new PDO($connection);
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

    public function getOneUnescoSite($site_id) {
        $query = "SELECT * FROM t_site_unesco WHERE id_site_unesco=" . $site_id . ";";
        $req = $this->querySimpleExecute($query);
        $datas = $req->fetchALL(PDO::FETCH_ASSOC);
        return $datas;
    }

    public function getAllUnescoSite() {
        $query = "SELECT * FROM t_site_unesco";
        $req = $this->querySimpleExecute($query);
        $datas = $req->fetchALL(PDO::FETCH_ASSOC);
        return $datas;
    }

    public function getAllUser() {
        $query = "SELECT * FROM t_user";
        $req = $this->querySimpleExecute($query);
        $datas = $req->fetchALL(PDO::FETCH_ASSOC);
        return $datas;
    }

    public function getOneUser($user_id) {
       $query = "SELECT * FROM t_user WHERE t_user.id=" . $user_id . ";";
       $req = $this->querySimpleExecute($query);
       $datas = $req->fetchALL(PDO::FETCH_ASSOC);
       return $datas;
    }

    public function getUserHistory($user_id) {
        $query = "SELECT * FROM t_history WHERE fk_user=" . $user_id . ";";
        $req = $this->querySimpleExecute($query);
        $datas = $req->fetchALL(PDO::FETCH_ASSOC);
        return $datas;
    }

    public function insertUser($username, $password {
        $query = "INSERT INTO t_user(username, password) VALUES (" . $username . ", " . $password . ");";
        $req = $this->querySimpleExecute($query);
        $datas = $req->fetchALL(PDO::FETCH_ASSOC);
        return $datas;
    }

    public function deleteUser($user_id) {
        $query = "DELETE FROM t_user WHERE user_id=" . $user_id . ";";
        $req = $this->querySimpleExecute($query);
        $datas = $req->fetchALL(PDO::FETCH_ASSOC);
    }
 }
?>
