<?php


class CyclistController extends Controller
{
    private $CylistModel;

    public function __construct()
    {

        $this->CylistModel = $this->modal('CyclistModel');
    }

    public function CyclistProfile($id)
    {
        $CylistDetails = $this->CylistModel->getCyclistById($id);
        $data = ["name" => "Test", 'Age' => '23'];
        $this->view('CyclistProfile', $data);
    }

}