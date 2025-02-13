<?php

//use PDO;

class NotificationModel {
    private $db;

    public function __construct($db) {
        $this->db = $db;
    }

    // Fetch all notifications for a specific user
    public function getNotificationsByUser($receiver_id) {
        $query = "SELECT * FROM Notification WHERE destinataire_id = :receiver_id ORDER BY notification_id DESC";
        $stmt = $this->db->prepare($query);
        $stmt->execute(['receiver_id' => $receiver_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Add a new notification
    public function addNotification($content, $receiver_id, $etape_id = null) {
        $query = "INSERT INTO Notification (contenu, destinataire_id, etape_id) VALUES (:content, :receiver_id, :etape_id)";
        $stmt = $this->db->prepare($query);
        return $stmt->execute([
            'content' => $content,
            'receiver_id' => $receiver_id,
            'etape_id' => $etape_id
        ]);
    }
}