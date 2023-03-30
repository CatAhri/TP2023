<?php
/* id INT,
    name VARCHAR(255),
    email VARCHAR(255),
    password VARCHAR(255),
    speciality VARCHAR(255),*/
Class Doctor{
    private $id;
    private $name;
    private $email;
    private $password;
    private $speciality;
    private $db;
    
    public function __construct() {
        $this->db = new Database();
    }

    //return true or false
    public function fetchDoctorByEmail($email) {
        $this->db->prepare("SELECT * FROM doctors WHERE email = ".$email.";");
        $this->db->execute();
        if ($this->db->rowCount() > 0) {
            return true;
        } else {
            return false;
        }

    }
?>
