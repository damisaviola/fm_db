<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice Bukti Booking</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            margin: 20px;
            background-color: #f9f9f9;
            color: #333;
        }
        .invoice-container {
            max-width: 600px;
            margin: auto;
            background: #fff;
            border: 1px solid #ddd;
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }
        .invoice-header {
            text-align: center;
            margin-bottom: 20px;
        }
        .invoice-header h1 {
            margin: 0;
            font-size: 24px;
            color: #4CAF50;
        }
        .invoice-header p {
            margin: 0;
            font-size: 14px;
            color: #777;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        table th, table td {
            text-align: left;
            padding: 12px 15px;
            border: 1px solid #ddd;
        }
        table th {
            background-color: #f4f4f4;
            font-weight: bold;
        }
        table td {
            background-color: #fff;
        }
        .invoice-footer {
            text-align: center;
            margin-top: 20px;
            font-size: 14px;
            color: #777;
        }
        .btn-download {
            display: inline-block;
            margin-top: 20px;
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
        }
        .btn-download:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="invoice-container">
        <div class="invoice-header">
            <h1>Bukti Booking</h1>
            <p>Invoice resmi bukti pemesanan Anda</p>
        </div>
        <table>
            <tr>
                <th>Kode Booking</th>
                <td><?php echo $booking['id_booking']; ?></td>
            </tr>
            <tr>
                <th>Kode Pelanggan</th>
                <td><?php echo $booking['id_pelanggan']; ?></td>
            </tr>
            <tr>
                <th>Kode Lapangan</th>
                <td><?php echo $booking['id_lapangan']; ?></td>
            </tr>
            <tr>
                <th>Tanggal Booking</th>
                <td><?php echo $booking['tgl_booking']; ?></td>
            </tr>
            <tr>
                <th>Tanggal Bermain</th>
                <td><?php echo $booking['tgl_bermain']; ?></td>
            </tr>
            <tr>
                <th>Jam Awal</th>
                <td><?php echo $booking['jam_awal']; ?></td>
            </tr>
            <tr>
                <th>Jam Akhir</th>
                <td><?php echo $booking['jam_akhir']; ?></td>
            </tr>
            <tr>
                <th>Status</th>
                <td><?php echo $booking['status']; ?></td>
            </tr>
            <tr>
                <th>Total Harga</th>
                <td><?php echo "Rp " . number_format($booking['harga'], 2, ',', '.'); ?></td>
            </tr>
        </table>
        <div class="invoice-footer">
            <p>Terima kasih telah menggunakan layanan kami!</p>
        </div>
    </div>
</body>
</html>
