<?= $this->extend('layout/template')  ?>

<?= $this->section('content') ?>
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">TRANSAKSI</h1>
        <ol class="breadcrumb mb-4 bg-primary">
            <li class="breadcrumb-item active text-light">Mita Transport Jogja</li>
        </ol>

        <!-- start Flash Data -->
        <?php if (session()->getFlashdata('msg')) : ?>
            <div class="alert alert-success" role="alert">
                <?= session()->getFlashdata('msg')  ?>
            </div>
        <?php endif; ?>
        <!-- End Flash Data -->
        <div class="card mb-4">
            <div class="card-header">
                <i class="fas fa-table me-1"></i>
                <?= $title ?>
            </div>
            <div class="card-body">
                <button class="btn btn-primary mr-2 " data-bs-target="#modalProduk" data-bs-toggle="modal">Pilih Kendaraan </button>
                <button class="btn btn-dark " data-bs-target="#modalSup" data-bs-toggle="modal">Cari Customer</button>
              <form action="/transaksi/create" method="POST" enctype="multipart/form-data">
                    <?= csrf_field() ?>
                    <div class="container">
                        <div class="row">
                            <div class="col mt-4">
                                <label class="col-from-label">Tanggal: </label>
                                <input type="text" value="<?= date('d/m/y') ?>" disabled>
                            </div>
                            <div class="col mt-4">
                                <label class="col-form-label">User: </label>
                                <input type="text" value="<?= user()->username ?>" disabled>
                            </div>
                            <div class="col mb-3">
                                <label class="col-form-label">Customer: </label>
                                <input name="name" type="text" class="<?= $validation->hasError('') ? 'is-invalid' : '' ?>" id="nama-customer" disabled>
                                <div id="validationServer03Feedback" class="invalid-feedback">
                                    <?= $validation->getError('')  ?>
                                </div>
                            </div>

                            <div class="col">
                            </div>
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="nama_mobil" class="col-sm-2 col-form-label">Nama Mobil</label>
                        <div class="col-sm-4">
                            <input disabled id="nama_mobil" type="text" class="form-control ">
                        </div>
                        <label for="harga" class="col-sm-2 col-form-label">Harga</label>
                        <div class="col-sm-4">
                            <input name="harga" disabled id="harga" type="text" class="form-control">

                        </div>
                    </div>


                    <div class="mb-3 row">
                        <label for="nama_penjamin" class="col-sm-2 col-form-label">Nama penjamin</label>
                        <div class="col-sm-10">
                            <input name="nama_penjamin" type="text" class="form-control <?= $validation->hasError('nama_penjamin') ? 'is-invalid' : '' ?>" value="<?= $validation->getError('')  ?>">

                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="alamat_penjamin" class="col-sm-2 col-form-label">Alamat penjamin </label>
                        <div class="col-sm-10">
                            <input name="alamat_penjamin" type="text" class="form-control <?= $validation->hasError('alamat_penjamin') ? 'is-invalid' : '' ?>" value="<?= $validation->getError('')  ?>">

                        </div>
                        <div class="mb-3 row">
                            <label for="no_telp_penjamin" class="col-sm-2 col-form-label mt-3">No Telepon Penjamin </label>
                            <div class="col-sm-4 mt-3 ml-2">
                                <input name="no_telp_penjamin" type="text" class="form-control  <?= $validation->hasError('alamat_penjamin') ? 'is-invalid' : '' ?>" value="  <?= $validation->getError('')  ?>">
                            </div>
                            <div class="col-4">
                                <div class=" mt-1 row">
                                    <label class="col-5 col-form-label">Status</label>
                                    <div class="col-8">
                                        <select name="status" id="status">
                                            <option value="Inrent">In rent</option>
                                            <option value="DONE">DONE</option>


                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="jenis_sewa" class="col-sm-2 col-form-label">Jenis Sewa </label>
                            <div class="col-sm-4 ml-2">
                                <input name="jenis_sewa" type="text" class="form-control <?= $validation->hasError('jenis_sewa') ? 'is-invalid' : '' ?>" value="  <?= $validation->getError('')  ?>">
                            </div>
                            <label for="jasa_driver" class="col-sm-2 col-form-label">Jasa Driver</label>
                            <div class="col-sm-3 ">
                                <input name="jasa_driver" type="text" class="form-control <?= $validation->hasError('jasa_driver') ? 'is-invalid' : '' ?>" value="  <?= $validation->getError('')  ?>">
                            </div>
                        </div>



                        <div class="mb-3 row">
                            <label for="tgl_mulai" class="col-sm-2 col-form-label">Tanggal Mulai</label>
                            <div class="col-sm-4">
                                <input name="tgl_mulai" id="tgl_mulai" type="datetime-local" class="form-control <?= $validation->hasError('tgl_mulai') ? 'is-invalid' : '' ?>" value="  <?= $validation->getError('')  ?>">
                            </div>
                            <label for="tgl_selesai" class="col-sm-2 col-form-label">Tanggal Selesai</label>
                            <div class="col-sm-4">
                                <input onchange="jumlah()" name="tgl_selesai" id="tgl_selesai" type="datetime-local" class="form-control <?= $validation->hasError('tgl_selesai') ? 'is-invalid' : '' ?>" value="  <?= $validation->getError('')  ?>">
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="tujuan" class="col-sm-2 col-form-label">Tujuan </label>
                            <div class="col-sm-4">
                                <input name="tujuan" type="text" class="form-control <?= $validation->hasError('tujuan') ? 'is-invalid' : '' ?>" value="  <?= $validation->getError('')  ?>">
                            </div>
                            <label for="jaminan" class="col-sm-2 col-form-label">Jaminan </label>
                            <div class="col-sm-4">
                                <input name="jaminan" type="text" class="form-control <?= $validation->hasError('jaminan') ? 'is-invalid' : '' ?>" value="  <?= $validation->getError('')  ?>">
                            </div>
                        </div>






                        <div class="container">
                            <div class="row">
                                <div class="col-8">
                                    <label class="col-form-label">Total Bayar</label>
                                    <h1><input id="total_harga" name="total_harga"></h1>
                                </div>

                            </div>
                            <input name="customer_id" type="hidden" id="id-customer">
                            <input name="id_mobil" type="hidden" id="id_mobil" class="form-control <?= $validation->hasError('customer_id') ? 'is-invalid' : '' ?>" value="  <?= $validation->getError('customer_id')  ?>">
                            <input name="user_id" type="hidden" value="<?= user()->id ?>" disabled>

                            <div class="d-grid gap-3 d-md-flex justify-content-md-end">
                            <button onclick="window.print()" class="btn btn-primary " type="" role="">P R I N T<i class="fas fa-print ml-3"></i></button>

                                <div class="d-grid gap-3 d-md-flex justify-content-md-end">
                                    <button class="btn btn-success me-md-2" type="submit">Tambahkan Transaksi</button>
                </form>

            </div>
        </div>
        <!-- -->

    </div>
    </div>
    </div>
