<!DOCTYPE html>
<html lang="en">

<head>
  <title>Login - Pendataan Warga</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!--===============================================================================================-->
  <link rel="icon" type="image/png" href="<?php echo base_url(); ?>assets/img/logo/logo web.png" />
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css"
    href="<?php echo base_url(); ?>assets/login_/vendor/bootstrap/css/bootstrap.min.css">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css"
    href="<?php echo base_url(); ?>assets/login_/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css"
    href="<?php echo base_url(); ?>assets/login_/fonts/iconic/css/material-design-iconic-font.min.css">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/login_/vendor/animate/animate.css">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css"
    href="<?php echo base_url(); ?>assets/login_/vendor/css-hamburgers/hamburgers.min.css">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css"
    href="<?php echo base_url(); ?>assets/login_/vendor/animsition/css/animsition.min.css">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/login_/vendor/select2/select2.min.css">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css"
    href="<?php echo base_url(); ?>assets/login_/vendor/daterangepicker/daterangepicker.css">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/login_/css/util.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>assets/login_/css/main.css">
  <!--===============================================================================================-->
</head>

<body>

  <div class="limiter">
    <div class="container-login100">
      <div>

        <form class="login100-form validate-form" action="<?php echo base_url('autentifikasi'); ?>" method="post"
          class="" role="form">
          <span class="login100-form-title p-b-26">
            SISTEM PENGELOLAAN DATA PENDUDUK <BR> KELURAHAN SERPONG
          </span>

          <span class="login100-form-title p-b-48">
            <img src="<?php echo base_url(); ?>/assets/img/logo/logo_web.png" width="200" height="200">
          </span>
          <?php
          if ($this->session->flashdata('gagal')) {
            ?>
            <div class="callout callout-danger">
              <p style="font-size:15px">
                <i class="fa fa-warning"></i> <?php echo $this->session->flashdata('gagal'); ?>
              </p>
            </div>
            <?php
          }
          ?>

          <div class="wrap-input100 validate-input" data-validate="EMAIL HARUS DIISI!">
            <input class="input100" type="text" name="email">
            <span class="focus-input100" data-placeholder="Email"></span>
          </div>

          <div class="wrap-input100 validate-input" data-validate="Enter password">
            <span class="btn-show-pass">
              <i class="zmdi zmdi-eye"></i>
            </span>
            <input class="input100" type="password" name="password">
            <span class="focus-input100" data-placeholder="Password"></span>
          </div>

          <div class="container-login100-form-btn">
            <div class="wrap-login100-form-btn">
              <div class="login100-form-bgbtn"></div>
              <button class="btn btn-lg btn-block btn-success login100-form-btn" type="submit" name="Submit"
                alt="sign in">
                Login
              </button>
            </div>
          </div>

          <div class="container-login100-form-btn mt-3">
            <div class="wrap-login100-form-btn">
              <div class="login100-form-bgbtn"></div>
              <button class="btn btn-lg btn-block btn-success login100-form-btn" type="button"
                onclick="location.href='<?php echo base_url('autentifikasi/register'); ?>'">
                Register
              </button>
            </div>
          </div>
      </div>
      </form>
    </div>
  </div>
  </div>


  <div id="dropDownSelect1"></div>

  <!--===============================================================================================-->
  <script src="<?php echo base_url(); ?>assets/login_/vendor/jquery/jquery-3.2.1.min.js"></script>
  <!--===============================================================================================-->
  <script src="<?php echo base_url(); ?>assets/login_/vendor/animsition/js/animsition.min.js"></script>
  <!--===============================================================================================-->
  <script src="<?php echo base_url(); ?>assets/login_/vendor/bootstrap/js/popper.js"></script>
  <script src="<?php echo base_url(); ?>assets/login_/vendor/bootstrap/js/bootstrap.min.js"></script>
  <!--===============================================================================================-->
  <script src="<?php echo base_url(); ?>assets/login_/vendor/select2/select2.min.js"></script>
  <!--===============================================================================================-->
  <script src="<?php echo base_url(); ?>assets/login_/vendor/daterangepicker/moment.min.js"></script>
  <script src="<?php echo base_url(); ?>assets/login_/vendor/daterangepicker/daterangepicker.js"></script>
  <!--===============================================================================================-->
  <script src="<?php echo base_url(); ?>assets/login_/vendor/countdowntime/countdowntime.js"></script>
  <!--===============================================================================================-->
  <script src="<?php echo base_url(); ?>assets/login_/js/main.js"></script>

</body>

</html>