<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class AuthUser implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {

        if (!session('isLogin')) { // blm login dan mau kemanapun selain /
            session()->setFlashdata('errors', ['Login first !!']);
            return redirect()->to('/login');
        }
    }

    //--------------------------------------------------------------------

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {

        if (session('isLogin')) {
            // if(session('role') )
            return redirect()->to('/dashboard');
        }
    }
}
