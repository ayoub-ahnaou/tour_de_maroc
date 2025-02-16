<?php


use TourDeMaroc\App\Entity\Token;
use TourDeMaroc\App\Helpers\SendMail;
use TourDeMaroc\App\models\TokenModel;
use TourDeMaroc\App\models\users;

class TokenController extends Controller
{


    public function index()
    {
        $this->view("login");
    }


    public function mot_de_passe_oublie()
    {
        $data = ['EmailStatus' => '', 'EmailSent' => ''];

        if ($_SERVER['REQUEST_METHOD'] === 'POST'){
            $email = $_POST['email'];
            $newUser = new users();

            $UserInfo = $newUser->GetUserMail($email);
            if ($UserInfo === false){
                $data ['EmailNotFound'] = true ;
            }
            else{
                $token = bin2hex(random_bytes(16));
                $hashToken = hash('sha256', $token);
                $ExpiredTime = date('Y-m-d H:i:s', time() + (30 * 60));

                $newToken = new Token(null,$hashToken, $ExpiredTime, null);
                $newTokenModel = new TokenModel();
                $test = $newTokenModel->addToken($newToken);
                var_dump($test);

                if ($test === true){
                    $Message = 'Click on this link to reset Password: ' . URL_ROOT .
                        '/ResetPassword/CheckToken?token=' . $hashToken .
                        '&user_id=' .$UserInfo['user_id'];
                    ;
                    SendMail::SendMail($email,$Message);
                    header('Location: '.URL_ROOT .'/ResetPassword/mot_de_passe_oublie?Status=Email_Send');
                }

            }


        }
        $this->view('ResetPassword/mot_de_passe_oublie', $data);
    }

    public function CheckToken()
    {
        if (isset($_GET['token']) && isset($_GET['user_id'])){
            $token = $_GET['token'];
            $User_id = $_GET['user_id'];
            $newToken = new TokenModel();
            $tokenObj = $newToken->checkGetTokenByUserId($User_id);

            if (strtotime($tokenObj->getResetTokenExpiresAt()) <= time()){
                echo 'Token Expired';
                exit();
            }elseif(hash('sha256', $token) === $tokenObj->getResetTokenHash()){
                $this->view('ResetPassword/ChangePassword');
            }

        }else{
            echo 'invalid request';
            exit();
        }

    }

}