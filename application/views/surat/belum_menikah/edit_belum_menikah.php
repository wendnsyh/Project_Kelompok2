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

                            <form action="<?php echo base_url('BelumMenikah/edit/' . $id); ?>" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label>NIK</label>
                                    <select name="nik" class="form-control" required>
                                        <?php foreach ($penduduk as $p) : ?>
                                            <option value="<?php echo $p->nik; ?>" <?php echo ($p->nik == $belum_menikah->nik) ? 'selected' : ''; ?>>
                                                <?php echo $p->nik; ?> - <?php echo $p->nama; ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Alasan</label>
                                    <input type="text" name="alasan" class="form-control" placeholder="alasan" required value="<?php echo $belum_menikah->alasan; ?>" required />
                                </div>

                                <div class="form-group">
                                    <label>Surat Pengantar</label>
                                    <input type="file" name="surat_pengantar" class="form-control" value="<?php echo $belum_menikah->surat_pengantar; ?>" required />
                                </div>

                                <div class="form-group">
                                    <label>Tanda Tangan</label>
                                    <select name="pejabat" class="form-control" required>
                                        <?php foreach ($pejabat as $pejabat) : ?>
                                            <option value="<?php echo $pejabat->id_pejabat; ?>" <?php echo ($pejabat->id_pejabat == $belum_menikah->id_pejabat) ? 'selected' : ''; ?>>
                                                <?php echo $pejabat->nama_pejabat; ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                                    <div class="form-group">
                                        <input type="submit" name="edit_belum_menikah" class="btn btn-success" value="Simpan">
                                        <a href="<?= base_url('BelumMenikah/'); ?>" class="btn btn-danger">Batal</a>
                                    </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>