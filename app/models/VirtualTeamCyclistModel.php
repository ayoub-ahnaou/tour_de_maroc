<?php
namespace TourDeMaroc\App\models;

use TourDeMaroc\App\libraries\Database;
use PDO;

class VirtualTeamCyclistModel 
{
    private PDO $pdo;

    public function __construct()
    {
        $this->pdo = Database::getInstance()->getConnection();
    }

    public function getCyclistsInTeam(int $teamId): array
    {
        try {
            $query = "SELECT c.* FROM cyclists c 
                     JOIN virtual_team_cyclists vtc ON c.id = vtc.cyclist_id 
                     WHERE vtc.virtual_team_id = :team_id";
            $stmt = $this->pdo->prepare($query);
            $stmt->execute([':team_id' => $teamId]);
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        } catch (\PDOException $e) {
            error_log("Get Cyclists Error: " . $e->getMessage());
            return [];
        }
    }

    public function addCyclistToTeam(int $teamId, int $cyclistId): bool
    {
        try {
            // Check if cyclist is already in team
            $query = "SELECT COUNT(*) as count FROM virtual_team_cyclists 
                     WHERE virtual_team_id = :team_id AND cyclist_id = :cyclist_id";
            $stmt = $this->pdo->prepare($query);
            $stmt->execute([
                ':team_id' => $teamId,
                ':cyclist_id' => $cyclistId
            ]);
            
            if ($stmt->fetch(PDO::FETCH_OBJ)->count > 0) {
                return false; // Cyclist already in team
            }

            $query = "INSERT INTO virtual_team_cyclists (virtual_team_id, cyclist_id) 
                     VALUES (:team_id, :cyclist_id)";
            $stmt = $this->pdo->prepare($query);
            return $stmt->execute([
                ':team_id' => $teamId,
                ':cyclist_id' => $cyclistId
            ]);
        } catch (\PDOException $e) {
            error_log("Add Cyclist Error: " . $e->getMessage());
            return false;
        }
    }

    public function removeCyclistFromTeam(int $teamId, int $cyclistId): bool
    {
        try {
            $query = "DELETE FROM virtual_team_cyclists 
                     WHERE virtual_team_id = :team_id AND cyclist_id = :cyclist_id";
            $stmt = $this->pdo->prepare($query);
            return $stmt->execute([
                ':team_id' => $teamId,
                ':cyclist_id' => $cyclistId
            ]);
        } catch (\PDOException $e) {
            error_log("Remove Cyclist Error: " . $e->getMessage());
            return false;
        }
    }
}