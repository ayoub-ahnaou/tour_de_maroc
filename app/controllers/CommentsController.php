<?php

use TourDeMaroc\App\Entity\Commentaire;
use TourDeMaroc\App\models\CommentModel;

class CommentsController extends Controller
{
    private $model;

    public function __construct()
    {
        $this->model = $this->modal('CommentModel');
    }

    public function AcceptComment($id)
    {

    }

    public function AddComment($idEquip)
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['AddComment'])) {
            $newComment = new Commentaire($_SESSION['id'], $idEquip, $_POST['content'], null);
            $newCommentModel = new CommentModel();

        }
    }

    public function DisplayAllComments(){


    }



}