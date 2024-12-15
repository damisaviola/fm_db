<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pembayaran</title>
    <!-- Menyertakan Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="<?php echo config_item('midtrans_client_key'); ?>"></script>

    <style>
        body {
            background-color: #f8f9fa;
        }

        .container {
            max-width: 600px;
            margin-top: 50px;
        }

        .card {
            border-radius: 15px;
        }

        .card-header {
            background-color: #28a745;
            color: white;
            text-align: center;
            font-size: 1.5rem;
        }

        .card-body {
            padding: 2rem;
        }

        .btn-success {
            background-color: #28a745;
            border-color: #28a745;
        }

        .btn-success:hover {
            background-color: #218838;
            border-color: #1e7e34;
        }

        .price {
            font-size: 1.2rem;
            font-weight: bold;
        }

        .payment-status {
            font-size: 0.9rem;
            text-align: center;
            margin-top: 1rem;
        }

        @media (max-width: 576px) {
            .container {
                margin-top: 20px;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="card shadow-sm">
            <div class="card-header">
                Pembayaran Plan: <?php echo ucfirst($plan); ?>
            </div>
            <div class="card-body">
                <h4 class="text-center price">Harga: Rp <?php echo number_format($price, 0, ',', '.'); ?></h4>
                <p class="text-center">Silakan lakukan pembayaran menggunakan metode yang tersedia.</p>
                <div class="d-grid gap-2">
                    <button id="pay-button" class="btn btn-success">Bayar Sekarang</button>
                </div>
                <p class="payment-status">Pembayaran Anda akan diproses setelah tombol diklik.</p>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('pay-button').addEventListener('click', function () {
            snap.pay('<?php echo $snapToken; ?>', {
                onSuccess: function (result) {
                    window.location.href = '<?php echo site_url('subscription/success'); ?>';
                },
                onPending: function (result) {
                    alert('Pembayaran Anda sedang diproses.');
                },
                onError: function (result) {
                    window.location.href = '<?php echo site_url('subscription/error'); ?>';
                }
            });
        });
    </script>

    <!-- Menyertakan Bootstrap JS dan Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>

</html>
