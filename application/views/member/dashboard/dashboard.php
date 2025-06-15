<body>
    <div id="app"> 
        <div id="main">
            <header class="mb-3">
                <a href="#" class="burger-btn d-block d-xl-none">
                    <i class="bi bi-justify fs-3"></i>
                </a>
            </header>

            <div class="page-heading">
                <h3>Dashboard Member</h3>
            </div>
            <div class="page-content">
                <section class="row">
                    <div class="col-12 col-lg-9">
                        <div class="row">
                            <div class="col-6 col-lg-3 col-md-6">
                                <div class="card">
                                    <div class="card-body px-3 py-4-5">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="stats-icon purple">
                                                    <i class="iconly-boldDocument"></i>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
    <h6 class="text-muted font-semibold">Total Jam Main</h6>
    <h6 class="font-extrabold mb-0"><?php echo number_format($total_lapangan, 0, ',', '.'); ?></h6>
</div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 col-lg-3 col-md-6">
                                <div class="card">
                                    <div class="card-body px-3 py-4-5">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="stats-icon blue">
                                                    <i class="iconly-boldProfile"></i>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
    <h6 class="text-muted font-semibold">Frekuensi</h6>
    <h6 class="font-extrabold mb-0"><?php echo number_format($total_customers, 0, ',', '.'); ?></h6>
</div>

                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 col-lg-3 col-md-6">
                                <div class="card">
                                    <div class="card-body px-3 py-4-5">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="stats-icon green">
                                                    <i class="iconly-boldMessage"></i>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                            <h6 class="text-muted font-semibold">Total Booking</h6>
                                            <h6 class="font-extrabold mb-0"><?php echo number_format($total_booking, 0, ',', '.'); ?></h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-6 col-lg-3 col-md-6">
                                <div class="card">
                                    <div class="card-body px-3 py-4-5">
                                        <div class="row">
                                            <div class="col-md-4">
                                                <div class="stats-icon red">
                                                    <i class="iconly-boldBookmark"></i>
                                                </div>
                                            </div>
                                            <div class="col-md-8">
                                                <h6 class="text-muted font-semibold">Transaksi</h6>
                                                <h6 class="font-extrabold mb-0"><?php echo number_format($total_transaksi, 0, ',', '.'); ?></h6>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h4>Profile Visit</h4>
                                    </div>
                                    <div class="card-body">
                                        <canvas id="chart"></canvas>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                           
                            <div class="col-12 col-xl-12">
                                <section class="section">
                    <div class="card">
                        <div class="card-header">
                            Simple Datatable
                        </div>
                        <div class="card-body">
                            <table class="table table-striped" id="table1">
                                <thead>
                                    <tr>
                                        <th>Name</th>
                                        <th>Lapangan</th>
                                        <th>Tanggal Bermain</th>
                                        <th>Tanggal Booking</th>
                                        <th>Harga</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php foreach ($bookings as $row): ?>
                                     <tr>
                                                <td><?php echo $row['nama_pelanggan']; ?></td>
                                                <td><?php echo $row['nama_lapangan']; ?></td>
                                                <td><?php echo date('d-m-Y', strtotime($row['tgl_bermain'])); ?></td>
                                                <td><?php echo date('d-m-Y', strtotime($row['tgl_booking'])); ?></td>
                                            
                                                <td>Rp <?php echo number_format($row['harga'], 0, ',', '.'); ?></td>
                                                <td>
                                                    <span class="badge bg-<?php echo ($row['status'] == 'lunas') ? 'success' : 'danger'; ?>">
                                                        <?php echo ucfirst($row['status']); ?>
                                                    </span>
                                                </td>
                                                <?php endforeach; ?>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>

                </section>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-lg-3">
    <div class="card">
        <div class="card-body py-4 px-5">
            <div class="d-flex align-items-center">
                <div class="ms-3 name">
                    <h5 class="font-bold"><?php echo $this->session->userdata('user_name'); ?></h5>
                    <h6 class="text-muted mb-0"><?php echo $this->session->userdata('user_email'); ?></h6>
                    
                    <!-- Menampilkan Start Date dan End Date -->
                    <div class="mt-3">
                        <h6 class="text-muted mb-0">Start Date:</h6>
                        <p class="mb-0">
                            <?php echo isset($subscription_start_date) ? date('d-m-Y', strtotime($subscription_start_date)) : 'N/A'; ?>
                        </p>
                        
                        <h6 class="text-muted mt-2 mb-0">End Date:</h6>
                        <p>
                            <?php echo isset($subscription_end_date) ? date('d-m-Y', strtotime($subscription_end_date)) : 'N/A'; ?>
                        </p>
                        <h6 class="text-muted mt-2 mb-0">Jenis Plan :</h6>
<p>
<span class="badge bg-success"><?php echo isset($subscription_plan_name) ? $subscription_plan_name : 'N/A'; ?></span>
</p>

                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="card">
    <div class="card-header">
        <h4>Pelanggan Terbaru</h4>
    </div>
    <div class="card-content pb-4">
        <?php if (!empty($recent_customers)): ?>
            <?php foreach ($recent_customers as $customer): ?>
                <div class="recent-message d-flex px-4 py-3">
                    <div class="avatar avatar-lg">
                    </div>
                    <div class="name ms-4">
                        <h5 class="mb-1"><?php echo $customer['nama']; ?></h5>
                        <h6 class="text-muted mb-0">@<?php echo $customer['email']; ?></h6>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <p class="text-center mt-3 text-muted">Tidak ada pesan terbaru.</p>
        <?php endif; ?>
        <div class="px-4">
        <a href="<?php echo site_url('admin/pelanggan'); ?>" class="btn btn-block btn-xl btn-light-primary font-bold mt-3">
    Lihat Daftar Pelanggan
</a>

        </div>
    </div>
</div>

                        <div class="card">
                            <div class="card-header">
                                <h4>Visitors Profile</h4>
                            </div>
                            <div class="card-body">
                            <canvas id="chart2"></canvas>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>


        