<?php
namespace TourDeMaroc\App\models;

use TourDeMaroc\App\libraries\Database;

class VirtualTeamCyclistModel {
    private $db;

    public function __construct() {
        $this->db = Database::getInstance();
    }

    public function searchCyclists($term) {
        $this->db->query(
            "SELECT utilisateur_id, nom_utilisateur, prenom_utilisateur 
             FROM utilisateur 
             WHERE role = 'Cycliste' 
             AND (LOWER(nom_utilisateur) LIKE LOWER(:term) 
                  OR LOWER(prenom_utilisateur) LIKE LOWER(:term))"
        );
        
        $searchTerm = "%" . $term . "%";
        $this->db->bind(':term', $searchTerm);
        
        return $this->db->resultSet();
    }

    public function getCyclistByName($name) {
        $this->db->query(
            "SELECT utilisateur_id, nom_utilisateur, prenom_utilisateur 
             FROM utilisateur 
             WHERE role = 'Cycliste' 
             AND (LOWER(nom_utilisateur) = LOWER(:name) 
                  OR LOWER(prenom_utilisateur) = LOWER(:name))"
        );
        
        $this->db->bind(':name', $name);
        
        return $this->db->single();
    }


    public function getCyclistsInTeam($teamId) {
        $this->db->query("SELECT u.* 
                         FROM utilisateur u
                         JOIN virtualteamcyclist vtc ON u.utilisateur_id = vtc.cycliste_id
                         WHERE vtc.virtual_team_id = :team_id");
        
        $this->db->bind(':team_id', $teamId);
        return $this->db->resultSet();
    }
}