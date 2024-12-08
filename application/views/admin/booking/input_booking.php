<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input Booking</title>
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
                    <h3>Form Input Booking</h3>
                    <p class="text-subtitle text-muted">Halaman untuk input data booking</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="<?php echo site_url('booking'); ?>">Booking</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">
                                Input Booking
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
                                <form action="<?php echo site_url('admin/booking/create'); ?>" method="post">
                                    <div class="row">
                                        <div class="col-md-12 col-12">
                                            <div class="form-group">
                                                <label for="id_pelanggan">Pelanggan:</label>
                                                <select id="id_pelanggan" class="form-control" name="id_pelanggan" >
                                                    <option value="" disabled selected>Pilih Pelanggan</option>
                                                    <?php foreach ($pelanggan as $p): ?>
                                                        <option value="<?php echo $p['id_pelanggan']; ?>">
                                                            <?php echo $p['nama']; ?>
                                                        </option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-12 col-12">
                                            <div class="form-group">
                                                <label for="id_lapangan">Lapangan:</label>
                                                <select id="id_lapangan" class="form-control" name="id_lapangan" >
                                                    <option value="" disabled selected>Pilih Lapangan</option>
                                                    <?php foreach ($lapangan as $l): ?>
                                                        <option value="<?php echo $l['id_lapangan']; ?>">
                                                            <?php echo $l['nama']; ?>
                                                        </option>
                                                    <?php endforeach; ?>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-md-12 col-12">
                                            <div class="form-group">
                                                <label for="tanggal_booking">Tanggal Booking:</label>
                                                <input type="date" id="tanggal_booking" class="form-control" 
                                                    name="tanggal_booking" readonly>
                                            </div>
                                        </div>

                                        <div class="col-md-12 col-12">
                                            <div class="form-group">
                                                <label for="tanggal_bermain">Tanggal Bermain:</label>
                                                <input type="date" id="tanggal_bermain" class="form-control" name="tanggal_bermain" >
                                                <small class="text-muted">Masukkan tanggal bermain dalam format time</small>
                                            </div>
                                        </div>

                                        <div class="col-md-12 col-12">
                                            <div class="form-group">
                                                <label for="jam_awal">Jam Awal:</label>
                                                <input type="time" id="jam_awal" class="form-control" name="jam_awal" >
                                                <small class="text-muted">Masukkan tanggal bermain dalam format time</small>
                                            </div>
                                        </div>

                                        <div class="col-md-12 col-12">
                                            <div class="form-group">
                                                <label for="jam_akhir">Jam Akhir:</label>
                                                <input type="time" id="jam_akhir" class="form-control" name="jam_akhir">
                                                <small class="text-muted">Masukkan waktu dalam format time</small>
                                            </div>
                                        </div>

                                        <div class="col-md-12 col-12">
                                            <div class="form-group">
                                                <label for="harga">Harga:</label>
                                                <input type="number" id="harga" class="form-control" placeholder="Harga" name="harga" >
                                                <small class="text-muted">Masukkan waktu dalam format angka</small>
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


<script>
    document.addEventListener('DOMContentLoaded', function () {
        const tanggalBooking = document.getElementById('tanggal_booking');
        const today = new Date();
        const year = today.getFullYear();
        const month = String(today.getMonth() + 1).padStart(2, '0'); 
        const day = String(today.getDate()).padStart(2, '0');
        tanggalBooking.value = `${year}-${month}-${day}`;
    });
</script>

