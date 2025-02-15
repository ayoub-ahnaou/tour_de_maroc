<?php
namespace TourDeMaroc\App\Models;

use Exception;
use PDO;
use TourDeMaroc\App\libraries\Database;

class LikeModel {
    private PDO $db;

    public function __construct(){
        $this->db = Database::getInstance()->getConnection();
    }

    public function addLikeOnEtape($etape_id, $user_id) {
        try {
            $sql = "INSERT INTO j_aime (etape_id, auteur_id) VALUES (:etape_id, :auteur_id)";
            $stmt = $this->db->prepare($sql);
            return $stmt->execute([":etape_id" => $etape_id, ":auteur_id" => $user_id]);
        } catch (Exception $e) {
            throw new Exception("erreur de liker etape: " . $e->getMessage());
        }
    }

    public function isEtapeLiked($etape_id, $user_id) {
        try {
            $sql = "SELECT * FROM j_aime WHERE etape_id = :etape_id AND auteur_id = :auteur_id";
            $stmt = $this->db->prepare($sql);
            $stmt->execute([":etape_id" => $etape_id, ":auteur_id" => $user_id]);
            $res = $stmt->fetch();
            return $res ? true : false;
        } catch (Exception $e) {
            throw new Exception("erreur de disliker etape: " . $e->getMessage());
        }
    }
}