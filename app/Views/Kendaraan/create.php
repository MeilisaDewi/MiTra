<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>
<main>
    <div class="container-fluid pc-4">
        <h1 class="mt-4">Data Mobil</h1>
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
                
            <form action="/kendaraan/create" method="POST" enctype="multipart/form-data">
                    <?= csrf_field() ?>
                    <div class="mb-3 row">
                        <label for="name" class="col-sm-2 col-form-label">Nama Mobil</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control <?= $validation->hasError('name') ? 'is-invalid' : '' ?>" id="name" name="name" value="<?= old('name') ?>">
                            <div id="validationServer03Feedback" class="invalid-feedback">
                                <?= $validation->getError('name')  ?>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="year" class="col-sm-2 col-form-label">Tahun</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control <?= $validation->hasError('year') ? 'is-invalid' : '' ?>" id="year" name="year" value="<?= old('year') ?>">
                            <div id="validationServer03Feedback" class="invalid-feedback">
                                <?= $validation->getError('year')  ?>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="color" class="col-sm-2 col-form-label">Warna</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control <?= $validation->hasError('color') ? 'is-invalid' : '' ?>" id="color" name="color" value="<?= old('color') ?>">
                            <div id="validationServer03Feedback" class="invalid-feedback">
                                <?= $validation->getError('color')  ?>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="no_plat" class="col-sm-2 col-form-label">Nomor Polisi</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control <?= $validation->hasError('no_plat') ? 'is-invalid' : '' ?>" id="no_plat" name="no_plat" value="<?= old('no_plat') ?>">
                            <div id="validationServer03Feedback" class="invalid-feedback">
                                <?= $validation->getError('no_plat')  ?>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="no_plat" class="col-sm-2 col-form-label">Harga</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control <?= $validation->hasError('Harga') ? 'is-invalid' : '' ?>" id="Harga" name="Harga" value="<?= old('Harga') ?>">
                            <div id="validationServer03Feedback" class="invalid-feedback">
                                <?= $validation->getError('Harga')  ?>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="Sampul" class="col-sm-2 col-form-label">Cover</label>
                        <div class="col-sm-5">
                            <input type="file" class="form-control <?= $validation->hasError('sampul') ? 'is-invalid' : '' ?>" id="sampul" name="sampul" value="sampul" onchange="previewImage()">
                            <div id="validationServer03Feedback" class="invalid-feedback">
                                <?= $validation->getError('sampul') ?>
                            </div>
                            <div class="col-sm-6 mt-2">
                                <img src="/img/default.jpg" alt="" class="img-thumbnail img-preview">
                            </div>
                        </div>
                            <label for="id_jenis" class="col-sm-2 col-">Jenis</label>
                            <div class="col-sm-3">
                                <select type="text" class="form-control" id="jenis" name="jenis" value="<?= old('jenis') ?>">
                                    
                                        <option value="matic">Matic
                                        </option>
                                        <option value="manual">Manual
                                        </option>
                                    
                                </select>
                            </div>
                        </div>
                        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                            <button class="btn btn-primary me-md-2" type="submit">Simpan</button>
                            <button class="btn btn-danger" type="reset">Batal</button>
                            <a class="btn btn-dark" type="button" href="/kendaraan">Kembali</a>
                        </div>
                </form>
    
                <!-- -->
            </div>
        </div>
    </div>
</main>
<?= $this->endsection()  ?>