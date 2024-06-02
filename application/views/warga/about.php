<div class="container mt-5">
    <div class="section-title text-center">
        <h2>TENTANG KAMI</h2>
        <img src="<?php echo base_url('assets/img/logo/logo_web.png'); ?>" class="img-fluid" alt="Logo">
    </div>

    <div class="section-title text-center">
        <div class="logo-container"></div>
        <h2>KELURAHAN SERPONG</h2>
        <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint
            consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat
            sit in iste officiis commodi quidem hic quas.</p>
    </div>

    <div class="row mt-5">
        <div class="col-lg-6">
            <div class="section-title text-center">
                <h2>VISI KELURAHAN SERPONG</h2>
                <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem.
                    Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias
                    ea.
                    Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
            </div>
        </div>
        <div class="col-lg-6">
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
            <div class="section-title text-center">
                <h2 class="text-center font-weight-bold">PROFIL PEJABAT KELURAHAN</h2>
                <div class="row mt-5 justify-content-center">
                    <div class="col-lg-3 col-md-6 col-sm-12 mb-4">
                        <div class="card text-center mx-auto">
                            <img src="<?php echo base_url('assets/img/profile/bupati.png'); ?>" class="card-img-top"
                                alt="" style="width: 100px; height: auto; object-fit: cover;">
                            <div class="card-body">
                                <h3 class="card-title">Muhamad Azhri A.</h3>
                                <p class="card-text">LURAH</p>
                                <p class="card-text">muhamadazhri06@gmail.com</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-sm-12 mb-4">
                        <div class="card text-center mx-auto">
                            <img src="<?php echo base_url('assets/img/profile/wakil-bupati.jpg'); ?>"
                                class="card-img-top" alt=" wakil lurah"
                                style="width: 100px; height: auto; object-fit: cover;">
                            <div class="card-body">
                                <h3 class="card-title">Najdah Ibtisamah S.A.</h3>
                                <p class="card-text">WAKIL LURAH</p>
                                <p class="card-text">najdahh.isa@gmail.com</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-5">
        <div class="col-lg-12">
            <div class="section-title text-center"></div>
            <div class="mt-5">
                <h2 class="text-center font-weight-bold">LOKASI KELURAHAN SERPONG</h2>
                <div id="map" style="height: 400px; width: 100%;"></div>
            </div>
        </div>
    </div>
</div>

<script src="<?php echo base_url('assets/js/bootstrap.bundle.min.js'); ?>"></script>
<script>
    function initMap() {
        var serpong = { lat: -6.304078, lng: 106.687103 };
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
<script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDKA3XHenTbj605xuqeJIlEM0Q9r8PYdlc&callback=initMap"></script>