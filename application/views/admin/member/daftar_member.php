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
                    <h3>Membership</h3>
                    <p class="text-subtitle text-muted">Halaman untuk melihat membership</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item active" aria-current="page">Membership</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        
        

        <section id="table-pelanggan">
            <div class="row match-height">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                        <a href="<?php echo site_url('admin/pelanggan/export_csv'); ?>" class="btn btn-success mb-3">
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
                                        <th>Nama</th>
                                        <th>No Hp</th>
                                        <th>Email</th>
                                        <th>Alamat</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
    <?php foreach ($pelanggan as $row): ?>
        <tr>
            <td><?php echo $row['nama']; ?></td>
            <td><?php echo $row['nomor_hp']; ?></td>
            <td><?php echo $row['email']; ?></td>
            <td><?php echo $row['alamat']; ?></td>
            <td>
                    <a href="<?php echo site_url('admin/pelanggan/edit_pelanggan/' . $row['id_pelanggan']); ?>" 
                    class="btn btn-warning btn-sm" 
                    title="Edit">
                    <i class="fas fa-edit"></i>
                    </a>

                    <a href="#" 
                    class="btn btn-danger btn-sm btn-hapus" 
                    data-id="<?php echo $row['id_pelanggan']; ?>" 
                    data-nama="<?php echo $row['nama']; ?>" 
                    title="Hapus">
                    <i class="fas fa-trash"></i>
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



