<?= $this->extend('template') ?>

<?= $this->section('content') ?>
<div class="container mt-5">
    <h2 class="mb-4">Edit Stok Bahan: <?= esc($bahan['nama']) ?></h2>

    <form action="<?= base_url('bahan/updateStok/' . $bahan['id']) ?>" method="post" onsubmit="return confirm('Yakin update stok ini?');">
        <div class="mb-3">
            <label class="form-label">Jumlah Stok Baru</label>
            <input type="number" name="jumlah" class="form-control" value="<?= esc($bahan['jumlah']) ?>" min="0" required>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="<?= base_url('bahan/lihatBahan') ?>" class="btn btn-secondary">Batal</a>
    </form>
</div>
<?= $this->endSection() ?>
