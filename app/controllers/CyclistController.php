<?php
use TourDeMaroc\App\Entity\Cycliste;

class CyclistController extends Controller
{
    private $CylistModel;

    public function __construct()
    {
        $this->CylistModel = $this->modal('CyclistModel');
    }

    public function CyclistProfile($id)
    {

        $Cylist = $this->CylistModel->getCyclistById($id);
        $data = [
            "name" => $Cylist->getNomUtilisateur(),
            "email" => $Cylist->getEmail(),
            "role" => $Cylist->getRole(),
            "team" => $Cylist->getEquipe(),
            "birth_date" => $Cylist->getDateDeNaissance(),
            "nationality" => $Cylist->getNationalite(),
            "height" => $Cylist->getTaille(),
            "weight" => $Cylist->getPoids(),
            "photo" => $Cylist->getPhoto()
        ];
        $this->view('CyclistProfile', $data);
    }


}