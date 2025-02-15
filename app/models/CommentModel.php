<?php

namespace TourDeMaroc\App\models;

use TourDeMaroc\App\Entity\Commentaire;
use TourDeMaroc\App\libraries\Database;

class CommentModel
{
    private $db;
    public function __construct()
    {
        $this->db = Database::getInstance()->getConnection();
    }

    public function AddComment(Commentaire $comment)
    {
        $author = $comment->getAuteurId();
        $etapId = $comment->getEtapeId();
        $content = $comment->getContenu(); // Assuming this method exists

        $stmt = $this->db->prepare('INSERT INTO commentaire (auteur_id, etape_id, contenu) VALUES (:authorId, :etapId, :content)');
        $stmt->bindParam(':authorId', $author, PDO::PARAM_INT);
        $stmt->bindParam(':etapId', $etapId, PDO::PARAM_INT);
        $stmt->bindParam(':content', $content, PDO::PARAM_STR);
        return $stmt->execute();
    }

    public function EditComment($id, $newContent)
    {
        $stmt = $this->db->prepare('UPDATE commentaire SET contenu = :content WHERE id = :id');
        $stmt->bindParam(':content', $newContent, PDO::PARAM_STR);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }

    public function DeleteComment($id)
    {
        $stmt = $this->db->prepare('DELETE FROM commentaire WHERE id = :id');
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }

    public function DisplayAllCommetent()
    {
        $stmt = $this->db->prepare('SELECT * FROM commentaire ORDER BY id DESC');
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
