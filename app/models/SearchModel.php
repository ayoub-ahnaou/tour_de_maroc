<?php
namespace TourDeMaroc\App\models;
use PDO;
use TourDeMaroc\App\libraries\Database;

class SearchModel {
    private PDO $db;

    public function __construct() {
        $this->db = Database::getInstance()->getConnection();
    }

    public function search($query) {
        $results = [];
    
        $searchables = [
            'cyclistes' => ['table' => 'cycliste', 'columns' => ['nom_utilisateur', 'prenom_utilisateur', 'nationalite']],
            'etapes' => ['table' => 'etape', 'columns' => ['lieu_de_depart', 'lieu_d_arrivee', 'region', 'difficulte']]
        ];
    
        foreach ($searchables as $type => $data) {
            $table = $data['table'];
            $columns = $data['columns'];
    
            $whereClauses = array_map(fn($col) => "$col LIKE :query", $columns);
            $whereSql = implode(" OR ", $whereClauses);
    
            $sql = "SELECT * FROM $table WHERE $whereSql";
            $stmt = $this->db->prepare($sql);
            $stmt->execute([':query' => "%$query%"]);
            $fetchedResults = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
            if (!empty($fetchedResults)) {
                $results[] = ["results" => $fetchedResults, "type" => $type];
            }
        }
        return $results;
    }
}