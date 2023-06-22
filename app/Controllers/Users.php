<?php

namespace App\Controllers;

use \Myth\Auth\Models\UserModel;

class Users extends BaseController
{
    private $userModel;
    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    public function index()
    {
        $dataUser = $this->userModel->findAll();
        $data = [
            'title' => 'Data User',
            'result' => $dataUser
        ];
        return view('user/index', $data);
    }
    public function create()
    {
        $data = [
            'title' => 'Tambah User',
        ];
        return view('user/create', $data);
    }

    public function delete($id)
    {
        $this->userModel->delete($id);
        session()->setFlashdata("msg", "Data berhasil dihapus !!");
        return redirect()->to('/users');
    }

    public function save()
    {
        $users  = new UsersEntity();

        $data           = [
            // "id"      => $this->request->getVar('id'),
            "firstname"      => $this->request->getVar('firstname'),
            "lastname"      => $this->request->getVar('lastname'),
            "email"   => $this->request->getVar('email'),
            "alamat"     => $this->request->getVar('alamat'),
            "no_telpon"     => $this->request->getVar('no_telpon'),
            "username"     => $this->request->getVar('username'),
            "password"     => $this->request->getVar('password'),
            "status"     => $this->request->getVar('status'),
        ];
        $users->fill($data);

        $this->userModel->save($users);

        session()->setFlashdata("msg", "data berhasil ditambahkan!");

        return redirect()->to('/users');
    }

    public function update()
    {
        $$users  = new UsersEntity();

        $data           = [
            // "id"      => $this->request->getVar('id'),
            "firstname"      => $this->request->getVar('firstname'),
            "lastname"      => $this->request->getVar('lastname'),
            "email"   => $this->request->getVar('email'),
            "alamat"     => $this->request->getVar('alamat'),
            "no_telpon"     => $this->request->getVar('no_telpon'),
            "username"     => $this->request->getVar('username'),
            "password"     => $this->request->getVar('password'),
            "status"     => $this->request->getVar('status'),
        ];
        $users->fill($data);

        $this->usersModel->getUsers()->save($users);

        session()->setFlashdata("msg", "data berhasil ditambahkan!");

        return redirect()->to('/users');
    }

    public function edit($slug)
    {
        $dataUser = $this->userModel->getUsers($slug);
        if (empty($dataUser)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException(" User $slug Tidak Ditemukan!!!");
        }

        $data = [
            'title' => 'Edit User',

            'validation' => \Config\Services::validation(),
            'result' => $dataUser
        ];
        return view('user/edit', $data);
    }
}
