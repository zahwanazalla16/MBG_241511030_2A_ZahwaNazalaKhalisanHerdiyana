<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tambah Bahan Baku - MBG System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { 
            background-color: #FFFFFF; 
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; 
        }
        .navbar { 
            background-color: #003087 !important; 
            color: white; 
        }
        .form-card { 
            max-width: 600px; 
            margin: 80px auto 20px; 
            padding: 25px; 
            border: 1px solid #dee2e6; 
            border-radius: 8px; 
            box-shadow: 0 1px 3px rgba(0,0,0,0.1); 
        }
        .btn-primary { 
            background-color: #003087; 
            border-color: #003087; 
            border-radius: 5px; 
            font-weight: 500; 
        }
        .btn-primary:hover { 
            background-color: #002766; 
        }
        .btn-secondary { 
            border-radius: 5px; 
        }
        .form-label { 
            color: #003087; 
            font-weight: 500; 
        }
        .logo { 
            font-size: 1.2rem; 
            font-weight: bold; 
            color: #003087; 
            text-align: center; 
            margin-bottom: 20px; 
        }
        .form-select { 
            border-color: #dee2e6; 
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="/dashboard">MBG System</a>
            <div class="navbar-nav ms-auto">
                <span class="navbar-text me-3"><?= session()->get('user_name') ?></span>
                <a class="nav-link text-white" href="/auth/logout">Logout</a>
            </div>
        </div>
    </nav>

    <div class="form-card">
        <div class="logo">Tambah Bahan Baku</div>
        <?php if (session()->getFlashdata('error')): ?>
            <div class="alert alert-danger d-flex align-items-center" role="alert">
                <?= session()->getFlashdata('error') ?>
                <button type="button" class="btn-close ms-auto" data-bs-dismiss="alert"></button>
            </div>
        <?php endif; ?>
        <form action="/bahan/simpanBahan" method="post">
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="nama" class="form-label">Nama Bahan</label>
                    <input type="text" name="nama" class="form-control" id="nama" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="kategori" class="form-label">Kategori</label>
                    <select name="kategori" class="form-select" id="kategori" required>
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
                    <label for="jumlah" class="form-label">Jumlah Stok</label>
                    <input type="number" name="jumlah" class="form-control" id="jumlah" min="0" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="satuan" class="form-label">Satuan</label>
                    <input type="text" name="satuan" class="form-control" id="satuan" placeholder="e.g., kg, butir" required>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label for="tanggal_masuk" class="form-label">Tanggal Masuk</label>
                    <input type="date" name="tanggal_masuk" class="form-control" id="tanggal_masuk" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label for="tanggal_kadaluarsa" class="form-label">Tanggal Kadaluarsa</label>
                    <input type="date" name="tanggal_kadaluarsa" class="form-control" id="tanggal_kadaluarsa" required>
                </div>
            </div>
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <a href="/dashboard" class="btn btn-secondary me-md-2">Kembali</a>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
        </form>
    </div>
</body>
</html>