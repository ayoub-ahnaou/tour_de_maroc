<?php
namespace TourDeMaroc\App\Entity;

class Soutien {
    private $fan_id;
    private $cycliste_id;

    public function __construct($fan_id, $cycliste_id) {
        $this->fan_id = $fan_id;
        $this->cycliste_id = $cycliste_id;
    }

    public function getFanId() {
        return $this->fan_id;
    }

    public function getCyclisteId() {
        return $this->cycliste_id;
    }
}