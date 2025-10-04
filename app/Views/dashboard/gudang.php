```html
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Dashboard Gudang - MBG System</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    body {
      background-color: #FFFFFF;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }
    .navbar {
      background-color: #002766 !important;
      color: white;
    }
    .navbar-brand {
      color: white !important;
      font-weight: 500;
    }
    .sidebar {
      background-color: #002766;
      border-right: 1px solid #fff;
      height: 100vh;
      position: fixed;
      width: 220px;
      top: 0;
      left: 0;
      z-index: 1000;
      padding-top: 70px;
      overflow-y: auto;
    }
    .sidebar .nav-link {
      color: #fff;
      padding: 10px 15px;
      margin: 6px 8px;
      border: 1px solid #fff;
      border-radius: 5px;
      font-size: 0.9rem;
      font-weight: 400;
      display: block;
    }
    .sidebar .nav-link:hover,
    .sidebar .nav-link.active {
      background-color: #003087;
      color: #fff;
    }
    .content {
      margin-left: 220px;
      padding: 20px;
    }
    .content h3 {
      margin-top: 1.5rem;
      margin-bottom: 1rem;
    }
    .card {
      border-radius: 8px;
      box-shadow: 0 1px 3px rgba(0,0,0,0.1);
      margin-bottom: 20px;
      transition: box-shadow 0.2s;
    }
    .card:hover {
      box-shadow: 0 3px 8px rgba(0,0,0,0.2);
    }
    .card-body {
      padding: 20px;
    }
    .card-icon {
      font-size: 1.2rem;
      margin-bottom: 10px;
      display: block;
      text-align: center;
      font-weight: 600;
    }
    .btn-outline-success:hover {
      background-color: #28A745 !important;
      color: #fff !important;
      border-color: #28A745 !important;
    }
    .btn-outline-warning:hover {
      background-color: #FD7E14 !important;
      color: #fff !important;
      border-color: #FD7E14 !important;
    }
    .btn-primary {
      background-color: #FFFFFF !important;
      border-color: #002766 !important;
      color: #002766 !important;
      border-radius: 5px;
      font-weight: 500;
      cursor: pointer;
    }
    .btn-primary:hover {
      background-color: #002766 !important;
      color: #fff !important;
    }
    .alert {
      border-radius: 5px;
      border: none;
    }
  </style>
</head>
<body>
  <nav class="navbar navbar-expand-lg fixed-top">
    <div class="container-fluid">
      <a class="navbar-brand" href="/dashboard">MBG System</a>
      <div class="navbar-nav ms-auto">
        <span class="navbar-text me-3"><?= $user_name ?></span>
        <a class="nav-link text-white" href="/auth/logout">Logout</a>
      </div>
    </div>
  </nav>

  <div class="sidebar">
    <ul class="nav flex-column">
      <li class="nav-item">
        <a class="nav-link active" href="/dashboard">Dashboard</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/bahan/tambahBahan">Tambah Bahan Baku</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/bahan/lihatBahan">Lihat Stok Bahan</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="/bahan/kelolaPermintaan">Kelola Permintaan</a>
      </li>
    </ul>
  </div>

  <div class="content">
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
  </div>
</body>
</html>
