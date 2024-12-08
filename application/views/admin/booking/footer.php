<footer>
                <div class="footer clearfix mb-0 text-muted">
                    <div class="float-start">
                    </div>
                    <div class="float-end">
                       
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="<?php echo base_url('assets/admin/dist/assets/vendors/perfect-scrollbar/perfect-scrollbar.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/admin/dist/assets/js/bootstrap.bundle.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/admin/dist/assets/vendors/simple-datatables/simple-datatables.js'); ?>"></script>
    
    
    <?php if (uri_string() == 'admin/pelanggan' || uri_string() == 'admin/lapangan' ||  uri_string() == 'admin/booking' ): ?>
    <script>
        let table1 = document.querySelector('#table1');
        let dataTable = new simpleDatatables.DataTable(table1);
    </script>
<?php endif; ?>

    <script src="<?php echo base_url('assets/admin/dist/assets/js/main.js'); ?>"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
    function confirmLogout(event) {
        event.preventDefault(); 
        Swal.fire({
            title: 'Apakah Anda yakin?',
            text: "Anda akan keluar dari sesi ini!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d31',
            confirmButtonText: 'Ya, keluar',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = "<?php echo site_url('auth/login/logout'); ?>";
            }
        });
    }
</script>


<?php if (uri_string() == 'admin/booking'): ?>
<script>
    // SweetAlert2 konfirmasi hapus data booking
    document.addEventListener('DOMContentLoaded', function () {
        // Pilih semua tombol dengan class btn-hapus
        const btnHapus = document.querySelectorAll('.btn-hapus');

        // Tambahkan event listener ke setiap tombol
        btnHapus.forEach(function (button) {
            button.addEventListener('click', function (event) {
                event.preventDefault(); // Mencegah aksi default tombol (navigasi langsung)

                // Ambil data-id, data-nama, dan user_id dari atribut tombol atau PHP session
                const bookingId = this.getAttribute('data-id');
                const pelangganNama = this.getAttribute('data-nama');
                const userId = "<?php echo $this->session->userdata('user_id'); ?>";

                // Tampilkan SweetAlert2 untuk konfirmasi
                Swal.fire({
                    title: 'Apakah Anda yakin?',
                    text: `Data booking untuk "${pelangganNama}" akan dihapus secara permanen!`,
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33', // Warna tombol konfirmasi
                    cancelButtonColor: '#3085d6', // Warna tombol batal
                    confirmButtonText: 'Ya, Hapus!',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        // Jika dikonfirmasi, arahkan ke URL hapus dengan id_booking dan user_id
                        window.location.href = `<?php echo site_url('admin/booking/hapus_booking/'); ?>${bookingId}?user_id=${userId}`;
                    }
                });
            });
        });
    });
</script>
<?php endif; ?>







   

</body>
</html>

