<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pembayaran</title>
    <!-- Menyertakan Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f4f7fb;
        }

        .container {
            max-width: 600px;
            margin-top: 80px;
        }

        .card {
            border-radius: 15px;
            border: none;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .card-header {
            background-color: seagreen;
            color: white;
            text-align: center;
            font-size: 1.6rem;
            font-weight: bold;
            border-top-left-radius: 15px;
            border-top-right-radius: 15px;
        }

        .card-body {
            padding: 2.5rem;
            background-color: white;
            border-bottom-left-radius: 15px;
            border-bottom-right-radius: 15px;
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #004085;
        }

        .price {
            font-size: 1.3rem;
            font-weight: bold;
            color: #333;
            margin-top: 10px;
        }

        .features {
            font-size: 1rem;
            list-style-type: none;
            padding-left: 0;
            margin-top: 15px;
        }

        .features li {
            padding-left: 1.5rem;
            position: relative;
            font-size: 1.1rem;
            color: #555;
        }

        .features li::before {
            content: "\2022";
            position: absolute;
            left: 0;
            color: seagreen;
            font-size: 1.5rem;
            top: 0;
        }

        .features li:last-child {
            margin-bottom: 20px;
        }

        .btn-success {
            background-color: seagreen;
            border-color: seagreen;
        }

        .btn-success:hover {
            background-color: seagreen;
            border-color: seagreen;
        }

        .text-muted {
            color: #6c757d;
        }

        .footer {
            text-align: center;
            margin-top: 20px;
            font-size: 0.9rem;
            color: #888;
        }

        @media (max-width: 576px) {
            .container {
                margin-top: 30px;
            }
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="card shadow-sm">
            <div class="card-header">
                Detail Plan: <?= $plan_name ?>
            </div>
            <div class="card-body">
                <div class="text-center mb-4">
                    <h5 class="price">Harga: <?= $price ?> / Per Bulan</h5>
                    <h6 class="text-muted">Pilih plan yang sesuai dengan kebutuhan Anda</h6>
                </div>

                <h6 class="mb-3">Fitur:</h6>
                <ul class="features">
                    <?php foreach ($features as $feature): ?>
                        <li><?= $feature ?></li>
                    <?php endforeach; ?>
                </ul>

                <form action="<?= base_url('payment/checkout') ?>" method="POST" class="mt-4">
                    <input type="hidden" name="plan_name" value="<?= $plan_name ?>">
                    <input type="hidden" name="price" value="<?= str_replace(['Rp', '.'], '', $price) ?>">
                    <div class="d-grid gap-2">
                        <button type="submit" class="btn btn-success btn-lg">Bayar Sekarang</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="footer">
        <p>&copy; 2024 FutsalMate | Semua hak cipta dilindungi.</p>
    </div>

  
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>

</html>
