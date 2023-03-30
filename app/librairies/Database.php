<?php
class Database {
    $db_name="hospitaldb";
    $db_user ="localhost";
    private = DB.HOST;
    private $connexion;
    private $statement;
    //constructor: $connexion //PDO
    public function __construct() {
        $this->connexion = new PDO('mysql:host='.$this->db_host.';dbname='.$this->db_name, $this->db_user);
    }
        prepare($sql):$this->statement=$this->connexion->prepare($sql)
    function execute() {
        return $this->statement->execute();
    }
    function single() {
        $this->execute();
        return $this->statement->fetch();
    }
    
    function resultset() {
        $this->execute();
        return $this->statement->fetchAll();
    }

    function rowCount() {
        return $this->statement->rowCount();
    }
}
?>