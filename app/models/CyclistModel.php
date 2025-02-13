<?php

use TourDeMaroc\App\Entity\Cycliste;
use TourDeMaroc\App\libraries\Database;

class CyclistModel
{
    private $db;

    public function __construct()
    {
        $this->db = Database::getInstance()->getConnection();
    }


    public function getCyclistById($id)
    {
        $stmt = $this->db->prepare('SELECT * from cycliste where utilisateur_id = :id');
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return  new Cycliste(
            $result['nom_utilisateur'],
            $result['mot_de_passe'],
            $result['email'],
            $result['role'],
            $result['equipe'],
            $result['date_de_naissance'],
            $result['nationalite'],
            $result['taille'],
            $result['photo'],
            $result['poids']
        );
        
    }
}