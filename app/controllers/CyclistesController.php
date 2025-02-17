<?php

class CyclistesController extends Controller {
    public function index() {
        $this->view("cyclistes/cyclistes");
    }

    public function details($id) {
        $this->view("cyclistes/cyclisteDetails");
    }
}