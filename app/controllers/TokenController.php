<?php


use TourDeMaroc\App\Entity\ResetPassword;
use TourDeMaroc\App\Helpers\SendMail;
use TourDeMaroc\App\models\ResetPasswordModel;
use TourDeMaroc\App\models\users;

class TokenController extends Controller
{


    public function index()
    {
        $this->view("login");
    }


    public function mot_de_passe_oublie()
    {
        if (isset($_GET['Error'])){
            $EmailNotFound = true;
        }
        if ($_SERVER['REQUEST_METHOD'] === 'POST'){
            $email = $_POST['email'];
            $newUser = new users();

            $IfEmailExistInDb = $newUser->GetUserMail($email);
            if ($IfEmailExistInDb === false){
                header('Location: '.URL_ROOT .'/ResetPassword/mot_de_passe_oublie?Error=EmailNotFound');
            }
            else{
                $token = bin2hex(random_bytes(16));
                $hashToken = hash('sha256', $token);
                $ExpiredTime = date('Y-m-d H:i:s', time() + (30 * 60));

                $newToken = new ResetPassword(null,$hashToken, $ExpiredTime, null);
                $newTokenModel = new ResetPasswordModel();
                $test = $newTokenModel->addToken($newToken);
                var_dump($test);

                if ($test === true){
                    SendMail::SendMail($email,'testsfdkjfs');
                    header('Location: '.URL_ROOT .'/ResetPassword/mot_de_passe_oublie?Status=Email_Send');
                }

            }


        }
        $this->view('ResetPassword/mot_de_passe_oublie');
    }

    public function CheckToken()
    {



    }

}