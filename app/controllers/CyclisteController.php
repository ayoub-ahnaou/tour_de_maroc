<?php

class CyclisteController extends Controller
{

    // private $CylistModel;

    // public function __construct()
    // {
    //     echo "here is Cyclist controller";
    //     $this->CylistModel = $this->modal('CyclistModel');

    // }

    public function profile() {
        $this->view('CyclistProfile'); // Correspond au fichier app/views/cyclisteProfile.php
    }

    // public function CyclistProfile($id)
    // {

    //     $Cylist = $this->CylistModel->getCyclistById($id);
    //     $data = [
    //         "name" => $Cylist->getNomUtilisateur(),
    //         "email" => $Cylist->getEmail(),
    //         "role" => $Cylist->getRole(),
    //         "team" => $Cylist->getEquipe(),
    //         "birth_date" => $Cylist->getDateDeNaissance(),
    //         "nationality" => $Cylist->getNationalite(),
    //         "height" => $Cylist->getTaille(),
    //         "weight" => $Cylist->getPoids(),
    //         "photo" => $Cylist->getPhoto()
    //     ];
    //     $this->view('CyclistProfile', $data);
    // }
public function CyclistProfile(){
    $data=[];
    $this->view('CyclistProfile', $data);

}
}