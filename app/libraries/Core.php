<?php
namespace TourDeMaroc\App\libraries;
use TourDeMaroc\App\controllers\SignupController;

class Core {
    protected $currentController = "home";
    protected $currentMethod = "index";
    protected $params = [];

    public function __construct() {
        $url = $this->getUrl();

        if(isset($url[0])){
            if(file_exists("../app/controllers/" . ucwords($url[0]) . "Controller.php")) {
                // $this->currentController = ucwords($url[0]);
                // Après :
$controllerName = ucwords($url[0]);
if(file_exists("../app/controllers/" . $controllerName . "Controller.php")) {
    $this->currentController = $controllerName;
}
                unset($url[0]);
            }
        }
        require_once "../app/controllers/" . $this->currentController . "Controller.php";
        // $this->currentController = $this->currentController . "Controller";
        // $this->currentController = new $this->currentController();

        $controllerClass = "TourDeMaroc\\App\\controllers\\" . $this->currentController . "Controller";
        $this->currentController = new $controllerClass();

        // $controllerClass = "TourDeMaroc\\App\\controllers\\" . $this->currentController . "Controller";
        // $this->currentController = new $controllerClass();

        if(isset($url[1])) {
            if(method_exists($this->currentController, $url[1])) {
                $this->currentMethod = $url[1];
            }
            unset($url[1]);
        }

        $this->params = $url ? array_values($url) : [];

        call_user_func_array([$this->currentController, $this->currentMethod], $this->params);
    }

    public function getUrl() {
        if(isset($_GET["url"])) {
            $url = rtrim($_GET["url"], '/');
            $url = filter_var($url, FILTER_SANITIZE_URL);
            $url = explode("/", $url);
            return $url;
        }
    }
}
