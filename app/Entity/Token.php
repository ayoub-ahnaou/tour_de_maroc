<?php

namespace TourDeMaroc\App\Entity;

use TourDeMaroc\App\models\users;

class Token
{
    private $id;
    private $reset_token_hash;
    private $reset_token_expires_at;
    private $created_at;
    private $users_Id;

    /**
     * @return mixed
     */
    public function getUsersId()
    {
        return $this->users_Id;
    }

    /**
     * @param mixed $users_Id
     */
    public function setUsersId($users_Id): void
    {
        $this->users_Id = $users_Id;
    }

    public function __construct($id = null, $users_Id, $reset_token_hash, $reset_token_expires_at, $created_at = null)
    {
        $this->id = $id;
        $this->reset_token_hash = $reset_token_hash;
        $this->reset_token_expires_at = $reset_token_expires_at;
        $this->created_at = $created_at;
        $this->users_Id = $users_Id;
    }

    // Getters and Setters
    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getResetTokenHash()
    {
        return $this->reset_token_hash;
    }

    public function setResetTokenHash($reset_token_hash)
    {
        $this->reset_token_hash = $reset_token_hash;
    }

    public function getResetTokenExpiresAt()
    {
        return $this->reset_token_expires_at;
    }

    public function setResetTokenExpiresAt($reset_token_expires_at)
    {
        $this->reset_token_expires_at = $reset_token_expires_at;
    }

    public function getCreatedAt()
    {
        return $this->created_at;
    }

    public function setCreatedAt($created_at)
    {
        $this->created_at = $created_at;
    }
}
