<?php

namespace App\Entities;

use CodeIgniter\Entity\Entity;

class TransaksiEntity extends Entity
{
    protected $datamap = [
        "user_id" => 'user',
        "customer_id" => 'customer',
        "id_mobil" => 'mobil',
        "nama_penjamin" => 'penjamin',
        "alamat_penjamin" => 'alamatpenjamin',
        "no_telp_penjamin" => 'notelppenjamin',
        "jenis_sewa" => 'jenissewa',
        "jasa_driver" => 'driver',
        "tgl_mulai" => 'mulai',
        "tgl_selesai" => 'selesai',
        "tujuan" => 'tujuann',
        "jaminan" => 'jaminan',
        "status_sewa" => 'status',
        "total_biaya" => 'total',
        "tgl_pengembalian" => 'pengembalian',
    ];
    protected $dates   = ['created_at', 'updated_at', 'deleted_at'];
    protected $casts   = [];
}
