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

                            <form action="<?php echo base_url('SkMenikah/edit/' . $id); ?>" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label>NIK</label>
                                    <input type="hidden" name="id" value="<?= $menikah->id_menikah ?>">
                                    <select name="nik" class="form-control" required>
                                        <?php
                                        foreach ($penduduk as $penduduk) :
                                            if ($penduduk->nik == $menikah->nik) {
                                        ?>
                                                <option value="<?php echo $penduduk->nik; ?>" selected><?php echo $penduduk->nik; ?> - <?php echo $penduduk->nama; ?></option>
                                            <?php
                                            } else {
                                            ?>
                                                <option value="<?php echo $penduduk->nik; ?>"><?php echo $penduduk->nik; ?> - <?php echo $penduduk->nama; ?></option>
                                        <?php
                                            }
                                        endforeach;
                                        ?>
                                    </select>
                                </div>
                                <div class="form-gorup">
                                    <label>Alasan</label>
                                    <input type="text" name="alasan" class="form-control" required value="<?php echo $menikah->alasan; ?>" />
                                </div>
                                <div class="form-group">
                                        <label>Surat Pengantar</label>
                                        <input type="file" name="surat_pengantar" class="form-control" value="<?php echo $menikah->surat_pengantar; ?>" />
                                    </div>
                                <div class="form-group">
                                    <label>Tanda Tangan</label>
                                    <select name="pejabat" class="form-control" required>
                                        <?php
                                        foreach ($pejabat as $pejabat) :
                                            if ($pejabat->id_pejabat == $sktm->id_pejabat) {
                                        ?>
                                                <option value="<?php echo $pejabat->id_pejabat; ?>">
                                                    <?php echo $pejabat->nama_pejabat; ?></option>
                                            <?php
                                            } else {
                                            ?>
                                                <option value="<?php echo $pejabat->id_pejabat; ?>">
                                                    <?php echo $pejabat->nama_pejabat; ?></option>
                                        <?php
                                            }
                                        endforeach;
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <input type="submit" name="edit_menikah" class="btn btn-success" value="Simpan">
                                    <a href="<?php echo base_url('SkMenikah/'); ?>" class="btn btn-danger">Batal</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>