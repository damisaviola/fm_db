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
                    <h3>Daftar Lapangan</h3>
                    <p class="text-subtitle text-muted">Halaman untuk melihat daftar lapangan</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item active" aria-current="page">Lapangan</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        
        <section id="table-lapangan">
            <div class="row match-height">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                        <a href="<?php echo site_url('admin/lapangan/export_csv'); ?>" class="btn btn-success mb-3">
                                <i class="bi bi-file-earmark-arrow-down"></i> Unduh Data Lapangan (CSV)
                        </a>
                        <?php if ($this->session->flashdata('message')): ?>
                                    <div class="alert alert-success">
                                        <?php echo $this->session->flashdata('message'); ?>
                                    </div>
                                <?php endif; ?>
                                <table class="table table-striped" id="table1">
                <thead>
                    <tr>
                        <th>Nama Lapangan</th>
                        <th>Jenis</th>
                        <th>Harga</th>
                        <th>Deskripsi</th>
                        <th>Gambar</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                    <tbody>
                        <?php foreach ($lapangan as $row): ?>
                        <tr>
                            <td><?php echo $row['nama']; ?></td>
                            <td><?php echo $row['jenis']; ?></td>
                            <td><?php echo $row['harga']; ?></td>
                            <td><?php echo $row['deskripsi']; ?></td>
                            <td>
                                <?php if ($row['gambar']): ?>
                                    <img src="<?php echo base_url('uploads/lapangan/' . $row['gambar']); ?>" alt="Gambar Lapangan" width="100">
                                <?php else: ?>
                                    <span>Gambar Tidak Tersedia</span>
                                <?php endif; ?>
                            </td>
                            <td>
                                <a href="<?php echo site_url('admin/edit_lapangan/' . $row['id_lapangan']); ?>" 
                                class="btn btn-warning btn-sm" 
                                title="Edit">
                                <i class="fas fa-edit"></i>
                                </a>

                                <button 
                                class="btn btn-danger btn-sm btn-hapus" 
                                data-id="<?php echo $row['id_lapangan']; ?>" 
                                data-nama="<?php echo $row['nama']; ?>" 
                                data-gambar="<?php echo $row['gambar']; ?>" 
                                data-user-id="<?php echo $user_id; ?>" 
                                title="Hapus">
                                <i class="fas fa-trash"></i>
                            </button>

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

                <?php if ($this->uri->segment(2) == 'lapangan') : ?>
    <script>
    document.addEventListener('DOMContentLoaded', function () {

        document.querySelectorAll('.btn-hapus').forEach(button => {
            button.addEventListener('click', function () {
                const id = this.getAttribute('data-id');
                const nama = this.getAttribute('data-nama');
                const gambar = this.getAttribute('data-gambar');
                const userId = this.getAttribute('data-user-id');  // Mendapatkan user_id

                Swal.fire({
                    title: 'Apakah Anda yakin?',
                    text: `Data lapangan "${nama}" beserta gambarnya (${gambar}) akan dihapus secara permanen.`,
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Ya, hapus!',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Mengirimkan dua parameter (id_lapangan dan user_id)
                        window.location.href = '<?= site_url('admin/lapangan/hapus/') ?>' + id + '/' + userId;
                    }
                });
            });
        });
    });
    </script>
<?php endif; ?>

