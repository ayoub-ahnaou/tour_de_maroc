<?php
namespace TourDeMaroc\App\models;

use Exception;
use PDO;
use TourDeMaroc\App\Entity\Categorie;
use TourDeMaroc\App\libraries\Database;

class CategorieModel {
    private PDO $db;

    public function __construct(){
        $this->db = Database::getInstance()->getConnection();
    }

    public function getAllCategories() {
        $stmt = $this->db->prepare("SELECT * FROM categorie");
        $stmt->execute();
        $res = $stmt->fetchAll();
        $categories = [];
        foreach($res as $categorie) {
            $categories[] = new Categorie($categorie["nom"], $categorie["categorie_id"]);
        }
        return $categories;
    }

    public function createCategorie($nom) {
        try {
            $sql = "INSERT INTO categorie (nom) VALUES (:nom)";
            $stmt = $this->db->prepare($sql);
            return $stmt->execute([":nom" => $nom]);
        } catch (Exception $e) {
            throw new Exception("creation du categorie faile: " . $e->getMessage());
        }
    }
}