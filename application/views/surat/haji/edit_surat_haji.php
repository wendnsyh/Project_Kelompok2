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

                            <form action="<?php echo base_url('Haji/edit/' . $id); ?>" method="post">
                                <div class="form-group">
                                    <label>NIK</label>
                                    <select name="nik" class="form-control" required>
                                        <?php foreach ($penduduk as $p) : ?>
                                            <option value="<?php echo $p->nik; ?>" <?php echo ($p->nik == $haji->nik) ? 'selected' : ''; ?>>
                                                <?php echo $p->nik; ?> - <?php echo $p->nama; ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Tanggal Keberangkatan</label>
                                    <div class="input-group date">
                                        <input type="date" name="berangkat" class="form-control pull-right" id="" placeholder="Berangkat" />
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Tanda Tangan</label>
                                    <select name="pejabat" class="form-control" required>
                                        <?php foreach ($pejabat as $pejabat) : ?>
                                            <option value="<?php echo $pejabat->id_pejabat; ?>" <?php echo ($pejabat->id_pejabat == $haji->id_pejabat) ? 'selected' : ''; ?>>
                                                <?php echo $pejabat->nama_pejabat; ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <input type="hidden" name="id" value="<?php echo $id; ?>">
                                    <div class="form-group">
                                        <input type="submit" name="edit_haji" class="btn btn-success" value="Simpan">
                                        <a href="<?= base_url('Haji/'); ?>" class="btn btn-danger">Batal</a>
                                    </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>