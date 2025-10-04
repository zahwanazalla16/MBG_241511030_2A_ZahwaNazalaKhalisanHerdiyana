<?php
namespace App\Controllers;

use CodeIgniter\Controller;

class Dashboard extends Controller
{
    public function index()
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()->to('/auth/login');
        }
        $data['role'] = session()->get('user_role');
        $data['user_name'] = session()->get('user_name');

        if ($data['role'] === 'gudang') {
            return view('dashboard/gudang', $data);
        } elseif ($data['role'] === 'dapur') {
            return view('dashboard/dapur', $data);
        } else {
            return redirect()->to('/auth/login')->with('error', 'Role tidak valid');
        }
    }
}