<?php
namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\BahanBakuModel;

class BahanController extends Controller
{
    public function tambahBahan()
    {
        if (session()->get('user_role') !== 'gudang') {
            return redirect()->to('/dashboard')->with('error', 'Akses ditolak');
        }
        return view('gudang/tambah_bahan');
    }

    public function simpanBahan()
    {
        if (session()->get('user_role') !== 'gudang') {
            return redirect()->to('/dashboard')->with('error', 'Akses ditolak');
        }

        $model = new BahanBakuModel();
        $data = $this->request->getPost();

        if ($data['jumlah'] < 0) {
            return redirect()->back()->with('error', 'Stok tidak boleh negatif');
        }

        if (
            empty($data['nama']) || 
            empty($data['kategori']) || 
            empty($data['satuan']) || 
            empty($data['tanggal_masuk']) || 
            empty($data['tanggal_kadaluarsa'])
        ) {
            return redirect()->back()->with('error', 'Semua field wajib diisi');
        }

        $data['status'] = $model->calculateStatus($data);
        $data['created_at'] = date('Y-m-d H:i:s');

        $model->insert($data);

        return redirect()->to('/dashboard')->with('success', 'Bahan ditambahkan');
    }

    public function lihatBahan()
    {
        if (session()->get('user_role') !== 'gudang') {
            return redirect()->to('/dashboard')->with('error', 'Akses ditolak');
        }

        $model = new BahanBakuModel();
        $data['bahan'] = $model->getAllWithStatus();

        return view('gudang/lihat_bahan', $data);
    }

}
