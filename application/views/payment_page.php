<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pembayaran</title>
    <link rel="stylesheet" href="<?php echo base_url('assets/css/style.css'); ?>"> <!-- Tambahkan CSS sesuai kebutuhan -->
    <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="<?php echo config_item('midtrans_client_key'); ?>"></script>
</head>
<body>
    <div class="container">
        <h1>Pembayaran Plan: <?php echo ucfirst($plan); ?></h1>
        <p>Harga: Rp<?php echo number_format($price, 0, ',', '.'); ?></p>
        <button id="pay-button" class="btn btn-success">Bayar Sekarang</button>
    </div>

    <script>
        document.getElementById('pay-button').addEventListener('click', function () {
            snap.pay('<?php echo $snapToken; ?>', {
                onSuccess: function(result) {
                    window.location.href = '<?php echo site_url('subscription/success'); ?>';
                },
                onPending: function(result) {
                    alert('Pembayaran Anda sedang diproses.');
                },
                onError: function(result) {
                    window.location.href = '<?php echo site_url('subscription/error'); ?>';
                }
            });
        });
    </script>
</body>
</html>
