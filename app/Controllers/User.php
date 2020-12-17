<?php

namespace App\Controllers;

use App\Models\UserModel;

class User extends BaseController
{
    public function __construct()
    {
        helper('form');
        $this->userModel = new UserModel();
        $this->validation =  \Config\Services::validation();
    }

    public function showRegister()
    {
        $data = [
            'title' => 'Register Page'
        ];
        return view('pages/register', $data);
    }

    public function saveRegister()
    {
        $this->validation->setRuleGroup('register');
        $user = [
            'first_name' => $this->request->getPost('first_name'),
            'last_name' => $this->request->getPost('last_name'),
            'email' => $this->request->getPost('email'),
            'password' => $this->request->getPost('password'),
            'rePassword' => $this->request->getPost('rePassword')
        ];
        if (!$this->validation->run($user)) {
            $errors = $this->validation->getErrors();
            session()->setFlashdata('errors', $errors);
            return redirect()->to('/register');
        } else {
            $hashPass = password_hash($user['password'], PASSWORD_DEFAULT);
            $user['password'] = $hashPass;
            session()->setFlashdata('message', 'Register success');
            $this->userModel->insert($user);
            return redirect()->to('/register');
        }
    }
}
