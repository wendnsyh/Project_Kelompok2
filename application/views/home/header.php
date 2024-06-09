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
    <link rel="stylesheet" href="<?php echo base_url('assets/css/style.css'); ?>">

</head>

<body>
    <!----Navbar -->
    <nav class="navbar navbar-expand-lg fixed-top" id="">
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
                            <a class="nav-link  mx-lg-2"  href="<?= base_url('pages') ?>">Home</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link mx-lg-2" href="<?= base_url('#about-us') ?>">About Us</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link mx-lg-2" href="<?= base_url('#Layanan') ?>">Layanan</a>
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