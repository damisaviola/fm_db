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
                    <h3>Jadwal</h3>
                    <p class="text-subtitle text-muted">Halaman untuk melihat Jadwal</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item active" aria-current="page">Jadwal</li>
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
                                        <th>ID Booking</th>
                                        <th>Tanggal Bermain</th>
                                        <th>ID Lapangan</th>
                                        <th>Jam Awal</th>
                                        <th>Jam Akhir</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($jadwal as $row): ?>
                                        <tr>
                                            <td><?php echo $row->id_booking; ?></td>
                                            <td><?php echo $row->tgl_bermain; ?></td>
                                            <td><?php echo $row->id_lapangan; ?></td>
                                            <td><?php echo $row->jam_awal; ?></td>
                                            <td><?php echo $row->jam_akhir; ?></td>
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
