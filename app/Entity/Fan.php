<?php

namespace TourDeMaroc\App\Entity;

class Fan extends Utilisateur {
    public function __construct($nom_utilisateur, $mot_de_passe, $email, $utilisateur_id = null) {
        parent::__construct($nom_utilisateur, $mot_de_passe, $email, "Fan", $utilisateur_id);
    }
}
