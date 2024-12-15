<!DOCTYPE html>
<html>
<head>
    <title>Kwitansi Pembayaran</title>
    <style>
        body { font-family: Arial, sans-serif; font-size: 14px; }
        .container { margin: 0 auto; width: 70%; }
        h2 { text-align: center; }
        .details { margin: 20px 0; }
        table { width: 100%; border-collapse: collapse; margin: 20px 0; }
        table, th, td { border: 1px solid black; }
        th, td { padding: 10px; text-align: left; }
        .footer { margin-top: 30px; text-align: center; }
    </style>
</head>
<body>
    <div class="container">
        <h2>Kwitansi Pembayaran</h2>
        <div class="details">
            <p><strong>Tanggal:</strong> <?php echo $tanggal; ?></p>
            <p><strong>ID Booking:</strong> <?php echo $id_booking; ?></p>
            <p><strong>Nama Pelanggan:</strong> <?php echo $pelanggan['nama']; ?></p>
        </div>
        <table>
            <tr>
                <th>Total Harga</th>
                <td>Rp <?php echo $total_harga; ?></td>
            </tr>
            <tr>
                <th>Metode Pembayaran</th>
                <td><?php echo $metode; ?></td>
            </tr>
            <tr>
                <th>Jumlah Bayar</th>
                <td>Rp <?php echo $jumlah_bayar; ?></td>
            </tr>
            <tr>
                <th>Kembalian</th>
                <td>Rp <?php echo $kembalian; ?></td>
            </tr>
        </table>
        <div class="footer">
            <p>Terima kasih telah melakukan pembayaran!</p>
        </div>
    </div>
</body>
</html>
