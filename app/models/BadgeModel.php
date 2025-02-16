<?php
namespace TourDeMaroc\App\Models;

use Exception;
use PDO;
use TourDeMaroc\App\Entity\Badge;
use TourDeMaroc\App\libraries\Database;

class BadgeModel {
    private PDO $db;

    public function __construct(){
        $this->db = Database::getInstance()->getConnection();
    }

    public function getAllBadges() {
        $stmt = $this->db->prepare("SELECT * FROM badge");
        $stmt->execute();
        $res = $stmt->fetchAll();
        $badges = [];
        foreach($res as $badge) {
            $badges[] = new Badge($badge["badge_id"], $badge["nom_badge"]);
        }
        return $badges;
    }

    public function createBadge($nom_badge) {
        try {
            $sql = "INSERT INTO badge (nom_badge) VALUES (:nom_badge)";
            $stmt = $this->db->prepare($sql);
            return $stmt->execute([":nom_badge" => $nom_badge]);
        } catch (Exception $e) {
            throw new Exception("badge n'est pas ete cree: " . $e->getMessage());
        }
    }

    public function deleteBadge($id) {
        try {
            $sql = "DELETE FROM badge WHERE badge_id = :id";
            $stmt = $this->db->prepare($sql);
            return $stmt->execute([":id" => $id]);
        } catch (Exception $e) {
            throw new Exception("badge ne pas supprimée: " . $e->getMessage());
        }
    }
}