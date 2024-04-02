<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

      
        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-danger sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-3">SB Admin <sup>2</sup></div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">

            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="<?php echo base_url('admin/dashboard') ?>">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Dashboard</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">
            <li class="nav-item active">
                <a class="nav-link" href="<?php echo base_url('penduduk/tampil') ?>">
                    <i class="fas faw-fw fa-address-card"></i>
                    <span>Data Penduduk</span></a>
            </li>

            <hr class="sidebar-divider">
            <li class="nav-item active">
                <a class="nav-link" href="<?php echo base_url('Kelahiran/tampil') ?>">
                    <i class="fas faw-fw fa-book"></i>
                    <span>Data Kelahiran</span></a>
            </li>

            <hr class="sidebar-divider">
            <li class="nav-item active">
                <a class="nav-link" href="<?php echo base_url('kematian/tampil') ?>">
                    <i class="fas faw-fw fa-history"></i>
                    <span>Data Kematian</span></a>
            </li>

            <hr class="sidebar-divider">
            <li class="nav-item active">
                <a class="nav-link" href="<?php echo base_url('pindah/tampil') ?>">
                    <i class="fas faw-fw fa-address-card"></i>
                    <span>Data Pindah</span></a>
            </li>

            <!-- Nav Item - Utilities Collapse Menu -->
            <hr class="sidebar-divider">
            <li class="nav-item active">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseUtilities" aria-expanded="true" aria-controls="collapseUtilities">
                    <i class="fas fa-fw fa-envelope"></i>
                    <span>Layanan Surat</span>
                </a>
                <div id="collapseUtilities" class="collapse" aria-labelledby="headingUtilities" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Custom Utilities:</h6>
                        <a class="collapse-item" href="<?php echo base_url('surat/surat_kelahiran') ?>"><i class="fas fa-envelope"></i> Surat Kelahiran</a>
                        <a class="collapse-item" href="<?php echo base_url('surat/surat_kematian') ?>"><i class="fas fa-envelope"></i> Surat Kematian</a>
                        <a class="collapse-item" href="<?php echo base_url('surat/domisili') ?>"><i class="fas fa-envelope"></i> SK Domisili</a>
                        <a class="collapse-item" href="<?php echo base_url('surat/surat_kesehatan') ?>"><i class="fas fa-envelope"></i> SKTM Kesehatan</a>
                        <a class="collapse-item" href="<?php echo base_url('surat/surat_pendidikan') ?>"><i class="fas fa-envelope"></i> SKTM Pendidikan</a>
                        <a class="collapse-item" href="<?php echo base_url('surat/surat_izin_keluarga') ?>"><i class="fas fa-envelope"></i> Surat Izin Keluarga</a>
                        <a class="collapse-item" href="<?php echo base_url('surat/surat_skck') ?>"><i class="fas fa-envelope"></i> SKCK</a>
                        <a class="collapse-item" href="<?php echo base_url('surat/surat_menikah') ?>"><i class="fas fa-envelope"></i> SK Menikah</a>
                        <a class="collapse-item" href="<?php echo base_url('surat/surat_belum_menikah') ?>"><i class="fas fa-envelope"></i> SK Belum Menikah</a>
                        <a class="collapse-item" href="<?php echo base_url('surat/surat_belum_sekolah') ?>"><i class="fas fa-envelope"></i> SK Belum Sekolah</a>
                        <a class="collapse-item" href="<?php echo base_url('surat/surat_usaha') ?>"><i class="fas fa-envelope"></i> SK Usaha</a>
                        <a class="collapse-item" href="<?php echo base_url('surat/surat_cerai_mati') ?>"><i class="fas fa-envelope"></i> SK Cerai Mati</a>
                        <a class="collapse-item" href="<?php echo base_url('surat/surat_pindah') ?>"><i class="fas fa-envelope"></i> Surat Pindah</a>
                        <a class="collapse-item" href="<?php echo base_url('surat/surat_batal_pindah') ?>"><i class="fas fa-envelope"></i> SK Batal Pindah</a>
                        <a class="collapse-item" href="<?php echo base_url('surat/surat_penghasilan') ?>"><i class="fas fa-envelope"></i> SK Penghasilan</a>
                        <a class="collapse-item" href="<?php echo base_url('surat/surat_haji') ?>"><i class="fas fa-envelope"></i> SK Berangkat Haji</a>
                        <a class="collapse-item" href="<?php echo base_url('surat/surat_pemakaman') ?>"><i class="fas fa-envelope"></i> Surat Pemakaman</a>


                    </div>
                </div>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">

            <!-- Nav Item - Charts -->
            <li class="nav-item active">
                <a class="nav-link" href="<?php echo base_url('beranda') ?>">
                    <i class="fas fa-fw fa-home"></i>
                    <span>Beranda</span></a>
            </li>

            <hr class="sidebar-divider">
            <li class="nav-item active">
                <a class="nav-link" href="<?php echo base_url('pengaturan') ?>">
                    <i class="fas fa-cog"></i>
                    <span>Pengaturan</span></a>
            </li>

            <hr class="sidebar-divider">
            <li class="nav-item active">
                <a class="nav-link" href="<?php echo base_url('pengaturan') ?>">
                    <i class="fas fa-power-off"></i>
                    <span>Logout</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>


        </ul>
        <!-- End of Sidebar -->