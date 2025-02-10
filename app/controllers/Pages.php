<?php
  class Pages extends Controller {
    public function __construct(){

    }
    
    public function index(){
      $data = [
        'title' => 'youdemvc',
        'description' => 'online learning platform'
      ];
     
      $this->view('pages/index', $data);
    }

    public function about(){
      $data = [
        'title' => 'About Us',
        'description' => 'App for online learning'
      ];

      $this->view('pages/about', $data);
    }
  }