<?php

class NotificationController extends Controller {
    private $notificationModel;

    public function __construct($db) {
        $this->notificationModel = new NotificationModel($db);
    }

    public function fetchNotifications($receiver_id) {
        return $this->notificationModel->getNotificationsByUser($receiver_id);
    }

    public function addNotification($content, $receiver_id, $etape_id = null) {
        return $this->notificationModel->addNotification($content, $receiver_id, $etape_id);
    }
}