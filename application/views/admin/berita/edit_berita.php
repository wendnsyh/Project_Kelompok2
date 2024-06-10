<div class="content-wrapper">
    <section class="content">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="text-center"><b>Edit Berita</b></h4>
                            <hr>
                        </div>
                        <div class="card-body">
                            <?php if ($this->session->flashdata('sukses')) : ?>
                                <div class="alert alert-success" role="alert">
                                    <?= $this->session->flashdata('sukses'); ?>
                                </div>
                            <?php endif; ?>
                            <?php if ($this->session->flashdata('error')) : ?>
                                <div class="alert alert-danger" role="alert">
                                    <?= $this->session->flashdata('error'); ?>
                                </div>
                            <?php endif; ?>
                            <?= form_open_multipart('berita/edit/' . $berita['id']); ?>
                            <div class="form-group">
                                <label for="judul">Judul:</label>
                                <input type="text" class="form-control" id="judul" name="judul" value="<?php echo isset($berita['judul']) ? $berita['judul'] : ''; ?>" required>
                                <?= form_error('judul', '<small class="text-danger">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label for="ringkasan">Ringkasan:</label>
                                <textarea name="ringkasan" id="ringkasan" required class="form-control"><?php echo isset($berita['ringkasan']) ? $berita['ringkasan'] : ''; ?></textarea>
                                <?= form_error('ringkasan', '<small class="text-danger">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label for="isi">Isi:</label>
                                <textarea name="isi" id="isi" required class="form-control"><?php echo isset($berita['isi']) ? $berita['isi'] : ''; ?></textarea>
                                <?= form_error('isi', '<small class="text-danger">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label for="image">Gambar (opsional):</label>
                                <input type="file" name="image" id="image" class="form-control">
                                <?php if (!empty($berita['image'])) : ?>
                                    <img src="<?= base_url('uploads/berita/' . $berita['image']); ?>" alt="Image" class="img-thumbnail mt-2" width="200">
                                <?php endif; ?>
                            </div>
                            <button type="submit" class="btn btn-success btn-sm">Simpan Perubahan</button>
                            <a href="<?= base_url('berita/admin'); ?>" class="btn btn-danger btn-sm">Batal</a>
                            <?= form_close(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>