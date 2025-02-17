<?php
namespace TourDeMaroc\App\models;
use PDO;
use TourDeMaroc\App\libraries\Database;
use TourDeMaroc\App\Entity\Cycliste;

require_once '../app/libraries/Database.php';


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







    public function getCyclist()
    {
        $stmt = $this->db->prepare('SELECT * FROM cycliste');
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        if (!$result) {
            return []; 
        }
    
        $cyclistes = [];
        foreach ($result as $row) {
            $cyclistes[] = new Cycliste(
                $row['nom_utilisateur'],
                $row['mot_de_passe'],
                $row['email'],
                $row['role'],
                $row['prenom_utilisateur'], 
                $row['date_de_naissance'],
                $row['nationalite'],
                $row['taille'],
                $row['photo'],
                $row['poids']
            );
        }
    
        return $cyclistes; 
    }


}