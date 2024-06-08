<div class="container mt-5">
    <div class="row">
        <div class="col-12 text-center mb-5">
            <h2>Informasi Penduduk Kelurahan Serpong</h2>
        </div>
    </div>
    <div class="row text-center">
        <div class="col-md-4 mb-4">
            <div class="service-box p-4">
                <i class="fas fa-users fa-3x mb-3"></i>
                <h4 class="mb-3">Jumlah Penduduk Kelurahan Serpong</h4>
                <h4><?= $jumlahPenduduk; ?> Orang</h4>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="service-box p-4">
                <i class="fas fa-male fa-3x mb-3"></i>
                <h4 class="mb-3">Jumlah Penduduk Warga Laki-laki</h4>
                <h4><?= $pendudukPria; ?> Orang</h4>
            </div>
        </div>
        <div class="col-md-4 mb-4">
            <div class="service-box p-4">
                <i class="fas fa-female fa-3x mb-3"></i>
                <h4 class="mb-3">Jumlah Penduduk Warga Perempuan</h4>
                <h4><?= $pendudukWanita; ?> Orang</h4>
            </div>
        </div>
    </div>
    <div class="row text-center">
        <div class="col-12">
            <a href="<?= base_url('pages'); ?>" class="btn btn-primary">Kembali</a>
        </div>
    </div>
</div>