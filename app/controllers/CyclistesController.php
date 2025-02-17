<?php
use TourDeMaroc\App\models\CyclistModel;

class CyclistesController extends Controller {
    public function index() {
        $this->view("cyclistes/cyclistes");
    }

    public function details($id) {
        $this->view("cyclistes/cyclisteDetails");
    }
    public function show(){

        $cyclistes=new CyclistModel();
        $cyclistesList = $cyclistes->getCyclist(); 
        $data = compact("cyclistesList");
        $this->view("cyclistes/cyclistes", $data );
    
       }
}
