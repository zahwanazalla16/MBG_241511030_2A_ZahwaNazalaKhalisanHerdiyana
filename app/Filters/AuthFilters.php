<?php
namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class AuthFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()->to('/login')->with('error', 'Harap login terlebih dahulu');
        }

        // Cek role jika argumen diberikan (misal 'auth:gudang')
        if ($arguments) {
            $requiredRole = $arguments[0];
            if (session()->get('role') !== $requiredRole) {
                return redirect()->to('/login')->with('error', 'Akses ditolak: Role tidak sesuai');
            }
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null) {}
}