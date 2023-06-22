<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>
<main>
    <div class="container-fluid pc-4">
        <h1 class="mt-4">List Mobil</h1>
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
                
                <form action="/kendaraan/edit/<?= $result['id_mobil'] ?>" method="POST" enctype="multipart/form-data">
                    <?= csrf_field() ?>
                    <input type="hidden" name="slug" value="<?= $result['slug'] ?>">
                    <div class="mb-3 row">
                        <label for="name" class="col-sm-2 col-form-label">Nama</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control <?= $validation->hasError('name') ? 'is-invalid' : '' ?>" id="name" name="name" value="<?= old('name', $result['nama']) ?>">
                            <div id="validationServer03Feedback" class="invalid-feedback">
                                <?= $validation->getError('tipe')  ?>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="year" class="col-sm-2 col-form-label">Tahun</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control <?= $validation->hasError('year') ? 'is-invalid' : '' ?>" id="year" name="year" value="<?= old('year',$result['tahun']) ?>">
                            <div id="validationServer03Feedback" class="invalid-feedback">
                                <?= $validation->getError('year')  ?>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="color" class="col-sm-2 col-form-label">Warna</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control <?= $validation->hasError('color') ? 'is-invalid' : '' ?>" id="color" name="color" value="<?= old('color', $result['warna']) ?>">
                            <div id="validationServer03Feedback" class="invalid-feedback">
                                <?= $validation->getError('color')  ?>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="no_plat" class="col-sm-2 col-form-label">Nomor Polisi</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control <?= $validation->hasError('no_plat') ? 'is-invalid' : '' ?>" id="no_plat" name="no_plat" value="<?= old('no_plat', $result['no_polisi']) ?>">
                            <div id="validationServer03Feedback" class="invalid-feedback">
                                <?= $validation->getError('no_plat')  ?>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="no_plat" class="col-sm-2 col-form-label">Harga</label>
                        <div class="col-sm-5">
                            <input type="text" class="form-control <?= $validation->hasError('price') ? 'is-invalid' : '' ?>" id="price" name="price" value="<?= old('price', $result['harga']) ?>">
                            <div id="validationServer03Feedback" class="invalid-feedback">
                                <?= $validation->getError('price')  ?>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="sampul" class="col-sm-2 col-form-label">Sampul</label>
                        <div class="col-sm-5">
                            <input type="hidden" name="sampullama" value="<?= $result['cover'] ?>">
                            <input type="file" class="form-control <?= $validation->hasError('sampul') ? 'is-invalid' : '' ?>" id="sampul" name="sampul" onchange="previewImage()">
                            <div id="validationServer03Feedback" class="invalid-feedback">
                                <?= $validation->getError('sampul') ?>
                            </div>
                            <div class="col-sm-6 mt-2">
                                <img src="/img/<?= $result['cover'] == "" ? "default.jpg" : $result['cover'] ?>" alt="" class="img-thumbnail img-preview">
                            </div>
                        </div>
                        <label for="id_kategori" class="col-sm-2 col-">Jenis</label>
                        <div class="col-sm-3">
                            <select type="text" class="form-control" id="jenis" name="jenis" value="<?= old('diskon') ?>">
                                <?php foreach ($category as $value) : ?>
                                    <option value="<?= $value['jenis'] ?>" <?= $value['jenis'] == $result['jenis'] ? 'selected' : '' ?>>
                                        <?= $value['name_category'] ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <button class="btn btn-primary me-md-2" type="submit">Update</button>
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