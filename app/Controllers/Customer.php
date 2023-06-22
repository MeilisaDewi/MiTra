<?php

namespace App\Controllers;

use \App\Models\CustomerModel;
use App\Entities\CustomerEntity;

class Customer extends BaseController
{
    private $customerModel;
    public function __construct()
    {
        $this->customerModel = new CustomerModel();
    }

    public function index()
    {
        $dataCustomer = $this->customerModel->findAll();
        $data = [
            'title' => 'Data Customer',
            'result' => $dataCustomer
        ];

        return view('customer/list', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Tambah Customer'
        ];
        return view('customer/create', $data);
    }

    public function save()
    {
        if (!$this->validate([
            'nama' => [
                'rules' => 'required',
                'errors' =>
                [
                    'required' => '{field} harus diisi',
                    'is_unique' => '{field} hanya sudah ada'
                ]

            ],
            
        ])) {
            return redirect()->to('/customer/create')->withInput();
        }
        $customer = new CustomerEntity();

        $data = [
            "nama" => $this->request->getVar('nama'),
            "address" => $this->request->getVar('alamat'),
            
            "phone" => $this->request->getVar('telp'),
        ];
        $customer->fill($data);

        $this->customerModel->save($customer);

        session()->setFlashdata("msg", "Data berhasil ditambahkan!");

        return redirect()->to('/customer');
    }

    public function edit($id)
    {
        $dataCustomer = $this->customerModel->where(['id_customer' => $id])->first();
        // Jika data kosong
        if (empty($dataCustomer)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException("customer dengan ID $id tidak ditemukan!");
        }

        $data = [
            'title' => 'Ubah Customer',
            'result' => $dataCustomer
        ];

        return view('customer/edit', $data);
    }

    public function update($id)
    {
        $customer = new CustomerEntity();

        $data = [
            "customer_id" => $id,
            "name" => $this->request->getVar('nama'),
            "address" => $this->request->getVar('alamat'),
            
            "phone" => $this->request->getVar('telp'),
        ];
        $customer->fill($data);

        $this->customerModel->save($customer);

        session()->setFlashdata("msg", "Data berhasil diperbarui!");

        return redirect()->to('/customer');
    }

    public function delete($id)
    {
        $this->customerModel->delete($id);
        session()->setFlashdata("msg", "Data berhasil dihapus!");
        return redirect()->to('/customer');
    }

   
}
