<?php

namespace TourDeMaroc\App\Entity;

class Signalement {
    private $signalement_id;
    private $contenu;
    private $utilisateur_id;

    public function __construct( $signalement_id = null,$contenu, $utilisateur_id) {
        $this->signalement_id = $signalement_id;
        $this->contenu = $contenu;
        $this->utilisateur_id = $utilisateur_id;
    }

    public function getId() {
        return $this->signalement_id;
    }

    public function getContenu() {
        return $this->contenu;
    }


    public function setId($signalement_id) {
        $this->signalement_id = $signalement_id;
    }
    
    public function setContenu($contenu) {
        $this->contenu = $contenu;
    }
}
