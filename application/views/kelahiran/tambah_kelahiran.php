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
                                <div class="callout callout-success">
                                    <p style="font-size:14px">
                                        <i class="fa fa-check"></i> <?= $this->session->flashdata('sukses'); ?>
                                    </p>
                                </div>
                            <?php endif; ?>

                            <form action="<?= base_url('kelahiran/proses_tambah'); ?>" method="post">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="form-group">
                                            <label>Nama</label>
                                            <input type="text" name="nama" id="nama" class="form-control" placeholder="Masukan Nama" required>
                                        </div>
                                        <div class="form-group">
                                            <label>Tempat Tanggal Lahir</label>
                                            <div class="input-group">
                                                <input type="text" name="tempat_lahir" id="tempat_lahir" placeholder="Masukan Tempat Lahir" class="form-control" required>
                                                <input type="date" name="tanggal_lahir" class="form-control" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Pukul</label>
                                            <div class="input-group">
                                                <input type="time" name="pukul" id="pukul" class="form-control timepicker" required>
                                                <div class="input-group-addon">
                                                    <i class="fa fa-clock-o"></i>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label>Jenis Kelamin</label>
                                            <select name="jenis_kelamin" class="form-control" required>
                                                <option value="" selected disabled>- pilih -</option>
                                                <option value="Laki Laki">Laki Laki</option>
                                                <option value="Perempuan">Perempuan</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <label>Nama Ayah</label>
                                            <input type="text" name="nama_ayah" class="form-control" required />
                                        </div>
                                        <div class="form-group">
                                            <label>Pekerjaan Ayah</label>
                                            <input type="text" name="pekerjaan_ayah" class="form-control" required />
                                        </div>
                                        <div class="form-group">
                                            <label>Nama Ibu</label>
                                            <input type="text" name="nama_ibu" class="form-control" required />
                                        </div>
                                        <div class="form-group">
                                            <label>Pekerjaan Ibu</label>
                                            <input type="text" name="pekerjaan_ibu" class="form-control" required />
                                        </div>
                                        <div class="form-group">
                                            <label>Alamat</label>
                                            <textarea name="alamat" class="form-control" rows="4" required></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label>RT</label>
                                            <input type="text" name="rt" class="form-control" required />
                                        </div>
                                        <div class="form-group">
                                            <label>RW</label>
                                            <input type="text" name="rw" class="form-control" required>
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-success">Simpan</button>
                                            <a href="<?= base_url('kelahiran'); ?>" class="btn btn-danger">Batal</a>
                                        </div>
                                    </div>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>
</section>