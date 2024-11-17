<style>
        .form-group {
            margin-bottom: 1.5rem; /* Menambahkan gap antar elemen form */
        }

       

        .btn {
            margin-top: 1rem; /* Memberi jarak antara tombol dan input terakhir */
        }
    </style>

<div id="main">
    <!-- Header Section -->
    <header class="mb-3">
        <a href="#" class="burger-btn d-block d-xl-none">
            <i class="bi bi-justify fs-3"></i>
        </a>
    </header>

    <!-- Page Title Section -->
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <!-- Title and Subtitle -->
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Form Input Pelanggan</h3>
                    <p class="text-subtitle text-muted">Halaman untuk  input pelanggan</p>
                </div>
                
                <!-- Breadcrumb Navigation -->
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="<?php echo site_url('pelanggan'); ?>">Pelanggan</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">
                                Input Pelanggan
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>

        <!-- Form Section -->
        <section id="multiple-column-form">
                    <div class="row match-height">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-content">
                                    <div class="card-body">
                                        <form class="form">
                                            <div class="row">
                                                <div class="col-md-12 col-12">
                                                    <div class="form-group">
                                                        <label for="first-name-column">Nama Pelanggan : </label>
                                                        <input type="text" id="first-name-column" class="form-control"
                                                            placeholder="Nama pelanggan" name="nama_pelanggan">
                                                    </div>
                                                </div>
                                                <div class="col-md-12 col-12">
                                                    <div class="form-group">
                                                        <label for="email-id-column">Email : </label>
                                                        <input type="email" id="email-id-column" class="form-control"
                                                            name="email" placeholder="Email">
                                                    </div>
                                                </div>
                                                <div class="col-md-12 col-12">
                                                        <div class="form-group">
                                                            <label for="no_hp">No Handphone:</label>
                                                            <input type="tel" id="no_hp" class="form-control" name="no_hp" placeholder="No Handphone" 
                                                                pattern="^(\+62|62|08)[0-9]{8,13}$" required
                                                                title="Masukkan nomor handphone valid yang dimulai dengan +62, 62, atau 08 dan terdiri dari 9-13 digit angka.">
                                                        </div>
                                                    </div>

                                                <div class="col-md-12 col-12">
                                                    <div class="form-group">
                                                        <label for="alamat">Alamat:</label>
                                                        <textarea id="alamat" class="form-control" name="alamat" placeholder="Masukkan alamat lengkap" rows="4"></textarea>
                                                    </div>
                                                </div>

                                                <div class="col-12 d-flex justify-content-end">
                                                    <button type="submit"
                                                        class="btn btn-primary me-1 mb-1">Submit</button>
                                                    <button type="reset"
                                                        class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!-- // Basic multiple Column Form section end -->
            </div>



