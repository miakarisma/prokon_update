<?php

namespace App\Filters;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class UsersAuthFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        // $auth = service('auth');

        // if (!$auth->isLoggedIn()) {
        //     return redirect()->to(site_url('Page/index'));
        // }

        if (!session('id')) {
            return redirect()->to(base_url('/login'));
        }

        if (!session('role') != 1) {
            return redirect()->to(base_url('/'));
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // code ...
    }
}