<?php
namespace TourDeMaroc\App\Models;

use Exception;
use PDO;
use TourDeMaroc\App\Entity\Cycliste;
use TourDeMaroc\App\libraries\Database;

class CyclistModel
{
    private PDO $db;

    public function __construct()
    {
        $this->db = Database::getInstance()->getConnection();
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
}