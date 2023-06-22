<?php
namespace App\Models;

use CodeIgniter\Model;

class CustomerModel extends Model
{
    // Nama Tabel
    protected $table    = 'customer';
    // Atribut yang digunakan menjadi primary key
    protected $primaryKey = 'id_customer';
    // Atribut untuk menyimpan created_at dan updated_at
    protected $useTimestamps = true;
    protected $allowedFields = ['name', 'address', 'phone'];
    protected $returnType = 'App\Entities\CustomerEntity';
}