<?php
namespace TourDeMaroc\App\Models;

use DateTime;
use Exception;
use PDO;
use TourDeMaroc\App\libraries\Database;

class ClassementModel {
    private PDO $db;

    public function __construct() {
        $this->db = Database::getInstance()->getConnection();
    }

    public function getEtapeClassement($ordre) {
        $sql = "SELECT ce.*, nom_utilisateur, prenom_utilisateur, concat(lieu_de_depart, '-', lieu_d_arrivee) as etape, ordre
            from cycliste_etape ce
            join utilisateur u on u.utilisateur_id = ce.cycliste_id
            JOIN etape e on e.etape_id = ce.etape_id
            where ordre = :ordre
            order by temps ASC";
        try {
            $stmt = $this->db->prepare($sql);
            $stmt->execute([":ordre" => $ordre]);
            $res = $stmt->fetchAll();

            foreach ($res as $key => &$team) {
                $team['datetime'] = DateTime::createFromFormat('H:i:s', $team['temps']);
            }
            $referenceTime = $res[0]['datetime'];
            // Calculate differences
            foreach ($res as $key => &$team) {
                if ($key === 0) {
                    $team['difference'] = '0';
                } else {
                    // Calculate the time difference in seconds
                    $interval = $referenceTime->diff($team['datetime']);
                    $team['difference'] = sprintf(
                        "+%02dh %02d' %02d\"",
                        $interval->h,
                        $interval->i,
                        $interval->s
                    );
                }
            }

            return $res;
        } catch (Exception $e) {
            throw new Exception("get classement of etape: " . $e->getMessage());
        }
    }
}