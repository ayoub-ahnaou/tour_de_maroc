<?php

namespace TourDeMaroc\App\Entity;

class Publication {
    private $publication_id;
    private $auteur_id;
    private $contenu;

    public function __construct($auteur_id, $contenu, $publication_id = null) {
        $this->publication_id = $publication_id;
        $this->auteur_id = $auteur_id;
        $this->contenu = $contenu;
    }
}
