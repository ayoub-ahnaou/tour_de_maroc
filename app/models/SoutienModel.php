<?php
namespace TourDeMaroc\App\Models;

use Exception;
use PDO;
use TourDeMaroc\App\libraries\Database;

class SoutienModel {
    private PDO $db;

    public function __construct() {
        $this->db = Database::getInstance()->getConnection();
    }

    public function isCyclisteSoutainedByFan($fan_id, $cycliste_id) {
        $sql = "SELECT * FROM soutien WHERE fan_id = :fan_id AND cycliste_id = :cycliste_id";
        try {
            $stmt = $this->db->prepare($sql);
            $stmt->execute([":fan_id" => $fan_id, ":cycliste_id" => $cycliste_id]);
            if($stmt->fetch()) return true;
            else return false;
        } catch (Exception $e) {
            throw new Exception("isCyclisteSoutainedByFan echouée: " . $e->getMessage());
        }
    }
}