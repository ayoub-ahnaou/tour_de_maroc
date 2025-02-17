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
    public function getEtapeById($etape_id) {
        $sql = "SELECT * FROM etape WHERE etape_id = :etape_id"; 
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(":etape_id", $etape_id, PDO::PARAM_INT);
        $stmt->execute();
    
        $etapeData = $stmt->fetch(PDO::FETCH_ASSOC);
        
        return new Etape(
            $etapeData["etape_id"], 
            $etapeData["lieu_de_depart"], 
            $etapeData["lieu_d_arrivee"],
             $etapeData["distance"],
              $etapeData["date"], 
              $etapeData["region"],
                 $etapeData["difficulte"], 
                 $etapeData["course_id"]=null, 
                 $etapeData["categorie_id"]=null,
                 $etapeData["ordre"], 
                 $etapeData["duree"]
        );
    }



    public function getAllEtapesById($categorie_id) {
        $sql = "SELECT * FROM etape WHERE categorie_id = :categorie_id";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(":categorie_id", $categorie_id, PDO::PARAM_INT);
        $stmt->execute();

        $res = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        $etapes = [];
        foreach($res as $etape) {
            $etapes[] = new Etape(
                (string)$etape['lieu_de_depart'],
                (string)$etape['lieu_d_arrivee'],
                (float)$etape['distance'],
                (string)$etape['date'],
                $etape['course_id'] ? (int)$etape['course_id'] : null,
                $etape['categorie_id'] ,
                ($etape['region']),
                ($etape['difficulte']),
                ($etape['etape_id']) ,
                (int)$etape['ordre'],
                (string)$etape['duree']
            );
        }
        return $etapes;
    }

 

    public function getAllEtapes() {
        $sql = "SELECT * FROM etape";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        $res = $stmt->fetchAll();
        $etapes = [];

        foreach($res as $etape) {
            $etapes[] = new Etape(
                (string)$etape['lieu_de_depart'],
                (string)$etape['lieu_d_arrivee'],
                (float)$etape['distance'],
                (string)$etape['date'],
                $etape['course_id'] ? (int)$etape['course_id'] : null,
                $etape['categorie_id'] ? (int)$etape['categorie_id'] : null,
                isset($etape['region']) ? (string)$etape['region'] : null,
                ($etape['difficulte']),
                isset($etape['etape_id']) ? (int)$etape['etape_id'] : null,
                (int)$etape['ordre'],
                (string)$etape['duree']
            );
        }
        return $etapes;
    }
   


    public function getStepByFilter($region, $difficulte) {
        $sql = "SELECT * FROM etape WHERE region = :region AND difficulte = :difficulte";
        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(":region", $region, PDO::PARAM_STR);
        $stmt->bindValue(":difficulte", $difficulte, PDO::PARAM_STR);
        $stmt->execute();
        
        $res = $stmt->fetchAll();
        $etapes = [];
    
        foreach ($res as $etape) {
            $etapes[] = new Etape(
                (string)$etape['lieu_de_depart'],
                (string)$etape['lieu_d_arrivee'],
                (float)$etape['distance'],
                (string)$etape['date'],
                $etape['course_id'] ? (int)$etape['course_id'] : null,
                $etape['categorie_id'] ? (int)$etape['categorie_id'] : null,
                isset($etape['region']) ? (string)$etape['region'] : null,
                isset($etape['difficulte']) ? (int)$etape['difficulte'] : null,
                ($etape['etape_id']) ,
                (int)$etape['ordre'],
                (string)$etape['duree']
            );
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
}