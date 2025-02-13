<?php

namespace TourDeMaroc\App\Entity;

class Etape {
    private $etape_id;
    private $lieu_de_depart;
    private $lieu_d_arrivee;
    private $distance;
    private $date;
    private $region;
    private $difficulte;
    private $course_id;
    private $categorie_id;

    public function __construct($lieu_de_depart, $lieu_d_arrivee, $distance, $date, $course_id, $categorie_id, $region = null, $difficulte = null, $etape_id = null) {
        $this->etape_id = $etape_id;
        $this->lieu_de_depart = $lieu_de_depart;
        $this->lieu_d_arrivee = $lieu_d_arrivee;
        $this->distance = $distance;
        $this->date = $date;
        $this->region = $region;
        $this->difficulte = $difficulte;
        $this->course_id = $course_id;
        $this->categorie_id = $categorie_id;
    }

    public function getId() {
        return $this->etape_id;
    }

    public function getLieuDeDepart() {
        return $this->lieu_de_depart;
    }

    public function setLieuDeDepart($lieu_de_depart) {
        $this->lieu_de_depart = $lieu_de_depart;
    }

    public function getLieuDarrivee() {
        return $this->lieu_d_arrivee;
    }

    public function setLieuDarrivee($lieu_d_arrivee) {
        $this->lieu_d_arrivee = $lieu_d_arrivee;
    }

    public function getDistance() {
        return $this->distance;
    }

    public function setDistance($distance) {
        $this->distance = $distance;
    }

    public function getDate() {
        return $this->date;
    }

    public function setDate($date) {
        $this->date = $date;
    }

    public function getRegion() {
        return $this->region;
    }

    public function setRegion($region) {
        $this->region = $region;
    }

    public function getDifficulte() {
        return $this->difficulte;
    }

    public function setDifficulte($difficulte) {
        $this->difficulte = $difficulte;
    }

    public function getCourseId() {
        return $this->course_id;
    }

    public function setCourseId($course_id) {
        $this->course_id = $course_id;
    }

    public function getCategorieId() {
        return $this->categorie_id;
    }

    public function setCategorieId($categorie_id) {
        $this->categorie_id = $categorie_id;
    }
}
