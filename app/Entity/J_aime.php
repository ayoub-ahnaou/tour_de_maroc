<?php

namespace TourDeMaroc\App\Entity;

class J_aime {
    private $like_id;
    private $etape_id;
    private $auteur_id;

    public function __construct($etape_id, $auteur_id, $like_id = null) {
        $this->like_id = $like_id;
        $this->etape_id = $etape_id;
        $this->auteur_id = $auteur_id;
    }
}
