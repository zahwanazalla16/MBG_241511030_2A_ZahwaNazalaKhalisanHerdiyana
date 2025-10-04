<?= $this->extend('template') ?>

<?= $this->section('content') ?>
<div class="container mt-5 pt-4">
  <div class="form-card mx-auto shadow-sm p-4 bg-white rounded" style="max-width: 600px;">
    <h4 class="text-center mb-4" style="color: #003087;">Tambah Bahan Baku</h4>

    <?php if (session()->getFlashdata('error')): ?>
      <div class="alert alert-danger d-flex align-items-center" role="alert">
        <?= session()->getFlashdata('error') ?>
        <button type="button" class="btn-close ms-auto" data-bs-dismiss="alert"></button>
      </div>
    <?php endif; ?>

    <form action="/bahan/simpanBahan" method="post">
      <div class="row">
        <div class="col-md-6 mb-3">
          <label for="nama" class="form-label text-primary">Nama Bahan</label>
          <input 
            type="text" 
            name="nama" 
            id="nama" 
            class="form-control" 
            required
          >
        </div>

        <div class="col-md-6 mb-3">
          <label for="kategori" class="form-label text-primary">Kategori</label>
          <select 
            name="kategori" 
            id="kategori" 
            class="form-select" 
            required
          >
            <option value="">Pilih Kategori</option>
            <option value="Karbohidrat">Karbohidrat</option>
            <option value="Protein Hewani">Protein Hewani</option>
            <option value="Protein Nabati">Protein Nabati</option>
            <option value="Sayuran">Sayuran</option>
            <option value="Bahan Masak">Bahan Masak</option>
          </select>
        </div>
      </div>

      <div class="row">
        <div class="col-md-6 mb-3">
          <label for="jumlah" class="form-label text-primary">Jumlah Stok</label>
          <input 
            type="number" 
            name="jumlah" 
            id="jumlah" 
            class="form-control" 
            min="0" 
            required
          >
        </div>

        <div class="col-md-6 mb-3">
          <label for="satuan" class="form-label text-primary">Satuan</label>
          <input 
            type="text" 
            name="satuan" 
            id="satuan" 
            class="form-control" 
            placeholder="e.g., kg, butir" 
            required
          >
        </div>
      </div>

      <div class="row">
        <div class="col-md-6 mb-3">
          <label for="tanggal_masuk" class="form-label text-primary">Tanggal Masuk</label>
          <input 
            type="date" 
            name="tanggal_masuk" 
            id="tanggal_masuk" 
            class="form-control" 
            required
          >
        </div>

        <div class="col-md-6 mb-3">
          <label for="tanggal_kadaluarsa" class="form-label text-primary">Tanggal Kadaluarsa</label>
          <input 
            type="date" 
            name="tanggal_kadaluarsa" 
            id="tanggal_kadaluarsa" 
            class="form-control" 
            required
          >
        </div>
      </div>

      <div class="d-grid gap-2 d-md-flex justify-content-md-end">
        <a href="/dashboard" class="btn btn-secondary me-md-2">Kembali</a>
        <button type="submit" class="btn btn-primary">Simpan</button>
      </div>
    </form>
  </div>
</div>
<?= $this->endSection() ?>
