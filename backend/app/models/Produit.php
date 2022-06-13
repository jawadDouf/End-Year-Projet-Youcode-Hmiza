<?php
  class Produit {
    private $db;

    public function __construct(){
      $this->db = new Database;
    }
    
    
    public function addProduit($data){
      $this->db->query('INSERT INTO produits (produit_nom,produit_description,produit_categorie,produit_souscategorie,produit_souscategorie2,produit_img) VALUES(:produit_nom,:produit_description,:produit_categorie,:produit_souscategorie,:produit_souscategorie2,:produit_img)');
      // Bind values
      $this->db->bind(':produit_nom', $data['produit_nom']);
      $this->db->bind(':produit_description', $data['produit_description']);
      $this->db->bind(':produit_categorie', $data['produit_categorie']);
      $this->db->bind(':produit_souscategorie', $data['produit_souscategorie']);
      $this->db->bind(':produit_souscategorie2', $data['produit_souscategorie2']);
      $this->db->bind(':produit_img', $data['produit_img2']);
      // Execute
      if($this->db->execute()){
        
        return true;
      } else {
        return false;
      }
    }
   
    public function search($produit){
       $produit_string = "%" . $produit . "%";
       $this->db->query('SELECT * FROM Produits
                        -- INNER JOIN Produit_Business
                        -- ON Produits.produit_id = Produit_Business.produit_id
                        -- INNER JOIN Business 
                        -- ON Business.business_id = Produit_Business.business_id
                        WHERE Produits.produit_nom  LIKE :produit
                        ');       
    $this->db->bind(':produit', $produit_string);
    $results = $this->db->resultSet();
    return $results;  
    }

    public function getAll(){
      
      $this->db->query('SELECT * FROM Produits
                      -- Full OUTER JOIN Produit_Business
                      -- ON Produits.produit_id = Produit_Business.produit_id
                      --  INNER JOIN Business 
                      --  ON Business.business_id = Produit_Business.business_id
                       ');       
   $results = $this->db->resultSet();
   return $results;  

    }

   public function searchOnlyProducts($produit){
     $produit_string = $produit . "%";
     $this->db->query('SELECT * FROM Produits
                       WHERE Produits.produit_nom  LIKE :produit');
     $this->db->bind(':produit', $produit_string);
     $results = $this->db->resultSet();
      return $results;
   }
  
  public function getProductById($id){
                 $this->db->query('SELECT * FROM Produits
                 INNER JOIN Produit_Business
                 ON Produits.produit_id = Produit_Business.produit_id
                 INNER JOIN Business 
                 ON Business.business_id = Produit_Business.business_id
                 WHERE Produits.produit_id = :id
    ');
    // Bind value 
    $this->db->bind(':id', $id);
    $row = $this->db->single();
    return $row;
  }
  public function getOneProduct($id){
    $this->db->query('SELECT * FROM Produits
                       WHERE produit_id = :id
');
// Bind value 
$this->db->bind(':id', $id);
$row = $this->db->single();
return $row;
}

  
}