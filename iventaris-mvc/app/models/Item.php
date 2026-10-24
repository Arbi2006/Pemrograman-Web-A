<?php

require_once ROOT_PATH . '/app/core/Model.php';

class Item extends Model
{
    public function getAll(string $keyword = '', int $page = 1, int $limit = 10): array
    {
        $offset = ($page - 1) * $limit;

        $sql = 'SELECT items.*, categories.name AS category_name
                FROM items
                LEFT JOIN categories ON items.category_id = categories.id
                WHERE items.name LIKE :keyword
                   OR items.code LIKE :keyword
                ORDER BY items.id DESC
                LIMIT :limit OFFSET :offset';

        $stmt = $this->db->prepare($sql);
        $stmt->bindValue(':keyword', '%' . $keyword . '%', PDO::PARAM_STR);
        $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
        $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
        $stmt->execute();

        return $stmt->fetchAll();
    }

    public function countAll(string $keyword = ''): int
    {
       $sql = 'SELECT COUNT(*) FROM items
            WHERE name LIKE :name_keyword
               OR code LIKE :code_keyword';

    $stmt = $this->db->prepare($sql);

    $search = '%' . $keyword . '%';

    $stmt->execute([
        'name_keyword' => $search,
        'code_keyword' => $search
    ]);

    return (int) $stmt->fetchColumn();
    }

    public function findById(int $id): ?array
    {
        $stmt = $this->db->prepare(
            'SELECT * FROM items WHERE id = :id'
        );

        $stmt->execute(['id' => $id]);
        $item = $stmt->fetch();

        return $item ?: null;
    }

    public function create(array $data): bool
    {
        $sql = 'INSERT INTO items
                (code, name, category_id, quantity, unit, price, entry_date, description)
                VALUES
                (:code, :name, :category_id, :quantity, :unit, :price, :entry_date, :description)';

        $stmt = $this->db->prepare($sql);

        return $stmt->execute([
            'code' => $data['code'],
            'name' => $data['name'],
            'category_id' => $data['category_id'] ?: null,
            'quantity' => $data['quantity'],
            'unit' => $data['unit'],
            'price' => $data['price'],
            'entry_date' => $data['entry_date'] ?: null,
            'description' => $data['description'] ?: null
        ]);
    }

    public function update(int $id, array $data): bool
    {
        $sql = 'UPDATE items SET
                    code = :code,
                    name = :name,
                    category_id = :category_id,
                    quantity = :quantity,
                    unit = :unit,
                    price = :price,
                    entry_date = :entry_date,
                    description = :description
                WHERE id = :id';

        $stmt = $this->db->prepare($sql);

        return $stmt->execute([
            'id' => $id,
            'code' => $data['code'],
            'name' => $data['name'],
            'category_id' => $data['category_id'] ?: null,
            'quantity' => $data['quantity'],
            'unit' => $data['unit'],
            'price' => $data['price'],
            'entry_date' => $data['entry_date'] ?: null,
            'description' => $data['description'] ?: null
        ]);
    }

    public function delete(int $id): bool
    {
        $stmt = $this->db->prepare(
            'DELETE FROM items WHERE id = :id'
        );

        return $stmt->execute(['id' => $id]);
    }
}
