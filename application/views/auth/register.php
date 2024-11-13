<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo base_url('assets/admin/dist/assets/vendors/bootstrap-icons/bootstrap-icons.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/admin/dist/assets/css/app.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/admin/dist/assets/css/pages/auth.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/admin/dist/assets/css/bootstrap.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/admin/dist/assets/vendors/iconly/bold.css'); ?>">
    
     <!-- Favicons
    ================================================== -->
    <link rel="apple-touch-icon" sizes="180x180" href="<?php echo base_url('assets/home/apple-touch-icon.png'); ?>">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo base_url('assets/home/favicon-32x32.png'); ?>"> <!-- ini icon title --->
    <link rel="icon" type="image/png" sizes="16x16" href="<?php echo base_url('assets/home/favicon-16x16.png'); ?>">
    <link rel="manifest" href="<?php echo base_url('assets/home/site.webmanifest'); ?>">

<body>
    <div id="auth">

        <div class="row h-100">
            <div class="col-lg-5 col-12">
                <div id="auth-left">
                    <h1 class="auth-title">Sign Up</h1>
                    <p class="auth-subtitle mb-5">Input your data to register to our website.</p>

                    <form action="index.html">
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="text" class="form-control form-control-xl" placeholder="Email">
                            <div class="form-control-icon">
                                <i class="bi bi-envelope"></i>
                            </div>
                        </div>
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="text" class="form-control form-control-xl" placeholder="Nama lengkap">
                            <div class="form-control-icon">
                                <i class="bi bi-person"></i>
                            </div>
                        </div>
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="password" class="form-control form-control-xl" placeholder="Kata Sandi">
                            <div class="form-control-icon">
                                <i class="bi bi-shield-lock"></i>
                            </div>
                        </div>
                        <div class="form-group position-relative has-icon-left mb-4">
                            <input type="tel" name="phone" class="form-control form-control-xl" placeholder="Masukkan Nomor HP" pattern="[0-9]{10,13}" required>
                            <div class="form-control-icon">
                                <i class="bi bi-phone"></i>
                            </div>
                        </div>
                        <button class="btn btn-success btn-block btn-lg shadow-lg mt-5">Sign Up</button>
                    </form>
                    <div class="text-center mt-5 text-lg fs-4">
                        <p class='text-gray-600'>Already have an account? <a href="auth-login.html"
                                class="font-bold">Log
                                in</a>.</p>
                    </div>
                </div>
            </div>
            <div class="col-lg-7 d-none d-lg-block">
                <div id="auth-right">

                </div>
            </div>
        </div>

    </div>
</body>

</html>