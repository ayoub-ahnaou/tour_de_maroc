<?php

namespace TourDeMaroc\App\Entity;

class Question {
    private $question_id;
    private $auteur_id;
    private $cycliste_id;
    private $contenu;
    private $reponse;

    public function __construct($auteur_id, $cycliste_id, $contenu, $reponse = null, $question_id = null) {
        $this->question_id = $question_id;
        $this->auteur_id = $auteur_id;
        $this->cycliste_id = $cycliste_id;
        $this->contenu = $contenu;
        $this->reponse = $reponse;
    }
}
