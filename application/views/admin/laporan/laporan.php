<div id="main">
        <header class="mb-3">
            <a href="#" class="burger-btn d-block d-xl-none">
                <i class="bi bi-justify fs-3"></i>
            </a>
        </header>

        <div class="page-heading">
            <div class="page-title mb-4">
                <div class="row">
                    <div class="col-12 col-md-6 order-md-1 order-last">
                        <h3 class="text-center">Laporan Pembayaran</h3>
                        <p class="text-center text-muted">Halaman untuk melihat laporan transaksi pembayaran</p>
                    </div>
                    <div class="col-12 col-md-6 order-md-2 order-first">
                        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item active" aria-current="page">Laporan Pembayaran</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
            
            <!-- Form untuk Filter Tanggal -->
            <form action="<?php echo site_url('admin/laporan'); ?>" method="GET" class="mb-4">
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
            
            <!-- Tabel Laporan Pembayaran -->
            <section id="table-laporan">
                <div class="row match-height">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                
                                <!-- Flash message -->
                                <?php if ($this->session->flashdata('message')): ?>
                                    <div class="alert alert-success">
                                        <?php echo $this->session->flashdata('message'); ?>
                                    </div>
                                <?php endif; ?>

                                <a href="<?php echo site_url('admin/pelanggan/export_csv'); ?>" class="btn btn-success mb-3">
                                <i class="bi bi-file-earmark-arrow-down"></i> Unduh Laporan (CSV)
                        </a>

                                <div class="table-responsive">
                                    <table class="table table-striped" id="table1">
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
                                </div>
                                
                                <!-- Total Pemasukan -->
                                <h5>Total Pemasukan: Rp <?php echo number_format($total_pemasukan, 0, ',', '.'); ?></h5>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>