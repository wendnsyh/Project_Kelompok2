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

                            <form action="<?= base_url('Penghasilan/tambah'); ?>" method="post" enctype="multipart/form-data">

                                <div class="form-group">
                                    <label>NIK</label>
                                    <?php if ($user['role_id'] == 1) : ?>
                                        <select name="nik" class="form-control" required>
                                            <?php foreach ($penduduk as $p) : ?>
                                                <option value="<?= $p->nik; ?>">
                                                    <?= $p->nik; ?> - <?= $p->nama; ?>
                                                </option>
                                            <?php endforeach; ?>
                                        </select>
                                    <?php else : ?>
                                        <input type="text" name="nik" class="form-control" placeholder="Masukkan NIK" required />
                                    <?php endif; ?>
                                </div>

                                <div class="form-group">
                                    <label>Jumlah Penghasilan</label>
                                    <input type="number" name="jumlah" class="form-control" placeholder="Jumlah Penghasilan" required />
                                </div>
                                <div class="form-group">
                                    <label>Keperluan</label>
                                    <input type="text" name="keperluan" class="form-control" placeholder="Keperluan" required />
                                </div>
                                <div class="form-group">
                                    <label>Surat Pengantar</label>
                                    <input type="file" name="surat_pengantar" class="form-control">
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
                                        <input type="submit" name="tambah_penghasilan" class="btn btn-success" value="Simpan">
                                        <a href="<?= base_url('Penghasilan/'); ?>" class="btn btn-danger">Batal</a>
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