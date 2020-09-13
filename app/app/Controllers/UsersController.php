<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\UsersModel;

class UsersController extends BaseController
{

    public function new()
    {
        $data = [];
        helper(['form']);

        if($this->request->getMethod() == 'post'){
            $rules = [
                'nome' => 'required|min_length[3]|max_length[120]',
                'email' => 'required|valid_email|max_length[120]',
                'cpf' => 'required|validateCPF[cpf]|min_length[11]|max_length[14]',
                'password' => 'required|min_length[6]',
                'confirm_password' => 'matches[password]'
            ];

            $errors = [
                'cpf' => [
                    'validateCPF' => 'O CPF informado é inválido'
                ],
                'password' => [
                    'validateUser' => 'Dados incorretos'
                ]
            ];

            if(!$this->validate($rules, $errors)) {
                $data['validation'] = $this->validator;
            }else{
                $model = new UsersModel();
                $u = [
                    'cpf' => $this->request->getPost('cpf'),
                    'nome' => $this->request->getPost('nome'),
                    'email' => $this->request->getPost('email'),
                    'password' => $this->request->getPost('password')
                ];
                if($model->save($u)){
                    session()->setFlashdata('success', 'Usuário adicionado com sucesso!');

                    return redirect()->to('/');
                } else {
                    session()->setFlashdata('error', 'Não foi possível adicionar o usuário!');
                }
            }
        }
        return view('Pages/Users/new', $data);
    }

    public function login()
    {
        $data = [];
        helper(['form']);

        if($this->request->getMethod() == 'post'){
            $rules = [
                'cpf' => 'required|min_length[11]|max_length[14]',
                'password' => 'required|validateCPF[cpf]|validateUser[cpf, password]'
            ];

            $errors = [
                'password' => [
                    'validateCPF' => 'O CPF informado é inválido',
                    'validateUser' => 'Dados incorretos'
                ]
            ];

            if(!$this->validate($rules, $errors)) {
                $data['validation'] = $this->validator;
            }else{
                $model = new UsersModel();
                $cpf = preg_replace('/[^0-9]/', '', $this->request->getPost('cpf'));
                $user = $model->where('cpf', $cpf)->first();
                $this->setUserMethod($user);

                return redirect()->to('/');
            }
        }
        return view('Pages/Users/login', $data);
    }

    public function logout()
    {
        session()->destroy();

        return redirect()->to('/login');
    }

    private function setUserMethod($user)
    {
        $data = [
            'usuario_logado' => [
                'id' => $user['id'],
                'nome'  => $user['nome'],
                'email' => $user['email'],
                'last_login' => $user['last_login'],
                'isLoggedIn' => true
            ]
        ];
        session()->set($data);

        return true;
    }
}