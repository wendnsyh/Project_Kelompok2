<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Informasi Kelurahan Serpong</title>
    <!-- Menggunakan Bootstrap dari CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <!-- Menggunakan AOS untuk Animasi -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="assets/css/style.css">

</head>

<body>
    <!----Navbar -->
    <nav class="navbar navbar-expand-lg fixed-top">
        <div class="container">
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

            <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
                <div class="offcanvas-header">
                    <h5 class="offcanvas-title" id="offcanvasNavbarLabel">Logo</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <ul class="navbar-nav justify-content-center flex-grow-1 pe-3">
                        <li class="nav-item">
                            <a class="nav-link active mx-lg-2" aria-current="page" href="#">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link mx-lg-2" href="#about-us">About Us</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link mx-lg-2" href="#Layanan">Layanan</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link mx-lg-2" href="<?= base_url('faq') ?>">Inovasi</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link mx-lg-2" href="<?= base_url('Berita') ?>">Berita</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link mx-lg-2" href="#footer">Footer</a>
                        </li>
                    </ul>
                </div>
            </div>
            <a href="<?= base_url('autentifikasi') ?>" class="login-button">Login</a>
            <button class="navbar-toggler pe-0" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
    </nav>
    <!--End Navbar ->>

    <!---Hero Section---->

    <!-- Carousel -->
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">

        </ol>
        <div class="carousel-inner" role="list-box">
            <div class="carousel-item active">
                <img src="<?= base_url('assets/img/layouts/layout2.jpg') ?>" class="img-fluid" alt="Image">
                <div class="carousel-caption">
                    <div class="p-3" style="max-width: 900px;">
                        <h4 class="text-white text-uppercase fw-bold mb-4" style="letter-spacing: 3px;">Kelurahan Serpong</h4>
                        </p>
                    </div>
                </div>
            </div>
            <div class="carousel-item">
                <img src="<?= base_url('assets/img/layouts/layout1.jpg') ?>" class="img-fluid" alt="Image">
                <div class="carousel-caption">
                    <div class="p-3" style="max-width: 900px;">

                    </div>
                </div>
            </div>
            <div class="carousel-item" style="background-image: url('https://via.placeholder.com/1920x1080');">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Layanan Publik</h5>
                    <p>Layanan terbaik untuk masyarakat</p>
                </div>
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    <!--- End Hero Section---->

    <!-- About Us Section -->
    <section id="about-us" class="about-us" data-aos="fade-up">
        <div class="container">
            <h2 class="text-center" data-aos="fade-right">Tentang Kami</h2>
            <div class="row">
                <div class="col-lg-6" data-aos="fade-left">
                    <p>Kelurahan Serpong adalah bagian dari Kecamatan Serpong, Kota Tangerang Selatan. Kami berkomitmen untuk memberikan pelayanan terbaik kepada masyarakat dan menjaga lingkungan yang bersih, aman, dan nyaman.</p>
                </div>
                <div class="col-lg-6" data-aos="fade-right">
                    <p>Kami memiliki berbagai program dan kegiatan yang bertujuan untuk meningkatkan kualitas hidup warga. Selain itu, kami juga menyediakan berbagai layanan publik yang dapat diakses oleh seluruh masyarakat.</p>
                </div>
            </div>
            <div class="text-center">
                <a href="<?= base_url('pages/about') ?>" class="btn btn-success btn-xs"><i>Explore Now</i></a>
            </div>
        </div>
    </section>
    <!--end about->>

    <!---Layanan---->

    <div class="container mt-5" id="Layanan">
        <div class="section-title text-center">
            <h2>LAYANAN KAMI</h2>
            <p>Berikut adalah layanan yang kami tawarkan untuk masyarakat.</p>
        </div>

        <div class="row">
            <div class="col-md-4 mb-4 d-flex">
                <div class="service-box text-center flex-fill">
                    <i class="fa fa-users fa-3x"></i>
                    <h3>Informasi Penduduk</h3>
                    <p>Kami menyediakan informasi penduduk Kelurahan Serpong bagi warga yang membutuhkan.</p>
                    <a href="<?= base_url('pages/penduduk') ?>" class="btn btn-success">Info lebih lanjut</a>
                </div>
            </div>
            <div class="col-md-4 mb-4 d-flex">
                <div class="service-box text-center flex-fill">
                    <i class="fas fa-file-alt fa-3x"></i>
                    <h3>Pelayanan Surat</h3>
                    <p>Kami menyediakan layanan untuk keluarga seperti akta kelahiran, kartu keluarga, dan lainnya.</p>
                    <a href="<?= base_url('pages/surat') ?>" class="btn btn-success">Info lebih lanjut</a>
                </div>
            </div>
            <div class="col-md-4 mb-4 d-flex">
                <div class="service-box text-center flex-fill">
                    <i class="fas fa-sync fa-spin fa-3x"></i>
                    <h3>Inovasi</h3>
                    <p>Inovasi Kelurahan Serpong.</p>
                    <a href="<?= base_url('faq') ?>" class="btn btn-success">Info Lebih Lanjut</a>
                </div>
            </div>
        </div>
    </div>



    <style>
        /* CSS untuk footer */
        .footer {
            background-color: #333;
            color: #fff;
            padding: 60px 0;
            position: relative;
            transition: height 0.3s ease;
            /* Menambahkan efek transisi saat membuka footer */
        }

        /* Efek transisi saat mouse masuk ke footer */
        .footer:hover {
            background-color: #555;
            height: 400px;
            /* Contoh penyesuaian tinggi saat hover */
        }
    </style>

    <footer class="bg-dark text-white py-4 mb-7" id="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="info">
                        <div class="address">
                            <i class="bi bi-geo-alt"></i>
                            <h4>Location:</h4>
                            <p>BSD Sektor XIV Blok C1/1, Jl. Letnan Sutopo BSD Serpong Lengkong Gudang Timur, Rw. Mekar
                                Jaya, Kec. Serpong, Kota Tangerang Selatan, Banten 15311</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="info">
                        <div class="email">
                            <i class="bi bi-envelope"></i>
                            <h4><b>Email:</b></h4>
                            <p>kelurahanserpong@gmail.com</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="info">
                        <div class="phone">
                            <i class="bi bi-phone"></i>
                            <h4><b>No Telepon:</b></h4>
                            <p>0857-7971-4550</p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mt-3">
                <div class="col-lg-12">
                    <div class="sosmed text-center">
                        <a href="#" class="instagram"><i class="fab fa-instagram"></i></a>
                        <a href="#" class="youtube"><i class="fab fa-youtube"></i></a>
                        <a href="#" class="facebook"><i class="fab fa-facebook"></i></a>
                        <a href="#" class="twitter"><i class="fab fa-twitter"></i></a>
                    </div>
                </div>
            </div>
        </div>
        </footer>



        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
        <!-- Menggunakan Bootstrap dan Popper.js dari CDN -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <!-- Menggunakan AOS untuk Animasi -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
</body>
<script>
    AOS.init();
</script>
</body>

</html>