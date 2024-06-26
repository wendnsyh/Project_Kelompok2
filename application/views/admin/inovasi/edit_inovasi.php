<div class="content-wrapper">
    <section class="content">
        <div class="container">
            <div class="row justify-content">
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
                            <?= form_open_multipart('faq/edit_faq/' . $faq['id']); ?>
                            <div class="form-group">
                                <label for="question">Pertanyaan:</label>
                                <input type="text" class="form-control" id="question" name="question" value="<?php echo isset($faq['question']) ? $faq['question'] : ''; ?>" required>
                                <?= form_error('question', '<small class="text-danger">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label for="answer">Jawaban:</label>
                                <textarea name="answer" id="answer" required class="form-control"><?php echo isset($faq['answer']) ? $faq['answer'] : ''; ?></textarea>
                                <?= form_error('answer', '<small class="text-danger">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <label for="image">Gambar (opsional):</label>
                                <input type="file" name="image" id="image" class="form-control">
                                <?php if (!empty($faq['image'])) : ?>
                                    <img src="<?= base_url('uploads/faq/' . $faq['image']); ?>" alt="Image" class="img-thumbnail mt-2" width="200">
                                <?php endif; ?>
                            </div>
                            <button type="submit" class="btn btn-success btn-sm">Simpan Perubahan</button>
                            <a href="<?= base_url('faq/admin'); ?>" class="btn btn-danger btn-sm">Batal</a>
                            <?= form_close(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>