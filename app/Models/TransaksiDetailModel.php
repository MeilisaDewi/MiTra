<?php

namespace App\Models;

use  CodeIgniter\Model;


class TransaksiDetailModel extends Model

{
    protected $table ='Transaksi_detail';
    protected $allowedFields = ['id_transaksi','id_mobil','amount','price','total_price'];
}