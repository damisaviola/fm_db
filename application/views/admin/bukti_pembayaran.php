<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nota Pembayaran</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #fff;
            color: #333;
            font-size: 14px; /* Increased base font size */
        }
        .invoice-container {
            max-width: 500px; /* Increased width for larger layout */
            margin: 0 auto;
            padding: 30px;
            border: 1px solid #ddd;
            border-radius: 10px;
            background-color: #f9f9f9;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1); /* Added shadow for better presentation */
        }
        .invoice-header {
            text-align: center;
            margin-bottom: 30px; /* Increased margin for spacing */
        }
        .invoice-header h1 {
            font-size: 24px; /* Larger header */
            margin: 0;
            color: #333;
        }
        .invoice-header p {
            margin: 5px 0;
            font-size: 12px;
            color: #777;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table th, table td {
            text-align: left;
            padding: 10px; /* Increased padding */
            font-size: 14px; /* Larger font size for readability */
            border-bottom: 1px solid #ddd;
        }
        table th {
            font-weight: bold;
            font-size: 14px;
        }
        .total {
            font-weight: bold;
            font-size: 16px; /* Increased font size for total */
            text-align: right;
            margin-top: 20px;
        }
        .footer {
            text-align: center;
            margin-top: 30px;
            font-size: 12px;
            color: #777;
        }
        .footer .btn-download {
            display: inline-block;
            margin-top: 20px;
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
        }
        .footer .btn-download:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="invoice-container">
        <div class="invoice-header">
            <h1>Nota Pembayaran</h1>
            <p>Terima Kasih atas Pembayaran Anda</p>
            <p>No. Pembayaran: <?php echo $pembayaran['id_pembayaran']; ?></p>
            <p><?php echo date('d-m-Y H:i', strtotime($pembayaran['tanggal_transaksi'])); ?></p>
        </div>

        <table>
            <tr>
                <th>Kode Booking</th>
                <td><?php echo $pembayaran['id_booking']; ?></td>
            </tr>
            <tr>
                <th>Kode Pelanggan</th>
                <td><?php echo $pembayaran['id_pelanggan']; ?></td>
            </tr>
            <tr>
                <th>Metode Pembayaran</th>
                <td><?php echo ucfirst($pembayaran['metode']); ?></td>
            </tr>
            <tr>
                <th>Total Harga</th>
                <td><?php echo "Rp " . number_format($pembayaran['total_harga'], 2, ',', '.'); ?></td>
            </tr>
            <tr>
                <th>Jumlah Bayar</th>
                <td><?php echo "Rp " . number_format($pembayaran['jumlah_bayar'], 2, ',', '.'); ?></td>
            </tr>
            <tr>
                <th>Kembalian</th>
                <td><?php echo "Rp " . number_format($pembayaran['kembalian'], 2, ',', '.'); ?></td>
            </tr>
        </table>

        <div class="total">
            <p>Total Pembayaran: Rp <?php echo number_format($pembayaran['jumlah_bayar'], 2, ',', '.'); ?></p>
        </div>
    </div>
</body>
</html>
