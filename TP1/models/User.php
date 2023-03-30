//TODO : update, delete, insert

<?php
class Database{
    private $host = "localhost";
    private $dbname ="tpDB";
    private $table="user";
    private $id="id";
    private $username="ingeweb";
    private $email="example@example.com";
    private $password="orange";
    private $role="admin"; //admin or normal
    private $created_at="2023-01-01 00:00:00";
    private $updated_at="2023-01-01 00:00:00";

    protected $_connexion;
       
    public function getConnexion()
    {
        $this->_connexion = null;
        try{
            $this->_connexion = new PDO(
                'mysql:host=' . $this->host . ';dbname=' . $this->dbname,
            $this->username,
            $this->password);
        }catch(PDOException $exception){
            echo "Err : " . $exception->getMessage();
        }        
    }
    public function create(){
        $sql = "CREATE TABLE IF NOT EXISTS user (
            id INT NOT NULL AUTO_INCREMENT,
            username VARCHAR(100) NOT NULL, 
            email VARCHAR(100) NOT NULL, 
            password BINARY NOT NULL, 
            role VARCHAR(50) NOT NULL,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            updated_at DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
            PRIMARY KEY(id))";
            $query = $this->_connexion->prepare($sql);
            $query->execute();
    }

    public function insert($username1, $email1, $password1, $role1, $created_at1, $updated_at1){
        $sql = "INSERT INTO " . $this->table . " (username, email, password, role, created_at, updated_at) VALUES(".$username1.", ".$email1.", ".$password1.", ".$role1.", ".$created_at1.", ".$updated_at1.")";
        $query = $this->_connexion->prepare($sql);
        $query->execute();
    }

    public function delete(){
        $sql = "DELETE FROM " . $this->table . " where id = ?". $this->id;
        $query = $this->_connexion->prepare($sql);
        $query->execute();
    }


    public function getAll()
    {
        $sql = "SELECT * FROM " . $this->table;
        $query = $this->_connexion->prepare($sql);
        $query->execute();
        return $query->fetchAll();
    }

    public function getOne()
    {
        $sql = "SELECT * FROM " . $this->table . " where id = ?". $this->id;
        $query = $this->_connexion->prepare($sql);
        $query->execute();
        return $query->fetch();
    }
}

?>

