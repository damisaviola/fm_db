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
    
    <?php if (uri_string() == 'admin/pelanggan' || uri_string() == 'admin/lapangan' || uri_string() == 'admin/tour'): ?>
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



<script>
    document.addEventListener('DOMContentLoaded', function () {
     
        const btnHapus = document.querySelectorAll('.btn-hapus');

       
        btnHapus.forEach(function (button) {
            button.addEventListener('click', function (event) {
                event.preventDefault();  
                
               
                const tourId = this.getAttribute('data-id');
                const namaTour = this.getAttribute('data-nama');

              
                Swal.fire({
                    title: 'Apakah Anda yakin?',
                    text: `Data tour "${namaTour}" akan dihapus secara permanen!`,
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33', 
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Ya, Hapus!',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                       
                        window.location.href = `<?php echo site_url('admin/tour/hapus/'); ?>${tourId}`;
                    }
                });
            });
        });
    });
</script>





   

</body>
</html>

