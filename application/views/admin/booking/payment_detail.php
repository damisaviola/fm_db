<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detail Booking</title>
    <link rel="stylesheet" href="<?php echo base_url('assets/admin/dist/assets/css/bootstrap.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/admin/dist/assets/css/app.css'); ?>">
    <style>
        .form-group {
            margin-bottom: 1.5rem;
        }
        .btn {
            margin-top: 1rem;
        }
    </style>
    <script>
        function togglePembayaran() {
            const metodePembayaran = document.getElementById('metode_pembayaran').value;
            const tunaiFields = document.getElementById('tunai-fields');
            if (metodePembayaran === 'tunai') {
                tunaiFields.style.display = 'block';
            } else {
                tunaiFields.style.display = 'none';
                document.getElementById('jumlah_bayar').value = '';
                document.getElementById('kembalian').value = '';
            }
        }

        function hitungKembalian() {
            const totalHarga = <?php echo $booking['harga']; ?>;
            const jumlahBayar = parseFloat(document.getElementById('jumlah_bayar').value) || 0;
            const kembalian = jumlahBayar - totalHarga;

            document.getElementById('kembalian').value = kembalian >= 0 ? 'Rp ' + kembalian.toLocaleString('id-ID') : 'Nominal kurang!';
        }
    </script>
</head>
<body>
<div id="main">
    <div class="page-heading">
        <div class="page-title">
            <h3>Detail Booking</h3>
        </div>

        <section id="booking-detail">
            <div class="card">
                <div class="card-body">
                    <form action="<?php echo site_url('admin/booking/proses_pembayaran'); ?>" method="POST">
                        <div class="row">
                            <input type="hidden" name="id_booking" value="<?php echo $booking['id_booking']; ?>">
                            <input type="hidden" name="id_pelanggan" value="<?php echo $booking['id_pelanggan']; ?>">

                            <!-- Detail Booking -->
                            <div class="col-md-12 form-group">
                                <label>Nama Pelanggan:</label>
                                <input type="text" class="form-control" value="<?php echo $booking['nama']; ?>" readonly>
                            </div>
                            <div class="col-md-12 form-group">
                                <label>Total Harga:</label>
                                <input type="text" class="form-control" value="Rp <?php echo number_format($booking['harga'], 0, ',', '.'); ?>" readonly>
                                <input type="hidden" name="total_harga" value="<?php echo $booking['harga']; ?>">
                            </div>

                            <!-- Metode Pembayaran -->
                            <div class="col-md-12 form-group">
                                <label>Metode Pembayaran:</label>
                                <select id="metode_pembayaran" name="metode" class="form-control" onchange="togglePembayaran()">
                                    <option value="" disabled selected>Pilih Metode</option>
                                    <option value="tunai">Tunai</option>
                                    <option value="qris">QRIS</option>
                                </select>
                            </div>

                            <!-- Input untuk Tunai -->
                            <div id="tunai-fields" style="display: none;">
                                <div class="col-md-12 form-group">
                                    <label>Jumlah Bayar:</label>
                                    <input type="number" id="jumlah_bayar" name="jumlah_bayar" class="form-control" onkeyup="hitungKembalian()">
                                </div>
                                <div class="col-md-12 form-group">
                                    <label>Kembalian:</label>
                                    <input type="text" id="kembalian" name="kembalian" class="form-control" readonly>
                                </div>
                            </div>

                            <div class="col-12">
                                <a href="<?php echo site_url('admin/booking'); ?>" class="btn btn-secondary">Kembali</a>
                                <button type="submit" class="btn btn-primary">Proses Pembayaran</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </section>
    </div>
</div>
</body>
</html>
