<div class="content-wrapper">
    <section class="content">
        <div class="container">
            <div class="row " style="margin-top: 150px;">
                <div class="col-md-12 text-center">
                    <h2 class="mb-4">Berita Terbaru </h2>
                    <p class="lead">Untuk Warga Kelurahan Serpong:</p>
                </div>
                <?php foreach ($berita as $b) : ?>
                    <div class="col-md-4">
                        <a href="<?= base_url('berita/detail/' . $b['id']); ?>" style="text-decoration: none; color: inherit;">
                            <div class="service-box">
                                <img src="<?= base_url('uploads/berita/' . $b['image']); ?>" alt="Gambar Berita">
                                <h5><?= $b['judul']; ?></h5>
                                <p><?= $b['ringkasan']; ?></p>
                                <small class="text-muted"><?= $b['created_at']; ?></small>
                                <a href="<?= base_url('Berita/detail/' . $b['id']); ?>" class="btn btn-success btn-sm">Info</a>
                            </div>
                        </a>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </section>
</div>