<?php

namespace TourDeMaroc\App\Entity;

class Administrateur extends Utilisateur {
    public function __construct($nom_utilisateur, $mot_de_passe, $email, $utilisateur_id = null) {
        parent::__construct($nom_utilisateur, $mot_de_passe, $email, "Administrateur", $utilisateur_id);
    }
}
