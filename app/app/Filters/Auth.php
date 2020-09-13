<?php
namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class Auth implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        $url = service('uri');
        if( ! session()->get('usuario_logado') && !in_array($url->getSegment(1), ['login', 'logout']) ) {
            session()->setFlashdata('error', 'Você precisa estar logado para acessar o sistema!');
            return redirect()->to('/login');
        }
    }

    //--------------------------------------------------------------------

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do something here
    }
}