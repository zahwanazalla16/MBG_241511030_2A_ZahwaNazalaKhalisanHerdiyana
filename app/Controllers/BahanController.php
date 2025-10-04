<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\BahanBakuModel;

class BahanController extends BaseController
{
    protected $bahanModel;

    public function __construct()
    {
        $this->bahanModel = new BahanBakuModel();
    }

    public function tambahBahan()
    {
        if (session()->get('user_role') !== 'gudang') {
            return redirect()->to('/dashboard')->with('error', 'Akses ditolak');
        }

        return view('gudang/tambah_bahan', [
            'title' => 'Tambah Bahan Baku - MBG System',
            'user_name' => session()->get('user_name'),
            'menu' => [
                ['key' => 'dashboard', 'label' => 'Dashboard', 'url' => '/dashboard'],
                ['key' => 'tambah', 'label' => 'Tambah Bahan Baku', 'url' => '/bahan/tambahBahan'],
                ['key' => 'lihat', 'label' => 'Lihat Stok Bahan', 'url' => '/bahan/lihatBahan'],
                ['key' => 'permintaan', 'label' => 'Kelola Permintaan', 'url' => '/bahan/kelolaPermintaan'],
            ],
            'active' => 'tambah'
        ]);
    }

    public function simpanBahan()
    {
        $validationRules = [
            'nama' => 'required|min_length[3]',
            'kategori' => 'required',
            'jumlah' => 'required|integer|greater_than_equal_to[0]',
            'satuan' => 'required',
            'tanggal_masuk' => 'required|valid_date',
            'tanggal_kadaluarsa' => 'required|valid_date'
        ];

        if (!$this->validate($validationRules)) {
            return redirect()->back()->with('error', 'Data tidak valid, silakan cek kembali.')->withInput();
        }

        $data = $this->request->getPost([
            'nama', 'kategori', 'jumlah', 'satuan', 'tanggal_masuk', 'tanggal_kadaluarsa'
        ]);

        if (!$this->bahanModel->insert($data)) {
            return redirect()->back()->with('error', 'Gagal menyimpan data bahan.')->withInput();
        }

        return redirect()->to('/bahan/lihatBahan')->with('success', 'Data bahan berhasil disimpan.');
    }

    public function lihatBahan()
    {
        if (session()->get('user_role') !== 'gudang') {
            return redirect()->to('/dashboard')->with('error', 'Akses ditolak');
        }

        return view('gudang/lihat_bahan', [
            'title' => 'Lihat Stok Bahan - MBG System',
            'user_name' => session()->get('user_name'),
            'menu' => [
                ['key' => 'dashboard', 'label' => 'Dashboard', 'url' => '/dashboard'],
                ['key' => 'tambah', 'label' => 'Tambah Bahan Baku', 'url' => '/bahan/tambahBahan'],
                ['key' => 'lihat', 'label' => 'Lihat Stok Bahan', 'url' => '/bahan/lihatBahan'],
                ['key' => 'permintaan', 'label' => 'Kelola Permintaan', 'url' => '/bahan/kelolaPermintaan'],
            ],
            'active' => 'lihat',
            'bahan' => $this->bahanModel->findAll(),
        ]);
    }

    public function editBahan($id)
    {
        $bahan = $this->bahanModel->find($id);

        if (!$bahan) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException("Bahan dengan ID $id tidak ditemukan");
        }

        return view('gudang/edit_stok', [
            'title' => 'Edit Stok Bahan - MBG System',
            'user_name' => session()->get('user_name'),
            'menu' => [
                ['key' => 'dashboard', 'label' => 'Dashboard', 'url' => '/dashboard'],
                ['key' => 'tambah', 'label' => 'Tambah Bahan Baku', 'url' => '/bahan/tambahBahan'],
                ['key' => 'lihat', 'label' => 'Lihat Stok Bahan', 'url' => '/bahan/lihatBahan'],
                ['key' => 'permintaan', 'label' => 'Kelola Permintaan', 'url' => '/bahan/kelolaPermintaan'],
            ],
            'active' => 'lihat',
            'bahan' => $bahan,
        ]);
    }

    public function updateStok($id)
    {
        $jumlahBaru = $this->request->getPost('jumlah');

        $this->bahanModel->update($id, ['jumlah' => $jumlahBaru]);

        return redirect()->to('/bahan/lihatBahan')->with('success', 'Stok bahan berhasil diperbarui.');
    }

    public function hapusBahan($id)
    {
        if (session()->get('user_role') !== 'gudang') {
            return redirect()->to('/dashboard')->with('error', 'Akses ditolak');
        }

        $model = new BahanBakuModel();
        $bahan = $model->find($id);

        if (!$bahan) {
            return redirect()->to('/bahan/lihatBahan')->with('error', 'Bahan tidak ditemukan');
        }

        if (strtolower($bahan['status']) !== 'kadaluarsa') {
            return redirect()->to('/bahan/lihatBahan')->with('error', 'Hanya bahan kadaluarsa yang dapat dihapus');
        }

        $model->delete($id);
        return redirect()->to('/bahan/lihatBahan')->with('success', 'Bahan berhasil dihapus');
    }

}
