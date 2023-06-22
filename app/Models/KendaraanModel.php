<?php

namespace App\Models;

use CodeIgniter\Model;

class KendaraanModel extends Model
{
    protected $table         = 'kendaraan';
    protected $primaryKey    = 'id_mobil';
    protected $useTimestamps = true;
    protected $allowedFields =
    [
        'nama', 'slug', 'tahun', 'warna', 'no_polisi', 'harga', 'cover', 'jenis'
    ];
    protected $useSoftDeletes = true;

    public function getKendaraans($slug = false)
    {
        $query = $this->table('kendaraan')->join('kendaraan_category', 'jenis')->where('deleted_at is null');
        // $query = $this->table('kendaraan');

        return $query->get()->getResultArray();
        // print_r($db->getLastQuery()->getQuery());die();

        // if ($slug == false){
        //     return $query->get()->getResultArray();
        //     return $query->where(['slug' => $slug])->first();
        // }



    }
    public function getKendaraan($slug = false)
    {
        $query = $this->table('kendaraan')
            // ->join('kendaraan_category', 'kendaraan.jenis = kendaraan_category.jenis', 'left')
            ->where('deleted_at is null');

        // $query = $this->table('kendaraan');
        if ($slug == false)

        return $query->get()->getResultArray();
        // print_r($db->getLastQuery()->getQuery());die();

     
        //     return $query->get()->getResultArray();
            return $query->where(['slug' => $slug])->first();
        // }



    }
}
