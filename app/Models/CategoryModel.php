<?php

namespace App\Models;

use CodeIgniter\Model;

class CategoryModel extends Model
{
    // Nama Tabel
    protected $table      = 'kendaraan_category';
    // Atribut yang digunakan menjadi primary key
    protected $primaryKey = 'jenis';
}