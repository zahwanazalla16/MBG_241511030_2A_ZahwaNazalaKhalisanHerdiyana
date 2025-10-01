<?php
namespace App\Controllers;

use App\Models\User;
use CodeIgniter\HTTP\RedirectResponse;

class Auth extends BaseController
{
    public function login()
    {
        if ($this->request->getMethod() === 'post') {
            $email = $this->request->getPost('email');
            $password = $this->request->getPost('password');

            $userModel = new User();
            $user = $userModel->getUserByEmail($email);

            if ($user && password_verify($password, $user['password'])) {
                session()->set([
                    'user_id' => $user['id'],
                    'role' => $user['role'],
                    'isLoggedIn' => true,
                ]);
                return $user['role'] === 'gudang' ? redirect()->to('/admin/dashboard') : redirect()->to('/dapur/dashboard');
            } else {
                session()->setFlashdata('error', 'Email atau password salah');
            }
        }
        return view('auth/login');
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }
}