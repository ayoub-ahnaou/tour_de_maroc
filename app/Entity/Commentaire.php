<?php

namespace TourDeMaroc\App\Entity;

class Commentaire {
    private $commentaire_id;
    private $auteur_id;
    private $etape_id;

    private $contenu;

    public function __construct($auteur_id, $etape_id, $contenu, $commentaire_id = null) {
        $this->commentaire_id = $commentaire_id;
        $this->auteur_id = $auteur_id;
        $this->etape_id = $etape_id;
    }

    public function getCommentaireId(): mixed
    {
        return $this->commentaire_id;
    }

    public function setCommentaireId(mixed $commentaire_id): void
    {
        $this->commentaire_id = $commentaire_id;
    }

    /**
     * @return mixed
     */
    public function getAuteurId()
    {
        return $this->auteur_id;
    }

    /**
     * @param mixed $auteur_id
     */
    public function setAuteurId($auteur_id): void
    {
        $this->auteur_id = $auteur_id;
    }

    /**
     * @return mixed
     */
    public function getEtapeId()
    {
        return $this->etape_id;
    }

    /**
     * @param mixed $etape_id
     */
    public function setEtapeId($etape_id): void
    {
        $this->etape_id = $etape_id;
    }
    public function getContenu()
    {
        return $this->contenu;
    }
    public function setContenu($contenu): void
    {
        $this->contenu = $contenu;
    }

}
