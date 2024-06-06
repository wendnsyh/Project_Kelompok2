<!DOCTYPE html>
<html>

<head>
    <title>Kelurahan Serpong</title>
    <link rel="icon" href="<?= base_url('assets/img/logo/logo_web.png'); ?>" type="image/x-icon">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/assets-warga/css/style.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/assets-warga/css/custom.css">
    <link href="<?php echo base_url() ?>/assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <script src="http://cdn.ckeditor.com/4.7.1/full/ckeditor.js"></script>
    <style>
        html {
            scroll-behavior: smooth;
        }

        .navbar-brand {
            font-size: 20px;
            font-weight: bold;
            background: linear-gradient(270deg, #ff0000, #00ff00, #0000ff);
            background-size: 600% 600%;
           
            -webkit-text-fill-color: transparent;
            animation: rgb-animation 5s ease infinite;
        }

        @keyframes rgb-animation {
            0% {
                background-position: 0% 50%;
            }

            50% {
                background-position: 100% 50%;
            }

            100% {
                background-position: 0% 50%;
            }
        }
    </style>
</head>

<body>
    <nav class="navbar navbar-inverse" style="position: -webkit-sticky; position: sticky; top: 0; z-index: 1000;">
        <div class="container">
            <div class="navbar-header">
                <a class="navbar-brand">KELURAHAN SERPONG</a>
            </div>
            <div id="navbar">
                <ul class="nav navbar-nav">
                    <li><a href="#beranda">Beranda</a></li>
                    <li><a href="#about">Tentang</a></li>
                    <li><a href="#Layanan">Layanan</a></li>
                    <li><a href="#informasi">Informasi</a></li>
                    <li><a href="<?= base_url('pages/layanan') ?>">Kritik</a></li>
                    <li><a href="#contact">Kontak</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right" >
                    <?php if (!empty($this->session->userdata('email'))) { ?>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                                Selamat Datang <b><?php echo $this->session->userdata('email'); ?></b> <span class="caret"></span>
                            </a>
                            <ul class="dropdown-menu">
                                <li><a href="<?= base_url('user/index2'); ?>">Profile Saya</a></li>
                                <li role="separator" class="divider"></li>
                                <li><a href="<?php echo base_url('autentifikasi/logout') ?>" onclick="return confirm('Yakin logout?')">Logout</a></li>
                            </ul>
                        </li>
                    <?php } else { ?>
                        <li><a href="<?php echo base_url(''); ?>autentifikasi/register">Register</a></li>
                        <li><a href="<?php echo base_url(); ?>autentifikasi">Login</a></li>
                    <?php } ?>
                </ul>
            </div>
        </div>
    </nav>
    <div class="container mt-5" id="beranda">
        <!-- Kotak Box Selamat Datang -->
        <div class="box-header text-center mb-4" style="background-color: #f8f9fa; padding: 20px; border-radius: 10px; box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);">
            <h4 style="font-family: 'Arial', sans-serif; color: #1E5B82; margin: 0; padding: 0;"><b>SELAMAT DATANG DI WEBSITE<br>KELURAHAN SERPONG</b></h4>
            <hr style="border-top: 2px solid #007bff; width: 50%; margin: 20px auto;">
        </div>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <div class="text-center mb-4">
            <img src="<?php echo base_url('assets/img/backgrounds/Background Website User.png'); ?>" class="img-fluid" style="max-width: 100%; height: auto; border: 1px solid #62aad4; border-radius: 10px; box-shadow: 10px 10px 5px 0px rgba(189,185,185,0.75);">
        </div>

        <div class="row mt-5 align-items-center" id="about">
            <div class="col-md-6 text-center text-md-left mb-4 mb-md-0">
                <img src="<?php echo base_url('assets/img/logo/logo_web.png'); ?>" class="img-fluid" alt="Logo">
            </div>
            <div class="col-md-6">
                <h2 class="text-center text-md-left" style="font-family: Verdana, Geneva, Tahoma, sans-serif;">Tentang Kami</h2>
                <p class="text-center text-md-left"style="font-family: Verdana, Geneva, Tahoma, sans-serif;">Merupakan Kelurahan yang berada di Serpong.</p>
                <div class="text-center text-md-left">
                    <a href="<?= base_url('pages/about') ?>" class="btn btn-success">Explore Now</a>
                </div>
            </div>
        </div>
    </div>
    <div class="container mt-5" id="Layanan">
        <div class="section-title text-center">
            <h2>LAYANAN KAMI</h2>
            <p>Berikut adalah layanan yang kami tawarkan untuk masyarakat.</p>
        </div>

        <div class="row">
            <div class="col-md-4">
                <div class="service-box">
                    <i class="fa fa-users fa-3x"></i>
                    <h3>Pendataan</h3>
                    <p>Kami Menyidakan pendataan penduduk bagi warga yang membutuhkan.</p>
                    <a href="<?= base_url('pages/penduduk') ?>" class="btn btn-success"">Info lebih lanjut</a>
                </div>
            </div>
            <div class="col-md-4">
                <div class="service-box">
                    <i class="fas fa-file-alt fa-3x" ></i>
                    <h3>Pelayanan Surat</h3>
                    <p>Kami menyediakan layanan untuk keluarga seperti akta kelahiran, kartu keluarga, dan lainnya.</p>
                    <a href="<?= base_url('pages/surat') ?>" class="btn btn-success">Info lebih lanjut</a>
                </div>
            </div>
            <div class="col-md-4">
                <div class="service-box">
                    <i class="fas fa-file-alt fa-3x"></i>
                    <h3>Dokumen Resmi</h3>
                    <p>Kami membantu dalam pengurusan dokumen resmi seperti KTP, paspor, dan lainnya.</p>
                </div>
            </div>
        </div>
    </div>
    <div class="container mt-5" id="informasi">
        <div class="section-title text-center">
            <h2>LAYANAN KAMI</h2>
            <p>Berikut adalah layanan yang kami tawarkan untuk masyarakat.</p>
        </div>

        <div class="row">
            <div class="col-md-4">
                <div class="service-box">
                    <i class="fas fa-users fa-3x"></i>
                    <h3>Pelayanan Penduduk</h3>
                    <p>Kami menyediakan berbagai layanan untuk pendataan dan administrasi penduduk.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="service-box">
                    <i class="fas fa-home fa-3x"></i>
                    <h3>Pelayanan Keluarga</h3>
                    <p>Kami menyediakan layanan untuk keluarga seperti akta kelahiran, kartu keluarga, dan lainnya.</p>
                </div>
            </div>
            <div class="col-md-4">
                <div class="service-box">
                    <i class="fas fa-file-alt fa-3x"></i>
                    <h3>Dokumen Resmi</h3>
                    <p>Kami membantu dalam pengurusan dokumen resmi seperti KTP, paspor, dan lainnya.</p>
                </div>
            </div>
        </div>
    </div>
 

    <!-- Footer -->
    <footer class="sticky-footer" id="">
        <section id="contact" class="contact">
            <div class="container" data-aos="fade-up">

                <div class="section-title text-center">
                    <h2>KONTAK KAMI</h2>
                </div>

                <div class="row mt-1">
                    <div class="col-lg-4">
                        <div class="info">
                            <div class="address">
                                <i class="bi bi-geo-alt"></i>
                                <h4><b>Location:</b></h4>
                                <p>BSD Sektor XIV Blok C1/1, Jl. Letnan Sutopo BSD Serpong Lengkong Gudang Timur, Rw. Mekar
                                    Jaya, Kec. Serpong, Kota Tangerang Selatan, Banten 15311</p>
                            </div>

                            <div class="email">
                                <i class="bi bi-envelope"></i>
                                <h4><b>Email:</b></h4>
                                <p>kelurahanserpong@gmail.com</p>
                            </div>

                            <div class="phone">
                                <i class="bi bi-phone"></i>
                                <h4><b>No Telepon:</b></h4>
                                <p>0857-7971-4550</p>
                            </div>

                            <div class="sosmed">
                                <a href="#" class="instagram"><i class="fab fa-instagram"></i></a>
                                <a href="#" class="youtube"><i class="fab fa-youtube"></i></a>
                                <a href="#" class="facebook"><i class="fab fa-facebook"></i></a>
                                <a href="#" class="twitter"><i class="fab fa-twitter"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <div class="container my-auto">
            <div class="copyright text-center my-auto">
                <span>Copyright &copy; Website Pendataan Warga</span>
            </div>
        </div>
    </footer>

    <!-- Bootstrap core JavaScript-->
    <script src="<?php echo base_url() ?>/assets/vendor/jquery/jquery.min.js"></script>
    <script src="<?php echo base_url() ?>/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="<?php echo base_url() ?>/assets/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="<?php echo base_url() ?>/assets/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="<?php echo base_url() ?>/assets/vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="<?php echo base_url() ?>/assets/js/demo/chart-area-demo.js"></script>
    <script src="<?php echo base_url() ?>/assets/js/demo/chart-pie-demo.js"></script>

    <script src="<?php echo base_url(); ?>assets/datatables/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/datepicker/js/bootstrap-datepicker.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/js/select2.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script>
        // Fungsi untuk menangani peristiwa klik pada setiap menu
        function scrollKeBagian(idBagian) {
            var element = document.getElementById(idBagian);
            if (element) {
                element.scrollIntoView({
                    behavior: 'smooth'
                });
            }
        }

        // Tambahkan event listener untuk setiap menu yang akan men-scroll ke bagian yang sesuai
        document.addEventListener('DOMContentLoaded', function() {
            var menuBeranda = document.querySelector('a[href="#beranda"]');
            var menuTentang = document.querySelector('a[href="#tentang"]');
            var menuLayanan = document.querySelector('a[href="#layanan"]');
            var menuInformasi = document.querySelector('a[href="#informasi"]');
            var menuKritik = document.querySelector('a[href="#kritik"]');

            menuBeranda.addEventListener('click', function() {
                scrollKeBagian('beranda');
            });

            menuTentang.addEventListener('click', function() {
                scrollKeBagian('tentang');
            });

            menuLayanan.addEventListener('click', function() {
                scrollKeBagian('layanan');
            });

            menuInformasi.addEventListener('click', function() {
                scrollKeBagian('informasi');
            });

            menuKritik.addEventListener('click', function() {
                scrollKeBagian('kritik');
            });
        });
    </script>





</body>

</html>