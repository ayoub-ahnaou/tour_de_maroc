<?php
namespace TourDeMaroc\App\models;

use PDO;
use TourDeMaroc\App\libraries\Database;

class AbonnementModel
{
    private $db;

    public function __construct()
    {
        $this->db = Database::getInstance()->getConnection();
    }

    // Add a follow relationship (fan follows cyclist)
    public function followCyclist($fanId, $cyclisteId)
    {
        $stmt = $this->db->prepare('
            INSERT INTO abonnement (fan_id, cycliste_id)
            VALUES (:fan_id, :cycliste_id)
        ');
        $stmt->execute([
            ':fan_id' => $fanId,
            ':cycliste_id' => $cyclisteId
        ]);

        return $stmt->rowCount();
    }

    public function unfollowCyclist($fanId, $cyclisteId)
    {
        $stmt = $this->db->prepare('
            DELETE FROM abonnement
            WHERE fan_id = :fan_id AND cycliste_id = :cycliste_id
        ');
        $stmt->execute([
            ':fan_id' => $fanId,
            ':cycliste_id' => $cyclisteId
        ]);

        return $stmt->rowCount();
    }

    public function isFollowing($fanId, $cyclisteId)
    {
        $stmt = $this->db->prepare('
            SELECT * FROM abonnement
            WHERE fan_id = :fan_id AND cycliste_id = :cycliste_id
        ');
        $stmt->execute([
            ':fan_id' => $fanId,
            ':cycliste_id' => $cyclisteId
        ]);

        return $stmt->fetch(PDO::FETCH_ASSOC) !== false;
    }

    // Get all cyclists followed by a fan
    public function getFollowedCyclists($fanId)
    {
        $stmt = $this->db->prepare('
            SELECT c.*
            FROM abonnement a
            INNER JOIN cycliste c ON a.cycliste_id = c.utilisateur_id
            WHERE a.fan_id = :fan_id
        ');
        $stmt->execute([':fan_id' => $fanId]);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Get all fans following a cyclist
    public function getFollowers($cyclisteId)
    {
        $stmt = $this->db->prepare('
            SELECT u.*
            FROM abonnement a
            INNER JOIN utilisateur u ON a.fan_id = u.utilisateur_id
            WHERE a.cycliste_id = :cycliste_id
        ');
        $stmt->execute([':cycliste_id' => $cyclisteId]);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}