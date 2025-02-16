<?php

use TourDeMaroc\App\libraries\Controller;
use TourDeMaroc\App\models\CategorieModel;
use TourDeMaroc\App\models\EtapeModel;

class EtapesController extends Controller {
    public function index() {
        $this->view("etapes/etapes");
    }

    public function etape($ordre) {
        $etape = (new EtapeModel())->getEtapeByOrdre($ordre);
        $this->view("etapes/etapeDetails", compact("etape"));
    }

    public function editEtape($id) {
        $this->view("etapes/editEtape");
    }

    public function deleteEtape($id) {
        $this->view("etapes/deleteEtape");
    }

    public function addEtape() {
        $ordre = $lieu_depart = $lieu_arrive = $distance = $difficulte = $date = $duree = $categorie = "";
        $ordre_err = $lieu_depart_err = $lieu_arrive_err = $distance_err = $difficulte_err = $date_err = $duree_err = $categorie_err = "";
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Vérification de l'ordre
            if (empty(trim($_POST["ordre"]))) {
                $ordre_err = "L'ordre est requis.";
            } else {
                $ordre = trim($_POST["ordre"]);
            }
        
            // Vérification du lieu de départ
            if (empty(trim($_POST["lieu_depart"]))) {
                $lieu_depart_err = "Le lieu de départ est requis.";
            } else {
                $lieu_depart = trim($_POST["lieu_depart"]);
            }
        
            // Vérification du lieu d'arrivée
            if (empty(trim($_POST["lieu_arrive"]))) {
                $lieu_arrive_err = "Le lieu d'arrivée est requis.";
            } else {
                $lieu_arrive = trim($_POST["lieu_arrive"]);
            }
        
            // Vérification de la distance
            if (empty(trim($_POST["distance"]))) {
                $distance_err = "La distance est requise.";
            } elseif (!is_numeric($_POST["distance"])) {
                $distance_err = "Veuillez entrer une valeur numérique.";
            } else {
                $distance = trim($_POST["distance"]);
            }
        
            // Vérification de la difficulté
            if (empty(trim($_POST["difficulte"]))) {
                $difficulte_err = "Le niveau de difficulté est requis.";
            } else {
                $difficulte = trim($_POST["difficulte"]);
            }
        
            // Vérification de la date
            if (empty(trim($_POST["date"]))) {
                $date_err = "La date est requise.";
            } elseif (!preg_match("/^\d{4}-\d{2}-\d{2}$/", $_POST["date"])) {
                $date_err = "Format de date invalide (YYYY-MM-DD).";
            } else {
                $date = trim($_POST["date"]);
            }
        
            // Vérification de la durée
            if (empty(trim($_POST["duree"]))) {
                $duree_err = "La durée est requise.";
            } else {
                $duree = trim($_POST["duree"]);
            }
        
            // Vérification de la catégorie
            if (empty(trim($_POST["categorie"]))) {
                $categorie_err = "La catégorie est requise.";
            } else {
                $categorie = trim($_POST["categorie"]);
            }

            $res = (new EtapeModel())->createEtape($ordre, $lieu_depart, $lieu_arrive, $distance, $difficulte, $date, $duree, $categorie);
            $this->redirect("/dashboard/etapes");
        }
        $categories = (new CategorieModel())->getAllCategories();

        $data = compact(
            "ordre", "lieu_depart", "lieu_arrive", "distance", "difficulte", "date", "duree", "categorie",
            "ordre_err", "lieu_depart_err", "lieu_arrive_err", "distance_err", "difficulte_err", "date_err", "duree_err", "categorie_err",
            "categories"
        );

        $this->view("etapes/addEtape", $data);
    }
}