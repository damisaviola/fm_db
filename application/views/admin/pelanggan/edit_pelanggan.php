<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Pelanggan</title>
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
                    <h3>Form Edit Pelanggan</h3>
                    <p class="text-subtitle text-muted">Halaman untuk mengedit data pelanggan</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="<?php echo site_url('admin/pelanggan'); ?>">Pelanggan</a>
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
                                <form action="<?php echo site_url('admin/pelanggan/update/' . $pelanggan['id_pelanggan']); ?>" method="post">
                                    <div class="row">
                                        <div class="col-md-12 col-12">
                                            <div class="form-group">
                                                <label for="nama">Nama Pelanggan:</label>
                                                <input type="text" id="nama" class="form-control" name="nama" 
                                                       placeholder="Nama pelanggan" value="<?php echo set_value('nama', $pelanggan['nama']); ?>">
                                            </div>
                                        </div>

                                        <div class="col-md-12 col-12">
                                            <div class="form-group">
                                                <label for="email">Email:</label>
                                                <input type="email" id="email" class="form-control" name="email" 
                                                       placeholder="Email" value="<?php echo set_value('email', $pelanggan['email']); ?>">
                                            </div>
                                        </div>

                                        <div class="col-md-12 col-12">
                                            <div class="form-group">
                                                <label for="nomor_hp">No Handphone:</label>
                                                <input type="tel" id="nomor_hp" class="form-control" name="nomor_hp" 
                                                       placeholder="No Handphone"
                                                       value="<?php echo set_value('nomor_hp', $pelanggan['nomor_hp']); ?>">
                                            </div>
                                        </div>

                                        <div class="col-md-12 col-12">
                                            <div class="form-group">
                                                <label for="alamat">Alamat:</label>
                                                <textarea id="alamat" class="form-control" name="alamat" 
                                                          placeholder="Masukkan alamat lengkap" rows="4"><?php echo set_value('alamat', $pelanggan['alamat']); ?></textarea>
                                            </div>
                                        </div>

                                        <div class="col-12 d-flex justify-content-end">
                                            <button type="submit" class="btn btn-primary me-1 mb-1">Simpan Perubahan</button>
                                            <a href="<?php echo site_url('admin/pelanggan'); ?>" class="btn btn-light-secondary me-1 mb-1">Batal</a>
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
