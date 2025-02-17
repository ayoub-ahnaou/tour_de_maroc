<?php
namespace TourDeMaroc\App\models;

use Exception;
use PDO;
use PDOException;
use TourDeMaroc\App\Entity\Cycliste;
use TourDeMaroc\App\libraries\Database;

class CyclistModel
{
    private PDO $db;

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

    public function getCyclistById($id)
    {
        $stmt = $this->db->prepare('SELECT * from cycliste where utilisateur_id = :id');
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        if($result) {
            return  new Cycliste(
                $result['nom_utilisateur'],
                $result['mot_de_passe'],
                $result['email'],
                $result['role'],
                $result['equipe'],
                $result['date_de_naissance'],
                $result['nationalite'],
                $result['taille'],
                $result['photo'],
                $result['poids']
            );
        } else return null;

    }

    public function soutenirCycliste($fan_id, $cycliste_id) {
        $sql = "INSERT INTO soutien (fan_id, cycliste_id) VALUES (:fan_id, :cycliste_id)";
        try {
            $stmt = $this->db->prepare($sql);
            $res = $stmt->execute([":fan_id" => $fan_id, ":cycliste_id" => $cycliste_id]);
            if($res) return true;
            else return false;
        } catch (Exception $e) {
            throw new Exception("soutenir cycliste echouée: " . $e->getMessage());
        }
    }







    public function getCyclist()
    {
        $stmt = $this->db->prepare('SELECT * FROM cycliste');
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        if (!$result) {
            return []; 
        }
    
        $cyclistes = [];
        foreach ($result as $row) {
            $cyclistes[] = new Cycliste(
                $row['nom_utilisateur'],
                $row['mot_de_passe'],
                $row['email'],
                $row['role'],
                $row['prenom_utilisateur'], 
                $row['date_de_naissance'],
                $row['nationalite'],
                $row['taille'],
                $row['photo'],
                $row['poids']
            );
        }
    
        return $cyclistes; 
    }


}