<?php
namespace TourDeMaroc\App\models;

use Exception;
use PDO;
use TourDeMaroc\App\Entity\Etape;
use TourDeMaroc\App\libraries\Database;

class EtapeModel {
    private PDO $db;

    public function __construct() {
        $this->db = Database::getInstance()->getConnection();
    }

    public function getAllEtapes() {
        $sql = "SELECT * FROM etape";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $res = $stmt->fetchAll();
        $etapes = [];
        foreach($res as $etape) {
            $etapes[] = new Etape($etape["lieu_de_depart"], $etape["lieu_d_arrivee"], $etape["distance"], $etape["date"], $etape["course_id"], $etape["categorie_id"], null, $etape["difficulte"], $etape["etape_id"]);
        }
        return $etapes;
    }

    public function createEtape($ordre, $lieu_depart, $lieu_arrive, $distance, $difficulte, $date, $duree, $categorie) {
        $sql = "INSERT INTO etape (ordre, lieu_de_depart, lieu_d_arrivee, distance, difficulte, date, duree, course_id, categorie_id) 
            VALUES (:ordre, :lieu_de_depart, :lieu_d_arrivee, :distance, :difficulte, :date, :duree, '1', :categorie)";
        
        try {
            $stmt = $this->db->prepare($sql);
            return $stmt->execute([
                ":ordre" => $ordre, ":lieu_de_depart" => $lieu_depart, ":lieu_d_arrivee" => $lieu_arrive,
                ":distance" => $distance, ":difficulte" => $difficulte, ":date" => $date, ":duree" => $duree, ":categorie" => $categorie
            ]);
        } catch (Exception $e) {
            throw new Exception("creation de l'etape faillée: " . $e->getMessage());
        }
    }
}