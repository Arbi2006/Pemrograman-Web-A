<?php

require_once ROOT_PATH . '/app/core/Database.php';

class Model
{
    protected PDO $db;

    public function __construct()
    {
        $this->db = Database::connect();
    }
}
