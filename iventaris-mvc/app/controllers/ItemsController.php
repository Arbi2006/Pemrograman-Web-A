<?php

class ItemsController extends Controller
{
    public function index(): void
    {
        Middleware::auth();

        $itemModel = $this->model('Item');

        $keyword = trim($_GET['search'] ?? '');
        $page = max(1, (int) ($_GET['page'] ?? 1));
        $limit = 10;

        $totalItems = $itemModel->countAll($keyword);
        $totalPages = max(1, (int) ceil($totalItems / $limit));

        if ($page > $totalPages) {
            $page = $totalPages;
        }

        $items = $itemModel->getAll($keyword, $page, $limit);

        $this->view('items/index', [
            'title' => 'Data Barang',
            'items' => $items,
            'keyword' => $keyword,
            'page' => $page,
            'totalPages' => $totalPages
        ]);
    }
}
