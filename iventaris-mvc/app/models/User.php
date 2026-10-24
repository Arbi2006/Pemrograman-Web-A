<?php

require_once ROOT_PATH . '/app/core/Model.php';

class User extends Model
{
    public function findByUsername(string $username): ?array
    {
        $stmt = $this->db->prepare(
            'SELECT * FROM users WHERE username = :username LIMIT 1'
        );

        $stmt->execute([
            'username' => $username
        ]);

        $user = $stmt->fetch();

        return $user ?: null;
    }
}
