<?php

namespace TourDeMaroc\App\Entity;

class Signalement {
    private $signalement_id;
    private $contenu;
    private $utilisateur_id;

    public function __construct($contenu, $utilisateur_id, $signalement_id = null) {
        $this->signalement_id = $signalement_id;
        $this->contenu = $contenu;
        $this->utilisateur_id = $utilisateur_id;
    }
}
