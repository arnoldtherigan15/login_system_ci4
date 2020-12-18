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

    public function index()
    {
        $data = [
            'title' => 'NetflixFake | Welcome to Dashboard'
        ];
        return view('pages/home', $data);
    }

    public function logout()
    {
        session()->destroy();
        return redirect()->to('/login');
    }

    public function showLogin()
    {
        $data = [
            'title' => 'NetflixFake | Login Page'
        ];
        return view('pages/login', $data);
    }

    public function showRegister()
    {
        $data = [
            'title' => 'NetflixFake | Register Page'
        ];
        return view('pages/register', $data);
    }

    public function checkLogin()
    {
        try {
            $this->validation->setRuleGroup('login');
            $user = [
                'email' => $this->request->getPost('email'),
                'password' => $this->request->getPost('password')
            ];
            if (!$this->validation->run($user)) {
                $errors = $this->validation->getErrors();
                session()->setFlashdata('errors', $errors);
                return redirect()->to('/login');
            } else {
                $isValid = $this->userModel->checkLogin($user);
                $created_at =  date('d-m-Y', strtotime($isValid['created_at']));
                // dd($created_at);
                $userSession = [
                    'id' => $isValid['id'],
                    'full_name' => $isValid['first_name'] . ' ' . $isValid['last_name'],
                    'email' => $isValid['email'],
                    'role' => $isValid['role'],
                    'photo' => $isValid['photo'],
                    'isLogin' => true,
                    'created_at' => $created_at
                ];
                // dd($userSession);
                session()->set($userSession);
                return redirect()->to('/dashboard');
                // dd($isValid);
            }
        } catch (\Throwable $err) {
            $errors = [];
            $errors[] = $err->getMessage();
            session()->setFlashdata('errors', $errors);
            return redirect()->to('/login');
            //throw $th;
        }
    }

    public function saveRegister()
    {
        $this->validation->setRuleGroup('register');
        $user = [
            'first_name' => $this->request->getPost('first_name'),
            'last_name' => ($this->request->getPost('last_name')) ? $this->request->getPost('last_name') : $this->request->getPost('first_name'),
            'email' => $this->request->getPost('email'),
            'password' => $this->request->getPost('password'),
            'rePassword' => $this->request->getPost('rePassword'),
            'photo' => 'default.png',
            'role' => 'user'
        ];
        if (!$this->validation->run($user)) {
            $errors = $this->validation->getErrors();
            session()->setFlashdata('errors', $errors);
            return redirect()->to('/register');
        } else {
            $hashPass = password_hash($user['password'], PASSWORD_DEFAULT);
            $user['password'] = $hashPass;
            session()->setFlashdata('message', 'Register success');
            $this->userModel->saveRegister($user);
            return redirect()->to('/register');
        }
    }
}
