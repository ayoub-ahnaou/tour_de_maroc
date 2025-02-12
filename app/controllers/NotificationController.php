<?php
namespace TourDeMaroc\App\Controllers;

class NotificationController {
    private $notificationModel;

    public function __construct($notificationModel) {
        $this->notificationModel = $notificationModel;
    }

    public function getNotifications() {
        if (!isset($_SESSION['user_id'])) {
            http_response_code(401);
            echo json_encode(['error' => 'Not authenticated']);
            return;
        }
        
        $notifications = $this->notificationModel->getNotificationsForUser($_SESSION['user_id']);
        echo json_encode(['notifications' => $notifications]);
    }

    public function subscribeToStage() {
        if (!isset($_SESSION['user_id']) || !isset($_POST['etape_id'])) {
            http_response_code(400);
            echo json_encode(['error' => 'Invalid request']);
            return;
        }

        $success = $this->notificationModel->subscribeToEtape(
            $_SESSION['user_id'], 
            $_POST['etape_id']
        );

        echo json_encode(['success' => $success]);
    }
}