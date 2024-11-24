<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reset Password</title>
    <link rel="stylesheet" href="<?php echo base_url('assets/admin/dist/assets/css/bootstrap.css'); ?>">
</head>

<body>
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-6">
                <h2>Reset Password</h2>
                <?php echo validation_errors('<div class="alert alert-danger">', '</div>'); ?>

                <!-- Menampilkan pesan error jika ada -->
                <?php if ($this->session->flashdata('error')): ?>
                    <div class="alert alert-danger">
                        <?php echo $this->session->flashdata('error'); ?>
                    </div>
                <?php endif; ?>

                <form action="<?php echo site_url('auth/forgot/reset_password'); ?>" method="post">
                    <!-- Pastikan token yang diterima dikirim sebagai input tersembunyi -->
                    <input type="hidden" name="token" value="<?php echo isset($token) ? $token : ''; ?>">

                    <div class="form-group">
                        <label for="password">Password Baru</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="Password baru" required>
                    </div>

                    <div class="form-group">
                        <label for="password_confirm">Konfirmasi Password</label>
                        <input type="password" class="form-control" id="password_confirm" name="password_confirm" placeholder="Konfirmasi password" required>
                    </div>

                    <button type="submit" class="btn btn-primary mt-3">Reset Password</button>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
