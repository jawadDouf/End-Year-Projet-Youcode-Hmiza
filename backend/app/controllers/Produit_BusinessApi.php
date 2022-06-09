<?php
 class Produit_BusinessApi extends Controller {
    public function __construct(){
        $this->produitModel = $this->model('Produit');
        $this->produit_businessModel = $this->model('Produit_Business');
        header('Access-Control-Allow-Origin: *');
        header('Content-Type: application/json'); 
      }

      
    
      public function addproduit_business()
      {
        header('Acces-Control-Allow-Methods: POST');
        header('Acces-Control-Allow-Headers: Acces-Control-Allow-Methods,Content-Type,Acces-Control-Allow-Headers,Authorization,X-Requested-With');
        //Create the reference
          $postedData = json_decode(file_get_contents("php://input"));
          $data = [
            'produit_prix' => $_POST['produit_prix'],
            'produit_id' => $_POST['produit_id'],
            'business_id' => $_POST['business_id'],
            'produit_img2' => $_FILES['produit_img2'],
            'produit_prix_err' => '',
            'produit_id_err' => '',
            'business_id_err' => '',
            'produit_img2_err' => ''
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
          if (empty($data['produit_prix_err']) && empty($data['produit_id_err']) && empty($data['business_id_err'])) {
            // Validated
            if ($this->produit_businessModel->addBusinessProductToOldProduct($data)){
              $arr = array(
                'messproduit_note' => 'relation Added'
              );
              echo json_encode($arr);
            } else {
              $arr = array(
                'messproduit_note' => 'Something went wrong'
              );
              echo json_encode($arr);
            }
          }
      }
    }
      public function getproduitsofAbusiness($id)
  {

         $produits = $this->produit_businessModel->getProductsOfBusiness($id);
         echo json_encode($produits);

  }

   


  public function getproduitsbusiness($id)
  {
         $produits = $this->produit_businessModel->getProductsBusiness($id);
         echo json_encode($produits);
  }

  public function updateProduit()
  {
    header('Acces-Control-Allow-Methods: POST');
    header('Acces-Control-Allow-Headers: Acces-Control-Allow-Methods,Content-Type,Acces-Control-Allow-Headers,Authorization,X-Requested-With');
    $postedData = json_decode(file_get_contents("php://input"));
    $data = [
      'id' => $postedData->id,
      'produit_id' => $postedData->produit_id,
      'produit_prix' => $postedData->produit_prix,
      'produit_note' => $postedData->produit_note,
      'id_err' => '',
      'produit_id_err' => '',
      'produit_prix_err' => '',
      'produit_note_err' => '',
      'id_err' => ''
    ];
    if (empty($data['produit_id'])) {
      $data['produit_id_err'] = 'x';
    }
    if (empty($data['produit_prix'])) {
      $data['produit_prix_err'] = 'x';
    }
    if (empty($data['produit_note'])) {
      $data['produit_note_err'] = 'x';
    }
    if (empty($data['id'])) {
      $data['id_err'] = 'x';
    }
    // Make sure no errors
    if (
      empty($data['produit_id_err']) && empty($data['produit_prix_err']) && empty($data['produit_note_err']) && empty($data['prefession_err'])
      && empty($data['id_err'])
    ) {
      // Validated
      if ($this->produit_businessModel->updateProduit($data)) {
        $arr = array(
          'messproduit_note' => 'Produit Updated'
        );
        echo json_encode($arr);
      } else {
        $arr = array(
          'messproduit_note' => 'Something went wrong'
        );
        echo json_encode($arr);
      }
    } else {
      // Load view with errors
      $arr = array(
        'messproduit_note' => 'No Data'
      );
      echo json_encode($arr);
    }
  }
  
      public function getoneproduct($id)
      {       
             $produit = $this->produit_businessModel->getOneProduct($id);
             echo json_encode($produit);
      }
      
  public function delete($id){
    echo "ddd";
    if ($this->produit_businessModel->deleteProduit($id)) {
        $arr = array(
            'message' => 'product Deleted'
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




?>