<?php
  class Utilisateur {
    private $db;

    public function __construct(){
      $this->db = new Database;
    }
   

    // Regsiter user
    public function register($data){
        $this->db->query('INSERT INTO utilisateur (nom,prenom,email,password,img) VALUES(:nom,:prenom,:email,:password,:img)');
        // Bind values
        $this->db->bind(':nom', $data['nom']);
        $this->db->bind(':prenom', $data['prenom']);
        $this->db->bind(':email', $data['email']);
        $this->db->bind(':password', $data['password']);
        $this->db->bind(':img', $data['img']);
        // Execute
        if($this->db->execute()){
          return true;
        } else {
          return false;
        }
      }

      public function login($email, $password){
        $this->db->query('SELECT * FROM utilisateur WHERE email = :email');
        $this->db->bind(':email', $email);
  
        $row = $this->db->single();
  
        $hashed_password = $row->password;
        if(password_verify($password, $hashed_password)){
          return $row;
        } else {
          return false;
        }
      }

      public function getUserById($id){
        $this->db->query('SELECT * FROM utilisateur
        WHERE utilisateur.id = :id
        ');
        // Bind value 
         $this->db->bind(':id', $id);
         $row = $this->db->single();
          return $row;
}
  }