<?php

namespace TourDeMaroc\App\models;

use TourDeMaroc\App\Entity\Token;
use TourDeMaroc\App\libraries\Database;

class TokenModel
{
    private \PDO $db;
    public function __construct()
    {
        $this->db = Database::getInstance()->getConnection();
    }
    public function addToken(Token $token) : bool
    {
        $reset_token_hash = $token->getResetTokenHash();
        $reset_token_expires_at = $token->getResetTokenExpiresAt();
        $created_at = $token->getCreatedAt();
        $user_id = $token->getUsersId();

        $stm = $this->db->prepare('INSERT INTO ResetPassword ( user_id ,reset_token_hash, reset_token_expires_at , created_at)VALUES ( :user_id,:reset_token_hash, :reset_token_expires_at , :created_at)');
        $stm->bindParam(':reset_token_hash', $reset_token_hash);
        $stm->bindParam(':reset_token_expires_at',$reset_token_expires_at);
        $stm->bindParam(':created_at',$created_at);
        $stm->bindParam(':user_id', $user_id);
        return $stm->execute();

    }

    public function AllTokens()
    {

    }
}