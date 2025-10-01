<?php
namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Dashboard extends BaseController
{
    public function index()
    {
        if (session()->get('role') !== 'gudang') {
            throw new \CodeIgniter\Exceptions\PageNotFoundException();
        }
        $data = [
            'title' => 'Dashboard Gudang',
            'role' => session()->get('role'),
            'user_name' => session()->get('user_id') ? (new \App\Models\User())->find(session()->get('user_id'))['name'] : 'Tidak Diketahui',
            'current_time' => date('Y-m-d H:i:s')
        ];
        return view('admin/dashboard', $data);
    }
}