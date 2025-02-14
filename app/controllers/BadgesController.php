<?php

use TourDeMaroc\App\Models\BadgeModel;

class BadgesController extends Controller {
    public function editBadge() {
        $this->view("admin/badges/editBadge");
    }

    public function deleteBadge($id) {
        (new BadgeModel())->deleteBadge($id);
        header("location: " . URL_ROOT . "/dashboard/badges");
    }
}