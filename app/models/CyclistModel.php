<?php
namespace TourDeMaroc\App\models;

use PDO;
use PDOException;
use TourDeMaroc\App\libraries\Database;

class CyclistModel {
    private $db;

    public function __construct() {
        $this->db = Database::getInstance()->getConnection();
    }

    public function getMostFollowedCyclists($limit = 3) {
        try {
            $query = "
                SELECT 
                    u.utilisateur_id,
                    u.nom_utilisateur,
                    u.email,
                    u.equipe,
                    u.nationalite,
                    COUNT(s.soutien_id) AS total_followers
                FROM 
                    ONLY utilisateur u
                    JOIN soutien s ON u.utilisateur_id = s.cycliste_id
                WHERE 
                    u.tableoid = 'cycliste'::regclass::oid
                GROUP BY 
                    u.utilisateur_id,
                    u.nom_utilisateur,
                    u.email,
                    u.equipe,
                    u.nationalite
                ORDER BY 
                    total_followers DESC
                LIMIT :limit
            ";

            $stmt = $this->db->prepare($query);
            $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
            $stmt->execute();

            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
            
            if (empty($results)) {
                // If no results, return an empty array rather than null
                return [];
            }
            
            return $results;
        } catch (PDOException $e) {
            // Log the error appropriately
            error_log("Error in getMostFollowedCyclists: " . $e->getMessage());
            return [];
        }
    }
}