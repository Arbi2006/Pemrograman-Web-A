<?php

require_once ROOT_PATH . '/app/core/Model.php';

class Transaction extends Model
{
    public function getAll(): array
    {
        $sql = 'SELECT transactions.*, items.name AS item_name
                FROM transactions
                LEFT JOIN items ON transactions.item_id = items.id
                ORDER BY transactions.id DESC';

        return $this->db->query($sql)->fetchAll();
    }

    public function getByItemId(int $itemId): array
    {
        $stmt = $this->db->prepare(
            'SELECT * FROM transactions
             WHERE item_id = :item_id
             ORDER BY id DESC'
        );

        $stmt->execute(['item_id' => $itemId]);

        return $stmt->fetchAll();
    }
}
