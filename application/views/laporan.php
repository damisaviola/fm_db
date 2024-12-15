<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Pembayaran</title>
    <!-- Menyertakan Bootstrap untuk desain -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h3 class="text-center">Laporan Pembayaran</h3>
        <form action="<?php echo site_url('admin/admin/laporan'); ?>" method="GET" class="mb-4">
            <div class="row">
                <div class="col-md-5">
                    <input type="date" name="start_date" class="form-control" value="<?php echo isset($_GET['start_date']) ? $_GET['start_date'] : ''; ?>" placeholder="Start Date">
                </div>
                <div class="col-md-5">
                    <input type="date" name="end_date" class="form-control" value="<?php echo isset($_GET['end_date']) ? $_GET['end_date'] : ''; ?>" placeholder="End Date">
                </div>
                <div class="col-md-2">
                    <button type="submit" class="btn btn-primary w-100">Filter</button>
                </div>
            </div>
        </form>

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Transaksi Pembayaran</h5>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ID Pembayaran</th>
                            <th>ID Booking</th>
                            <th>ID Pelanggan</th>
                            <th>Total Harga</th>
                            <th>Metode</th>
                            <th>Jumlah Bayar</th>
                            <th>Tanggal Transaksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($pembayaran as $row): ?>
                            <tr>
                                <td><?php echo $row['id_pembayaran']; ?></td>
                                <td><?php echo $row['id_booking']; ?></td>
                                <td><?php echo $row['id_pelanggan']; ?></td>
                                <td>Rp <?php echo number_format($row['total_harga'], 0, ',', '.'); ?></td>
                                <td><?php echo ucfirst($row['metode']); ?></td>
                                <td>Rp <?php echo number_format($row['jumlah_bayar'], 0, ',', '.'); ?></td>
                                <td><?php echo date('d-m-Y H:i', strtotime($row['tanggal_transaksi'])); ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <h5>Total Pemasukan: Rp <?php echo number_format($total_pemasukan, 0, ',', '.'); ?></h5>
            </div>
        </div>
    </div>

    <!-- Menyertakan Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>
</html>
