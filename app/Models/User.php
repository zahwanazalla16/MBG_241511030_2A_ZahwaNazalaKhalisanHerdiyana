<?php
namespace App\Models;

use CodeIgniter\Model;

class User extends Model
{
    protected $table = 'users';
    protected $primaryKey = 'id';
    protected $allowedFields = ['name', 'email', 'password', 'role', 'created_at'];

    public function getUserByEmail($email)
    {
        return $this->where('email', $email)->first();
    }
}