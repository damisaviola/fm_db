<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Tour</title>
    <link rel="stylesheet" href="<?php echo base_url('assets/admin/dist/assets/css/bootstrap.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/admin/dist/assets/css/app.css'); ?>">
    <link rel="icon" type="image/png" sizes="32x32" href="<?php echo base_url('assets/home/favicon-32x32.png'); ?>"> <!-- ini icon title --->
    <style>
        .form-group {
            margin-bottom: 1.5rem; 
        }
        .btn {
            margin-top: 1rem; 
        }
    </style>
</head>
<body>
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
                    <h3>Form Edit tour</h3>
                    <p class="text-subtitle text-muted">Halaman untuk mengedit data tour</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="<?php echo site_url('admin/tour'); ?>">Tour</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">
                                Edit Pelanggan
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>

    <section id="multiple-column-form">
        <div class="row match-height">
            <div class="col-12">
                <div class="card">
                    <div class="card-content">
                        <div class="card-body">
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

                            <?php echo validation_errors('<div class="alert alert-danger">', '</div>'); ?>

                            <!-- Form -->
                            <form action="<?php echo site_url('admin/tour/update/' . $tour['id_tour']); ?>" method="post">
                                <div class="row">
                                    <div class="col-md-12 col-12">
                                        <div class="form-group">
                                            <label for="nama_tour">Nama Tour:</label>
                                            <input type="text" id="nama_tour" class="form-control" name="nama_tour" 
                                                   placeholder="Nama Tour" value="<?php echo set_value('nama_tour', $tour['nama_tour']); ?>">
                                        </div>
                                    </div>

                                    <div class="col-md-12 col-12">
                                        <div class="form-group">
                                            <label for="tanggal_mulai">Tanggal Mulai:</label>
                                            <input type="date" id="tanggal_mulai" class="form-control" name="tanggal_mulai" 
                                            value="<?php echo set_value('tanggal_mulai', date('Y-m-d', strtotime($tour['tanggal_mulai']))); ?>">
                                        </div>
                                    </div>

                                    <div class="col-md-12 col-12">
                                        <div class="form-group">
                                            <label for="tanggal_selesai">Tanggal Selesai:</label>
                                            <input type="date" id="tanggal_selesai" class="form-control" name="tanggal_selesai" 
                                            value="<?php echo set_value('tanggal_selesai', date('Y-m-d', strtotime($tour['tanggal_selesai']))); ?>">
                                        </div>
                                    </div>

                                    <div class="col-md-12 col-12">
                                        <div class="form-group">
                                            <label for="deskripsi_tour">Deskripsi:</label>
                                            <textarea id="deskripsi_tour" class="form-control" name="deskripsi_tour" 
                                                      placeholder="Deskripsi Tour" rows="4"><?php echo set_value('deskripsi_tour', $tour['deskripsi_tour']); ?></textarea>
                                        </div>
                                    </div>

                                    <div class="col-12 d-flex justify-content-end">
                                        <button type="submit" class="btn btn-primary me-1 mb-1">Simpan Perubahan</button>
                                        <a href="<?php echo site_url('admin/tour'); ?>" class="btn btn-light-secondary me-1 mb-1">Batal</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
</body>
</html>
