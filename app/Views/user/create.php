<?= $this->extend('layout/template')  ?>

<?= $this->section('content') ?>
<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">User Akun</h1>
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
                <!-- Form Tambah User -->
                <?= view('Myth\Auth\Views\_message_block') ?>
                <form action="<?= route_to('register') ?>" method="post">
                    <?= csrf_field() ?>
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <div class="form-floating mb-3 mb-md-0">
                                <input class="form-control <?php if (session('errors.firstname')) : ?>is-invalid<?php endif ?>" name="firstname" type="text" placeholder="Enter you first name" value="<?= old('firstname') ?>">
                                <label for="inputFirstName">first name</label>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-floating">
                                <input class="form-control <?php if (session('errors.lastname')) : ?>is-invalid<?php endif ?>" name="lastname" type="text" placeholder="Enter your last name" value="<?= old('lastname') ?>">
                                <label for="inputLastName">Last name</label>
                            </div>
                        </div>

                    </div>
                    <div class="form-floating mb-3">
                        <input class="form-control <?php if (session('errors.email')) : ?>is-invalid<?php
                                                                                                endif ?>" name="email" type="email" placeholder="<?= lang('Auth.email') ?>" value="<?= old('email') ?>" />
                        <label for="inputEmail"><?= lang('Auth.email') ?></label>
                    </div>


                    <div class="col-mb-3 mt-3">
                        <div class="form-floating">
                            <input class="form-control <?php if (session('errors.alamat')) : ?>is-invalid<?php endif ?>" name="alamat" type="text" placeholder="Enter your addres" value="<?= old('alamat') ?>">
                            <label for="inputNo_telpon">Alamat</label>
                        </div>

                        <div class="col-mb-3 mt-3">
                            <div class="form-floating">
                                <input class="form-control <?php if (session('errors.no_telpon')) : ?>is-invalid<?php endif ?>" name="no_telpon" type="text" placeholder="Enter your number" value="<?= old('no_telpon') ?>">
                                <label for="inputNo_telpon">No Telpon</label>
                            </div>


                            <div class="form-floating mb-3 mt-3">
                                <input class="form-control <?php if (session('errors.username')) : ?>is-invalid<?php
                                endif ?>" name="username" placeholder="<?= lang('Auth.username') ?>" value="<?= old('username') ?>" />
                                <label for="inputEmail"><?= lang('Auth.username') ?></label>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <div class="form-floating mb-3 mb-md-0">
                                        <input type="password" name="password" class="form-control <?php if (session('errors.password')) : ?>is-invalid
                                                 <?php endif ?>" placeholder="<?= lang('Auth.password') ?>" autocomplete="off" />
                                        <label for="inputPassword"><?= lang('Auth.password') ?></label>
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-floating mb-3 mb-md-0">
                                        <input type="password" name="pass_confirm" class="form-control <?php if (session('errors.pass_confirm')) : ?>is-invalid
                                                 <?php endif ?>" placeholder="<?= lang('Auth.repeatPassword') ?>" autocomplete="off" />
                                        <label for="inputPasswordConfirm"><?= lang('Auth.repeatPassword') ?></label>
                                    </div>
                                </div>

                            </div>
                            <div class="mt-4 mb-0">
                                <div class="d-grid">
                                    <button type="submit" class="btn btn-primary btn-block" href="login.html"><?= lang('Auth.register') ?></button>
                                </div>
                            </div>
                </form>

                <!-- -->
            </div>
        </div>
    </div>
</main>
<?= $this->endSection('') ?>