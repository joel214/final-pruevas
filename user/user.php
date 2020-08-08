<?php 

class user{

    public $id;
    public $userName;
    public $password;
    public $firstName;
    public $lastName;
    public $email;
    public $photo;


    public function inicializarData($id,$userName,$password,$firstName,$lastName,$email){


    $this->id = $id;
    $this->userName = $userName;
    $this->password = $password;
    $this->firstName = $firstName;
    $this->lastName = $lastName;
    $this->email = $email;


    
    
    }
}

?>
