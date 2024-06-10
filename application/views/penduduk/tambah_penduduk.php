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



                            <form action="<?= base_url('penduduk/proses_tambah'); ?>" method="post" enctype=multipart/form-data>
                                <div class="form-group">
                                    <label>NIK</label>
                                    <input type="text" name="nik" class="form-control" value="<?= set_value('nik'); ?>" required />
                                    <?= form_error('nik', '<div class="text-danger">', '</div>'); ?>
                                </div>

                                <div class="form-group">
                                    <label>No Kartu Keluarga</label>
                                    <input type="text" name="no_kk" class="form-control" value="<?= set_value('no_kk'); ?>" required />
                                    <?= form_error('no_kk', '<div class="text-danger">', '</div>'); ?>
                                </div>

                                <div class="form-group">
                                    <label>Nama</label>
                                    <input type="text" name="nama" class="form-control" value="<?= set_value('nama'); ?>" required />
                                    <?= form_error('nama', '<div class="text-danger">', '</div>'); ?>
                                </div>

                                <div class="form-group">
                                    <label>Tempat Tanggal Lahir</label>
                                    <div class="row">
                                        <div class="col-xs-6 ml-2 ">
                                            <input type="text" name="tempat_lahir" class="form-control" value="<?= set_value('tempat_lahir'); ?>" placeholder="Tempat" />
                                            <?= form_error('tempat_lahir', '<div class="text-danger">', '</div>'); ?>
                                        </div>
                                        <div class="col-xs-6 ml-2">
                                            <input type="date" name="tanggal_lahir" class="form-control" value="<?= set_value('tanggal_lahir'); ?>" placeholder="Tanggal Lahir" />
                                            <?= form_error('tanggal_lahir', '<div class="text-danger">', '</div>'); ?>
                                        </div>
                                    </div>
                                </div>


                                <div class="form-group">
                                    <label>Jenis Kelamin</label>
                                    <select name="jenis_kelamin" class="form-control" required>
                                        <option value="" selected disabled>- pilih -</option>
                                        <option value="Laki Laki" <?= set_select('jenis_kelamin', 'Laki Laki'); ?>>Laki Laki</option>
                                        <option value="Perempuan" <?= set_select('jenis_kelamin', 'Perempuan'); ?>>Perempuan</option>
                                    </select>
                                    <?= form_error('jenis_kelamin', '<div class="text-danger">', '</div>'); ?>
                                </div>

                                <div class="form-group">
                                    <label>Alamat</label>
                                    <textarea name="alamat" class="form-control" rows="3" required><?= set_value('alamat'); ?></textarea>
                                    <?= form_error('alamat', '<div class="text-danger">', '</div>'); ?>
                                </div>
                                <div class="form-group">
                                    <label>RT</label>
                                    <input type="text" name="rt" class="form-control" value="<?= set_value('rt'); ?>" required />
                                    <?= form_error('rt', '<div class="text-danger">', '</div>'); ?>
                                </div>

                                <div class="form-group">
                                    <label>RW</label>
                                    <input type="text" name="rw" class="form-control" value="<?= set_value('rw'); ?>" required />
                                    <?= form_error('rw', '<div class="text-danger">', '</div>'); ?>
                                </div>

                                <div class="form-group">
                                    <label>Agama</label>
                                    <select class="form-control selectlive" name="agama" required>
                                        <option value="" selected disabled>- pilih -</option>
                                        <option value="Islam" <?= set_select('agama', 'Islam'); ?>>Islam</option>
                                        <option value="Kristen" <?= set_select('agama', 'Kristen'); ?>>Kristen</option>
                                        <option value="Katholik" <?= set_select('agama', 'Katholik'); ?>>Katholik</option>
                                        <option value="Hindu" <?= set_select('agama', 'Hindu'); ?>>Hindu</option>
                                        <option value="Budha" <?= set_select('agama', 'Budha'); ?>>Budha</option>
                                        <option value="Konghucu" <?= set_select('agama', 'Konghucu'); ?>>Konghucu</option>
                                    </select>
                                    <?= form_error('agama', '<div class="text-danger">', '</div>'); ?>
                                </div>

                                <div class="form-group">
                                    <label>Pekerjaan</label>
                                    <input type="text" name="pekerjaan" class="form-control" value="<?= set_value('pekerjaan'); ?>" required />
                                    <?= form_error('pekerjaan', '<div class="text-danger">', '</div>'); ?>
                                </div>

                                <div class="form-group">
                                    <label>Pendidikan</label>
                                    <select name="pendidikan" class="form-control" required>
                                        <option value="" selected disabled>- pilih -</option>
                                        <option value="Tidak Sekolah" <?= set_select('pendidikan', 'Tidak Sekolah'); ?>>Tidak Sekolah</option>
                                        <option value="Tidak Tamat SD" <?= set_select('pendidikan', 'Tidak Tamat SD'); ?>>Tidak Tamat SD</option>
                                        <option value="SD" <?= set_select('pendidikan', 'SD'); ?>>SD</option>
                                        <option value="SMP" <?= set_select('pendidikan', 'SMP'); ?>>SMP</option>
                                        <option value="SMA" <?= set_select('pendidikan', 'SMA'); ?>>SMA</option>
                                        <option value="D1" <?= set_select('pendidikan', 'D1'); ?>>D1</option>
                                        <option value="D2" <?= set_select('pendidikan', 'D2'); ?>>D2</option>
                                        <option value="D3" <?= set_select('pendidikan', 'D3'); ?>>D3</option>
                                        <option value="S1" <?= set_select('pendidikan', 'S1'); ?>>S1</option>
                                        <option value="S2" <?= set_select('pendidikan', 'S2'); ?>>S2</option>
                                        <option value="S3" <?= set_select('pendidikan', 'S3'); ?>>S3</option>
                                    </select>
                                    <?= form_error('pendidikan', '<div class="text-danger">', '</div>'); ?>
                                </div>

                                <div class="form-group">
                                    <label>Status Perkawinan</label>
                                    <select name="status_perkawinan" class="form-control" required>
                                        <option value="" selected disabled>- pilih -</option>
                                        <option value="Menikah" <?= set_select('status_perkawinan', 'Menikah'); ?>>Menikah</option>
                                        <option value="Belum Menikah" <?= set_select('status_perkawinan', 'Belum Menikah'); ?>>Belum Menikah</option>
                                    </select>
                                    <?= form_error('status_perkawinan', '<div class="text-danger">', '</div>'); ?>
                                </div>

                                <div class="form-group">
                                    <label>Status Tinggal</label>
                                    <select name="status" class="form-control" required>
                                        <option value="" selected disabled>- pilih -</option>
                                        <option value="Tetap" <?= set_select('status', 'Tetap'); ?>>Tetap</option>
                                        <option value="Kontrak" <?= set_select('status', 'Kontrak'); ?>>Kontrak</option>
                                    </select>
                                    <?= form_error('status', '<div class="text-danger">', '</div>'); ?>
                                </div>

                                <div class="form-group">
                                    <label>Kewarganegaraan</label>
                                    <select name="kewarganegaraan" class="form-control" required>
                                        <option value="" selected disabled>- pilih -</option>
                                        <option value="Indonesia" <?= set_select('kewarganegaraan', 'Indonesia'); ?>>Indonesia</option>
                                        <option value="Warga Negara Asing" <?= set_select('kewarganegaraan', 'Warga Negara Asing'); ?>>Warga Negara Asing</option>
                                    </select>
                                    <?= form_error('kewarganegaraan', '<div class="text-danger">', '</div>'); ?>
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                    <a href="<?= base_url('penduduk'); ?>" class="btn btn-danger">Batal</a>
                                </div>
                                <?= form_close(); ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</div>
</section>