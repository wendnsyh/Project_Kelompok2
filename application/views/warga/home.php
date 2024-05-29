<div class="container mt-5">
    <!-- Kotak Box Selamat Datang -->
    <div class="box-header text-center mb-4"
        style="background-color: #f8f9fa; padding: 20px; border-radius: 10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); margin-bottom: 40px; ">
        <h4 style="font-family: 'Arial', sans-serif; color: #1E5B82; margin: 0; padding: 0;"><b>SELAMAT DATANG DI
                WEBSITE<br>KELURAHAN SERPONG</b></h4>
        <hr style="border-top: 2px solid #007bff; width: 50%; margin: 20px auto;">
    </div>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <div class="box-header text-center mb-4" style="display: flex; justify-content: center; align-items: center;">
        <img src="<?php echo base_url('assets/img/backgrounds/Background Website.png'); ?>"
            style="max-width: 100%; height: auto; border: 1px solid #62aad4; border-radius: 10px; box-shadow: 10px 10px 5px 0px rgba(189,185,185,0.75);">
    </div>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <div class="row" style="display: flex; justify-content: space-evenly;">
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border border-dark"
                style="box-shadow: -5px 5px 5px 0px rgba(143,143,143,0.73); height: 250px; margin-bottom: 20px;">
                <div class="card-header"
                    style="background-color: #AFDCF6; color: #000; text-align: center; border-bottom: 1px solid #62aad4;">
                    Jumlah Penduduk
                </div>
                <div style="margin-top: 50px; text-align: center; font-size: 2.5em;">
                    <i class="fas fa-solid fa-users"></i>
                </div>
                <h4 style="margin-top: 20px; text-align: center; font-size: 1.5em;">
                    <span class="info-box-text">Penduduk</span>
                    <span class="info-box-number"><?= $this->db->count_all_results('penduduk'); ?></span>
                </h4>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border border-dark"
                style="box-shadow: -5px 5px 5px 0px rgba(143,143,143,0.73); height: 250px; margin-bottom: 20px;">
                <div class="card-header"
                    style="background-color: #AFDCF6; color: #000; text-align: center; border-bottom: 1px solid #62aad4;">
                    Jumlah Kematian
                </div>
                <div style="margin-top: 50px; text-align: center; font-size: 2.5em;">
                    <i class="fas fa-solid fa-user"></i>
                </div>
                <h4 style="margin-top: 20px; text-align: center; font-size: 1.5em;">
                    <span class="info-box-text">Kematian</span>
                    <span class="info-box-number"><?= $this->db->count_all_results('kematian'); ?></span>
                </h4>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border border-dark"
                style="box-shadow: -5px 5px 5px 0px rgba(143,143,143,0.73); height: 250px; margin-bottom: 20px;">
                <div class="card-header"
                    style="background-color: #AFDCF6; color: #000; text-align: center; border-bottom: 1px solid #62aad4;">
                    Jumlah Kelahiran
                </div>
                <div style="margin-top: 50px; text-align: center; font-size: 2.5em;">
                    <i class="fas fa-solid fa-user"></i>
                </div>
                <h4 style="margin-top: 20px; text-align: center; font-size: 1.5em;">
                    <span class="info-box-text">Kelahiran</span>
                    <span class="info-box-number"><?= $this->db->count_all_results('kelahiran'); ?></span>
                </h4>
            </div>
        </div>
    </div>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Content Row -->
    <div class="row">
        <!-- Area Chart -->
        <div class="col-xl-8 col-lg-7 mb-4">
            <div class="card shadow"
                style="box-shadow: -5px 5px 5px 0px rgba(143,143,143,0.73); height: 250px; margin-bottom: 20px;">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between"
                    style="border-bottom: 1px solid #62aad4;">
                    <h6 class="m-0 font-weight-bold text-dark" style="text-align: center;">Data Warga Berdasarkan Jenis Kelamin</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="chart-bar">
                        <canvas id="myBarChart"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pie Chart -->
        <div class="col-xl-4 col-lg-5 mb-4">
            <div class="card shadow"
                style="box-shadow: -5px 5px 5px 0px rgba(143,143,143,0.73); height: 250px; margin-bottom: 20px;">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between"
                    style="border-bottom: 1px solid #62aad4;">
                    <h6 class="m-0 font-weight-bold text-dark" style=" text-align: center; ">Revenue Sources</h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="chart-pie pt-4 pb-2">
                        <canvas id="myPieChart"></canvas>
                    </div>
                    <div class="mt-4 text-center small">
                        <span class="mr-2">
                            <i class="fas fa-circle text-primary"></i> Direct
                        </span>
                        <span class="mr-2">
                            <i class="fas fa-circle text-success"></i> Social
                        </span>
                        <span class="mr-2">
                            <i class="fas fa-circle text-info"></i> Referral
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /.row -->


    <!-- Color System -->
    <div class="row">
        <!-- Masukkan kartu warna di sini -->
    </div>

</div>
<!-- /.container-fluid -->

<script src="<?= base_url('assets-warga/js/bootstrap.bundle.min.js'); ?>"></script>