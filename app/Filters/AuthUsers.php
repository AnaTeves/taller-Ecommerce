<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class AuthUsers implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null){

        if(session('id_perfil') != 1) {
            return redirect()->route('inicio');
        }
    }


    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do something here
    }
    
}