<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pilih Plan</title>
    <link rel="stylesheet" href="<?php echo base_url('assets/css/style.css'); ?>"> <!-- Tambahkan CSS sesuai kebutuhan -->
</head>
<body>
    <div class="container">
        <h1>Pilih Paket Langganan</h1>
        <?php if ($this->session->flashdata('error')): ?>
            <div class="alert alert-danger">
                <?php echo $this->session->flashdata('error'); ?>
            </div>
        <?php endif; ?>

        <form action="<?php echo site_url('subscription/process_plan'); ?>" method="POST">
            <div class="plan">
                <label>
                    <input type="radio" name="plan" value="pro" required>
                    <div class="plan-details">
                        <h2>Pro Plan</h2>
                        <p>Harga: Rp100,000 / bulan</p>
                    </div>
                </label>
            </div>
            <div class="plan">
                <label>
                    <input type="radio" name="plan" value="elite" required>
                    <div class="plan-details">
                        <h2>Elite Plan</h2>
                        <p>Harga: Rp200,000 / bulan</p>
                    </div>
                </label>
            </div>
            <button type="submit" class="btn btn-primary">Lanjutkan ke Pembayaran</button>
        </form>
    </div>
</body>
</html>
