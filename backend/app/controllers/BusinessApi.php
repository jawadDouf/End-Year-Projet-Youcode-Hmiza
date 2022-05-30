<?php
class BusinessApi extends Controller
{
  public function __construct()
  {
    $this->businessModel = $this->model('Business');
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
  }

  public function AddBusiness()
  {

    header('Acces-Control-Allow-Methods: POST');
    header('Acces-Control-Allow-Headers: Acces-Control-Allow-Methods,Content-Type,Acces-Control-Allow-Headers,Authorization,X-Requested-With');
    //Create the reference
      $postedData = json_decode(file_get_contents("php://input"));
      $data = [
        'business_nom' => $_POST['business_nom'],
        'business_location' => $_POST['business_location'],
        'business_email' => $_POST['business_email'],
        'business_password' => $_POST['business_password'],
        'confirm_password' => trim($_POST['confirm_password']),
        'business_profileImage' => $_FILES['business_profileImage'],  
        'business_adresse' => trim($_POST['business_adresse']),
        'business_profession' => trim($_POST['business_profession']),
        'business_sousprofession' => trim($_POST['business_sousprofession']),
        'business_description' => trim($_POST['business_description']),
        'business_nom_err' => '',
        'business_location__err' => '',
        'business_email_err' => '',
        'business_password_err' => '',
        'confirm_password_err' => '',
        'business_profession_err' => '',
        'business_sousprofession_err' => '',
        'business_description_err' => '',
        'business_profilImage_err' => ''
      ];
      $imag_name = $data['business_profileImage']['name'];
      $imag_size = $data['business_profileImage']['size'];
      $tmp_name = $data['business_profileImage']['tmp_name'];

      if ($imag_size > 10250000) {
        $data['business_profileImage_err'] = "sorry , your file is too large ";
      } else {
        $img_ex = pathinfo($imag_name, PATHINFO_EXTENSION);
        $img_ex_lc = strtolower($img_ex);
        $allowed_exs = array("jpg", "jpeg", "png");
        if (in_array($img_ex_lc, $allowed_exs)) {
          $new_img_name = uniqid("IMG-", true) . '.' . $img_ex_lc;
          $img_upload_path = "img/$new_img_name";
          move_uploaded_file($tmp_name, $img_upload_path);
          $data['business_profileImage'] = URLROOT . "/img/$new_img_name";
        } else {
          $data['business_profileImage_err'] = "you can't upload files of this type";
        }
  
      if (empty($data['business_nom'])) {
        $data['business_nom_err'] = 'x';
      }
      if (empty($data['business_location'])) {
        $data['business_location_err'] = 'x';
      }
      if (empty($data['business_profileImage'])) {
        $data['business_profileImage_err'] = 'x';
      }
      if (empty($data['business_email'])) {
        $data['business_email_err'] = 'x';
      }
      if (empty($data['business_password'])) {
        $data['business_password_err'] = 'x';
      }
      if(empty($data['confirm_password'])){
        $data['confirm_password_err'] = 'Pleae confirm business_password';
      } else {
        if($data['business_password'] != $data['confirm_password']){
          $data['confirm_password_err'] = 'Passwords do not match';
        }
      }
      // Make sure no errors
      if (empty($data['business_nom_err']) && empty($data['business_location_err']) && empty($data['business_email_err']) && empty($data['business_password_err']) && empty($data['confirm_password_err'])) {
        // Validated
        $data['business_password'] = password_hash($data['business_password'], PASSWORD_DEFAULT);
        if ($this->businessModel->register($data)){
          $arr = array(
            'messproduit_note' => 'Business Added'
          );
          echo json_encode($arr);
        } else {
          $arr = array(
             'messproduit_note' => 'Something went wrong1'
          );
          echo json_encode($arr);
        }
      }else {
        $arr = array(
          'messproduit_note' => 'Something went wrong2'
        );
        echo json_encode($arr);
      }
  }
}
         

public function login()
{
  header('Acces-Control-Allow-Methods: POST');
  header('Acces-Control-Allow-Headers: Acces-Control-Allow-Methods,Content-Type,Acces-Control-Allow-Headers,Authorization,X-Requested-With');
  $postedData = json_decode(file_get_contents("php://input"));
  $data = [
    'email' => $_POST['business_email'],
    'password' => $_POST['business_password']
  ];

  if ($this->businessModel->login($data['email'],$data['password']) != false) {
    echo json_encode($this->businessModel->login($data['email'],$data['password']));
  }else{
    $arr = array(
      'message' => 'Something went wrong'
    );
    echo json_encode($arr);
  }
}

public function getbusiness($id)
  {
         $business = $this->businessModel->getBusinessById($id);
         echo json_encode($business);
  }












}