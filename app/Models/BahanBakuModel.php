<?php
namespace App\Models;

use CodeIgniter\Model;

class BahanBakuModel extends Model
{
    protected $table = 'bahan_baku';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'nama', 
        'kategori', 
        'jumlah', 
        'satuan', 
        'tanggal_masuk', 
        'tanggal_kadaluarsa', 
        'status', 
        'created_at'
    ];

    public function calculateStatus($data)
    {
        $today = date('Y-m-d');

        if ($data['jumlah'] == 0) {
            return 'habis';
        }

        if ($today >= $data['tanggal_kadaluarsa']) {
            return 'kadaluarsa';
        }

        if (strtotime($data['tanggal_kadaluarsa']) - strtotime($today) <= 3 * 86400) {
            return 'segera kadaluarsa';
        }

        return 'tersedia';
    }

    public function getAllWithStatus()
    {
        $bahanList = $this->findAll();

        foreach ($bahanList as &$bahan) {
            $bahan['status'] = $this->calculateStatus($bahan);
        }

        return $bahanList;
    }
}
