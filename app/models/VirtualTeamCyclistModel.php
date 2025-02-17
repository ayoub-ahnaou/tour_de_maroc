<?php
namespace TourDeMaroc\App\models;

use TourDeMaroc\App\libraries\Database;
use PDO;

class VirtualTeamCyclistModel {
    private $db;
    private $connection;

    public function __construct() {
        $this->db = Database::getInstance();
        $this->connection = $this->db->getConnection();
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
        $stmt = $this->connection->prepare(
            "SELECT u.* 
             FROM utilisateur u
             JOIN virtualteamcyclist vtc ON u.utilisateur_id = vtc.cycliste_id
             WHERE vtc.virtual_team_id = :team_id"
        );
        
        $stmt->bindValue(':team_id', $teamId, PDO::PARAM_INT);
        $stmt->execute();
        
        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }

    public function removeCyclistFromTeam($teamId, $cyclistId)
{
    $this->db->query('DELETE FROM virtual_team_cyclist WHERE virtual_team_id = :team_id AND cyclist_id = :cyclist_id');
    $this->db->bind(':team_id', $teamId);
    $this->db->bind(':cyclist_id', $cyclistId);
    
    return $this->db->execute();
}
}