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
    <div class="row mt-5">
        <div class="col-lg-12">
            <div class="section-title text-center" data-aos="fade-up">
                <h2 class="text-center fw-bold">PROFIL PEJABAT KELURAHAN</h2>
                <div class="row mt-5 justify-content-center">
                    <?php if (!empty($pejabat)) : ?>
                        <?php foreach ($pejabat as $p) : ?>
                            <div class="col-lg-3 col-md-6 col-sm-12 mb-4" data-aos="flip-up">
                                <div class="card text-center mx-auto">
                                    <img src="<?php echo base_url('uploads/pejabat/') . $p->image; ?>" class="card-img-top img-fluid mx-auto" alt="Pejabat" style="object-fit: cover; width: 100%; height: 200px;">
                                    <div class="card-body">
                                        <h3 class="card-title"><?= $p->nama_pejabat; ?></h3>
                                        <p class="card-text"><?= $p->jabatan_pejabat; ?></p>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    <?php else : ?>
                        <p class="text-center">Data pejabat tidak tersedia.</p>
                    <?php endif; ?>
                </div>
            </div>
        </div>

        <style>
            .card {
                border: 1px solid #ddd;
                border-radius: 10px;
                overflow: hidden;
                box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            }

            .card-body {
                padding: 15px;
            }

            .card-title {
                font-size: 1.25rem;
                font-weight: bold;
            }

            .card-text {
                font-size: 1rem;
                color: #555;
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