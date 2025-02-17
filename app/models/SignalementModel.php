<?php
namespace TourDeMaroc\App\models;

use Exception;
use PDO;
use TourDeMaroc\App\Entity\Signalement;
use TourDeMaroc\App\libraries\Database;

class SignalementModel {
    private PDO $db;

    public function __construct() {
        $this->db = Database::getInstance()->getConnection();
    }

public function InsertSignal($contenu,$utilisateur_id){
$sql="INSERT INTO signalement (contenu,utilisateur_id)
VALUES (:contenu,:utilisateur_id)";
    $stmt = $this->db->prepare($sql);
    $stmt->bindValue(":contenu",$contenu);
    $stmt->bindValue(":utilisateur_id",$utilisateur_id);
    $stmt->execute();

}


}