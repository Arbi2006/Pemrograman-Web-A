<?php

require_once ROOT_PATH . '/app/core/Model.php';

class Category extends Model
{
    public function getAll(): array
    {
        $stmt = $this->db->query(
            'SELECT * FROM categories ORDER BY id DESC'
        );

        return $stmt->fetchAll();
    }

    public function findById(int $id): ?array
    {
        $stmt = $this->db->prepare(
            'SELECT * FROM categories WHERE id = :id'
        );

        $stmt->execute(['id' => $id]);

        $category = $stmt->fetch();

        return $category ?: null;
    }
}
