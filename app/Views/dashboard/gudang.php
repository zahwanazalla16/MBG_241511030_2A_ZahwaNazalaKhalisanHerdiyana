<?= $this->extend('template') ?>

<?= $this->section('content') ?>
<div class="container-fluid pt-4">
    <h3 class="mb-3" style="color: #003087;">Gudang Sistem Makan Bergizi Gratis</h3>

    <?php if (session()->getFlashdata('success')): ?>
        <div class="alert alert-success d-flex align-items-center" role="alert">
            <?= session()->getFlashdata('success') ?>
            <button type="button" class="btn-close ms-auto" data-bs-dismiss="alert"></button>
        </div>
    <?php endif; ?>

    <?php if (session()->getFlashdata('error')): ?>
        <div class="alert alert-danger d-flex align-items-center" role="alert">
            <?= session()->getFlashdata('error') ?>
            <button type="button" class="btn-close ms-auto" data-bs-dismiss="alert"></button>
        </div>
    <?php endif; ?>

    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-body text-center">
                    <div class="card-icon" style="color: #0e56c2ff;">Tambah Bahan Baku</div>
                    <p class="card-text text-muted">Input bahan baru ke stok gudang</p>
                    <a href="/bahan/tambahBahan" class="btn btn-primary w-100">Tambah</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body text-center">
                    <div class="card-icon" style="color: #28A745;">Lihat Stok Bahan</div>
                    <p class="card-text text-muted">Pantau status dan kedaluwarsa</p>
                    <a href="/bahan/lihatBahan" class="btn btn-outline-success w-100">Lihat</a>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-body text-center">
                    <div class="card-icon" style="color: #FD7E14;">Permintaan Dapur</div>
                    <p class="card-text text-muted">Kelola persetujuan permintaan</p>
                    <a href="/bahan/kelolaPermintaan" class="btn btn-outline-warning w-100">Kelola</a>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
