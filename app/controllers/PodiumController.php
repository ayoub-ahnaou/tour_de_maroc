<?php

use TourDeMaroc\App\libraries;

class PodiumController extends Controller {
    private $cyclisteModel;
    private $etapeModel;
    
    public function __construct() {
        $this->cyclisteModel = $this->modal('CyclisteModel');
        $this->etapeModel = $this->modal('EtapeModel');
    }
    
    public function index() {
        $podiumData = $this->etapeModel->getTopThreeCyclists();
        
        $data = [
            'title' => 'Podium - Top 3 Cyclists',
            'podiumData' => $podiumData
        ];
        
        $this->view('podium/index', $data);
    }
}