<?php
  class produitApi extends Controller {
    public function __construct(){
      $this->produitModel = $this->model('Produit');
      $this->produit_businessModel = $this->model('Produit_Business');
      header('Access-Control-Allow-Origin: *');
      header('Content-Type: application/json'); 
    }
    
   
    public function addproduit()
  {
    header('Acces-Control-Allow-Methods: POST');
    header('Acces-Control-Allow-Headers: Acces-Control-Allow-Methods,Content-Type,Acces-Control-Allow-Headers,Authorization,X-Requested-With');
    //Create the reference
      $postedData = json_decode(file_get_contents("php://input"));
      $data = [
        'produit_nom' => $postedData->produit_nom,
        'produit_description' => $postedData->produit_description,
        'produit_categorie' => $postedData->produit_categorie,
        'produit_souscategorie' => $postedData->produit_souscategorie,
        'produit_souscategorie2' => $postedData->produit_souscategorie2,
        'produit_prix' => $postedData->produit_prix,
        'produit_id' => $postedData->produit_id,
        'business_id' => $postedData->business_id,
        'sujet_produit_err' => '',
        'produit_description_err' => '',
        'produit_categorie_err' => '',
        'produit_souscategorie_err' => '',
        'produit_souscategorie2_err' => '',
        'produit_prix_err' => '',
        'produit_id_err' => '',
        'business_id_err' => ''
      ];
      if (empty($data['produit_nom'])) {
        $data['sujet_produit_err'] = 'x';
      }
      if (empty($data['produit_description'])) {
        $data['produit_description_err'] = 'x';
      }
      if (empty($data['produit_categorie'])) {
        $data['produit_categorie_err'] = 'x';
      }
      if (empty($data['produit_souscategorie'])) {
        $data['produit_categorie_err'] = 'x';
      }
      if (empty($data['produit_souscategorie2'])) {
        $data['produit_souscategorie2_err'] = 'x';
      }
      if (empty($data['produit_prix'])) {
        $data['produit_prix_err'] = 'x';
      }
      if (empty($data['produit_id'])) {
        $data['produit_id_err'] = 'x';
      }
      if (empty($data['business_id'])) {
        $data['business_id_err'] = 'x';
      }

      // Make sure no errors
      if (empty($data['sujet_produit_err']) && empty($data['produit_description_err']) && empty($data['produit_categorie_err']) && empty($data['produit_id_err']) && empty($data['business_id_err'])) {
        // Validated
        if ($this->produitModel->addproduit($data) && $this->produit_businessModel->addBusinessProduct($data)){
          $arr = array(
            'message' => 'produit Added'
          );
          echo json_encode($arr);
        } else {
          $arr = array(
            'message' => 'Something went wrong'
          );
          echo json_encode($arr);
        }
      }
  }
 
  public function produitsSearch($produit)
  {
    header('Acces-Control-Allow-Methods: GET');
    header('Acces-Control-Allow-Headers: Acces-Control-Allow-Methods,Content-Type,Acces-Control-Allow-Headers,Authorization,X-Requested-With');
  if ($produit === "d") {
    $produits = $this->produitModel->getAll();
    echo json_encode($produits);
  }else{
    $produits = $this->produitModel->search($produit);
    echo json_encode($produits);
  } 
  }


  public function getOneProduct($id){
    $produit = $this->produitModel->getProductById($id);
    echo json_encode($produit);
  }

  public function getAllProducts(){
    $produits = $this->produitModel->getAll();
    echo json_encode($produits);


  }
  
}