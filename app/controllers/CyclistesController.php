<?php

use TourDeMaroc\App\Entity\Cycliste;
use TourDeMaroc\App\Models\CyclistModel;
use TourDeMaroc\App\Models\QuestionModel;

class CyclistesController extends Controller
{
    private $CylistModel;

    public function __construct()
    {
        $this->CylistModel = $this->modal('CyclistModel');
    }
  
    public function index() {
        $this->view("cyclistes/cyclistes");
    }

    public function Details($id)
    {
        $questions = (new QuestionModel)->getAllQuestions(1, $id);
        $reponses = (new QuestionModel)->getAllReponses(1, $id);
        $Cylist = $this->CylistModel->getCyclistById($id);
        $data = [
            "name" => $Cylist->getNomUtilisateur(),
            "email" => $Cylist->getEmail(),
            "role" => $Cylist->getRole(),
            "team" => $Cylist->getEquipe(),
            "birth_date" => $Cylist->getDateDeNaissance(),
            "nationality" => $Cylist->getNationalite(),
            "height" => $Cylist->getTaille(),
            "weight" => $Cylist->getPoids(),
            "photo" => $Cylist->getPhoto()
        ];
        $this->view('cyclistes/cyclisteDetails', $data);
    }
  
    public function soutenir($fan_id, $cycliste_id) {
        // $cycliste = (new CyclistModel())->getCyclistById($cycliste_id);
        (new CyclistModel())->soutenirCycliste($fan_id, $cycliste_id);

        $this->view("cyclistes/cyclisteDetails");
    }

    public function show(){

        $cyclistes=new CyclistModel();
        $cyclistesList = $cyclistes->getCyclist(); 
        $data = compact("cyclistesList");
        $this->view("cyclistes/cyclistes", $data );
    
       }
    }

    public function DeleteCycliste($id)
    {
    }


}
