<!-- Begin Page Content -->
    <div class="container mb-4" style="display: flex; justify-content: center;">
        <img src="<?php echo base_url('assets/img/backgrounds/background website.png'); ?>" style="width: 100%; height: auto; border: 1px solid #62aad4; border-radius: 10px; box-shadow: 10px 10px 5px 0px rgba(189,185,185,0.75);">
    </div>

    <div class="row" style="display: flex; justify-content: space-evenly;">
        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border border-dark" style="box-shadow: -5px 5px 5px 0px rgba(143,143,143,0.73); height: 250px; margin-bottom: 20px;">
                <div class="card-header" style="background-color: #AFDCF6; color: #000; text-align: center;">
                    Jumlah Penduduk
                </div>
                <div style="margin-top: 50px; text-align: center; font-size: 2.5em;">
                    <i class="fas fa-solid fa-user"></i>
                </div>
                <h4 style="margin-top: 20px; text-align: center; font-size: 1.5em;">
                    <span class="info-box-text">Penduduk</span>
                    <span class="info-box-number"><?= $this->db->count_all_results('penduduk'); ?></span>
                </h4>
            </div>
        </div>

        <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border border-dark" style="box-shadow: -5px 5px 5px 0px rgba(143,143,143,0.73); height: 250px; margin-bottom: 20px;">
                <div class="card-header" style="background-color: #AFDCF6; color: #000; text-align: center;">
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
            <div class="card border border-dark" style="box-shadow: -5px 5px 5px 0px rgba(143,143,143,0.73); height: 250px; margin-bottom: 20px;">
                <div class="card-header" style="background-color: #AFDCF6; color: #000; text-align: center;">
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

    <!-- Content Row -->
    <div class="row">
        <!-- Area Chart -->
        <div class="col-xl-8 col-lg-7">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Earnings Overview</h6>
                    <div class="dropdown no-arrow">
                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                            <div class="dropdown-header">Dropdown Header:</div>
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                    </div>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <div class="chart-area">
                        <canvas id="myAreaChart"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <!-- Pie Chart -->
        <div class="col-xl-4 col-lg-5">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Revenue Sources</h6>
                    <div class="dropdown no-arrow">
                        <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                        </a>
                        <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                            <div class="dropdown-header">Dropdown Header:</div>
                            <a class="dropdown-item" href="#">Action</a>
                            <a class="dropdown-item" href="#">Another action</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                    </div>
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

    <!-- Color System -->
    <div class="row">
        <!-- Masukkan kartu warna di sini -->
    </div>

</div>
<!-- /.container-fluid -->