<?php

use TourDeMaroc\App\Libraries\Session;
use TourDeMaroc\App\models\AbonnementModel;

class FanController extends Controller
{
    private $abonnementModel;

    public function __construct()
    {
        $this->abonnementModel = new AbonnementModel();
    }

    // Follow a cyclist
    public function follow($cyclisteId)
    {
        $fanId = Session::getInstance()->getUserId(); // Get logged-in fan's ID
        if ($this->abonnementModel->followCyclist($fanId, $cyclisteId)) {
            echo json_encode(['success' => true, 'message' => 'You are now following this cyclist.']);
        } else {
            echo json_encode(['success' => false, 'message' => 'Failed to follow cyclist.']);
        }
    }

    // Unfollow a cyclist
    public function unfollow($cyclisteId)
    {
        $fanId = Session::getInstance()->getUserId(); // Get logged-in fan's ID
        if ($this->abonnementModel->unfollowCyclist($fanId, $cyclisteId)) {
            echo json_encode(['success' => true, 'message' => 'You have unfollowed this cyclist.']);
        } else {
            echo json_encode(['success' => false, 'message' => 'Failed to unfollow cyclist.']);
        }
    }

    // Check if a fan is following a cyclist
    public function isFollowing($cyclisteId)
    {
        $fanId = Session::getInstance()->getUserId(); // Get logged-in fan's ID
        $isFollowing = $this->abonnementModel->isFollowing($fanId, $cyclisteId);
        echo json_encode(['isFollowing' => $isFollowing]);
    }

    // Get all cyclists followed by a fan
    public function followedCyclists()
    {
        $fanId = Session::getInstance()->getUserId(); // Get logged-in fan's ID
        $cyclistes = $this->abonnementModel->getFollowedCyclists($fanId);
        $this->view('fan/followed_cyclistes', compact('cyclistes'));
    }
}