<?php
namespace App\Controllers;

use App\Controllers\BaseController;

class Dashboard extends BaseController
{
    public function index()
    {
        $session = session();

        if (! $session->get('isLoggedIn')) {
            $session->setFlashdata('error', 'Silakan login terlebih dahulu.');
            return redirect()->to('/auth/login');
        }

        $role = strtolower((string) $session->get('user_role'));
        $userName = $session->get('user_name') ?? 'User';

        $baseData = [
            'user_name' => $userName,
            'role'      => $role,
        ];

        if ($role === 'gudang') {
            $menu = [
                ['key' => 'dashboard',  'label' => 'Dashboard',            'url' => '/dashboard'],
                ['key' => 'tambah',     'label' => 'Tambah Bahan Baku',    'url' => '/bahan/tambahBahan'],
                ['key' => 'lihat',      'label' => 'Lihat Stok Bahan',     'url' => '/bahan/lihatBahan'],
                ['key' => 'permintaan', 'label' => 'Kelola Permintaan',     'url' => '/bahan/kelolaPermintaan'],
            ];

            $data = array_merge($baseData, [
                'title'  => 'Dashboard Gudang - MBG System',
                'menu'   => $menu,
                'active' => 'dashboard',
            ]);

            return view('dashboard/gudang', $data);
        }

        if ($role === 'dapur') {
            $menu = [
                ['key' => 'dashboard', 'label' => 'Dashboard',        'url' => '/dashboard'],
                ['key' => 'buat',      'label' => 'Buat Permintaan',  'url' => ''],
                ['key' => 'riwayat',   'label' => 'Riwayat Permintaan','url' => ''],
            ];

            $data = array_merge($baseData, [
                'title'  => 'Dashboard Dapur - MBG System',
                'menu'   => $menu,
                'active' => 'dashboard',
            ]);

            return view('dashboard/dapur', $data);
        }

        $session->setFlashdata('error', 'Role tidak valid. Silakan login ulang.');
        return redirect()->to('/auth/login');
    }
}
