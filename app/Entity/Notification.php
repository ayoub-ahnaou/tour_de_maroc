<?php

namespace TourDeMaroc\App\Entity;

class Notification {
    private $notification_id;
    private $contenu;
    private $destinataire_id;
    private $etape_id;

    public function __construct($contenu, $destinataire_id, $etape_id = null, $notification_id = null) {
        $this->notification_id = $notification_id;
        $this->contenu = $contenu;
        $this->destinataire_id = $destinataire_id;
        $this->etape_id = $etape_id;
    }
}
