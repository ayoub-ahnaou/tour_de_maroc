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
            $query = "INSERT INTO virtual_teams (fan_id, name) VALUES (:fan_id, :name)";
            $stmt = $this->pdo->prepare($query);
            return $stmt->execute([
                ':fan_id' => $fanId,
                ':name' => $teamName
            ]);
        } catch (\PDOException $e) {
            error_log("Create Virtual Team Error: " . $e->getMessage());
            return false;
        }
    }

    public function getVirtualTeamsByFanId(int $fanId): array
    {
        try {
            $query = "SELECT * FROM virtual_teams WHERE fan_id = :fan_id ORDER BY name";
            $stmt = $this->pdo->prepare($query);
            $stmt->execute([':fan_id' => $fanId]);
            return $stmt->fetchAll();
        } catch (\PDOException $e) {
            error_log("Get Teams Error: " . $e->getMessage());
            return [];
        }
    }

    public function getVirtualTeamById(int $teamId): ?object
    {
        try {
            $query = "SELECT * FROM virtual_teams WHERE id = :id";
            $stmt = $this->pdo->prepare($query);
            $stmt->execute([':id' => $teamId]);
            $result = $stmt->fetch(PDO::FETCH_OBJ); // Explicitly fetch as object
            return $result ?: null;
        } catch (\PDOException $e) {
            error_log("Get Team Error: " . $e->getMessage());
            return null;
        }
    }

    public function updateVirtualTeam(int $teamId, string $teamName): bool
    {
        try {
            $query = "UPDATE virtual_teams SET name = :name WHERE id = :id";
            $stmt = $this->pdo->prepare($query);
            return $stmt->execute([
                ':name' => $teamName,
                ':id' => $teamId
            ]);
        } catch (\PDOException $e) {
            error_log("Update Team Error: " . $e->getMessage());
            return false;
        }
    }

    public function deleteVirtualTeam(int $teamId): bool
    {
        try {
            $query = "DELETE FROM virtual_teams WHERE id = :id";
            $stmt = $this->pdo->prepare($query);
            return $stmt->execute([':id' => $teamId]);
        } catch (\PDOException $e) {
            error_log("Delete Team Error: " . $e->getMessage());
            return false;
        }
    }

    public function getTeamOwner(int $teamId): ?int
    {
        try {
            $query = "SELECT fan_id FROM virtual_teams WHERE id = :id";
            $stmt = $this->pdo->prepare($query);
            $stmt->execute([':id' => $teamId]);
            $result = $stmt->fetch(PDO::FETCH_OBJ);
            return $result ? $result->fan_id : null;
        } catch (\PDOException $e) {
            error_log("Get Team Owner Error: " . $e->getMessage());
            return null;
        }
    }
}