<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Booking</title>
    <link rel="stylesheet" href="<?php echo base_url('assets/admin/dist/assets/css/bootstrap.css'); ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/admin/dist/assets/css/app.css'); ?>">
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
                    <h3>Form Edit Booking</h3>
                    <p class="text-subtitle text-muted">Halaman untuk mengedit data booking</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="<?php echo site_url('admin/booking'); ?>">Booking</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">
                                Edit Booking
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
                                <form action="<?php echo site_url('admin/booking/update_booking/' . $booking['id_booking']); ?>" method="post">
                                    <div class="row">
                                        <div class="col-md-12 col-12">
                                            <div class="form-group">
                                                <label for="id_pelanggan">Pelanggan:</label>
                                                <select id="id_pelanggan" class="form-control" name="id_pelanggan">
                                                    <?php foreach ($pelanggan as $p): ?>
                                                        <option value="<?php echo $p['id_pelanggan']; ?>" 
                                                            <?php echo $p['id_pelanggan'] == $booking['id_pelanggan'] ? 'selected' : ''; ?>>
                                                            <?php echo $p['nama']; ?>
                                                        </option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-12 col-12">
                                            <div class="form-group">
                                                <label for="id_lapangan">Lapangan:</label>
                                                <select id="id_lapangan" class="form-control" name="id_lapangan">
                                                    <?php foreach ($lapangan as $l): ?>
                                                        <option value="<?php echo $l['id_lapangan']; ?>" 
                                                            <?php echo $l['id_lapangan'] == $booking['id_lapangan'] ? 'selected' : ''; ?>>
                                                            <?php echo $l['nama']; ?>
                                                        </option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>


                                        <div class="col-md-12 col-12">
                                            <div class="form-group">
                                                <label for="tanggal_bermain">Tanggal Booking:</label>
                                                <input type="date" id="tanggal_bermain" class="form-control" 
                                                       name="tanggal_booking" value="<?php echo $booking['tgl_booking']; ?>" readonly>
                                            </div>
                                        </div>

                                        <div class="col-md-12 col-12">
                                            <div class="form-group">
                                                <label for="tanggal_bermain">Tanggal Bermain:</label>
                                                <input type="date" id="tanggal_bermain" class="form-control" 
                                                       name="tanggal_bermain" value="<?php echo $booking['tgl_bermain']; ?>">
                                            </div>
                                        </div>

                                        <div class="col-md-12 col-12">
                                            <div class="form-group">
                                                <label for="jam_awal">Jam Awal:</label>
                                                <input type="time" id="jam_awal" class="form-control" 
                                                       name="jam_awal" value="<?php echo $booking['jam_awal']; ?>">
                                                       <small class="text-muted">Masukkan waktu dalam format angka</small>
                                            </div>
                                        </div>

                                        <div class="col-md-12 col-12">
                                            <div class="form-group">
                                                <label for="jam_akhir">Jam Akhir:</label>
                                                <input type="time" id="jam_akhir" class="form-control" 
                                                       name="jam_akhir" value="<?php echo $booking['jam_akhir']; ?>">
                                                       <small class="text-muted">Masukkan waktu dalam format angka</small>
                                            </div>
                                            
                                        </div>

                                        <div class="col-md-12 col-12">
                                            <div class="form-group">
                                                <label for="harga">Harga:</label>
                                                <input type="number" id="harga" class="form-control" 
                                                       name="harga" value="<?php echo $booking['harga']; ?>">
                                            </div>
                                            
                                        </div>

                                        <div class="col-12 d-flex justify-content-end">
                                            <button type="submit" class="btn btn-primary me-1 mb-1">Simpan</button>
                                            <a href="<?php echo site_url('admin/booking'); ?>" class="btn btn-light-secondary me-1 mb-1">Kembali</a>
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
