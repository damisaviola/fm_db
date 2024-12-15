<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Redirect ke Pembayaran</title>
    <script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="<?= $this->config->item('midtrans_client_key') ?>"></script>
    <style>
        /* General reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            text-align: center;
            color: #333;
        }

        .container {
            background-color: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            max-width: 500px;
            width: 100%;
        }

        h1 {
            font-size: 24px;
            margin-bottom: 20px;
        }

        .message {
            font-size: 18px;
            color: #555;
            margin-bottom: 20px;
        }

        .loading {
            font-size: 16px;
            color: #888;
        }

        .footer {
            font-size: 14px;
            color: #aaa;
            margin-top: 20px;
        }

        .btn {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            text-align: center;
            border-radius: 5px;
            cursor: pointer;
            text-decoration: none;
            display: inline-block;
            margin-top: 20px;
            font-size: 16px;
        }

        .btn:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Redirect ke Pembayaran</h1>
        <div class="message">
            Mohon tunggu sebentar, Anda akan diarahkan ke halaman pembayaran segera.
        </div>
        <div class="loading">
            Menyiapkan proses pembayaran...
        </div>
        <a href="<?= site_url('dashboard') ?>" class="btn">Ke Dashboard</a>
    </div>

    <script>
        snap.pay('<?= $snapToken ?>', {
            onSuccess: function(result) {
                alert('Pembayaran berhasil');
                window.location.href = '<?= site_url('dashboard') ?>';
            },
            onError: function(result) {
                alert('Terjadi kesalahan saat memproses pembayaran.');
                window.location.href = '<?= site_url('dashboard') ?>';
            },
        });
    </script>
</body>
</html>
