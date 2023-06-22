<?= $this->extend('auth/template') ?>

<?= $this->section('content') ?>
<main>
                    <div class="container ">
                    <h1 class="mt-5 text-light text-center  ">Mita Transport Jogja</h1>
                        <div class="row justify-content-center ">
                            <div class="col-lg-7">
                                <div class="card shadow-lg border-0 rounded-lg mt-5 bg-info ">
                                    <div class="card-header text-light"><h3 class="text-center font-weight-light my-4"><?=lang('Auth.loginTitle')?></h3></div>
                                    <div class="card-body bg-light ">
                                        <?= view('Myth\Auth\Views\_message_block') ?>

                                        <form action="<?= route_to('login') ?>" method="post">
						                    <?= csrf_field() ?>
                                            <?php if ($config->validFields === ['email']): ?>
						                    <div class="form-floating mb-3">
							                <input class="form-control <?php if(session('errors.login')) : ?>is-invalid<?php 
                                            endif ?>" type="email" name="login" placeholder="<?=lang('Auth.email')?>"/>
                                            <label for="inputEmail"><?=lang('Auth.email')?></label>
							                <div class="invalid-feedback">
								            <?= session('errors.login') ?>
							            </div>
						            </div>
                                    <?php else: ?>
                                <div class="form-floating mb-3">
							    <input class="form-control <?php if(session('errors.login')) : ?>is-invalid<?php 
                                endif ?>" name="login" placeholder="<?=lang('Auth.emailOrUsername')?>"
                                 type="text"/>
                                <label for="inputEmail"><?=lang('Auth.emailOrUsername')?></label>
							    <div class="invalid-feedback">
								<?= session('errors.login') ?>
							    </div>
						    </div>
                            <?php endif; ?>

                        <div class="form-floating mb-3">
                            <input class="form-control <?php if(session('errors.password')) : ?>is-invalid<?php 
                            endif ?>" name="password" type="password" placeholder="<?=lang('Auth.password')?>"
                            type="text"/>
                            <label for="inputPassword"><?=lang('Auth.password')?></label>
							<div class="invalid-feedback">
								<?= session('errors.password') ?>
							</div>
                        </div>

						<div class="form-check mb-3">
							<input class="form-check-input" name="remember" type="checkbox" <?php if(old
                            ('remember')) : ?> checked <?php endif ?>/>
							<label class="form-check-label" for="inputRememberPassword"><?=lang('
                            rememberMe')?></label>
						</div>

                            <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                <a class="small" href="<?= route_to('forgot') ?>"><?= lang('
                                forgotYourPassword?') ?></a>

                            <button type="submit" class="btn btn-primary"><?= lang('Auth.loginAction') ?></button>
                            </div>
                            <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                <a class="small" href="<?= route_to('register') ?>"><?= lang('
                                Register') ?></a>

                                
                            </form>
                            </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
<?= $this->endsection() ?>