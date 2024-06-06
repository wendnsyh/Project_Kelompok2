<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav sidebar bg-gradient-success sidebar sidebar-dark accordion" id="accordionSidebar" ">
            <a class=" sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
            <div class="sidebar-brand-icon" style="margin-right: 7px;">
                <?php
                $logoPath = 'assets/img/logo/logo_web.png';
                if (file_exists($logoPath)) {
                    echo '<img src="' . base_url($logoPath) . '" alt="Logo" style="max-width: 100%; max-height: 50px;">';
                } else {
                    echo 'Logo tidak ditemukan';
                }
                ?>
            </div>
            </a>
            <!-- Divider -->
            <hr class="sidebar-divider">
            <!-- Looping Menu-->
            <div class="sidebar-heading">
                Home
            </div>
            <li class="nav-item active">
                <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link pb-0" href="<?= base_url('admin/dashboard'); ?>">
                    <i class="fa fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>
            </li>

            <hr class="sidebar-divider mt-3">

            <!-- Heading -->
            <div class="sidebar-heading">
                Master Data
            </div>
            <li class="nav-item active">
                <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link pb-0" href="<?= base_url('penduduk'); ?>">
                    <i class="fa fa-fw fa-book"></i>
                    <span>Data Penduduk</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link pb-0" href="<?= base_url('kelahiran'); ?>">
                    <i class="fa fa-fw fa-book"></i>
                    <span>Data Kelahiran</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link pb-0" href="<?= base_url('kematian'); ?>">
                    <i class="fa fa-fw fa-users"></i>
                    <span>Data Kematian</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link pb-0" href="<?= base_url('pejabat'); ?>">
                    <i class="fa fa-fw fa-users"></i>
                    <span>Data Staff</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link pb-0" href="<?= base_url('Pengaduan/list'); ?>">
                    <i class="fa fa-fw fa-book"></i>
                    <span>Pengaduan</span></a>
            </li>
            <!-- Nav Item - Announcement -->
            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('admin/Announcement') ?>">
                    <i class="fas fa-fw fa-bullhorn"></i>
                    <span>Pengumuman</span>
                </a>
            </li>

            </li>
            <hr class="sidebar-divider mt-3">

            <!-- Heading -->
            <div class="sidebar-heading">
                Transaksi
            </div>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('SuratKelahiran') ?>">
                    <i class="fas fa-envelope"></i>
                    <span>Surat Kelahiran</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('SuratKematian') ?>">
                    <i class="fas fa-envelope"></i>
                    <span>Surat Kematian</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('SuratDomisili') ?>">
                    <i class="fas fa-envelope"></i>
                    <span>Surat Keterangan Domisili</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('SkUsaha') ?>">
                    <i class="fas fa-envelope"></i>
                    <span>Surat Keterangan Usaha</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('Sktm') ?>">
                    <i class="fas fa-envelope"></i>
                    <span>SKTM</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('SuratBekerja') ?>">
                    <i class="fas fa-envelope"></i>
                    <span>Surat Izin Bekerja</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('SkMenikah') ?>">
                    <i class="fas fa-envelope"></i>
                    <span>Surat Keterangan Menikah</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('BelumMenikah') ?>">
                    <i class="fas fa-envelope"></i>
                    <span>Surat Keterangan Belum Menikah</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('SkPindah') ?>">
                    <i class="fas fa-envelope"></i>
                    <span>Surat Keterangan Pindah</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('SkBatal') ?>">
                    <i class="fas fa-envelope"></i>
                    <span>Surat Keterangan Batal Pindah</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('SuratKelahiran') ?>">
                    <i class="fas fa-envelope"></i>
                    <span>Surat Keterangan Tanah</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('Penghasilan') ?>">
                    <i class="fas fa-envelope"></i>
                    <span>Surat Keterangan Penghasilan</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('CeraiMati') ?>">
                    <i class="fas fa-envelope"></i>
                    <span>Surat Keterangan Cerai Mati</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('Pemakaman') ?>">
                    <i class="fas fa-envelope"></i>
                    <span>Surat Keterangan Pemakaman</span>
                </a>
            </li>

            <hr class="sidebar-divider mt-3">

            <!-- Heading -->
            <div class="sidebar-heading">
                Laporan
            </div>
            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('Laporan/penduduk') ?>">
                    <i class="fas fa-envelope"></i>
                    <span>Laporan Penduduk</span>
                </a>
            </li>
            <hr class="sidebar-divider mt-3">
            <li class="nav-item">
                <a class="nav-link" href="<?php echo base_url('autentifikasi/logout') ?>" onclick="return confirm('Yakin logout?')">
                    <i class="fas fa-fw fa-sign-out-alt"></i>
                    <span>Logout</span>
                </a>
            </li>


        </ul>
        <!-- End of Sidebar -->
        <div id="content-wrapper" class="d-flex flex-column">