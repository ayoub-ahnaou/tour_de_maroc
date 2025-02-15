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
            $timeformat = explode(":", $etape["duree"]);
            $duree = "";

            if($timeformat[0] > 0) $duree .= intval($timeformat[0]) . "hours ";
            if($timeformat[1] > 0) $duree .= intval($timeformat[1]) . "mniutes ";

            $etapes[] = new Etape($etape["lieu_de_depart"], $etape["lieu_d_arrivee"], $etape["distance"], $etape["date"], $etape["course_id"], $etape["categorie_id"], null, $etape["difficulte"], $etape["etape_id"], $etape["ordre"], $duree);
        }
        return $etapes;
    }

    public function createEtape($ordre, $lieu_depart, $lieu_arrive, $distance, $difficulte, $date, $duree, $categorie) {
        $sql = "INSERT INTO etape (ordre, lieu_de_depart, lieu_d_arrivee, distance, difficulte, date, duree, course_id, categorie_id) 
            VALUES (:ordre, :lieu_de_depart, :lieu_d_arrivee, :distance, :difficulte, :date, CAST(:duree AS INTERVAL), '1', :categorie)";
        
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

    public function getEtapeByOrdre($ordre) {
        $sql = "SELECT e.*, nom as categorie FROM etape e join categorie c on c.categorie_id = e.categorie_id WHERE ordre = :ordre";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([":ordre" => $ordre]);
        $res = $stmt->fetch();
        $timeformat = explode(":", $res["duree"]);
        $duree = "";

        if($timeformat[0] > 0) $duree .= intval($timeformat[0]) . "hours ";
        if($timeformat[1] > 0) $duree .= intval($timeformat[1]) . "mniutes ";

        $etape = new Etape($res["lieu_de_depart"], $res["lieu_d_arrivee"], $res["distance"], $res["date"], $res["course_id"], $res["categorie_id"], null, $res["difficulte"], $res["etape_id"], $res["ordre"], $duree);
        $etape->setCategorie($res["categorie"]);

        return $etape;
    }

    public function getEtapeById($etape_id) {
        $sql = "SELECT * FROM etape WHERE etape_id = :etape_id";
        try {
            $stmt = $this->db->prepare($sql);
            $stmt->execute([":etape_id" => $etape_id]);
            return $stmt->fetch();
        } catch (Exception $e) {
            throw new Exception("Error getting etape by id: " . $e->getMessage());
        }
    }

    public function maxEtapes() {
        $stmt = $this->db->prepare("SELECT MAX(ordre) as max FROM etape");
        $stmt->execute();
        return $stmt->fetch();
    }
}