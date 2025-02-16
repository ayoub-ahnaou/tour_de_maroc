<?php

namespace TourDeMaroc\App\models;

use PDO;
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

        $stm = $this->db->prepare('INSERT INTO Token ( user_id ,reset_token_hash, reset_token_expires_at , created_at)VALUES ( :user_id,:reset_token_hash, :reset_token_expires_at , :created_at)');
        $stm->bindParam(':reset_token_hash', $reset_token_hash);
        $stm->bindParam(':reset_token_expires_at',$reset_token_expires_at);
        $stm->bindParam(':created_at',$created_at);
        $stm->bindParam(':user_id', $user_id);
        return $stm->execute();

    }

    public function checkGetTokenByUserId(int $user_id)
    {
        $stm = $this->db->prepare('SELECT * FROM Token WHERE user_id = :user_id LIMIT 1');
        $stm->bindValue(':user_id', $user_id, PDO::PARAM_INT);
        $stm->execute();

        $row = $stm->fetch(PDO::FETCH_ASSOC);

        if (!$row) {
            return false;
        }
        return new Token(
            $row['id'],
            $row['reset_token_hash'],
            $row['reset_token_expires_at'],
            $row['created_at']
        );
    }

}