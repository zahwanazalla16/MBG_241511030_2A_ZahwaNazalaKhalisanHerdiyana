<?php
namespace App\Models;

use CodeIgniter\Model;

class BahanBaku extends Model
{
    protected $table = 'bahan_baku';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nama', 'kategori', 'jumlah', 'satuan', 'tanggal_masuk', 'tanggal_kadaluarsa', 'status', 'created_at'];

    protected $beforeInsert = ['setStatus'];

    public function setStatus(array $data)
    {
        $data['data']['status'] = ($data['data']['jumlah'] > 0) ? 'tersedia' : 'habis';
        $data['data']['created_at'] = date('Y-m-d H:i:s'); // Contoh: 2025-10-01 15:41:00
        return $data;
    }
}