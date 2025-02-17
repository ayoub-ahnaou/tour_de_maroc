<?php

use TourDeMaroc\App\Models\CyclistModel;
use TourDeMaroc\App\Models\QuestionModel;

class QuestionsController extends Controller {

    public function ask($fan_id, $cycliste_id) {
        $cyclite = (new CyclistModel)->getCyclistById($cycliste_id);
        $question = $question_err = "";

        if($_SERVER["REQUEST_METHOD"] == "POST") {
            if(empty(trim($_POST["question"]))) {
                $question_err = "Question est requis";
            } else $question = trim($_POST["question"]);

            $res = (new QuestionModel())->askQuestion($fan_id, $cycliste_id, $question);
            if($res) $this->redirect("cyclistes/details/" . $cycliste_id);
        }

        $this->view("cyclistes/cyclisteDetails" . $cycliste_id, compact("cycliste", "question", "question_err"));
    }
}