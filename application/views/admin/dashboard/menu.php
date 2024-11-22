<div id="sidebar" class="active">
            <div class="sidebar-wrapper active">
                <div class="sidebar-header">
                    <div class="d-flex justify-content-between">
                        <div class="logo"> 
                        </div>
                        <div class="toggler">
                            <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
                        </div>
                    </div>
                </div>
                <div class="sidebar-menu">
                    <ul class="menu">
                        <li class="sidebar-title">Menu</li>
                        

                        <li class="sidebar-item active ">
                            <a href="<?php echo site_url('admin'); ?>" class='sidebar-link'>
                                <i class="bi bi-grid-fill"></i>
                                <span>Dashboard</span>
                            </a>
                        </li>

                        <li class="sidebar-item has-sub <?php echo (uri_string() == 'pelanggan' || uri_string() == 'input_pelanggan') ? 'active' : ''; ?>">
                            <!-- Tidak ada <a href> pada item utama "Pelanggan" -->
                        <div class="sidebar-link">
                            <i class="bi bi-people-fill"></i>
                            <span>Pelanggan</span>
                        </div>
                        <ul class="submenu">
                            <li class="submenu-item <?php echo (uri_string() == 'pelanggan') ? 'active' : ''; ?>">
                                <a href="<?php echo site_url('pelanggan'); ?>">Daftar Pelanggan</a>
                            </li>
                            <li class="submenu-item <?php echo (uri_string() == 'input_pelanggan') ? 'active' : ''; ?>">
                                <a href="<?php echo site_url('input_pelanggan'); ?>">Input Pelanggan</a>
                            </li>
                        </ul>
                    </li>

                        <li class="sidebar-item  has-sub">
                            <a href="#" class='sidebar-link'>
                                <i class="bi bi-collection-fill"></i>
                                <span>Lapangan</span>
                            </a>
                            <ul class="submenu ">
                                <li class="submenu-item ">
                                    <a href="extra-component-avatar.html">Daftar Lapangan</a>
                                </li>
                                <li class="submenu-item ">
                                    <a href="extra-component-sweetalert.html">Input Lapangan</a>
                                </li>
                               
                            </ul>
                        </li>

                        <li class="sidebar-item  has-sub">
                            <a href="#" class='sidebar-link'>
                                <i class="bi bi-grid-1x2-fill"></i>
                                <span>Booking</span>
                            </a>
                            <ul class="submenu ">
                                <li class="submenu-item ">
                                    <a href="layout-default.html">Daftar Booking</a>
                                </li>
                                <li class="submenu-item ">
                                    <a href="layout-vertical-1-column.html">Input Booking</a>
                                </li>
                            </ul>
                        </li>

                        <li class="sidebar-item  ">
                            <a href="form-layout.html" class='sidebar-link'>
                                <i class="bi bi-file-earmark-medical-fill"></i>
                                <span>Jadwal</span>
                            </a>
                        </li>
                        <li class="sidebar-item  ">
                            <a href="form-layout.html" class='sidebar-link'>
                                <i class="bi bi-file-earmark-spreadsheet-fill"></i>
                                <span>Laporan</span>
                            </a>
                        </li>

                        <li class="sidebar-item  ">
                            <a href="form-layout.html" class='sidebar-link'>
                                <i class="bi bi-search"></i>
                                <span>Cek kode Booking</span>
                            </a>
                        </li>

                        <li class="sidebar-item">
                            <a href="#" class='sidebar-link'>
                                <i class="bi bi-pen-fill"></i>
                                <span>Event</span>
                            </a>
                        </li>

                        <li class="sidebar-item  ">
                            <a href="table.html" class='sidebar-link'>
                                <i class="bi bi-grid-1x2-fill"></i>
                                <span>Table</span>
                            </a>
                        </li>

                        <li class="sidebar-item  ">
                            <a href="table-datatable.html" class='sidebar-link'>
                                <i class="bi bi-file-earmark-spreadsheet-fill"></i>
                                <span>Datatable</span>
                            </a>
                        </li>

                        <li class="sidebar-title">Pengaturan</li>

                        <li class="sidebar-item">
                            <a href="#" class='sidebar-link'>
                                <i class="bi bi-pentagon-fill"></i>
                                <span>Akun</span>
                            </a>
                            
                        </li>
                        <li class="sidebar-item">
    <a href="#" class='sidebar-link' onclick="confirmLogout(event)">
        <i class="bi bi-box-arrow-right"></i>
        <span>Keluar</span>
    </a>
</li>


                </div>
                <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
            </div>
        </div>