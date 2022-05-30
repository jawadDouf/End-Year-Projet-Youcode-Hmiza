<?php 

class reviewApi extends Controller {

    public function __construct(){
        $this->reviewModel = $this->model('Review');
        $this->produit_businessModel = $this->model('Produit_Business');
        header('Access-Control-Allow-Origin: *');
        header('Content-Type: application/json'); 
      }


 public function addReview()
  {
    header('Acces-Control-Allow-Methods: POST');
    header('Acces-Control-Allow-Headers: Acces-Control-Allow-Methods,Content-Type,Acces-Control-Allow-Headers,Authorization,X-Requested-With');
    //Create the reference
      $postedData = json_decode(file_get_contents("php://input"));
      $data = [
        'titre' => $_POST['titre'],
        'description' => $_POST['description'],
        'note' => $_POST['note'],
        'produit_business_id' => $_POST['produit_business_id'],
        'utilisateur_id' => $_POST['utilisateur_id'],
        'titre_err' => '',
        'description_err' => '',
        'note_err' => '',
        'produit_business_id_err' => '',
        'utlisateur_id_err' => ''
      ];
      if (empty($data['titre'])) {
        $data['sujet_produit_err'] = 'x';
      }
      if (empty($data['description'])) {
        $data['description_err'] = 'x';
      }
      if (empty($data['note'])) {
        $data['note_err'] = 'x';
      }
      if (empty($data['produit_business_id'])) {
        $data['note_err'] = 'x';
      }
      if (empty($data['utlisateur_id'])) {
        $data['utlisateur_id_err'] = 'x';
      }

      // Make sure no errors
      if (empty($data['titre_err']) && empty($data['description_err']) && empty($data['note_err']) && empty($data['produit_id_err']) && empty($data['business_id_err'])) {
        // Validated
        if ($this->reviewModel->addReview($data) && $this->produit_businessModel->updateNote($data)){
          $arr = array(
            'messnote' => 'review Added'
          );
          echo json_encode($arr);
        } else {
          $arr = array(
            'messnote' => 'Something went wrong'
          );
          echo json_encode($arr);
        }
      }
  }
  
  public function getProductReviews($id){
    $reviews = $this->reviewModel->getReviewOfPb($id);
    echo json_encode($reviews);

  }

  public function getUserReviews($id){
    $reviews = $this->reviewModel->getReviewOfUser($id);
    echo json_encode($reviews);
  }

  public function updateReview()
  {
    header('Acces-Control-Allow-Methods: POST');
    header('Acces-Control-Allow-Headers: Acces-Control-Allow-Methods,Content-Type,Acces-Control-Allow-Headers,Authorization,X-Requested-With');
    $postedData = json_decode(file_get_contents("php://input"));
    $data = [
      'id' => $POST['id'],
      'titre' => $POST['titre'],
      'description' => $POST['description'],
      'note' => $POST['note'],
      'produit_business_id' => $POST['produit_business_id'],
      'business_id' => $POST['business_id'],
      'id_err' => '',
      'titre_err' => '',
      'description_err' => '',
      'note_err' => '',
      'produit_business_id_err' => '',
      'business_id_err' => '',
      'id_err' => ''
    ];
    if (empty($data['titre'])) {
      $data['titre_err'] = 'x';
    }
    if (empty($data['description'])) {
      $data['description_err'] = 'x';
    }
    if (empty($data['note'])) {
      $data['note_err'] = 'x';
    }
    if (empty($data['produit_business_id'])) {
      $data['movieName_err'] = 'x';
    }
    if (empty($data['id'])) {
      $data['id_err'] = 'x';
    }
    if (empty($data['business_id'])) {
      $data['business_id_err'] = 'x';
    }
    // Make sure no errors
    if (
      empty($data['titre_err']) && empty($data['description_err']) && empty($data['note_err']) && empty($data['produit_business_id_err'])
      && empty($data['id_err'])
    ) {
      // Validated
      if ($this->reviewModel->updateReview($data)) {
        $arr = array(
          'messnote' => 'User Updated'
        );
        echo json_encode($arr);
      } else {
        $arr = array(
          'messnote' => 'Something went wrong'
        );
        echo json_encode($arr);
      }
    } else {
      // Load view with errors
      $arr = array(
        'messnote' => 'No Data'
      );
      echo json_encode($arr);
    }
  }

  public function delete()
  {
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
      $postedData = json_decode(file_get_contents("php://input"));
      $data = [
        'id' => $_POST['id']    
      ];
      if ($this->reviewModel->deleteReview($data['id'])) {
        $arr = array(
          'messnote' => 'Review Deleted'
        );
        echo json_encode($arr);
      } else {
        $arr = array(
          'messnote' => 'Something went wrong'
        );
        echo json_encode($arr);
      }
    }
  }
}