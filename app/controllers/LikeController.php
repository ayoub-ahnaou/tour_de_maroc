<?php

use TourDeMaroc\App\models\EtapeModel;
use TourDeMaroc\App\Models\LikeModel;

class LikeController extends Controller {
    public function like($etape_id) {
        $response = (new LikeModel())->addLikeOnEtape($etape_id, 1); // replace 1 with the user_id from session
        $etape_by_id = (new EtapeModel())->getEtapeById($etape_id);
        if($response) {
            $etape = (new EtapeModel())->getEtapeByOrdre($etape_by_id["ordre"]);
            $this->view("etapes/etapeDetails", compact("etape"));
        }
    }
}