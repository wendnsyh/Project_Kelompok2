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
                            <?php if (isset($error)) : ?>
                                <div class="alert alert-danger" role="alert">
                                    <?= $error; ?>
                                </div>
                            <?php endif; ?>

                            <form action="<?= base_url('SuratDomisili/tambah/'); ?>" method="post" enctype="multipart/form-data">


                                <div class="form-group">
                                    <label>NIK</label>
                                    <select name="nik" class="form-control" required>
                                        <?php foreach ($penduduk as $p) : ?>
                                            <option value="<?php echo $p->nik; ?>">
                                                <?php echo $p->nik; ?> - <?php echo $p->nama; ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Surat Pengantar</label>
                                    <input type="file" name="surat_pengantar" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label>Alasan</label>
                                    <input type="text" name="alasan" class="form-control" placeholder="alasan" required />
                                </div>
                                <div class="form-group">
                                    <label>Tanda Tangan</label>
                                    <select name="pejabat" class="form-control" required>
                                        <?php
                                        foreach ($pejabat as $data_pejabat) :
                                        ?>
                                            <option value="<?php echo $data_pejabat->id_pejabat; ?>">
                                                <?php echo $data_pejabat->nama_pejabat; ?></option>
                                        <?php
                                        endforeach;
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <input type="submit" name="tambah_domisili" class="btn btn-success" value="Simpan">
                                    <a href="<?php echo base_url('SuratDomisili/'); ?>" class="btn btn-danger">Batal</a>
                                </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
</div>
</div>
</div>
</section>
</div>