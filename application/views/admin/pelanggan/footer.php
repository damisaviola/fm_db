<footer>
                <div class="footer clearfix mb-0 text-muted">
                    <div class="float-start">
                        <p>2024 &copy; FutsalMate.</p>
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
    
    <?php if (uri_string() == 'pelanggan'): ?>
    <script>
        let table1 = document.querySelector('#table1');
        let dataTable = new simpleDatatables.DataTable(table1);
    </script>
    <?php endif; ?>
    <script src="<?php echo base_url('assets/admin/dist/assets/js/main.js'); ?>"></script>
    
</body>

</html>

