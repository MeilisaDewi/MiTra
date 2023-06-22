<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>
<main>
    <div class="container-fluid pc-4">
        <h1 class="mt-4">DATA TRANSAKSI</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item active">DETAIL TRANSAKSI</li>
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
                <!-- isi detail -->
                <div class="card mb-3">
                    <div class="row g-0">
                        <div class="col-md-4">
                            <img src="<?= base_url('img/' . $result['cover']) ?>" alt="" width="50%">
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-nama"><?= $result['nama'] ?></h5>
                                <p class="card-text">Tanggal Mulai:<br><?= $result['tgl_mulai'] ?></p>
                                <p class="card-text">Tanggal Pengembalian: <?= $result['tgl_pengembalian'] ?></p>
                                <p class="card-text">Total Biaya : <?= $result['total_biaya'] ?></p>
                                <p class="card-text">Status : <?= $result['status'] ?></p>
                                <div class="d-grid gap-2 d-md-block">
                                    <a class="btn btn-dark" type="button" href="/kendaraan">Kembali</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- -->
            </div>
        </div>
    </div>
</main>
<?= $this->endSection()  ?>