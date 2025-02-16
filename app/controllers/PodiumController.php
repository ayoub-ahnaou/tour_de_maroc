<?php

use TourDeMaroc\App\models\CyclistModel;
use TourDeMaroc\App\models\EtapeModel;

class PodiumController extends Controller {
    private $cyclistModel;
    private $etapeModel;
    
    public function __construct() {
        $this->cyclistModel = new CyclistModel();
        $this->etapeModel = new EtapeModel();
        // $this->etapeModel = $this->modal('EtapeModel');
    }
    
    public function index() {
        $podiumData = $this->etapeModel->getTopThreeCyclists();
        
        $data = [
            'title' => 'Podium - Top 3 Cyclists',
            'podiumData' => $podiumData
        ];
        
        $this->view('podium', $data);
    }
}