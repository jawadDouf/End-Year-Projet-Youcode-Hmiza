<?php
  class Review {
    private $db;

    public function __construct(){
      $this->db = new Database;
    }
  

    public function addReview($data){
        $this->db->query('INSERT INTO review (titre,description,note,produit_business_id,utilisateur_id) VALUES(:titre,:description,:note,:produit_business_id,:utilisateur_id)');
        // Bind values
        $this->db->bind(':titre', $data['titre']);
        $this->db->bind(':description', $data['description']);
        $this->db->bind(':produit_business_id', $data['produit_business_id']);
        $this->db->bind(':note', $data['note']);
        $this->db->bind(':utilisateur_id', $data['utilisateur_id']);
        // Execute
        if($this->db->execute()){
          return true;
        } else {
          return false;
        }
      }
    
      public function updateReview($data){
        $this->db->query('UPDATE review SET titre = :titre, description = :description , produit_business_id = :produit_business_id , note = :note ,utilisateur_id = :utilisateur_id WHERE id = :id');
        // Bind values
        $this->db->bind(':id', $data['id']);
        $this->db->bind(':titre', $data['titre']);
        $this->db->bind(':description', $data['description']);
        $this->db->bind(':produit_business_id', $data['produit_business_id']);
        $this->db->bind(':note', $data['note']);
        $this->db->bind(':utilisateur_id', $data['utilisateur_id']);
        //Execute
        if($this->db->execute()){
          return true;
        } else {
          return false;
        }
      }

      public function deleteReview($id){
        $this->db->query('DELETE FROM review WHERE id = :id');                 
        // Bind values
        $this->db->bind(':id',$id);
        // Execute
        if($this->db->execute()){
          return true;
        } else {
          return false;
        }
      }

      public function getReviewOfPb($id){
        $this->db->query('SELECT * FROM review 
                          INNER JOIN utilisateur
                          WHERE produit_business_id = :id AND review.utilisateur_id = utilisateur.id');       
        $this->db->bind(':id',$id);
        $results = $this->db->resultSet();
        // $reviewsNumber = $results->$this->db->rowCount();
        $reviewsNumber = $this->db->rowCount();
        $data = [
          "result" => $results,
           "reviewsNumber" => $reviewsNumber
        ];
        return $data;
      }

      

      public function getReviewOfUser($id){
        $this->db->query('SELECT * FROM review 
                          INNER JOIN produit_business      
                          WHERE utilisateur_id = :id
                          And review.produit_business_id = produit_business.id');       
        $this->db->bind(':id',$id);
        $results = $this->db->resultSet();
        // $reviewsNumber = $results->$this->db->rowCount();
        $reviewsNumber = $this->db->rowCount();
        $data = [
           "result" => $results,
           "reviewsNumber" => $reviewsNumber
        ];
        return $data;
      }

    }





