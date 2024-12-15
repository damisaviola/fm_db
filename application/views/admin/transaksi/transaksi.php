<div id="main">
    <header class="mb-3">
        <a href="#" class="burger-btn d-block d-xl-none">
            <i class="bi bi-justify fs-3"></i>
        </a>
    </header>

    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Riwayat Transaksi</h3>
                    <p class="text-subtitle text-muted">Halaman untuk melihat riwayat transaksi pembayaran</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item active" aria-current="page">Riwayat Transaksi</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>

        <section id="table-transaksi">
            <div class="row match-height">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">

                            <!-- Flash Message -->
                            <?php if ($this->session->flashdata('message')): ?>
                                <div class="alert alert-success">
                                    <?php echo $this->session->flashdata('message'); ?>
                                </div>
                            <?php endif; ?>

                            <!-- Tabel Riwayat Transaksi -->
                            <table class="table table-striped" id="table1">
                                <thead>
                                    <tr>
                                        <th>ID Pembayaran</th>
                                        <th>ID Booking</th>
                                        <th>ID Pelanggan</th>
                                        <th>Total Harga</th>
                                        <th>Metode Pembayaran</th>
                                        <th>Jumlah Bayar</th>
                                        <th>Kembalian</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($transaksi as $row): ?>
                                        <tr>
                                            <td><?php echo $row['id_pembayaran']; ?></td>
                                            <td><?php echo $row['id_booking']; ?></td>
                                            <td><?php echo $row['id_pelanggan']; ?></td>
                                            <td>Rp <?php echo number_format($row['total_harga'], 0, ',', '.'); ?></td>
                                            <td><?php echo ucfirst($row['metode']); ?></td>
                                            <td>Rp <?php echo number_format($row['jumlah_bayar'], 0, ',', '.'); ?></td>
                                            <td>Rp <?php echo number_format($row['kembalian'], 0, ',', '.'); ?></td>
                                            <td>
                                                <a href="<?php echo site_url('admin/transaksi/cetak/' . $row['id_pembayaran']); ?>" 
                                                   class="btn btn-info btn-sm" target="_blank">
                                                    <i class="bi bi-printer"></i> Cetak
                                                </a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
