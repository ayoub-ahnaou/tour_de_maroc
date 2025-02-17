

<?php

use TourDeMaroc\App\models\SignalementModel;
use TourDeMaroc\App\models\User;


class SignalementController extends Controller {

   public function signal(){
    if($_SERVER['REQUEST_METHOD']=='POST'){
        $contenu=$_POST['sujet'];
        $utilisateur_id=$_SESSION['utilisateur_id'];
        $signal=new SignalementModel();
        $signal->InsertSignal($contenu,$utilisateur_id);
    }

    $this->view("signals");
   }



}
