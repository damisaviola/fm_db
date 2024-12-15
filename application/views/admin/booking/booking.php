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
                    <h3>Daftar Pemesanan</h3>
                    <p class="text-subtitle text-muted">Halaman untuk melihat laporan transaksi pembayaran</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item active" aria-current="page">Daftar Pemesanan</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>

        <!-- Laporan Tabel -->
        <section id="table-laporan">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Daftar Pemesanan</h4>
                        </div>
                        <div class="card-body">
                        <a href="<?php echo site_url('admin/booking/export_csv'); ?>" class="btn btn-success mb-3">
                                <i class="bi bi-file-earmark-arrow-down"></i> Unduh Data Pelanggan (CSV)
                        </a>

                        <?php if ($this->session->flashdata('message')): ?>
                                    <div class="alert alert-success">
                                        <?php echo $this->session->flashdata('message'); ?>
                                    </div>
                                <?php endif; ?>
                            <!-- Tabel Laporan -->
                            <div class="table-responsive">
                            <table class="table table-striped" id="table1">
                                    <thead>
                                        <tr>
                                            <th>Nama Pelanggan</th>
                                            <th>Nama Lapangan</th>
                                            <th>Tanggal Bermain</th>
                                            <th>Tanggal Booking</th>
                                            <th>Jam Awal</th>
                                            <th>Jam Akhir</th>
                                            <th>Harga</th>
                                            <th>Status</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($bookings as $row): ?>
                                            <tr>
                                                <td><?php echo $row['nama_pelanggan']; ?></td>
                                                <td><?php echo $row['nama_lapangan']; ?></td>
                                                <td><?php echo date('d-m-Y', strtotime($row['tgl_bermain'])); ?></td>
                                                <td><?php echo date('d-m-Y', strtotime($row['tgl_booking'])); ?></td>
                                                <td><?php echo $row['jam_awal']; ?></td>
                                                <td><?php echo $row['jam_akhir']; ?></td>
                                                <td>Rp <?php echo number_format($row['harga'], 0, ',', '.'); ?></td>
                                                <td>
                                                    <span class="badge bg-<?php echo ($row['status'] == 'lunas') ? 'success' : 'danger'; ?>">
                                                        <?php echo ucfirst($row['status']); ?>
                                                    </span>
                                                </td>
                                                <td>
                                                    <a href="<?php echo site_url('admin/edit_halaman/' . $row['id_booking']); ?>" 
                                                       class="btn btn-warning btn-sm" title="Edit">
                                                        <i class="bi bi-pencil-square"></i>
                                                    </a>
                                                    <a href="#" 
                                                       class="btn btn-danger btn-sm btn-hapus" 
                                                       data-id="<?php echo $row['id_booking']; ?>" 
                                                       data-nama="<?php echo $row['nama_pelanggan']; ?>" 
                                                       title="Hapus">
                                                        <i class="bi bi-trash"></i>
                                                    </a>
                                                    
                                                    <!-- Pay Button with JavaScript Check -->
                                                    <?php if ($row['status'] == 'lunas'): ?>
                                                        <button class="btn btn-success btn-sm" 
                                                                title="Bayar" disabled>
                                                            <i class="bi bi-wallet2"></i> 
                                                        </button>
                                                    <?php else: ?>
                                                        <a href="<?php echo site_url('admin/booking/pay/' . $row['id_booking']); ?>" 
                                                           class="btn btn-success btn-sm" title="Bayar">
                                                            <i class="bi bi-wallet2"></i>
                                                        </a>
                                                    <?php endif; ?>
                                                    
                                                    <a href="<?php echo site_url('admin/booking/cetak/' . $row['id_booking']); ?>" 
                                                       class="btn btn-info btn-sm" target="_blank" title="Cetak PDF">
                                                        <i class="bi bi-printer"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                            <!-- End Tabel -->
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
