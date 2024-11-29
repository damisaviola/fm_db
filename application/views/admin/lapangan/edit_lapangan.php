<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Lapangan</title>
    <link rel="stylesheet" href="<?php echo base_url('assets/admin/dist/assets/css/bootstrap.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/admin/dist/assets/css/app.css'); ?>">
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
                <div class="col-12 col-md-6">
                    <h3>Edit Lapangan</h3>
                    <p class="text-subtitle text-muted">Halaman untuk mengedit data lapangan</p>
                </div>
                <div class="col-12 col-md-6">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="<?php echo site_url('admin/lapangan'); ?>">Lapangan</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">Edit Lapangan</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>

        <section id="form-edit-lapangan">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <!-- Flash Messages -->
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
                            <form action="<?php echo site_url('admin/lapangan/update/' . $lapangan->id_lapangan); ?>" method="post" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col-md-12 col-12">
                                        <div class="form-group">
                                            <label for="nama">Nama Lapangan:</label>
                                            <input type="text" id="nama" class="form-control" name="nama" 
                                                value="<?php echo set_value('nama', $lapangan->nama); ?>" 
                                                placeholder="Masukkan nama lapangan">
                                        </div>
                                    </div>

                                    <div class="col-md-12 col-12">
                                        <div class="form-group">
                                            <label for="jenis">Jenis:</label>
                                            <input type="text" id="jenis" class="form-control" name="jenis" 
                                                value="<?php echo set_value('jenis', $lapangan->jenis); ?>" 
                                                placeholder="Masukkan jenis lapangan">
                                        </div>
                                    </div>

                                    <div class="col-md-12 col-12">
                                        <div class="form-group">
                                            <label for="harga">Harga:</label>
                                            <input type="number" id="harga" class="form-control" name="harga" 
                                                value="<?php echo set_value('harga', $lapangan->harga); ?>" 
                                                placeholder="Masukkan harga lapangan" min="0" >
                                            <small class="text-muted">Masukkan harga dalam format angka.</small>
                                        </div>
                                    </div>

                                    <div class="col-md-12 col-12">
                                            <div class="form-group">
                                                <label for="deskripsi">Deskripsi:</label>
                                                <textarea id="deskripsi" class="form-control" name="deskripsi" 
                                                placeholder="Masukkan deskripsi lapangan" rows="4"><?php echo set_value('deskripsi', $lapangan->deskripsi); ?></textarea>
                                            </div>
                                        </div>

                                    <div class="col-md-12 col-12">
                                        <div class="form-group">
                                            <label for="gambar">Gambar:</label><br>
                                            <img src="<?php echo base_url('uploads/lapangan/' . $lapangan->gambar); ?>" 
                                                 alt="Gambar Lapangan" width="150">
                                            <input type="file" id="gambar" name="gambar" class="form-control mt-2">
                                            <small class="text-muted">Format yang diperbolehkan: JPG, PNG, JPEG. Maksimal ukuran: 2MB.</small>
                                        </div>
                                    </div>

                                    <div class="col-12 d-flex justify-content-end">
                                        <button type="submit" class="btn btn-primary me-1 mb-1">Update</button>
                                        <a href="<?php echo site_url('admin/lapangan'); ?>" class="btn btn-secondary me-1 mb-1">Batal</a>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>
</body>
</html>
