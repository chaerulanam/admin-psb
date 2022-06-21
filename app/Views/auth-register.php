<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8" />
    <title>AL-ISHLAH | Register</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="/assets/images/logo-sm.png">
    <?= view('partials/head-css') ?>

</head>

<body class="authentication-bg">
    <div class="account-pages my-5 pt-sm-5">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="text-center">
                        <a href="/" class="mb-5 d-block auth-logo">
                            <img src="assets/images/logo-dark.png" alt="" height="50" class="logo logo-dark">
                            <img src="assets/images/logo-light.png" alt="" height="50" class="logo logo-light">
                        </a>
                    </div>
                </div>
            </div>
            <div class="row align-items-center justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-5">
                    <div class="card bg-gradient-light">

                        <div class="card-body p-4">

                            <div class="text-center mt-2">
                                <h5 class="text-primary">Daftar Akun</h5>
                                <p class="text-muted">Pendaftaran Santri Baru</p>
                            </div>
                            <div class="p-2 mt-4">
                                <?= view('Myth\Auth\Views\_message_block') ?>

                                <form action="<?= route_to('register') ?>" method="post">
                                    <?= csrf_field() ?>
                                    <div class="mb-3">
                                        <label for="phone">Nomor Hp Aktif</label>
                                        <input type="number"
                                            class="form-control <?= session('errors.phone') ? 'is-invalid' : '' ?>"
                                            name="email" placeholder="Ex: 086235223xxx" value="<?= old('email') ?>">
                                    </div>

                                    <div class="mb-3">
                                        <label for="username"><?= lang('Auth.username') ?></label>
                                        <input type="text"
                                            class="form-control <?php if (session('errors.username')) : ?>is-invalid<?php endif ?>"
                                            name="username" placeholder="<?= lang('Auth.username') ?>"
                                            value="<?= old('username') ?>"
                                            oninput="this.value = this.value.toLowerCase()">
                                    </div>

                                    <div class="mb-3">
                                        <label for="password"><?= lang('Auth.password') ?></label>
                                        <input type="password" name="password"
                                            class="form-control <?php if (session('errors.password')) : ?>is-invalid<?php endif ?>"
                                            placeholder="Minimal 8 Karakter" autocomplete="off">
                                    </div>

                                    <div class="mb-3">
                                        <label for="pass_confirm"><?= lang('Auth.repeatPassword') ?></label>
                                        <input type="password" name="pass_confirm"
                                            class="form-control <?php if (session('errors.pass_confirm')) : ?>is-invalid<?php endif ?>"
                                            placeholder="<?= lang('Auth.repeatPassword') ?>" autocomplete="off">
                                    </div>

                                    <div class="mt-3 text-end">
                                        <button class="btn btn-primary w-sm waves-effect waves-light"
                                            type="submit">Daftar</button>
                                    </div>

                                    <div class="mt-4 text-center">
                                        <p class="text-muted mb-0">Sudah punya akun ? <a href="login"
                                                class="fw-medium text-primary"> Login</a></p>
                                    </div>
                                </form>
                            </div>

                        </div>
                    </div>
                    <div class="mt-5 text-center">
                        <p class="text-white">© <script>
                            document.write(new Date().getFullYear())
                            </script> Al-Ishlah. Dikembangkan oleh <i class="mdi mdi-heart text-danger"></i><a
                                href="https://www.anakkendali.com" class="link-light"> anakkendali.com</p></a>
                    </div>

                </div>
            </div>
            <!-- end row -->
        </div>
        <!-- end container -->
    </div>

    <?= view('partials/vendor-scripts') ?>

    <script src="assets/js/app.js"></script>

</body>

</html>