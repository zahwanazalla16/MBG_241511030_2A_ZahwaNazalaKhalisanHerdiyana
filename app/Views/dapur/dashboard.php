<?= $this->extend('layout') ?>
<?= $this->section('content') ?>
<div class="container mt-5">
    <h2><?= $title ?></h2>
    <p>Selamat datang, <strong><?= esc($user_name) ?></strong> (Role: <?= esc($role) ?>)</p>
    <p>Waktu saat ini: <?= $current_time ?></p>
    <p>Ini adalah dashboard untuk dapur. Fitur tambahan akan ditambahkan segera.</p>
    <a href="<?= base_url('/logout') ?>" class="btn btn-danger">Keluar</a>
</div>
<?= $this->endSection() ?>