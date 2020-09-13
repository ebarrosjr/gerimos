<?php namespace App\Models;

use CodeIgniter\Model;

class UsersModel extends Model
{
    protected $table = 'users';
    protected $allowedFields = [
        'cpf',
        'nome',
        'email',
        'password',
        'last_login',
        'updated_at'
    ];
    protected $beforeInsert = ['beforeInsert'];
    protected $beforeUpdate = ['beforeUpdate'];

    protected function beforeInsert(array $data)
    {
        $data = $this->limpaCPF($data);
        $data = $this->passwordHash($data);
        $data['data']['created_at'] = date('Y-m-d H:i:s');
        return $data;
    }

    protected function beforeUpdate(array $data)
    {
        $data = $this->limpaCPF($data);
        $data = $this->passwordHash($data);
        $data['data']['updated_at'] = date('Y-m-d H:i:s');
        return $data;
    }

    protected function limpaCPF(array $data)
    {
        if(isset($data['data']['cpf'])) {
            $data['data']['cpf'] = preg_replace('/[^0-9]/', '', $data['data']['cpf']);
        }

        return $data;
    }

    protected function passwordHash(array $data)
    {
        if(isset($data['data']['password'])) {
            $data['data']['password'] = password_hash($data['data']['password'], PASSWORD_DEFAULT);
        }

        return $data;
    }
}