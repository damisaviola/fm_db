<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input Lapangan</title>
    <link rel="stylesheet" href="<?php echo base_url('assets/admin/dist/assets/css/bootstrap.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/admin/dist/assets/css/app.css'); ?>">
    <style>
        .form-group {
            margin-bottom: 1.5rem; /* Menambahkan gap antar elemen form */
        }

        .btn {
            margin-top: 1rem; /* Memberi jarak antara tombol dan input terakhir */
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
                    <h3>Form Input Lapangan</h3>
                    <p class="text-subtitle text-muted">Halaman untuk input data lapangan</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="<?php echo site_url('admin/lapangan'); ?>">Lapangan</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">
                                Input Lapangan
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
                                <form action="<?php echo site_url('admin/lapangan/tambah'); ?>" method="post" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col-md-12 col-12">
                                            <div class="form-group">
                                                <label for="nama">Nama Lapangan:</label>
                                                <input type="text" id="nama" class="form-control" name="nama" 
                                                    placeholder="Masukkan nama lapangan" value="<?php echo set_value('nama'); ?>">
                                            </div>
                                        </div>

                                        <div class="col-md-12 col-12">
                                            <div class="form-group">
                                                <label for="gambar">Gambar:</label>
                                                <input type="file" id="gambar" class="form-control" name="gambar" accept="image/*">
                                                <small class="text-muted">Format yang diperbolehkan: JPG, PNG, JPEG. Maksimal ukuran: 2MB.</small>
                                            </div>
                                        </div>

                                        <div class="col-md-12 col-12">
                                            <div class="form-group">
                                                <label for="jenis">Jenis:</label>
                                                <input type="text" id="jenis" class="form-control" name="jenis" 
                                                    placeholder="Masukkan jenis lapangan" value="<?php echo set_value('jenis'); ?>">
                                            </div>
                                        </div>

                                        <div class="col-md-12 col-12">
                                            <div class="form-group">
                                                <label for="harga">Harga:</label>
                                                <input type="number" id="harga" class="form-control" name="harga" 
                                                    placeholder="Masukkan harga lapangan" value="<?php echo set_value('harga'); ?>" min="0">
                                                <small class="text-muted">Masukkan harga dalam format angka.</small>
                                            </div>
                                        </div>

                                        <div class="col-md-12 col-12">
                                            <div class="form-group">
                                                <label for="deskripsi">Deskripsi:</label>
                                                <textarea id="deskripsi" class="form-control" name="deskripsi" 
                                                        placeholder="Masukkan deskripsi lapangan" rows="4"><?php echo set_value('deskripsi'); ?></textarea>
                                            </div>
                                        </div>

                                        <div class="col-12 d-flex justify-content-end">
                                            <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                                            <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
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
</div>
</body>
</html>
