<?php
class utilisateureApi extends Controller
{
  public function __construct()
  {
    $this->userModel = $this->model('Utilisateur');
    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
  }

  public function AddUser()
  {

    header('Acces-Control-Allow-Methods: POST');
    header('Acces-Control-Allow-Headers: Acces-Control-Allow-Methods,Content-Type,Acces-Control-Allow-Headers,Authorization,X-Requested-With');
    //Create the reference
      $postedData = json_decode(file_get_contents("php://input"));
      $data = [
        'nom' => $_POST['nom'],
        'prenom' => $_POST['prenom'],
        'email' => $_POST['email'],
        'password' => $_POST['password'],
        'img' => $_FILES['img'],
        'confirm_password' => trim($_POST['confirm_password']),
        'nom_err' => '',
        'prenom_err' => '',
        'email_err' => '',
        'password_err' => '',
        'confirm_password_err' => '',
        'img_err' => ''
      ];
      $imag_name = $data['img']['name'];
      $imag_size = $data['img']['size'];
      $tmp_name = $data['img']['tmp_name'];

      if ($imag_size > 10250000) {
        $data['img_err'] = "sorry , your file is too large ";
      } else {
        $img_ex = pathinfo($imag_name, PATHINFO_EXTENSION);
        $img_ex_lc = strtolower($img_ex);
        $allowed_exs = array("jpg", "jpeg", "png");
        if (in_array($img_ex_lc, $allowed_exs)) {
          $new_img_name = uniqid("IMG-", true) . '.' . $img_ex_lc;
          $img_upload_path = "img/$new_img_name";
          move_uploaded_file($tmp_name, $img_upload_path);
          $data['img'] = URLROOT . "/img/$new_img_name";
        } else {
          $data['img_err'] = "you can't upload files of this type";
        }
  
      if (empty($data['nom'])) {
        $data['nom_err'] = 'x';
      }
      if (empty($data['prenom'])) {
        $data['prenom_err'] = 'x';
      }
      if (empty($data['email'])) {
        $data['email_err'] = 'x';
      }
      if (empty($data['password'])) {
        $data['password_err'] = 'x';
      }
      if(empty($data['confirm_password'])){
        $data['confirm_password_err'] = 'Pleae confirm password';
      } else {
        if($data['password'] != $data['confirm_password']){
          $data['confirm_password_err'] = 'Passwords do not match';
        }
      }
      // Make sure no errors
      if (empty($data['nom_err']) && empty($data['prenom_err']) && empty($data['email_err']) && empty($data['password_err']) && empty($data['confirm_password_err'])) {
        // Validated
        $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
        if ($this->userModel->register($data)){
          $arr = array(
            'messproduit_note' => 'User Added'
          );
          echo json_encode($arr);
        } else {
          $arr = array(
            'messproduit_note' => 'Something went wrong'
          );
          echo json_encode($arr);
        }
      }else {
        $arr = array(
          'messproduit_note' => 'Something went wrong'
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
    'email' => $_POST['email'],
    'password' => $_POST['password']
  ];

  if ($this->userModel->login($data['email'],$data['password']) != false) {
    echo json_encode($this->userModel->login($data['email'],$data['password']));
  }else{
    $arr = array(
      'message' => 'Something went wrong'
    );
    echo json_encode($arr);
  }
}

public function getOneUser($id){
  $utilisateur = $this->userModel->getUserById($id);
  echo json_encode($utilisateur);
}

}
