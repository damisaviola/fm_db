<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet" />

    <!-- Icons -->
    <link rel="stylesheet" href="<?= base_url('assets/admin/dist/assets/vendors/bootstrap-icons/bootstrap-icons.css'); ?>" />
    <link rel="stylesheet" href="<?= base_url('assets/admin/dist/assets/vendors/iconly/bold.css'); ?>" />

    <!-- Styles -->
    <link rel="stylesheet" href="<?= base_url('assets/admin/dist/assets/css/bootstrap.css'); ?>" />
    <link rel="stylesheet" href="<?= base_url('assets/admin/dist/assets/css/app.css'); ?>" />
    <link rel="stylesheet" href="<?= base_url('assets/admin/dist/assets/css/pages/auth.css'); ?>" />

    <!-- Favicons -->
    <link rel="apple-touch-icon" sizes="180x180" href="<?= base_url('assets/home/apple-touch-icon.png'); ?>">
    <link rel="icon" type="image/png" sizes="32x32" href="<?= base_url('assets/home/favicon-32x32.png'); ?>">
    <link rel="icon" type="image/png" sizes="16x16" href="<?= base_url('assets/home/favicon-16x16.png'); ?>">
    <link rel="manifest" href="<?= base_url('assets/home/site.webmanifest'); ?>">
</head>

<body>
    <div id="auth">
        <div class="row h-100">
            <!-- Left Section: Form -->
            <div class="col-lg-5 col-12">
                <div id="auth-left">

                    <!-- Flash Messages -->
                    <?php if ($this->session->flashdata('message')): ?>
                        <div class="alert alert-success"><?= $this->session->flashdata('message'); ?></div>
                    <?php endif; ?>
                    <?php if ($this->session->flashdata('error')): ?>
                        <div class="alert alert-danger"><?= $this->session->flashdata('error'); ?></div>
                    <?php endif; ?>

                    <!-- Heading -->
                    <h1 class="auth-title">Masuk</h1>
                    <p class="auth-subtitle mb-5">Silakan login dengan email dan kata sandi Anda.</p>

                    <!-- Login Form -->
                    <form action="<?= site_url('auth/login/authenticate'); ?>" method="POST">
                        <input type="hidden" name="<?= $this->security->get_csrf_token_name(); ?>" value="<?= $this->security->get_csrf_hash(); ?>" />

                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="email" name="email" class="form-control form-control-xl" placeholder="Email" value="<?= set_value('email'); ?>" required />
                            <div class="form-control-icon">
                                <i class="bi bi-person"></i>
                            </div>
                        </div>

                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="password" name="password" class="form-control form-control-xl" placeholder="Kata Sandi" required />
                            <div class="form-control-icon">
                                <i class="bi bi-shield-lock"></i>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-success btn-block btn-lg shadow-lg">Masuk</button>
                    </form>

                    <!-- Login dengan Google -->
                    <div class="text-center my-4">
                        <a href="<?= site_url('auth/google_login'); ?>" class="btn btn-danger btn-block btn-lg shadow-lg">
                            <i class="bi bi-google me-2"></i> Masuk dengan Google
                        </a>
                    </div>

                    <!-- Link Tambahan -->
                    <div class="text-center mt-4 fs-6">
                        <p class="text-gray-600">Belum punya akun? <a href="<?= site_url('register'); ?>" class="font-bold">Daftar</a></p>
                        <p><a href="<?= site_url('lupa-password'); ?>" class="font-bold">Lupa Password?</a></p>
                    </div>
                </div>
            </div>

            <!-- Right Section: Optional Image/Content -->
            <div class="col-lg-7 d-none d-lg-block">
                <div id="auth-right">
                    <!-- Kamu bisa tambahkan gambar atau animasi di sini -->
                </div>
            </div>
        </div>
    </div>
</body>

</html>
