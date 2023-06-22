<?php

namespace App\Controllers;


use \App\Models\KendaraanModel;
use \App\Models\CustModel;
use \App\Models\TransaksiModel;
use \App\Models\TransaksiDetailModel;
use TCPDF;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use CodeIgniter\I18n\Time;

class Transaksi extends BaseController
{
    private $kendaraan, $cart, $cust, $Transaksi, $TransaksiDetail;
    public function __construct()
    {
        $this->kendaraan = new KendaraanModel();
        $this->cust = new CustModel();
        $this->Transaksi = new TransaksiModel();
        $this->TransaksiDetail = new TransaksiDetailModel();
        $this->cart = \Config\Services::cart();
    }
    public function index()
    {

        $datakendaraan = $this->kendaraan->findAll();
        $dataCust = $this->cust->findAll();
        $data = [
            'title' => 'transaksi',
            'dataKendaraan' => $datakendaraan,
            'dataCust' => $dataCust,
            'validation' => \Config\Services::validation(),
        ];
        return view('transaksi/create', $data);
    }

    public function list()
    {
        $dataTransaksi = $this->Transaksi->getJoinTrans();
        // dd($dataTransaksi);
        $data = [
            'title' => 'transaksi',
            'result' => $dataTransaksi,
        ];
        return view('transaksi/index', $data);
    }



    public function create()
    {
        $data = [
            'validation' => \Config\Services::validation(),
            'title' => 'Tambah Transaksi',
        ];
        return view('transaksi/index', $data);
    }
    public function transaksi()
    {


        if (!$this->validate([
            // 'name' => 'required',
            // 'harga' => 'required',
            'nama_penjamin' => 'required',
            'alamat_penjamin' => 'required',
            'no_telp_penjamin' => 'required',
            'status' => 'required',
            'jenis_sewa' => 'required',
            'jasa_driver' => 'required',
            'tgl_mulai' => 'required',
            'tgl_selesai' => 'required',
            'tujuan' => 'required',
            'jaminan' => 'required',
            // 'customer_id' => 'required',
            'id_mobil' => 'required',
            // 'user_id' => 'required',

        ])) {
            // $data = $this->request->getVar('id_mobil');
            // dd($data);
            return redirect()->to('/transaksi')->withInput();
        }
        $data = $this->request->getVar('id_mobil');
        // dd($data);
        $this->Transaksi->save([
            //    'id_transaksi' => $this->request->getVar('id_transaksi'),
            'user_id' => user()->id,
            'customer_id' => $this->request->getVar('customer_id'),
            // 'created_at' => $this->request->getVar('created_at'),
            // 'updated_at' => $this->request->getVar('updated_at'),
            'id_mobil' => $data,
            'nama_penjamin' => $this->request->getVar('nama_penjamin'),
            'alamat_penjamin' => $this->request->getVar('alamat_penjamin'),
            'no_telp_penjamin' => $this->request->getVar('no_telp_penjamin'),
            'jenis_sewa' => $this->request->getVar('jenis_sewa'),
            'jasa_driver' => $this->request->getVar('jasa_driver'),
            'tgl_mulai' => $this->request->getVar('tgl_mulai'),
            'tgl_selesai' => $this->request->getVar('tgl_selesai'),
            'tujuan' => $this->request->getVar('tujuan'),
            'jaminan' => $this->request->getVar('jaminan'),
            'status_sewa' => $this->request->getVar('status'),
            'denda' => 0,
            'total_biaya' => $this->request->getVar('total_harga'),
            'tgl_pengembalian' => '',


        ]);
        return redirect()->to('/transaksi/index');
    }
    public function simpan($id)
    {

        // dd(date('Y-m-d'));
        date_default_timezone_set('Asia/Kolkata');
        $denda = $this->request->getVar('kerusakan');
        if ($denda == null) {
            $denda = 0;
            // dd($denda);
        }
        $tanggal = $this->Transaksi->getJoinTransid($id);
        $denda1 = 0;

        // dd($denda1);
        if ($tanggal['tgl_selesai'] < date('Y-m-d')) {
            $denda1 += 0.1 * $tanggal['harga'];
            $denda = $denda + $denda1;
        }
        // $denda = ($denda1) + is_numeric($denda);

        //  dd(is_numeric($denda1));
        $this->Transaksi->save([
            'id_transaksi' => $id,
            'status_sewa' => $this->request->getVar('status_sewa'),
            'tgl_pengembalian' => date('Y-m-d'),
            'denda' =>  $denda,

        ]);
        return redirect()->to('transaksi/index');
    }

