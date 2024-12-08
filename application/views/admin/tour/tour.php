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
                    <h3>Daftar Tour</h3>
                    <p class="text-subtitle text-muted">Halaman untuk melihat data tour</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item active" aria-current="page">Tour</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>

        <section id="table-tour">
            <div class="row match-height">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <!-- Flash message -->
                            <a href="<?php echo site_url('admin/tour/export_csv'); ?>" class="btn btn-success mb-3">
                                <i class="bi bi-file-earmark-arrow-down"></i> Unduh Data Pelanggan (CSV)
                        </a>
                            <?php if ($this->session->flashdata('message')): ?>
                                <div class="alert alert-success">
                                    <?php echo $this->session->flashdata('message'); ?>
                                </div>
                            <?php endif; ?>
                            
                            <table class="table table-striped" id="table1">
                                <thead>
                                    <tr>
                                        <th>Nama Tour</th>
                                        <th>Tanggal Mulai</th>
                                        <th>Tanggal Selesai</th>
                                        <th>Deskripsi</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($tour as $row): ?>
                                        <tr>
                                            <td><?php echo $row['nama_tour']; ?></td>
                                            <td><?php echo date('d-m-Y', strtotime($row['tanggal_mulai'])); ?></td>
                                            <td><?php echo date('d-m-Y', strtotime($row['tanggal_selesai'])); ?></td>
                                            <td><?php echo $row['deskripsi_tour']; ?></td>
                                            <td>
                                                <a href="<?php echo site_url('admin/edit_tour/' . $row['id_tour']); ?>" 
                                                   class="btn btn-warning btn-sm" 
                                                   title="Edit">
                                                   <i class="fas fa-edit"></i> <!-- Ikon Edit -->
                                                </a>

                                                <a href="#" 
                                                   class="btn btn-danger btn-sm btn-hapus" 
                                                   data-id="<?php echo $row['id_tour']; ?>" 
                                                   data-nama="<?php echo $row['nama_tour']; ?>" 
                                                   title="Hapus">
                                                   <i class="fas fa-trash"></i> <!-- Ikon Hapus -->
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
