<div id="content">

    <!-- Topbar -->
    <nav class="navbar navbar-expand navbar-light topbar mb-4 static-top shadow" style="background: linear-gradient(45deg, #00274C, #0099FF); color: white;">

        <h1 class="h3 mb-0 text-gray-800"></h1>
        <div class="text-right text-gray-500">
            <p style="margin-bottom: 0px;" id="currentDateTime"></p>
        </div>
        <script>
            function updateDateTime() {
                var currentDate = new Date();
                var formattedDateTime = currentDate.toLocaleString('en-US', {
                    weekday: 'long',
                    month: 'long',
                    day: 'numeric',
                    year: 'numeric',
                    hour: 'numeric',
                    minute: 'numeric',
                    hour12: true
                });

                document.getElementById('currentDateTime').innerHTML = formattedDateTime;
            }

            updateDateTime();
            setInterval(updateDateTime, 1000);
        </script>

        <!-- Topbar Navbar -->
        <ul class="navbar-nav ml-auto">

            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
            <li class="nav-item dropdown no-arrow d-sm-none">
                <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <i class="fas fa-search fa-fw"></i>
                </a>
                <!-- Dropdown - Messages -->
                <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                    <form class="form-inline mr-auto w-100 navbar-search">
                        <div class="input-group">
                            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="button">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </li>
            <div class="topbar-divider d-none d-sm-block"></div>
            <li class="nav-item dropdown no-arrow">
                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="mr-2 d-none d-lg-inline text-warning small"> <b><span class="uhuyy"><?= $user['nama'] ?></span></b></b></span>
                    <img class="img-profile rounded-circle" src="<?= base_url('assets/img/profile/') . $user['image']; ?>">
                </a>
                <ul class="dropdown-menu dropdown-menu-end dropdown-menu-right" aria-labelledby="navbarScrollingDropdown">
                    <li><a class="dropdown-item" href="<?= base_url('user/index'); ?>">Profile Saya</a></li>
                    <li><a class="dropdown-item" href="<?php echo base_url('autentifikasi/logout') ?>" onclick="return confirm('Yakin logout?')">Logout</a></li>
                </ul>
            </li>
        </ul>

    </nav>
    <!-- End of Topbar -->