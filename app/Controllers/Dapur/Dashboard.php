<?php
namespace App\Controllers\Dapur;

use App\Controllers\BaseController;

class Dashboard extends BaseController
{
    public function index()
    {
        if (session()->get('role') !== 'dapur') {
            throw new \CodeIgniter\Exceptions\PageNotFoundException();
        }
        $data = [
            'title' => 'Dashboard Dapur',
            'role' => session()->get('role'),
            'user_name' => session()->get('user_id') ? (new \App\Models\User())->find(session()->get('user_id'))['name'] : 'Tidak Diketui',
            'current_time' => date('Y-m-d H:i:s')
        ];
        return view('dapur/dashboard', $data);
    }
}