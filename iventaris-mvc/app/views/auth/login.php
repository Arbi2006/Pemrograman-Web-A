<?php require ROOT_PATH . '/app/views/layouts/header.php'; ?>

<div class="container mt-5" style="max-width: 450px;">
    <div class="card shadow">
        <div class="card-body p-4">
            <h3 class="text-center mb-4">Login</h3>

            <p class="text-center text-muted">
                Inventory System
            </p>

            <?php $flash = take_flash(); ?>
            <?php if ($flash): ?>
                <div class="alert alert-<?= e($flash['type']) ?>">
                    <?= e($flash['message']) ?>
                </div>
            <?php endif; ?>

            <form action="<?= e(base_url('auth/login')) ?>" method="POST">
                <div class="mb-3">
                    <label for="username" class="form-label">
                        Username
                    </label>
                    <input
                        type="text"
                        name="username"
                        id="username"
                        class="form-control"
                        required
                    >
                </div>

                <div class="mb-3">
                    <label for="password" class="form-label">
                        Password
                    </label>
                    <input
                        type="password"
                        name="password"
                        id="password"
                        class="form-control"
                        required
                    >
                </div>

                <button type="submit" class="btn btn-primary w-100">
                    Masuk
                </button>
            </form>
        </div>
    </div>
</div>

<?php require ROOT_PATH . '/app/views/layouts/footer.php'; ?>
