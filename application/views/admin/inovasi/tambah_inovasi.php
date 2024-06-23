<div class="content-wrapper">
    <section class="content">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="text-center"><b><?= $title ?></b></h4>
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
                            <?php echo form_open_multipart('faq/add_faq'); ?>
                            <div class="form-group">
                                <label for="question">Judul: </label>
                                <input type="text" name="question" id="question" required class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="answer">Isi: </label>
                                <textarea name="answer" id="answer" required class="form-control"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="image">Gambar (opsional):</label>
                                <input type="file" name="image" id="image" class="form-control">
                            </div>
                            <button type="submit" class="btn btn-success btn-sm">Tambah</button>
                            <?php echo form_close(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>