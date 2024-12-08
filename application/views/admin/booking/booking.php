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
                    <h3>Daftar Booking</h3>
                    <p class="text-subtitle text-muted">Halaman untuk melihat daftar booking</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item active" aria-current="page">Booking</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>

        <section id="table-booking">
            <div class="row match-height">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                       

<a href="<?php echo site_url('admin/booking/export_csv'); ?>" class="btn btn-success mb-3">
                                <i class="bi bi-file-earmark-arrow-down"></i> Unduh Data Lapangan (CSV)
                        </a>

                            <!-- Flash Message -->
                            <?php if ($this->session->flashdata('message')): ?>
    <div class="alert alert-success">
        <?php echo $this->session->flashdata('message'); ?>
    </div>
<?php endif; ?>

<?php if ($this->session->flashdata('error')): ?>
    <div class="alert alert-danger">
        <?php echo $this->session->flashdata('error'); ?>
    </div>
<?php endif; ?>


                            <table class="table table-striped" id="table1">
                                <thead>
                                    <tr>
                                        <th>Nama Pelanggan</th>
                                        <th>Lapangan</th>
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
                                                <span class="badge bg-<?php echo $row['status'] == 'lunas' ? 'success' : 'danger'; ?>">
                                                    <?php echo ucfirst($row['status']); ?>
                                                </span>
                                            </td>
                                            <td>
                                            <a href="<?php echo site_url('admin/edit_halaman/' . $row['id_booking']); ?>" 
                                                class="btn btn-warning btn-sm">
                                                <i class="fas fa-edit"></i> <!-- Icon untuk Edit -->
                                                </a>

                                                <a href="#" 
                                                    class="btn btn-danger btn-sm btn-hapus" 
                                                    data-id="<?php echo $row['id_booking']; ?>" 
                                                    data-nama="<?php echo $row['nama_pelanggan']; ?>">
                                                    <i class="fas fa-trash"></i> 
                                                    </a>

                                                
                                        <a href="<?php echo site_url('admin/booking/pay/' . $row['id_booking']); ?>" 
                                        class="btn btn-success btn-sm">
                                            <i class="bi bi-wallet2"></i> 
                                        </a>

                                        <a href="<?php echo site_url('admin/booking/cetak/' . $row['id_booking']); ?>" 
                    class="btn btn-info btn-sm" target="_blank">
                    <i class="bi bi-printer"></i> 
                </a>
 
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





