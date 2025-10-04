<?= $this->extend('template') ?>

<?= $this->section('content') ?>
<div class="container-fluid pt-4">
    <h3 class="mb-3" style="color: #003087;">Daftar Bahan Baku</h3>

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

    <div class="card shadow-sm">
        <div class="card-body">
            <table class="table table-striped align-middle">
                <thead class="table-primary">
                    <tr>
                        <th>ID</th>
                        <th>Nama</th>
                        <th>Kategori</th>
                        <th>Jumlah</th>
                        <th>Satuan</th>
                        <th>Tgl Masuk</th>
                        <th>Tgl Kadaluarsa</th>
                        <th>Status</th>
                        <th colspan="2" class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php if (!empty($bahan)): ?>
                        <?php foreach ($bahan as $item): ?>
                            <tr>
                                <td><?= esc($item['id']) ?></td>
                                <td><?= esc($item['nama']) ?></td>
                                <td><?= esc($item['kategori']) ?></td>
                                <td><?= esc($item['jumlah']) ?></td>
                                <td><?= esc($item['satuan']) ?></td>
                                <td><?= esc($item['tanggal_masuk']) ?></td>
                                <td><?= esc($item['tanggal_kadaluarsa']) ?></td>
                                <td>
                                    <?php if ($item['status'] === 'Habis'): ?>
                                        <span class="badge bg-danger">Habis</span>
                                    <?php elseif ($item['status'] === 'Hampir Habis'): ?>
                                        <span class="badge bg-warning text-dark">Hampir Habis</span>
                                    <?php else: ?>
                                        <span class="badge bg-success"><?= esc($item['status']) ?></span>
                                    <?php endif; ?>
                                </td>
                                <td class="text-center">
                                    <a href="/bahan/editStok/<?= esc($item['id']) ?>" class="btn btn-warning btn-sm">
                                        Edit Stok
                                    </a>
                                </td>
                                <td class="text-center">
                                    <a href="/gudang/hapusBahan/<?= esc($item['id']) ?>"
                                       class="btn btn-sm btn-danger"
                                       onclick="return confirm('Yakin hapus bahan ini?');">
                                        Hapus
                                    </a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    <?php else: ?>
                        <tr>
                            <td colspan="10" class="text-center text-muted py-4">
                                Belum ada data bahan baku
                            </td>
                        </tr>
                    <?php endif; ?>
                </tbody>
            </table>

            <div class="mt-3">
                <a href="/dashboard" class="btn btn-secondary">
                    Kembali ke Dashboard
                </a>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
