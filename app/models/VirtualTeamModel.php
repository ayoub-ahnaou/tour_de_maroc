<?php

namespace TourDeMaroc\App\models;
use TourDeMaroc\App\libraries\Database;
use PDO;

class VirtualTeamModel
{
    private $db;
    private PDO $pdo; // To hold the PDO connection

    public function __construct()
    {
        $this->db = Database::getInstance(); // Get the Singleton instance
        $this->pdo = $this->db->getConnection(); // Get the PDO connection
    }

    public function createVirtualTeam(int $fanId, string $teamName): bool
    {
        $sql = 'INSERT INTO VirtualTeam (fan_id, team_name) VALUES (:fan_id, :team_name)';
        try {
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(':fan_id', $fanId, PDO::PARAM_INT);
            $stmt->bindParam(':team_name', $teamName, PDO::PARAM_STR);
            return $stmt->execute();
        } catch (PDOException $e) {
            // Handle PDO exceptions (log, display error, etc.)
            error_log("Database Error in createVirtualTeam: " . $e->getMessage()); // Example logging
            return false; // Indicate failure
        }
    }

    public function getVirtualTeamsByFanId(int $fanId)
    {
        $sql = 'SELECT * FROM VirtualTeam WHERE fan_id = :fan_id';
        try {
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(':fan_id', $fanId, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC); // Fetch as associative array
        } catch (PDOException $e) {
            error_log("Database Error in getVirtualTeamsByFanId: " . $e->getMessage());
            return false;
        }
    }

   
    public function getVirtualTeamById(int $teamId)
    {
        $sql = 'SELECT * FROM VirtualTeam WHERE virtual_team_id = :virtual_team_id';
        try {
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(':virtual_team_id', $teamId, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetch(PDO::FETCH_ASSOC); // Fetch single as associative array
        } catch (PDOException $e) {
            error_log("Database Error in getVirtualTeamById: " . $e->getMessage());
            return false;
        }
    }

    public function deleteVirtualTeam(int $teamId): bool
    {
        $sql = 'DELETE FROM VirtualTeam WHERE virtual_team_id = :virtual_team_id';
        try {
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(':virtual_team_id', $teamId, PDO::PARAM_INT);
            return $stmt->execute();
        } catch (PDOException $e) {
            error_log("Database Error in deleteVirtualTeam: " . $e->getMessage());
            return false;
        }
    }
}