<?php
namespace TourDeMaroc\App\Models;

use Exception;
use PDO;
use TourDeMaroc\App\Entity\Question;
use TourDeMaroc\App\libraries\Database;

class QuestionModel {
    private PDO $db;

    public function __construct() {
        $this->db = Database::getInstance()->getConnection();
    }

    public function askQuestion($auteur_id, $cycliste_id, $question) {
        $sql = "INSERT INTO question (auteur_id, cycliste_id, contenu) VALUES (:auteur_id, :cycliste_id, :contenu)";
        try {
            $stmt = $this->db->prepare($sql);
            return $stmt->execute([":auteur_id" => $auteur_id, ":cycliste_id" => $cycliste_id, ":contenu" => $question]);
        } catch (Exception $e) {
            throw new Exception("ask Question echoué: " . $e->getMessage());
        }
    }

    public function getAllQuestions($fan_id, $cycliste_id) {
        try {
            $sql = "SELECT q.*, nom_utilisateur, prenom_utilisateur, email FROM question q JOIN utilisateur u
                ON u.utilisateur_id = q.auteur_id
                WHERE auteur_id = :auteur_id AND cycliste_id = :cycliste_id";
            $stmt = $this->db->prepare($sql);
            $stmt->execute([":auteur_id" => $fan_id, ":cycliste_id" => $cycliste_id]);
            $res = $stmt->fetchAll();
            return $res;
        } catch (Exception $e) {
            throw new Exception("get All questions echoué: " . $e->getMessage());
        }
    }

    public function questions() {
        $sql = "SELECT q.*, nom_utilisateur, prenom_utilisateur, email FROM question q
            JOIN utilisateur u ON u.utilisateur_id = q.auteur_id";
        $stmt = $this->db->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll();
    }

    public function getAllReponses($fan_id, $cycliste_id) {
        try {
            $sql = "SELECT q.*, nom_utilisateur, prenom_utilisateur, email FROM question q JOIN utilisateur u
                ON u.utilisateur_id = q.cycliste_id
                WHERE auteur_id = :auteur_id AND cycliste_id = :cycliste_id
                AND reponse IS NOT NULL";
            $stmt = $this->db->prepare($sql);
            $stmt->execute([":auteur_id" => $fan_id, ":cycliste_id" => $cycliste_id]);
            $res = $stmt->fetchAll();
            return $res;
        } catch (Exception $e) {
            throw new Exception("get All questions echoué: " . $e->getMessage());
        }
    }
}