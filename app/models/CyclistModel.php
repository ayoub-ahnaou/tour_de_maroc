<?php

use TourDeMaroc\App\Entity\Cycliste;

require_once '../app/libraries/Database.php';
require_once '../app/Entity/Cycliste.php';


class CyclistModel
{
    private $db;

    public function __construct()
    {
        $this->db = Database::getInstance()->getConnection();
    }


    public function getCyclistById($id)
    {
        $stmt = $this->db->prepare('SELECT * from cycliste where cycliste_id = :id');
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return new Cycliste()
        var_dump($result);
    }
}