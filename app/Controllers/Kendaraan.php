<?php

namespace App\Controllers;

use \App\Models\KendaraanModel;
use \App\Models\CategoryModel;
use PhpOffice\PhpSpreadsheet\Reader\Xls;
use PhpOffice\PhpSpreadsheet\Reader\Xlsx;

class Kendaraan extends BaseController
{

    public $kendaraanModel, $catModel;
    public function __construct()
    {
        $this->kendaraanModel = new KendaraanModel();
        $this->catModel = new CategoryModel();
    }

    public function index()
    {
        $dataKendaraan = $this->kendaraanModel->getKendaraan();
        // dd($dataKendaraan);
        $data = [
            'title' => 'Data Mobil',
            'result' => $dataKendaraan

        ];

        return view('kendaraan/index', $data);
    }

    public function detail($slug)
    {
        $dataKendaraan = $this->kendaraanModel->getKendaraan($slug);
        // dd($dataKendaraan);
        $data = [
            'title' => 'Data Mobil',
            'result' => $dataKendaraan
        ];
        return view('kendaraan/detail', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Tambah Mobil',
            // 'category' => $this->catModel->findAll(),
            'validation' => \Config\Services::validation(),
        ];

        return view('kendaraan/create', $data);
    }

    public function save()
    {

        if (!$this->validate([
            'name' => [
                'rules' => 'required',
                'errors' =>
                [
                    'required' => '{field} harus diisi',
                    'is_unique' => '{field} hanya sudah ada'
                ]

            ],
            'year' => 'required|integer',
            'color' => 'required',
            'no_plat' => 'required',
            
        ])) {
            return redirect()->to('/kendaraan/create')->withInput();
        }
        $namaFile;
        $fileSampul = $this->request->getFile('sampul');
        if ($fileSampul->getError() == 4) {
            $namaFile = $this->defaultImage;
        } else {
            $namaFile = $fileSampul->getRandomName();

            $fileSampul->move('img', $namaFile);
        }

        $slug = url_title($this->request->getVar('name'), '-', true);
        $this->kendaraanModel->save([
            'nama' => $this->request->getvar('name'),
            'tahun' => $this->request->getvar('year'),
            'warna' => $this->request->getvar('color'),
            'no_polisi' => $this->request->getvar('no_plat'),
            'harga' => $this->request->getvar('Harga'),
            'jenis' => $this->request->getvar('jenis'),

            'slug' => $slug,
            'cover' => $namaFile
        ]);

        session()->setFlashdata("msg", "Data berhasil ditambahkan!");

        return redirect()->to('/kendaraan');
    }

    public function edit($slug)
    {
        $dataKendaraan = $this->kendaraanModel->getKendaraan($slug);
        // dd( $dataKendaraan);
        if (empty($dataKendaraan)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException(" mobil $slug Tidak Ditemukan!!!");
        }

        $data = [
            'title' => 'Edit Mobil',
            'category' => $this->catModel->findAll(),
            'validation' => \Config\Services::validation(),
            'result' => $dataKendaraan
        ];
        return view('kendaraan/edit', $data);
    }

    public function update($id)
    {
        $dataOld = $this->kendaraanModel->getKendaraan($this->request->getVar('slug'));
        if ($dataOld['nama'] == $this->request->getVar('name')) {
            $rule_tipe = 'required';
        } else {
            $rule_tipe = 'required|is_unique[kendaraan.nama]';
        }

        // Validasi Data 
        if (!$this->validate([
            'name' => [
                'rules' => 'required',
                'errors' =>
                [
                    'required' => '{field} harus diisi',
                    'is_unique' => '{field} hanya sudah ada'
                ]

            ],
            'year' => 'required|integer',
            'color' => 'required',
            'no_plat' => 'required',
            'price' => 'required|numeric',
            'sampul' =>
            [
                'rules' => 'max_size[sampul,1024]|is_image[sampul]|mime_in[sampul,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size ' => 'Gambar tidak boleh lebih dari 1MB!',
                    'is_image' => 'Yang anda pilih bukan gambar!',
                    'mime_in' => 'Yang anda pilih bukan gambar!',
                ]
            ]
        ])) {
            return redirect()->to('/kendaraan/edit/' . $this->request->getVar('slug'))->withInput();
        }
        //Mengambil file sampul
        $fileLama = $this->request->getVar('sampullama');
        // dd($fileLama);
        $fileSampul = $this->request->getFile('sampul');
        if ($fileSampul->getError() == 4) {
            $namaFile = $fileLama;
        } else {
            // generate nama file
            $namaFile = $fileSampul->getRandomName();
            // pindahkan file ke folder img di public
            $fileSampul->move('img/', $namaFile);
            if ($namaFile != $this->defaultImage) {
                unlink('img/' . $fileLama);
            }
        }
        // Membuat string menjadi huruf kecil semua dan spasinya diganti -
        // dd($namaFile);
        $slug = url_title($this->request->getVar('name'), '-', true);
        $this->kendaraanModel->save([
            'id_mobil' => $id,
            'nama' => $this->request->getVar('name'),
            'tahun' => $this->request->getVar('year'),
            'warna' => $this->request->getVar('color'),
            'no_polisi' => $this->request->getVar('no_plat'),
            'harga' => $this->request->getVar('price'),
            'jenis' => $this->request->getVar('tipe'),
            'slug' => $slug,
            'cover' => $namaFile
        ]);

        session()->setFlashdata("msg", "Data Berhasil Diubah!");
        return redirect()->to('/kendaraan');
    }

    public function delete($id)
    {
        // $dataKendaraan = $this->kendaraanModel->find($id);
        $this->kendaraanModel->delete($id);
        session()->setFlashdata("msg", "Data berhasil dihapus!");

        return redirect()->to('/kendaraan');
    }

    public function importData()
    {
        $file = $this->request->getFile("file");
        $ext = $file->getExtension();
        if ($ext == "xls")
            $reader = new Xls();
        else
            $reader = new Xlsx();

        $spreadsheet = $reader->load($file);
        $sheet = $spreadsheet->getActiveSheet()->toArray();

        foreach ($sheet as $key => $value) {
            if ($key == 0) continue;

            $namaFile = $this->defaultImage;
            $slug = url_title($value[1], '-', true);

            //cek judul
            $dataOld = $this->kendaraanModel->getKendaraan($slug);
            if ($dataOld['nama'] != $value[1]) {
                $this->kendaraanModel->save([
                    'nama' => $value[1],
                    'tahun' => $value[2],
                    'warna' => $value[3],
                    'no_polisi' => $value[4],
                    'harga' => $value[5],
                    'jenis' => $value[6],
                    'slug' => $slug,
                    'cover' => $namaFile,
                ]);
            }
        }
        session()->setFlashdata("msg", "Data berhasil diimport!");

        return redirect()->to('/kendaraan');
    }
}
