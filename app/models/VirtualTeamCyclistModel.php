<?php

namespace TourDeMaroc\App\models;
use TourDeMaroc\App\libraries\Database;

class VirtualTeamCyclistModel
{
    private $db;
    //private PDO $pdo;

    public function __construct()
    {
        $this->db = Database::getInstance();
        //$this->pdo = $this->db->getConnection();
    }

    public function addCyclistToTeam(int $virtualTeamId, int $cyclistId): bool
    {
        $sql = 'INSERT INTO VirtualTeamCyclist (virtual_team_id, cyclist_id) VALUES (:virtual_team_id, :cyclist_id)';
        try {
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(':virtual_team_id', $virtualTeamId, PDO::PARAM_INT);
            $stmt->bindParam(':cyclist_id', $cyclistId, PDO::PARAM_INT);
            return $stmt->execute();
        } catch (PDOException $e) {
            error_log("Database Error in addCyclistToTeam: " . $e->getMessage());
            return false;
        }
    }

    public function removeCyclistFromTeam(int $virtualTeamId, int $cyclistId): bool
    {
        $sql = 'DELETE FROM VirtualTeamCyclist WHERE virtual_team_id = :virtual_team_id AND cyclist_id = :cyclist_id';
        try {
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(':virtual_team_id', $virtualTeamId, PDO::PARAM_INT);
            $stmt->bindParam(':cyclist_id', $cyclistId, PDO::PARAM_INT);
            return $stmt->execute();
        } catch (PDOException $e) {
            error_log("Database Error in removeCyclistFromTeam: " . $e->getMessage());
            return false;
        }
    }

    public function getCyclistsInTeam(int $virtualTeamId)
    {
        
        $sql = 'SELECT C.*
                FROM Cyclistes C
                INNER JOIN VirtualTeamCyclist VTC ON U.utilisateur_id = VTC.cyclist_id
                WHERE VTC.virtual_team_id = :virtual_team_id';
        try {
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(':virtual_team_id', $virtualTeamId, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log("Database Error in getCyclistsInTeam: " . $e->getMessage());
            return false;
        }
    }

    public function getTeamsForCyclist(int $cyclistId)
    {
        $sql = 'SELECT VT.*
                FROM VirtualTeam VT
                INNER JOIN VirtualTeamCyclist VTC ON VT.virtual_team_id = VTC.virtual_team_id
                WHERE VTC.cyclist_id = :cyclist_id';
        try {
            $stmt = $this->pdo->prepare($sql);
            $stmt->bindParam(':cyclist_id', $cyclistId, PDO::PARAM_INT);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        } catch (PDOException $e) {
            error_log("Database Error in getTeamsForCyclist: " . $e->getMessage());
            return false;
        }
    }
}