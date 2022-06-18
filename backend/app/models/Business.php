<?php
  class Business {
    private $db;

    public function __construct(){
      $this->db = new Database;
 
   }

   public function register($data){
    $this->db->query('INSERT INTO business (business_nom,business_profileImage,business_email,business_password,business_location,business_adresse,business_profession,business_sousprofession,business_description) VALUES(:business_nom,:business_profileImage,:business_email,:business_password,:business_location,:business_adresse,:business_profession,:business_sousprofession,:business_description)');
    // Bind values
    $this->db->bind(':business_nom', $data['business_nom']);
    $this->db->bind(':business_profileImage', $data['business_profileImage']);
    $this->db->bind(':business_email', $data['business_email']);
    $this->db->bind(':business_password', $data['business_password']);
    $this->db->bind(':business_location', $data['business_location']);
    $this->db->bind(':business_adresse', $data['business_adresse']);
    $this->db->bind(':business_profession', $data['business_profession']);
    $this->db->bind(':business_sousprofession', $data['business_sousprofession']);
    $this->db->bind(':business_description', $data['business_description']);
    // Execute
    if($this->db->execute()){
      return true;
    } else {
      return false;
    }
  }

  public function login($email, $password){
    $this->db->query('SELECT * FROM business WHERE business_email = :email');
    $this->db->bind(':email', $email);

    $row = $this->db->single();

    $hashed_password = $row->business_password;
    if(password_verify($password, $hashed_password)){
      return $row;
    } else {
      return false;
    }
  }

  public function getBusinessById($id){
    $this->db->query('SELECT * FROM business
    WHERE business.business_id = :id
    ');
    // Bind value 
     $this->db->bind(':id', $id);
     $row = $this->db->single();
      return $row;
}

 public function getAll(){
  $this->db->query('SELECT * FROM business
    ');
    $results = $this->db->resultSet();
// $reviewsNumber = $results->$this->db->rowCount();
    return $results;
 }

 public function search($business){
  $business_string = $business . "%";
  $this->db->query('SELECT * FROM business
                    WHERE business.business_nom  LIKE :business');
  $this->db->bind(':business', $business_string);
  $results = $this->db->resultSet();
   return $results;
}











}