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
            -webkit-background-clip: text;
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
                    <li><a href="<?= base_url('pages/#beranda')?>">Beranda</a></li>
                    <li><a href="<?= base_url('pages/#about')?>">Tentang</a></li>
                    <li><a href="<?= base_url('pages/#Layanan')?>">Layanan</a></li>
                    <li><a href="<?= base_url('pages/#informasi')?>">Informasi</a></li>
                    <li><a href="<?= base_url('pages/#Kritik')?>">Kritik</a></li>
                    <li><a href="<?= base_url('pages/#contact')?>r">Kontak</a></li>
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