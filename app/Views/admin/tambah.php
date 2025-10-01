<?= $this->extend('layout') ?>
<?= $this->section('content') ?>
<div class="container mt-5">
    <h2>Tambah Bahan Baku</h2>
    <?php if (session()->getFlashdata('success')): ?>
        <div class="alert alert-success"><?= session()->getFlashdata('success') ?></div>
    <?php endif; ?>
    <?php if (isset($errors)): ?>
        <div class="alert alert-danger">
            <?php foreach ($errors as $error): ?>
                <p><?= $error ?></p>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>
    <form method="post" action="<?= base_url('/admin/bahan/tambah') ?>">
        <div class="mb-3"><input type="text" name="nama" class="form-control" placeholder="Nama" required></div>
        <div class="mb-3"><input type="text" name="kategori" class="form-control" placeholder="Kategori" required></div>
        <div class="mb-3"><input type="number" name="jumlah" class="form-control" placeholder="Jumlah" min="1" required></div>
        <div class="mb-3"><input type="text" name="satuan" class="form-control" placeholder="Satuan" required></div>
        <div class="mb-3"><input type="date" name="tanggal_masuk" class="form-control" required></div>
        <div class="mb-3"><input type="date" name="tanggal_kadaluarsa" class="form-control" required></div>
        <button type="submit" class="btn btn-primary">Tambah</button>
    </form>
</div>
<?= $this->endSection() ?>