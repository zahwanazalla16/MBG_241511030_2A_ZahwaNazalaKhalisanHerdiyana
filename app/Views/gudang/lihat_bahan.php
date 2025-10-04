<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Lihat Bahan Baku</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h2>Daftar Bahan Baku</h2>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Kategori</th>
                    <th>Jumlah</th>
                    <th>Satuan</th>
                    <th>Tgl Masuk</th>
                    <th>Tgl Kadaluarsa</th>
                    <th>Status</th>
                </tr>
            </thead>
        <tbody>
            <?php foreach ($bahan as $item): ?>
                <tr>
                    <td><?= $item['id'] ?></td>
                    <td><?= $item['nama'] ?></td>
                    <td><?= $item['kategori'] ?></td>
                    <td><?= $item['jumlah'] ?></td>
                    <td><?= $item['satuan'] ?></td>
                    <td><?= $item['tanggal_masuk'] ?></td>
                    <td><?= $item['tanggal_kadaluarsa'] ?></td>
                    <td><?= $item['status'] ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <a href="/dashboard" class="btn btn-secondary">Kembali ke Dashboard</a>
</div>