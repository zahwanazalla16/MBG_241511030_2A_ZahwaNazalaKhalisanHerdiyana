<?= $this->extend('template') ?>

<?= $this->section('content') ?>
<div class="container-fluid pt-4">
  <h3 class="mb-3" style="color: #003087;">Dapur Sistem Makan Bergizi Gratis</h3>

  <?php if (session()->getFlashdata('success')): ?>
    <div class="alert alert-success d-flex align-items-center" role="alert">
      <?= session()->getFlashdata('success') ?>
      <button 
        type="button" 
        class="btn-close ms-auto" 
        data-bs-dismiss="alert"
      ></button>
    </div>
  <?php endif; ?>

  <?php if (session()->getFlashdata('error')): ?>
    <div class="alert alert-danger d-flex align-items-center" role="alert">
      <?= session()->getFlashdata('error') ?>
      <button 
        type="button" 
        class="btn-close ms-auto" 
        data-bs-dismiss="alert"
      ></button>
    </div>
  <?php endif; ?>

  <div class="row">
    <div class="col-md-6 mb-3">
      <div class="card shadow-sm border-0">
        <div class="card-body text-center">
          <div class="card-icon fw-bold mb-2" style="color: #28A745;">
            Buat Permintaan Bahan
          </div>
          <p class="card-text text-muted mb-3">
            Ajukan bahan untuk masak
          </p>
          <a href="/permintaan/buat" class="btn btn-outline-success w-100">
            Buat Permintaan
          </a>
        </div>
      </div>
    </div>

    <div class="col-md-6 mb-3">
      <div class="card shadow-sm border-0">
        <div class="card-body text-center">
          <div class="card-icon fw-bold mb-2" style="color: #FD7E14;">
            Riwayat Permintaan
          </div>
          <p class="card-text text-muted mb-3">
            Cek status persetujuan
          </p>
          <a href="/permintaan/riwayat" class="btn btn-warning w-100">
            Lihat Riwayat
          </a>
        </div>
      </div>
    </div>
  </div>
</div>
<?= $this->endSection() ?>
