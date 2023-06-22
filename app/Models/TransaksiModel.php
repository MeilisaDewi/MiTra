<?php

namespace App\Models;

use  CodeIgniter\Model;

class TransaksiModel extends Model
{
    // Nama Tabel
    protected $table = 'transaksi';
    protected $primaryKey = 'id_transaksi';
    protected $useTimestamps = true;
    protected $allowedFields = [
        'user_id', 'customer_id', 'id_mobil', 'nama_penjamin', 'alamat_penjamin', 'no_telp_penjamin', 'jenis_sewa',
        'jasa_driver', 'tgl_mulai', 'tgl_selesai', 'tujuan', 'jaminan', 'status_sewa', 'denda', 'total_biaya', 'tgl_pengembalian'
    ];

    public function getReport()
    {
        return $this->db->table('transaksi_detail as td')
            ->select('t.id_transaksi, t.created_at tgl_transaksi, t.jenis_sewa, t.tgl_mulai mulai, t.tgl_pengembalian kembali, t.status_sewa status, t.total_biaya, t.denda, c.id_customer, c.name , c.phone, SUM(td.total_biaya) total')
            ->join('transaksi t', 'id_transaksi')
            // ->join('users us','us.id = s.user_id')
            ->join('customer c', 'c.id_customer = td.customer_id', 'left')
            ->groupBy('t.id_transaksi')
            ->get()->getResultArray();
    }

    public function getJoinTrans()
    {
        $query = $this->table('transaksi')
            // ->join('transaksi', 'transaksi.id_transaksi = transaksi.id_transaksi ', 'inner')
            ->join('kendaraan', 'kendaraan.id_mobil = transaksi.id_mobil ', 'left')
            ->join('customer', 'customer.id_customer  = transaksi.customer_id', 'left')
            ->join('users', 'users.id = transaksi.user_id', 'left');


        return $query->get()->getResultArray();
        // return $query;
    }
    public function getJoinTranswaktu($tanggal)
    {
        $query = $this->table('transaksi')
            // ->join('transaksi', 'transaksi.id_transaksi = transaksi.id_transaksi ', 'inner')
            ->join('kendaraan', 'kendaraan.id_mobil = transaksi.id_mobil ', 'left')
            ->join('customer', 'customer.id_customer  = transaksi.customer_id', 'left')
            ->join('users', 'users.id = transaksi.user_id', 'left')
            ->where('transaksi.tgl_mulai', $tanggal);

        return $query->get()->getResultArray();
        // return $query;
    }
    public function getJoinTransid($id)
    {
        $query = $this->table('transaksi')
            // ->join('transaksi', 'transaksi.id_transaksi = transaksi.id_transaksi ', 'inner')
            ->join('kendaraan', 'kendaraan.id_mobil = transaksi.id_mobil ', 'left')
            ->join('customer', 'customer.id_customer  = transaksi.customer_id', 'left')
            ->join('users', 'users.id = transaksi.user_id', 'left');


        return $query->where(['id_transaksi' => $id])->first();
        // return $query;
    }
}
