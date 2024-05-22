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

                            <form action="<?= base_url('SkUsaha/tambah/'); ?>" method="post">

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
                                    <label>Nama Usaha</label>
                                    <input type="text" name="nama" class="form-control" placeholder="Nama Usaha" required />
                                </div>
                                <div class="form-group">
                                    <label>Sejak</label>
                                    <input type="text" name="sejak" class="form-control" placeholder="Sejak" required />
                                </div>
                                <div class="form-group">
                                    <label>Alamat Usaha</label>
                                    <input type="text" name="alamat" class="form-control" placeholder="Sejak" required />
                                </div>
                                <div class="form-group">
                                    <label>Tanda Tangan</label>
                                    <select name="pejabat" class="form-control" required>
                                        <?php
                                        foreach ($pejabat as $data_pejabat) :
                                        ?>
                                            <option value="<?php echo $data_pejabat->id_pejabat; ?>"><?php echo $data_pejabat->nama_pejabat; ?></option>
                                        <?php
                                        endforeach;
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <input type="submit" name="tambah_usaha" class="btn btn-success" value="Simpan">
                                    <a href="<?php echo base_url('SkUsaha/'); ?>" class="btn btn-danger">Batal</a>
                                </div>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
</div>
</section>
</div>