    public function getTotal()
    {
        $totalBayar = 0;
        foreach ($this->cart->contents() as $items) {
            $totalBayar += $items['subtotal'];
        }
        echo number_to_currency($totalBayar, 'IDR', 'id_ID', 2);
    }

    public function pembayaran()
    {
        // Mengecek ada transaksi yang dilakukan

    }
    public function report()
    {
        $report = $this->Transaksi->getReport();
        $data = [
            'title' => 'Laporan transaksi',
            'result' => $report,

        ];
        return view('transaksi/report', $data);
    }
    public function exportPDF()
    {
        $tanggal = $this->request->getVar('tanggal');
        // dd($tanggal);
        $dataTransaksi = $this->Transaksi->getJoinTranswaktu($tanggal);
        // dd($dataTransaksi);
        $data = [
            'title' => 'Laporan Transaksi',
            'result' => $dataTransaksi,
        ];
        $html = view('transaksi/exportPDF', $data);

        $pdf = new TCPDF('L', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
        $pdf->setPrintHeader(false);
        $pdf->setPrintFooter(false);
        $pdf->AddPage();
        $pdf->writeHTML($html);
        $this->response->setContentType('application/pdf');
        $pdf->Output('laporan-penjualan.pdf', 'I');
    }
    public function exportPDFsemua()
    {
        $tanggal = $this->request->getVar('tanggal');
        // dd($tanggal);
        $dataTransaksi = $this->Transaksi->getJoinTrans();
        // dd($dataTransaksi);
        $data = [
            'title' => 'Laporan Transaksi',
            'result' => $dataTransaksi,
        ];
        $html = view('transaksi/exportPDF', $data);

        $pdf = new TCPDF('L', PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);
        $pdf->setPrintHeader(false);
        $pdf->setPrintFooter(false);
        $pdf->AddPage();
        $pdf->writeHTML($html);
        $this->response->setContentType('application/pdf');
        $pdf->Output('laporan-penjualan.pdf', 'I');
    }
    public function exportExcel()
    {
        $report = $this->Transaksi->getReport();

        $spreadsheet = new Spreadsheet();
        //tulis header/nama kolom
        $spreadsheet->setActiveSheetIndex(0)
            ->setCellValue('A1', 'No')
            ->setCellValue('B1', 'Nota')
            ->setCellValue('C1', 'Tgl Transaksi')
            ->setCellValue('D1', 'User')
            ->setCellValue('E1', 'Customer')
            ->setCellValue('F1', 'Total');

        //tulis data mobil ke cell
        $rows = 2;
        $no = 1;
        foreach ($report as $value) {
            $spreadsheet->setActiveSheetIndex(0)
                ->setCellValue('A' . $rows, $no++)
                ->setCellValue('B' . $rows, $value['id_transaksi'])
                ->setCellValue('C' . $rows, $value['tgl_transaksi'])
                ->setCellValue('D' . $rows, $value['firstname'] . '' . $value['lastname'])
                ->setCellValue('E' . $rows, $value['name_supp'])
                ->setCellValue('F' . $rows, $value['total']);
            $rows++;
        }
        //tulis dalam format .xlsx
        $writer = new Xlsx($spreadsheet);
        $fileName = 'Laporan-Transaksi';

        // Redirect hasil generate xlsx ke web client 
        header('Content-Type : application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
        header('Content-Disposition: attachment;filename=' . $fileName . '.xlsx');
        header('Cache-Control : max-age=0');

        $writer->save('php://output');
    }
}
