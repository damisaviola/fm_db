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
            <h1 class="auth-title">Daftar</h1>
            <p class="auth-subtitle mb-5">Masukan data anda untuk melakukan pendaftran akun pada sistem kami.</p>

            <form id="signupForm" action="<?php echo site_url('auth/register/register_user'); ?>" method="post">
                <div class="form-group position-relative has-icon-left mb-3">
                    <input type="text" name="email" class="form-control form-control-xl" placeholder="Email" autocomplete="email" >
                    <div class="form-control-icon">
                        <i class="bi bi-envelope"></i>
                    </div>
                </div>
                <div class="form-group position-relative has-icon-left mb-3">
                    <input type="text" name="full_name" class="form-control form-control-xl" placeholder="Nama lengkap" autocomplete="name" >
                    <div class="form-control-icon">
                        <i class="bi bi-person"></i>
                    </div>
                </div>
                <div class="form-group position-relative has-icon-left mb-3">
                    <input type="password" id="password" name="password" class="form-control form-control-xl" placeholder="Kata Sandi" autocomplete="new-password">
                    <div class="form-control-icon">
                        <i class="bi bi-shield-lock"></i>
                    </div>
                </div>
                <small id="passwordMatchMessage" class="validation-message"></small>
                <div class="form-group position-relative has-icon-left mb-3">
                    <input type="password" id="confirm_password" class="form-control form-control-xl" placeholder="Konfirmasi Kata Sandi" autocomplete="new-password">
                    <div class="form-control-icon">
                        <i class="bi bi-shield-lock"></i>
                    </div>
                    
                </div>
                <div class="form-group position-relative has-icon-left mb-3">
                    <input type="tel" name="phone" class="form-control form-control-xl" placeholder="Masukkan Nomor HP" autocomplete="tel" pattern="[0-9]{10,13}">
                    <div class="form-control-icon">
                        <i class="bi bi-phone"></i>
                    </div>
                </div>
                <button type="submit" id="submitBtn" class="btn btn-success btn-block btn-lg shadow-lg mt-4" 
                disabled>Sign Up</button>
                <!--Daftar dengan Google -->
                <div class="text-center my-4">
                    <p class="text-gray-600">atau</p>
                    <a href="<?= site_url('auth/google_login'); ?>" class="btn btn-danger btn-block btn-lg shadow-lg">
                        <i class="bi bi-google me-2"></i> Daftar Lewat Google
                    </a>
                </div>
                
            </form>
            <div class="text-center mt-4 text-lg fs-4">
                <p class='text-gray-600'>Sudah mempunyai akun? 
                    <a href="<?php echo site_url('member/login'); ?>" class="font-bold">Masuk</a>.
                </p>
            </div>
        </div>
    </div>
    <div class="col-lg-7 d-none d-lg-block">
        <div id="auth-right"></div>
    </div>
</div>


<style>
    .validation-message {
        margin-top: 2px; 
        font-size: 12px;
        color: #6c757d; 
        display: block;
    }
</style>

<script>
    const passwordField = document.getElementById('password');
    const confirmPasswordField = document.getElementById('confirm_password');
    const passwordMatchMessage = document.getElementById('passwordMatchMessage');
    const submitBtn = document.getElementById('submitBtn');

    function checkPasswordMatch() {
        const password = passwordField.value;
        const confirmPassword = confirmPasswordField.value;

        if (password === confirmPassword && password !== "") {
            passwordMatchMessage.textContent = "Kata sandi cocok.";
            passwordMatchMessage.style.color = "green";
            submitBtn.disabled = false;
        } else if (password !== "" && confirmPassword !== "") {
            passwordMatchMessage.textContent = "Kata sandi tidak cocok.";
            passwordMatchMessage.style.color = "red";
            submitBtn.disabled = true;
        } else {
            passwordMatchMessage.textContent = "";
            passwordMatchMessage.style.color = "#6c757d"; 
            submitBtn.disabled = true;
        }
    }

    passwordField.addEventListener('input', checkPasswordMatch);
    confirmPasswordField.addEventListener('input', checkPasswordMatch);
</script>


    </div>
</body>

</html>