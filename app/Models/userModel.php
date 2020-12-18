<?php

namespace App\Models;

use CodeIgniter\Model;

class UserModel extends Model
{
    protected $table = 'users';
    protected $allowedFields = ['first_name', 'last_name', 'email', 'password', 'photo', 'role'];
    protected $useTimestamps = true;

    public function saveRegister($user)
    {
        $this->insert($user);
    }

    public function checkLogin($user)
    {
        $userData = $this->where('email', $user['email'])->first();
        if (!$userData) {
            throw new \Exception('Invalid Email / Password');
        } else {
            $matchPass = password_verify($user['password'], $userData['password']);
            if (!$matchPass) throw new \Exception('Invalid Email / Password');
            else return $userData;
        }
        // return $this->where([
        //     'email' => $user['email'],
        //     'password' => password_verify($user['password'])
        // ])->first();
    }
}
