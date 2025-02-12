<?php
// app/models/NotificationModel.php
namespace TourDeMaroc\App\Models;

use TourDeMaroc\App\Entity\Notification;
use PDO;

class NotificationModel {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    public function createNotification($contenu, $destinataire_id, $etape_id = null) {
        $sql = "INSERT INTO Notification (contenu, destinataire_id, etape_id) 
                VALUES (:contenu, :destinataire_id, :etape_id)";
        
        $stmt = $this->db->prepare($sql);
        return $stmt->execute([
            ':contenu' => $contenu,
            ':destinataire_id' => $destinataire_id,
            ':etape_id' => $etape_id
        ]);
    }

    public function getNotificationsForUser($userId) {
        $sql = "SELECT n.*, e.lieu_de_depart, e.lieu_d_arrivee, e.date 
                FROM Notification n 
                LEFT JOIN Etape e ON n.etape_id = e.etape_id 
                WHERE n.destinataire_id = :userId 
                ORDER BY n.notification_id DESC";
        
        $stmt = $this->db->prepare($sql);
        $stmt->execute([':userId' => $userId]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function subscribeToEtape($userId, $etapeId) {
        // First check if subscription exists
        $checkSql = "SELECT COUNT(*) FROM Etape_Subscription 
                     WHERE utilisateur_id = :userId AND etape_id = :etapeId";
        $checkStmt = $this->db->prepare($checkSql);
        $checkStmt->execute([':userId' => $userId, ':etapeId' => $etapeId]);
        
        if ($checkStmt->fetchColumn() > 0) {
            return false; // Already subscribed
        }

        // Create subscription
        $sql = "INSERT INTO Etape_Subscription (utilisateur_id, etape_id) 
                VALUES (:userId, :etapeId)";
        
        $stmt = $this->db->prepare($sql);
        $success = $stmt->execute([
            ':userId' => $userId,
            ':etapeId' => $etapeId
        ]);

        if ($success) {
            $etapeSql = "SELECT lieu_de_depart, lieu_d_arrivee FROM Etape WHERE etape_id = :etapeId";
            $etapeStmt = $this->db->prepare($etapeSql);
            $etapeStmt->execute([':etapeId' => $etapeId]);
            $etape = $etapeStmt->fetch(PDO::FETCH_ASSOC);
            
            $notificationContent = "You have subscribed to stage: " . 
                                 $etape['lieu_de_depart'] . " - " . $etape['lieu_d_arrivee'];
            
            $this->createNotification($notificationContent, $userId, $etapeId);
        }

        return $success;
    }
}