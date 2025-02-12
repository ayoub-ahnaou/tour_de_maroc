<?php

namespace TourDeMaroc\App\Entity;

class Commentaire {
    private $commentaire_id;
    private $auteur_id;
    private $etape_id;

    public function __construct($auteur_id, $etape_id, $commentaire_id = null) {
        $this->commentaire_id = $commentaire_id;
        $this->auteur_id = $auteur_id;
        $this->etape_id = $etape_id;
    }
}
