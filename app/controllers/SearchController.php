<?php

use TourDeMaroc\App\models\SearchModel;

class SearchController extends Controller {
    public function results() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $query = $_POST['search'];

            if (empty($query)) {
                $this->redirect('/', ['error' => 'Veuillez entrer un terme de recherche.']);
                return;
            }

            $searchModel = new SearchModel();

            $results = $searchModel->search($query);

            $data = compact("search", "query");

            $this->view('search/results', $data);
        } else {
            $this->redirect('/');
        }
    }
}