<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url('assets/admin/dist/assets/vendors/bootstrap-icons/bootstrap-icons.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/admin/dist/assets/css/app.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/admin/dist/assets/css/pages/auth.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/admin/dist/assets/css/bootstrap.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/admin/dist/assets/vendors/iconly/bold.css'); ?>">

    <!-- Favicons -->
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo base_url('assets/home/apple-touch-icon.png'); ?>">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo base_url('assets/home/favicon-32x32.png'); ?>">
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url('assets/home/favicon-16x16.png'); ?>">
    <link rel="manifest" href="<?php echo base_url('assets/home/site.webmanifest'); ?>">
</head>

<body>
    <div id="auth">

        <div class="row h-100">
            <div class="col-lg-5 col-12">
                <div id="auth-left">
                    <div class="auth-logo">
                    </div>

                    <!-- Pesan Error atau Sukses -->
                    <?php if ($this->session->flashdata('message')): ?>
                        <div class="alert alert-success">
                            <?php echo $this->session->flashdata('message'); ?>
                        </div>
                    <?php endif; ?>

                    <?php if ($this->session->flashdata('error')): ?>
                        <div class="alert alert-danger">
                            <?php echo $this->session->flashdata('error'); ?>
                        </div>
                    <?php endif; ?>

                    <h1 class="auth-title">Masuk</h1>
                    <p class="auth-subtitle mb-5">Masuk dengan data yang Anda masukkan saat pendaftaran.</p>

                    <!-- Form Login -->
                    <form action="<?php echo site_url('auth/login/authenticate'); ?>" method="POST">
    
                        <input type="hidden" name="<?php echo $this->security->get_csrf_token_name(); ?>" value="<?php echo $this->security->get_csrf_hash(); ?>">

                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="email" name="email" class="form-control form-control-xl" placeholder="Email" value="<?php echo set_value('email'); ?>">
                            <div class="form-control-icon">
                                <i class="bi bi-person"></i>
                            </div>
                        </div>

                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="password" name="password" class="form-control form-control-xl" placeholder="Kata Sandi">
                            <div class="form-control-icon">
                                <i class="bi bi-shield-lock"></i>
                            </div>
                        </div>

                        <!-- Remember me -->
                        <div class="form-check form-check-lg d-flex align-items-end">
                            <input class="form-check-input me-2" type="checkbox" name="remember_me" value="1" id="flexCheckDefault">
                            <label class="form-check-label text-gray-600" for="flexCheckDefault">
                                Tetap Login
                            </label>
                        </div>


                        <!-- Submit Button -->
                        <button type="submit" class="btn btn-success btn-block btn-lg shadow-lg mt-5">Masuk</button>
                    </form>

                    <!-- Links -->
                    <div class="text-center mt-5 text-lg fs-4">
                        <p class="text-gray-600">Belum mempunyai akun? <a class="font-bold" href="<?php echo site_url('register'); ?>">Daftar</a>.</p>
                        <p><a class="font-bold" href="<?php echo site_url('lupa-password'); ?>">Lupa Password</a>.</p>
                    </div>
                </div>
            </div>

            <div class="col-lg-7 d-none d-lg-block">
                <div id="auth-right">
                    <!-- Additional content if needed -->
                </div>
            </div>
        </div>

    </div>

</body>

</html>
