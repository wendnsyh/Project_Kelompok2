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
                                    <?php echo $this->session->flashdata('sukses'); ?>
                                </div>
                            <?php endif; ?>

                            <form action="<?php echo base_url('SkCerai_mati/edit/' . $id); ?>" method="post">
                                <div class="form-group">
                                    <label>NIK</label>
                                    <select name="nik" class="form-control" required>
                                        <?php foreach ($penduduk as $p) : ?>
                                            <option value="<?php echo $p->nik; ?>" <?php echo ($p->nik == $penghasilan->nik) ? 'selected' : ''; ?>>
                                                <?php echo $p->nik; ?> - <?php echo $p->nama; ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                        </div>
                        <div class="form-group">
                            <label>Jumlah Penghasilan</label>
                            <input type="number" value="<?php echo $penghasilan->jumlah_penghasilan; ?>" name="jumlah" class="form-control" placeholder="Jumlah Penghasilan" required />
                        </div>
                        <div class="form-group">
                            <label>Keperluan</label>
                            <input type="text" value="<?php echo $penghasilan->keperluan_penghasilan; ?>" name="keperluan" class="form-control" placeholder="Keperluan" required />
                        </div>
                        <div class="form-group">
                            <label>Tanda Tangan</label>
                            <select name="pejabat" class="form-control" required>
                                <?php foreach ($pejabat as $data_pejabat) : ?>
                                    <option value="<?= $data_pejabat->id_pejabat; ?>">
                                        <?= $data_pejabat->nama_pejabat; ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>

                        <div class="form-group">
                            <div class="form-group">
                                <input type="submit" name="edit_penghasilan" class="btn btn-success" value="Simpan">
                                <a href="<?= base_url('Penghasilan/'); ?>" class="btn btn-danger">Batal</a>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>