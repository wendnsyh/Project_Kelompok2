<!DOCTYPE html>
<html>

<head>
    <title>PENDATAAN PENDUDUK</title>
    <link rel="icon" href="<?= base_url('assets/img/logo/logo_web.png'); ?>" type="image/x-icon">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/assets-warga/css/style.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/assets-warga/css/custom.css">
    <link href="<?php echo base_url() ?>/assets/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <script src="http://cdn.ckeditor.com/4.7.1/full/ckeditor.js"></script>
    <style>
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
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark sticky-top">
        <div class="container">
            <a class="navbar-brand">KELURAHAN SERPONG</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item"><a class="nav-link" href="<?php echo base_url(); ?>">Beranda</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?php echo base_url(); ?>pages/about">Tentang</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?php echo base_url(); ?>pages/layanan">Layanan</a></li>
                    <li class="nav-item"><a class="nav-link" href="<?php echo base_url(); ?>pages/contact">Kontak</a></li>
                </ul>
                <ul class="navbar-nav ml-auto">
                    <?php if (!$this->session->userdata('login')) : ?>
                        <li class="nav-item"><a class="nav-link" href="<?php echo base_url(''); ?>autentifikasi/register">Register</a></li>
                        <li class="nav-item"><a class="nav-link" href="<?php echo base_url(); ?>autentifikasi">Login</a></li>
                    <?php endif; ?>
                    <?php if ($this->session->userdata('login')) : ?>
                        <li class="nav-item"><a class="nav-link" href="<?php echo base_url(); ?>users/dashboard"><?php echo $this->session->userdata('username'); ?></a></li>
                        <li class="nav-item"><a class="nav-link" href="<?php echo base_url(); ?>users/logout">Logout</a></li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container mt-4">
        <!-- Flash Messages -->
        <?php if ($this->session->flashdata('user_registered')) : ?>
            <?php echo '<div class="alert alert-success">' . $this->session->flashdata('user_registered') . '</div>'; ?>
        <?php endif; ?>

        <?php if ($this->session->flashdata('post_created')) : ?>
            <?php echo '<div class="alert alert-success">' . $this->session->flashdata('post_created') . '</div>'; ?>
        <?php endif; ?>

        <?php if ($this->session->flashdata('post_updated')) : ?>
            <?php echo '<div class="alert alert-success">' . $this->session->flashdata('post_updated') . '</div>'; ?>
        <?php endif; ?>

        <?php if ($this->session->flashdata('category_created')) : ?>
            <?php echo '<div class="alert alert-success">' . $this->session->flashdata('category_created') . '</div>'; ?>
        <?php endif; ?>

        <?php if ($this->session->flashdata('post_deleted')) : ?>
            <?php echo '<div class="alert alert-success">' . $this->session->flashdata('post_deleted') . '</div>'; ?>
        <?php endif; ?>

        <?php if ($this->session->flashdata('login_failed')) : ?>
            <?php echo '<div class="alert alert-danger">' . $this->session->flashdata('login_failed') . '</div>'; ?>
        <?php endif; ?>

        <?php if ($this->session->flashdata('user_loggedin')) : ?>
            <?php echo '<div class="alert alert-success">' . $this->session->flashdata('user_loggedin') . '</div>'; ?>
        <?php endif; ?>

        <?php if ($this->session->flashdata('user_loggedout')) : ?>
            <?php echo '<div class="alert alert-success">' . $this->session->flashdata('user_loggedout') . '</div>'; ?>
        <?php endif; ?>

        <?php if ($this->session->flashdata('category_deleted')) : ?>
            <?php echo '<div class="alert alert-success">' . $this->session->flashdata('category_deleted') . '</div>'; ?>
        <?php endif; ?>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    
</body>

</html>