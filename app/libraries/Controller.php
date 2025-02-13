<?php
namespace TourDeMaroc\App\libraries;
class Controller {
    public function modal($model) {
        require_once "../app/models/" . $model . ".php";
        return new $model();
    }

    public function view($view, $data = []) {
        if(file_exists("../app/views/" . $view . ".php")) {
            require_once "../app/views/" . $view . ".php";
        } else {
            echo "<p>View does not exist</p>";
            echo "<br>";
            die("");
        }
    }
}