<div class="content-wrapper">
    <section class="content">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header text-center">
                            <h4><b><?= $title ?></b></h4>
                            <hr>
                        </div>
                        <div class="card-body">
                            <?php if ($this->session->flashdata('sukses')) : ?>
                                <div class="alert alert-success" role="alert">
                                    <?php echo $this->session->flashdata('sukses'); ?>
                                </div>
                            <?php endif; ?>

                            <form action="<?php echo base_url('Penghasilan/edit/' . $id); ?>" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="nik">NIK</label>
                                    <select name="nik" class="form-control" required>
                                        <?php foreach ($penduduk as $p) : ?>
                                            <option value="<?php echo $p->nik; ?>" <?php echo ($p->nik == $penghasilan->nik) ? 'selected' : ''; ?>>
                                                <?php echo $p->nik; ?> - <?php echo $p->nama; ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="jumlah">Jumlah Penghasilan</label>
                                    <input type="number" value="<?php echo $penghasilan->jumlah_penghasilan; ?>" name="jumlah" class="form-control" placeholder="Jumlah Penghasilan" required />
                                </div>
                                <div class="form-group">
                                    <label for="keperluan">Keperluan</label>
                                    <input type="text" value="<?php echo $penghasilan->keperluan_penghasilan; ?>" name="keperluan" class="form-control" placeholder="Keperluan" required />
                                </div>
                                <div class="form-group">
                                    <label for="surat_pengantar">Surat Pengantar</label>
                                    <input type="file" class="form-control" name="surat_pengantar">
                                </div>
                                <div class="form-group">
                                    <label for="pejabat">Tanda Tangan</label>
                                    <select name="pejabat" class="form-control" required>
                                        <?php foreach ($pejabat as $data_pejabat) : ?>
                                            <option value="<?= $data_pejabat->id_pejabat; ?>" <?php echo ($data_pejabat->id_pejabat == $penghasilan->id_pejabat) ? 'selected' : ''; ?>>
                                                <?= $data_pejabat->nama_pejabat; ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group text-center">
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