<?php
namespace TourDeMaroc\App\models;

use TourDeMaroc\App\libraries\Database;
use PDO;

class VirtualTeamModel 
{
    private PDO $pdo;

    public function __construct()
    {
        $this->pdo = Database::getInstance()->getConnection();
    }

    public function createVirtualTeam(int $fanId, string $teamName): bool
    {
        try {
            // Start transaction
            $this->pdo->beginTransaction();
            
            // First verify the user exists and has role 'fan'
            $fanCheck = $this->pdo->prepare("
                SELECT utilisateur_id FROM utilisateur 
                WHERE utilisateur_id = :fan_id AND role = 'fan'
            ");
            $fanCheck->execute([':fan_id' => $fanId]);
            
            if (!$fanCheck->fetch()) {
                throw new \Exception("Invalid fan ID or user is not a fan");
            }

            // Insert the team - note the table name is virtualteam
            $query = "INSERT INTO virtualteam (fan_id, team_name) VALUES (:fan_id, :name) RETURNING virtual_team_id";
            $stmt = $this->pdo->prepare($query);
            $result = $stmt->execute([
                ':fan_id' => $fanId,
                ':name' => $teamName
            ]);
            
            if ($result) {
                $this->pdo->commit();
                return true;
            } else {
                $this->pdo->rollBack();
                return false;
            }
        } catch (\PDOException $e) {
            $this->pdo->rollBack();
            error_log("Create Virtual Team Error: " . $e->getMessage());
            throw $e; // Throw the error so we can see what's wrong
        } catch (\Exception $e) {
            $this->pdo->rollBack();
            error_log("Create Virtual Team Error: " . $e->getMessage());
            throw $e; // Throw the error so we can see what's wrong
        }
    }

    public function getVirtualTeamById(int $teamId): ?object
    {
        try {
            $query = "SELECT * FROM virtualteam WHERE virtual_team_id = :id";
            $stmt = $this->pdo->prepare($query);
            $stmt->execute([':id' => $teamId]);
            $result = $stmt->fetch(PDO::FETCH_OBJ);
            return $result ?: null;
        } catch (\PDOException $e) {
            error_log("Get Team Error: " . $e->getMessage());
            throw $e;
        }
    }

    public function getVirtualTeamsByFanId(int $fanId): array
{
    try {
        $query = "SELECT * FROM virtualteam WHERE fan_id = :fan_id ORDER BY team_name";
        $stmt = $this->pdo->prepare($query);
        $stmt->execute([':fan_id' => $fanId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (\PDOException $e) {
        error_log("Get Teams Error: " . $e->getMessage());
        throw $e;
    }
}
}