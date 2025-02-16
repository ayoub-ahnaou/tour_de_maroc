<?php
namespace TourDeMaroc\App\Entity;

class Badge {
    private int $badge_id;
    private string $nom_badge;

    public function __construct($badge_id, $nom_badge) {
        $this->badge_id = $badge_id;
        $this->nom_badge = $nom_badge;
    }

    public function getId() {
        return $this->badge_id;
    }

    public function getNomBadge() {
        return $this->nom_badge;
    }
}