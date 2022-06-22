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
        $this->db->query('UPDATE review SET titre = :titre, description = :description , note = :note WHERE review_id = :id');
        // Bind values
        $this->db->bind(':id', $data['id']);
        $this->db->bind(':titre', $data['titre']);
        $this->db->bind(':description', $data['description']);
        $this->db->bind(':note', $data['note']);
        // $this->db->bind(':utilisateur_id', $data['utilisateur_id']);
        //Execute
        if($this->db->execute()){
          return true;
        } else {
          return false;
        }
      }

      public function deleteReview($id){
        $this->db->query('DELETE FROM review WHERE review_id = :review_id');                 
        // Bind values
        $this->db->bind(':review_id',$id);
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
 
      public function getLastReviewOfPb($id){
        $this->db->query('SELECT * FROM review 
                          INNER JOIN utilisateur
                          WHERE review.produit_business_id = :id 
                          AND review.utilisateur_id = utilisateur.id
                          ORDER BY review.review_id DESC
                          LIMIT 1');       
        $this->db->bind(':id',$id);
        $results = $this->db->resultSet();
        // $reviewsNumber = $results->$this->db->rowCount();
       
        
        return $results;
      }
      
      
      public function getReviewOfUser($id){
        $this->db->query('SELECT * FROM review 
                          INNER JOIN produit_business      
                          ON utilisateur_id = :id
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
      public function getReviewsNumber($id){
        $this->db->query('SELECT * FROM review 
        INNER JOIN produit_business      
        ON utilisateur_id = :id
        ');       
        $this->db->bind(':id',$id);
        $results = $this->db->resultSet();
        // $reviewsNumber = $results->$this->db->rowCount();
        $reviewsNumber = $this->db->rowCount();
        
        return $reviewsNumber;
      }
      public function latestReview($id){
        $this->db->query('SELECT * FROM review 
        INNER JOIN produit_business
        ON review.produit_business_id = produit_business.id
        INNER JOIN business
        ON business.business_id = produit_business.business_id
        AND produit_business.business_id = :id');
    
        $this->db->bind(':id', $id);
        $results = $this->db->resultSet();
         return $results; 
      }

  }

    

  





