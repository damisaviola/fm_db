<div id="sidebar" class="active">
    <div class="sidebar-wrapper active">
        <div class="sidebar-header">
            <div class="d-flex justify-content-between">
                <div class="logo">
                    <!-- Tambahkan logo di sini jika ada -->
                </div>
                <div class="toggler">
                    <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                </div>
            </div>
        </div>
        <div class="sidebar-menu">
            <ul class="menu">
                <li class="sidebar-title">Menu</li>

                <!-- Dashboard -->
                <li class="sidebar-item <?php echo (uri_string() == 'admin') ? 'active' : ''; ?>">
                    <a href="<?php echo site_url('admin'); ?>" class="sidebar-link">
                        <i class="bi bi-grid-fill"></i>
                        <span>Dashboard</span>
                    </a>
                </li>

                <!-- Pelanggan -->
                <li class="sidebar-item has-sub <?php echo (uri_string() == 'admin/pelanggan' || uri_string() == 'admin/input_pelanggan' || strpos(uri_string(), 'admin/pelanggan/edit_pelanggan') === 0) ? 'active' : ''; ?>">
                    <a href="#" class="sidebar-link">
                        <i class="bi bi-people-fill"></i>
                        <span>Pelanggan</span>
                    </a>
                    <ul class="submenu">
                        <li class="submenu-item <?php echo (uri_string() == 'admin/pelanggan') ? 'active' : ''; ?>">
                            <a href="<?php echo site_url('admin/pelanggan'); ?>">Daftar Pelanggan</a>
                        </li>
                        <li class="submenu-item <?php echo (uri_string() == 'admin/input_pelanggan') ? 'active' : ''; ?>">
                            <a href="<?php echo site_url('admin/input_pelanggan'); ?>">Input Pelanggan</a>
                        </li>
                    </ul>
                </li>

                <!-- Lapangan -->
                <li class="sidebar-item has-sub <?php echo (uri_string() == 'admin/lapangan' || uri_string() == 'admin/input_lapangan' || strpos(uri_string(), 'admin/edit_lapangan/') === 0) ? 'active' : ''; ?>">

                    <a href="#" class='sidebar-link'>
                        <i class="bi bi-collection-fill"></i>
                        <span>Lapangan</span>
                    </a>
                    <ul class="submenu">
                        <li class="submenu-item <?php echo (uri_string() == 'admin/lapangan') ? 'active' : ''; ?>">
                            <a href="<?php echo site_url('admin/lapangan'); ?>">Daftar Lapangan</a>
                        </li>
                        <li class="submenu-item <?php echo (uri_string() == 'admin/input_lapangan') ? 'active' : ''; ?>">
                            <a href="<?php echo site_url('admin/input_lapangan'); ?>">Input Lapangan</a>
                        </li>
                    </ul>
                </li>

                <!-- Booking -->
                <li class="sidebar-item has-sub <?php echo (uri_string() == 'admin/booking' || uri_string() == 'admin/input_booking' || strpos(uri_string(), 'admin/edit_halaman/')  === 0) ? 'active' : ''; ?>">
                <a href="#" class='sidebar-link'>
                        <i class="bi bi-grid-1x2-fill"></i>
                        <span>Booking</span>
                    </a>
                    <ul class="submenu">
                        <li class="submenu-item <?php echo (uri_string() == 'admin/booking') ? 'active' : ''; ?>">
                            <a href="<?php echo site_url('admin/booking'); ?>">Daftar Booking</a>
                        </li>
                        <li class="submenu-item <?php echo (uri_string() == 'admin/input_booking') ? 'active' : ''; ?>">
                            <a href="<?php echo site_url('admin/input_booking'); ?>">Input Booking</a>
                        </li>
                    </ul>
                </li>
                 

                <!-- Jadwal -->
                <li class="sidebar-item <?php echo (uri_string() == 'admin/jadwal') ? 'active' : ''; ?>">
                    <a href="<?php echo site_url('admin/jadwal'); ?>" class='sidebar-link'>
                        <i class="bi bi-file-earmark-medical-fill"></i>
                        <span>Jadwal</span>
                    </a>
                </li>

                <!-- Laporan -->
                <li class="sidebar-item <?php echo (uri_string() == 'admin/laporan') ? 'active' : ''; ?>">
                    <a href="<?php echo site_url('admin/laporan'); ?>" class='sidebar-link'>
                        <i class="bi bi-file-earmark-spreadsheet-fill"></i>
                        <span>Laporan</span>
                    </a>
                </li>

                <!-- Cek Kode Booking -->
                <li class="sidebar-item <?php echo (uri_string() == 'admin/cek_kode_booking') ? 'active' : ''; ?>">
                    <a href="<?php echo site_url('admin/cek_kode_booking'); ?>" class='sidebar-link'>
                        <i class="bi bi-search"></i>
                        <span>Cek Kode Booking</span>
                    </a>
                </li>

                <li class="sidebar-item <?php echo (uri_string() == 'admin/transaksi') ? 'active' : ''; ?>">
                    <a href="<?php echo site_url('admin/transaksi'); ?>" class='sidebar-link'>
                        <i class="bi bi-search"></i>
                        <span>Riwayat Transaksi</span>
                    </a>
                </li>

                <!-- Event -->
                <li class="sidebar-item has-sub <?php echo (uri_string() == 'admin/tour' || uri_string() == 'admin/tour/input_tour' || strpos(uri_string(), 'admin/edit_tour/') === 0) ? 'active' : ''; ?>">
                        <a href="#" class="sidebar-link">
                            <i class="bi bi-grid-1x2-fill"></i>
                            <span>Tour</span>
                        </a>
                        <ul class="submenu">
                            <li class="submenu-item 
                                <?php echo (uri_string() == 'admin/tour') ? 'active' : ''; ?>">
                                <a href="<?php echo site_url('admin/tour'); ?>">Daftar Tour</a>
                            </li>
                            <li class="submenu-item 
                                <?php echo (uri_string() == 'admin/tour/input_tour') ? 'active' : ''; ?>">
                                <a href="<?php echo site_url('admin/tour/input_tour'); ?>">Input Tour</a>
                            </li>
                        </ul>
                    </li>

                <li class="sidebar-title">Pengaturan</li>
                <!-- Akun -->
                <li class="sidebar-item <?php echo (uri_string() == 'admin/akun' || uri_string() == 'admin/edit_tour/') ? 'active' : ''; ?>">

                    <a href="<?php echo site_url('admin/akun'); ?>" class='sidebar-link'>
                        <i class="bi bi-pentagon-fill"></i>
                        <span>Akun</span>
                    </a>
                </li>

                <!-- Keluar -->
                <li class="sidebar-item">
                    <a href="#" class='sidebar-link' onclick="confirmLogout(event)">
                        <i class="bi bi-box-arrow-right"></i>
                        <span>Keluar</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
