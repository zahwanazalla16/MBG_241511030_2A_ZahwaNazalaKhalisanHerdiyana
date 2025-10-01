<?php
namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\BahanBaku;

class Bahan extends BaseController
{
    public function __construct()
    {
        if (session()->get('role') !== 'gudang') {
            throw new \CodeIgniter\Exceptions\PageNotFoundException();
        }
    }

    public function tambah()
    {
        if ($this->request->getMethod() === 'post') {
            $validation = \Config\Services::validation();
            $validation->setRules([
                'nama' => 'required|max_length[120]',
                'kategori' => 'required|max_length[60]',
                'jumlah' => 'required|integer|greater_than[0]',
                'satuan' => 'required|max_length[20]',
                'tanggal_masuk' => 'required|valid_date',
                'tanggal_kadaluarsa' => 'required|valid_date|greater_than[tanggal_masuk]',
            ]);

            if (!$validation->withRequest($this->request)->run()) {
                return view('admin/tambah', ['errors' => $validation->getErrors()]);
            }

            $data = [
                'nama' => $this->request->getPost('nama'),
                'kategori' => $this->request->getPost('kategori'),
                'jumlah' => $this->request->getPost('jumlah'),
                'satuan' => $this->request->getPost('satuan'),
                'tanggal_masuk' => $this->request->getPost('tanggal_masuk'),
                'tanggal_kadaluarsa' => $this->request->getPost('tanggal_kadaluarsa'),
            ];

            $model = new BahanBaku();
            $model->insert($data);
            session()->setFlashdata('success', 'Bahan baku berhasil ditambahkan');
            return redirect()->to('/admin/bahan/tambah');
        }
        return view('admin/bahan/tambah');
    }
}