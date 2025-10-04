<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Dapur - MBG System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #FFFFFF; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; }
        .navbar { background-color: #003087 !important; color: white; }
        .navbar-brand { color: white !important; font-weight: 500; }
        .sidebar { background-color: #f8f9fa; border-right: 1px solid #dee2e6; height: 100vh; position: fixed; width: 220px; top: 0; left: 0; z-index: 1000; padding-top: 70px; overflow-y: auto; }
        .sidebar .nav-link { 
            color: #003087; 
            padding: 8px 12px;
            border-radius: 5px; 
            margin: 1px 10px; 
            font-weight: 400; 
            font-size: 0.9rem;
        }
        .sidebar .nav-link:hover, .sidebar .nav-link.active { background-color: #003087; color: white; }
        .content { margin-left: 220px; padding: 20px; }
        .content h3 { margin-top: 1.5rem; margin-bottom: 1rem; }
        .card { border: 1px solid #dee2e6; border-radius: 8px; box-shadow: 0 1px 3px rgba(0,0,0,0.1); margin-bottom: 20px; transition: box-shadow 0.2s; }
        .card:hover { box-shadow: 0 2px 6px rgba(0,48,135,0.15); }
        .card-body { padding: 20px; }
        .card-icon { font-size: 1.5rem; color: #003087; margin-bottom: 10px; display: block; text-align: center; }
        .btn-primary { background-color: #003087; border-color: #003087; border-radius: 5px; font-weight: 500; }
        .btn-primary:hover { background-color: #002766; }
        .alert { border-radius: 5px; border: none; }
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
                <a class="nav-link active" href="/dashboard">
                    <span class="card-icon">Dashboard</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <span class="card-icon">Buat Permintaan</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <span class="card-icon">Riwayat Permintaan</span>
                </a>
            </li>
        </ul>
    </div>

    <div class="content">
        <div class="container-fluid pt-4">
            <h3 class="mb-3" style="color: #003087;">Dapur Sistem Makan Bergizi Gratis</h3>
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
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body text-center">
                            <div class="card-icon" style="color: #28A745;">Buat Permintaan Bahan</div>
                            <p class="card-text text-muted">Ajukan bahan untuk masak</p>
                            <a href="#" class="btn btn-success w-100">Buat Permintaan</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-body text-center">
                            <div class="card-icon" style="color: #6c757d;">Riwayat Permintaan</div>
                            <p class="card-text text-muted">Cek status persetujuan</p>
                            <a href="#" class="btn btn-outline-secondary w-100">Lihat Riwayat</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>