<?php

namespace App\Models;

use CodeIgniter\Model;

class KategoriModel extends Model
{
    // Nama Tabel
    protected $table      = 'majalah_category';
    // Atribut yang digunakan menjadi primary key
    protected $primaryKey = 'majalah_category_id';
}