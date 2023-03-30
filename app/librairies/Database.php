<?php
class Database {
    private $db_name="hospital";
    private $db_host ="localhost";
    private $db_user ="ingeweb";
    private $db_password ="orange";

    private $connexion;
    private $statement;
    //constructor: $connexion //PDO
    /*public function __construct() {
        $this->connexion = new PDO('mysql:host='.$this->db_host.';dbname='.$this->db_name, $this->db_user, $this->db_password);
    }*/

    public function __construct()
    {
        $this->connexion = null;
        try{
            $this->connexion = new PDO(
                'mysql:host=' . $this->db_host . ';dbname=' . $this->db_name,
            $this->db_user,
            $this->db_password);
        }catch(PDOException $exception){
            echo "Err : " . $exception->getMessage();
        }        
    }
    

    //:$this->statement=$this->connexion->prepare($sql);
    function prepare($sql)
    {
        $this->statement = $this->connexion->prepare($sql);
    }
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

$c = new Database();

?>