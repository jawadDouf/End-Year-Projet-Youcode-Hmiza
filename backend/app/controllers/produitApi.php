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
        'produit_nom' => $_POST['produit_nom'],
        'produit_description' => $_POST['produit_description'],
        'produit_categorie' => $_POST['produit_categorie'],
        'produit_souscategorie' => $_POST['produit_souscategorie'],
        'produit_souscategorie2' => $_POST['produit_souscategorie2'],
        'produit_prix' => $_POST['produit_prix'],
        'produit_id' => $_POST['produit_id'],
        'business_id' => $_POST['business_id'],
        'produit_img2' => $_FILES['produit_img2'],
        'sujet_produit_err' => '',
        'produit_description_err' => '',
        'produit_categorie_err' => '',
        'produit_souscategorie_err' => '',
        'produit_souscategorie2_err' => '',
        'produit_img2_err' => '',
        'produit_prix_err' => '',
        'produit_id_err' => '',
        'business_id_err' => ''
      ];
         $imag_name = $data['produit_img2']['name'];
          $imag_size = $data['produit_img2']['size'];
          $tmp_name = $data['produit_img2']['tmp_name'];

          if ($imag_size > 10250000) {
            $data['produit_img2_err'] = "sorry , your file is too large ";
          } else {
            $img_ex = pathinfo($imag_name, PATHINFO_EXTENSION);
            $img_ex_lc = strtolower($img_ex);
            $allowed_exs = array("jpg", "jpeg", "png","webp");
            if (in_array($img_ex_lc, $allowed_exs)) {
              $new_img_name = uniqid("IMG-", true) . '.' . $img_ex_lc;
              $img_upload_path = "img/$new_img_name";
              move_uploaded_file($tmp_name, $img_upload_path);
              $data['produit_img2'] = URLROOT . "/img/$new_img_name";
            } else {
              $data['produit_img2_err'] = "you can't upload files of this type";
            }}
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
        if ($this->produitModel->addproduit($data)){
          if($this->produit_businessModel->addBusinessProduct($data)){
         $arr = array(
            'message' => 'produit Added'
          );
          echo json_encode($arr);
          }
          
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