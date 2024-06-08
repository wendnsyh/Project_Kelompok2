<div class="container mt-5">
    <div class="section-title text-center" data-aos="fade-up">
        <h2>TENTANG KAMI</h2>
        <img src="<?php echo base_url('assets/img/logo/logo_web.png'); ?>" class="img-fluid" alt="Logo">
    </div>

    <div class="section-title text-center" data-aos="fade-up">
        <div class="logo-container"></div>
        <h2>KELURAHAN SERPONG</h2>
        <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint
            consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat
            sit in iste officiis commodi quidem hic quas.</p>
    </div>

    <div class="row mt-5">
        <div class="col-lg-6" data-aos="fade-right">
            <div class="section-title text-center">
                <h2>VISI KELURAHAN SERPONG</h2>
                <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem.
                    Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias
                    ea.
                    Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
            </div>
        </div>
        <div class="col-lg-6" data-aos="fade-left">
            <div class="section-title text-center">
                <h2>MISI KELURAHAN SERPONG</h2>
                <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem.
                    Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias
                    ea.
                    Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
            </div>
        </div>
    </div>
    <div class="container py-5">
        <div class="row text-center">
            <div class="col-lg-8 mx-auto">
                <h1 class="display-4 fw-bold">PROFIL PEJABAT KELURAHAN</h1>
            </div>
        </div>
        <div class="row justify-content-center mt-4">
            <?php if (!empty($pejabat)) : ?>
                <?php foreach ($pejabat as $p) : ?>
                    <div class="col-md-4">
                        <div class="team-member text-center">
                            <img src="<?php echo base_url('uploads/pejabat/') . $p->image; ?>" alt="Pejabat" class="img-fluid">
                            <h5><?= $p->nama_pejabat; ?></h5>
                            <p><?= $p->jabatan_pejabat; ?></p>

                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else : ?>
                <p class="text-center">Data pejabat tidak tersedia.</p>
            <?php endif; ?>
        </div>

        <style>
            .team-member {
                margin-bottom: 30px;
            }

            .team-member img {
                border-radius: 50%;
                width: 150px;
                height: 150px;
                object-fit: cover;
            }

            .team-member h5 {
                margin-top: 15px;
                margin-bottom: 5px;
            }

            .team-member p {
                margin-bottom: 0;
                color: #6c757d;
            }

            #map {
                height: 400px;
                width: 100%;
            }
        </style>


        <div class="row mt-5">
            <div class="col-lg-12">
                <div class="section-title text-center"></div>
                <div class="mt-5" data-aos="fade-up">
                    <h2 class="text-center fw-bold">LOKASI KELURAHAN SERPONG</h2>
                    <div id="map" style="height: 400px; width: 100%;"></div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2BESI1nVa1FpaM0tG5zHAYDtJS68sDFAdGQvRHCpHJr6g9f4PftU4lBGx6p" crossorigin="anonymous"></script>
    <!-- Menyertakan AOS JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
    <script>
        AOS.init();

        function initMap() {
            var serpong = {
                lat: -6.304078,
                lng: 106.687103
            };
            var map = new google.maps.Map(document.getElementById('map'), {
                zoom: 15,
                center: serpong
            });
            var marker = new google.maps.Marker({
                position: serpong,
                map: map
            });
        }
    </script>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDKA3XHenTbj605xuqeJIlEM0Q9r8PYdlc&callback=initMap"></script>