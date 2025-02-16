<?php

use TourDeMaroc\App\libraries\Controller;
use TourDeMaroc\App\models\CategorieModel;

class CategoriesController extends Controller {
    public function addCategorie() {
        $category_name = $category_name_err = "";
        if($_SERVER["REQUEST_METHOD"] == "POST") {
            $category_name = $_POST["category_name"];

            if(empty($category_name)) $category_name_err = "categorie ne doit pas etre vide";
            else {
                $categorieModel = new CategorieModel();
                $categorieModel->createCategorie($category_name);
                header("location: " . URL_ROOT . "/dashboard/categories");
            }
        }
        $data = compact("category_name", "category_name_err");
        $this->view("admin/categories/addCategorie", $data);
    }

    public function editCategorie($id) {
        echo "id: " .$id;
        $category_name = $category_name_err = "";

        $data = compact("category_name", "category_name_err");
        $this->view("admin/categories/editCategorie", $data);
    }

    public function deleteCategorie($id) {
        echo "id: " .$id . " ";
        $category_name = $category_name_err = "";

        $data = compact("category_name", "category_name_err");
        $this->view("admin/categories/deleteCategorie", $data);
    }
}