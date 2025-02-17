<?php

use TourDeMaroc\App\models\users;
use TourDeMaroc\App\Libraries\Session;

class LoginController extends Controller {
    public function index() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'];
            $mot_de_passe = $_POST['mot_de_passe'];

            $result = users::verfierData($email, $mot_de_passe);
            
            if ($result === true) {
                $userModel = new users();
                $user = $userModel->GetUserMail($email);
                $role = $user["role"];
                
                $_SESSION["user_id"] = $user["utilisateur_id"];
                $_SESSION["role"] = $role;
              
                if ($role === "administrateur") {
                    header("Location: /adminDash");
                    exit;
                } elseif ($role === "cycliste") {
                    header("Location: /tour_de_maroc/CyclistController/cyclysteDash");
                    exit;
                } else {
                    header("Location: /tour_de_maroc/Fan/index");
                    // header("Location: /tour_de_maroc/virtualteam/create");
                    exit;
                }
            } else {
                echo "<script>alert('$result');</script>";
            }
        }
        $this->view("login");
    }



}

    

