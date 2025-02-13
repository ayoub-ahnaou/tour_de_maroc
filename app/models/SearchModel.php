<?php
namespace TourDeMaroc\App\models;
use PDO;
use TourDeMaroc\App\libraries\Database;

class SearchModel {
    private PDO $db;

    public function __construct() {
        $this->db = Database::getInstance()->getConnection();
    }

    public function search($query) {
        $etapes = $this->searchInEtapes($query);
        $cyclistes = $this->searchInCyclistes($query);
        if(sizeof($etapes) > 0 && sizeof($etapes) > 0) return [$etapes, $cyclistes];
        elseif(sizeof($etapes) > 0) return $etapes;
        elseif(sizeof($cyclistes) > 0) return $cyclistes;
    }

    public function searchInEtapes($query) {
        $sql = "SELECT * FROM etape WHERE lieu_de_depart LIKE :query OR lieu_d_arrivee LIKE :query OR difficulte LIKE :query";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([':query' => "%$query%"]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function searchInCyclistes($query) {
        $sql = "SELECT * FROM cycliste WHERE nom_utilisateur LIKE :query OR equipe LIKE :query OR nationalite LIKE :query";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([':query' => "%$query%"]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}