<?php

namespace App\Models;

use CodeIgniter\Model;

class BerandaModel extends Model
{
    public function reportTransaksi($tahun)
    {
        return $this->db->table('transaksi as s')
            ->select('MONTH(s.tgl_mulai) month, SUM(s.total_biaya + s.denda) total')
            // ->join('sale s', 'sale_id')
            ->where('YEAR(s.tgl_mulai)', $tahun)
            ->orderBy('MONTH(s.tgl_mulai)')
            ->groupBy('MONTH(s.tgl_mulai)')
            ->get()->getResultArray();
    }

    

    public function reportCustomer($tahun)
    {
        return $this->db->table('customer')
            ->select('MONTH(created_at) month, COUNT(*) total')
            ->where('YEAR(created_at)', $tahun)
            ->groupBy('MONTH(created_at)')
            ->orderBy('MONTH(created_at)')
            ->get()->getResultArray();
    }
    public function reportPembelian($tahun)
    {
        return $this->db->table('beli_detail as bd')
            ->select('MONTH(b.created_at) month, SUM(bd.total_price) total')
            ->join('beli b', 'beli_id')
            ->where('YEAR(b.created_at)', $tahun)
            ->orderBy('MONTH(b.created_at)')
            ->get()->getResultArray();
    }
    public function reportSupplier($tahun)
    {
        return $this->db->table('supplier')
            ->select('MONTH(created_at) month, COUNT(*) total')
            ->where('YEAR(created_at)', $tahun)
            ->groupBy('MONTH(created_at)')
            ->orderBy('MONTH(created_aat)')
            ->get()->getResultArray();
    }
}
