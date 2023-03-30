<?php

include '../librairies/Controller.php';

Class Doctor extends Controller{
    private $id;
    private $name;
    private $email;
    private $password;
    private $speciality;
    private $db;
    
    // public function __construct() {
    //     $this->db = new Database();
    // }

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

    //password_verify(string $password, string $hash): bool
    public function login($email, $password) {
        $this->db->prepare("SELECT * FROM doctors WHERE email = ".$email.";");
        $this->db->execute();
        if ($this->db->rowCount() > 0) {
            $row = $this->db->single();
            $hashed_password = $row->password;
            if (password_verify($password, $hashed_password)) {
                return $row;
            } else {
                return false;
            }
        } else {
            return false;
        }               
    }

    private $data = [
        'password-error' => "password less than 6 characters",
        'name-error' => "name is required",
        'email-error' => "email is required or already exists",
    ];
    public function register($data){
        //Case where the form is submitted
        if ($_SERVER['REQUEST_METHOD'] == 'POST'){
            $this->db->prepare("INSERT INTO doctors (name, email, password, speciality) 
            VALUES (".$data.");");
            //Check if the name is null
            if ($data['name'] == null) {
                return $this->data['name-error'];
            }
    
            //Check if the email is already in the database or null
            if ($this->fetchDoctorByEmail($data['email']) || $data['email'] == null) {
                return $this->data['email-error'];
            }
            
            //Check if the password is less than 6 characters
            if (strlen($data['password']) < 6) {
                return $this->data['password-error'];
            }
            
            if($this->db->execute()){
                return true;
            } else {
                return false;
            }

        }
        //Case where the form is not submitted
        else{
            return false;
            }
    }

    public function getDoctorById($id) {
        $this->db->prepare("SELECT * FROM doctors WHERE id = ".$id.";");
        $this->db->execute();
        if ($this->db->rowCount() > 0) {
            return $this->db->single();
        } else {
            return false;
        }
    }

    private $doctorModel;
    public function __construct(){
        $this->doctorModel=$this->model('Doctor');
    }
}
?>
