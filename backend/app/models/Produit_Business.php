<?php
  class Produit_Business {
    private $db;

    public function __construct(){
      $this->db = new Database;
    }
    
    public function addBusinessProduct($data){
        $this->db->query('INSERT INTO produit_business (produit_id,business_id,produit_prix,produit_img2) VALUES(:produit_id,:business_id,:produit_prix,:produit_img2)');
        // Bind values
        $lastId = $data['produit_id'] + 1;
        $this->db->bind(':produit_id', $lastId);
        $this->db->bind(':business_id', $data['business_id']);
        $this->db->bind(':produit_prix', $data['produit_prix']);
        $this->db->bind(':produit_img2', $data['produit_img2']);
        // Execute
        if($this->db->execute()){
          return true;
        }else{
          return false;
        }
    }


    public function addBusinessProductToOldProduct($data){
      $this->db->query('INSERT INTO produit_business (produit_id,business_id,produit_prix,produit_img2) VALUES(:produit_id,:business_id,:produit_prix,:produit_img2)');
      // Bind values     
      $this->db->bind(':produit_id', $data['produit_id']);
      $this->db->bind(':business_id', $data['business_id']);
      $this->db->bind(':produit_prix', $data['produit_prix']);
      $this->db->bind(':produit_img2', $data['produit_img2']);
      // Execute
      if($this->db->execute()){
        return true;
      }else{
        return false;
      }
  }
    public function updateNote($data){

      $product = $this->getOneProduct($data['produit_business_id']);
      $note = ($product->produit_note + $data['note']) / 2;
      echo $note;
      $this->db->query('UPDATE produit_business SET produit_note = :produit_note  WHERE id = :id');
      // Bind values
      $this->db->bind(':produit_note', $note);
      $this->db->bind(':id', $data['produit_business_id']);

     
      // Execute
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    }

    public function updateProduit($data){
      $this->db->query('UPDATE produit_business SET  produit_prix = :produit_prix , produit_img2 = :produit_img WHERE id = :id');
      // Bind values
      $this->db->bind(':id', $data['produit_id']);
      $this->db->bind(':produit_prix', $data['produit_prix']);
      $this->db->bind(':produit_img', $data['produit_img']);
      //Execute
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }

    }
     
    public function getProductsOfBusiness($id){
      $this->db->query('SELECT * FROM produit_business 
                        INNER JOIN produits 
                        ON produit_business.produit_id = produits.produit_id
                        AND produit_business.business_id = :id');
      // Bind value
      $this->db->bind(':id', $id);
      $results = $this->db->resultSet();
       return $results; 
    }
   
    public function getlastProductsOfBusiness($id){
      $this->db->query('SELECT * FROM produit_business 
      INNER JOIN produits 
      ON produit_business.produit_id = produits.produit_id
      AND produit_business.business_id = :id
      ORDER BY id DESC
      LIMIT 1');
      // Bind value
      $this->db->bind(':id', $id);
      $results = $this->db->resultSet();
      return $results; 
    }
    public function getProductsBusiness($id){
       $this->db->query('SELECT * FROM produit_business 
                        INNER JOIN Business
                        ON produit_business.business_id = Business.business_id
                        AND produit_business.produit_id = :id');
      // Bind value
      $this->db->bind(':id', $id);
      $results = $this->db->resultSet();
       return $results; 
    }

    
     
   

    public function getOneProduct($id){
      $this->db->query('SELECT * FROM produit_business
                        INNER JOIN produits
                        ON produit_business.produit_id = produits.produit_id
                        INNER JOIN business
                        ON  produit_business.business_id = business.business_id
                        AND  id = :id 
                        ');
     // Bind value
     $this->db->bind(':id', $id);
     $row = $this->db->single();
      return $row;
   }

    
  
    public function deleteProduit($id){
      $this->db->query('DELETE  FROM produit_business WHERE id = :id');                 
      // Bind values
      $this->db->bind(':id',$id);
      // Execute
      if($this->db->execute()){
        return true;
      } else {
        return false;
      }
    }
}