</main>
<?= $this->include('transaksi/modal-produk') ?>
<?= $this->include('transaksi/modal-customer') ?>
<script>
    function jumlah() {
        var tglMulai = document.getElementById('tgl_mulai').value;
        var tglAkhir = document.getElementById('tgl_selesai').value;
        const d1 = new Date(tglMulai);
        const d2 = new Date(tglAkhir);
        const time = Math.abs(d2 - d1);
        const days = Math.ceil(time / (1000 * 60 * 60 * 24));
        // console.log(days);
        // document.getElementById('jumlah_hari').value = days;
        var harga = document.getElementById('harga').value;

        const total_harga = Math.abs(harga * days);
        var total = document.getElementById('total_harga').value = total_harga;
    }

    function load() {
        $('#detail_cart').load('/transaksi/load');
        $('#spanTotal').load('/transaksi/gettotal');
    }

    $(document).ready(function() {
        load();
    });

    // Ubah Jumlah Item
    $(document).on('click', '.ubah_cart', function() {
        var row_id = $(this).attr("id");
        var qty = $(this).attr("qty");
        $('#rowid').val(row_id);
        $('#qty').val(qty);
        $('#modalUbah').modal('show');
    });

    //Hapus Item Cart
    $(document).on('click', '.hapus_cart', function() {
        var row_id = $(this).attr("id");
        $.ajax({
            url: "transaksi/" + row_id,
            method: "DELETE",
            success: function(data) {
                load();
            }
        });
    });

    // Pembayaran 
    function bayar() {
        var nominal = $('#nominal').val();
        var idsup = $('#id-sup').val();
        $.ajax({
            url: "/transaksi/bayar",
            method: "POST",
            data: {
                'nominal': nominal,
                'id-sup': idsup
            },
            success: function(response) {
                var result = JSON.parse(response);
                swal({
                    title: result.msg,
                    icon: result.status ? "success" : "error",
                })
                load();
                $('#nominal').val("");
                $('#kembalian').val(result.data.kembalian);
            }
        });
    }
</script>
<?= $this->endSection() ?>