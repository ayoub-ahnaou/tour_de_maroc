<?php

use TourDeMaroc\App\Models\CyclistModel;
use TourDeMaroc\App\Models\QuestionModel;

class CyclistesController extends Controller {
    public function index() {
        $this->view("cyclistes/cyclistes");
    }

    public function details($id) {
        // $cycliste = (new CyclistModel())->getCyclistById($id);
        $questions = (new QuestionModel)->getAllQuestions(1, $id);
        $reponses = (new QuestionModel)->getAllReponses(1, $id);
        $this->view("cyclistes/cyclisteDetails", compact("questions", "reponses"));
    }

    public function soutenir($fan_id, $cycliste_id) {
        // $cycliste = (new CyclistModel())->getCyclistById($cycliste_id);
        (new CyclistModel())->soutenirCycliste($fan_id, $cycliste_id);

        $this->view("cyclistes/cyclisteDetails");
    }
}