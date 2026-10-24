<?php require ROOT_PATH . '/app/views/layouts/header.php'; ?>

<div class="d-flex justify-content-between align-items-center mb-4">
    <h2>Data Barang</h2>
    <a href="<?= e(base_url()) ?>" class="btn btn-outline-secondary">
        Kembali ke Dashboard
    </a>
</div>

<div class="card shadow-sm">
    <div class="card-body">

        <form method="GET" action="<?= e(base_url('items')) ?>" class="row g-2 mb-3">
            <div class="col-md-8">
                <input
                    type="text"
                    name="search"
                    class="form-control"
                    placeholder="Cari kode atau nama barang..."
                    value="<?= e($keyword) ?>"
                >
            </div>
            <div class="col-auto">
                <button type="submit" class="btn btn-primary">
                    Cari
                </button>
                <a href="<?= e(base_url('items')) ?>" class="btn btn-secondary">
                    Reset
                </a>
            </div>
        </form>

        <div class="table-responsive">
            <table class="table table-bordered table-striped align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>No.</th>
                        <th>Kode</th>
                        <th>Nama Barang</th>
                        <th>Kategori</th>
                        <th>Stok</th>
                        <th>Satuan</th>
                        <th>Harga</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (empty($items)): ?>
                        <tr>
                            <td colspan="7" class="text-center">
                                Data barang tidak ditemukan.
                            </td>
                        </tr>
                    <?php else: ?>
                        <?php foreach ($items as $index => $item): ?>
                            <tr>
                                <td><?= (($page - 1) * 10) + $index + 1 ?></td>
                                <td><?= e($item['code']) ?></td>
                                <td><?= e($item['name']) ?></td>
                                <td><?= e($item['category_name'] ?? '-') ?></td>
                                <td><?= e($item['quantity']) ?></td>
                                <td><?= e($item['unit']) ?></td>
                                <td><?= e(rupiah($item['price'])) ?></td>
                            </tr>
                        <?php endforeach; ?>
                    <?php endif; ?>
                </tbody>
            </table>
        </div>

        <?php if ($totalPages > 1): ?>
            <nav>
                <ul class="pagination">
                    <?php for ($i = 1; $i <= $totalPages; $i++): ?>
                        <li class="page-item <?= $i === $page ? 'active' : '' ?>">
                            <a
                                class="page-link"
                                href="<?= e(base_url('items')) ?>?search=<?= urlencode($keyword) ?>&page=<?= $i ?>"
                            >
                                <?= $i ?>
                            </a>
                        </li>
                    <?php endfor; ?>
                </ul>
            </nav>
        <?php endif; ?>

    </div>
</div>

<?php require ROOT_PATH . '/app/views/layouts/footer.php'; ?>
