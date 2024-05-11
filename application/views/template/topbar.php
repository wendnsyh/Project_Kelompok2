<!-- Content Wrapper -->
<div id="content-wrapper" class="d-flex flex-column">

    <!-- Main Content -->
    <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

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

                <div class="topbar-divider d-none d-sm-block"></div>

                <!-- Nav Item - User Information -->
                <li class="nav-item dropdown no-arrow">
                    <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown"
                        aria-haspopup="true" aria-expanded="false">
                        <span class="mr-2 d-none d-lg-inline text-gray-600 small">Profile Saya</span>
                    </a>
                    <!-- Dropdown - User Information -->
                    <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                        aria-labelledby="userDropdown">
                        <a class="dropdown-item" href="<?= base_url('user/index'); ?>">Profile Saya</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="<?php echo base_url('autentifikasi/logout') ?>" onclick="return confirm('Yakin logout?')">Logout</a>
                    </div>
                </li>



            </ul>

        </nav>
        <!-- End of Topbar -->