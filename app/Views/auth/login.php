<?= $this->extend('layout') ?>
<?= $this->section('content') ?>
<div class="container mt-5">
    <h2>Login</h2>
    <?php if (session()->getFlashdata('error')): ?>
        <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
    <?php endif; ?>
    <form method="post" action="<?= base_url('/login') ?>">
        <div class="mb-3"><input type="email" name="email" class="form-control" placeholder="Email" required></div>
        <div class="mb-3"><input type="password" name="password" class="form-control" placeholder="Password" required></div>
        <button type="submit" class="btn btn-primary">Login</button>
    </form>
</div>
<?= $this->endSection() ?>