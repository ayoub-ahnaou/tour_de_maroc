<?php

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

    protected function redirect($url, $data = []) {
        // Build the full URL
        $baseUrl = rtrim(URL_ROOT, '/'); // Ensure ROOT is defined in your config (e.g., 'http://example.com')
        $url = trim($url, '/'); // Remove leading/trailing slashes

        // Add query parameters if provided
        if (!empty($data)) {
            $queryString = http_build_query($data);
            $url .= '?' . $queryString;
        }

        // Set the Location header and exit
        header("Location: $baseUrl/$url");
        exit(); // Ensure no further code is executed
    }
}