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
                            <form action="<?php echo base_url('Pindah/tambah'); ?>" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label>Nomor Induk Kependudukan</label>
                                    <input type="text" name="nik" class="form-control" required />
                                </div>
                                <div class="form-group">
                                    <label>Nama Lengkap</label>
                                    <input type="text" name="nama" class="form-control" required />
                                </div>
                                <div class="form-group">
                                    <label>Agama</label>
                                    <select class="form-control selectlive" name="agama" required>
                                        <option value="" selected disabled>- pilih -</option>
                                        <option value="Islam">Islam</option>
                                        <option value="Kristen">Kristen</option>
                                        <option value="Katholik">Katholik</option>
                                        <option value="Hindu">Hindu</option>
                                        <option value="Budha">Budha</option>
                                        <option value="Konghucu">Konghucu</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Pekerjaan</label>
                                    <input type="text" name="pekerjaan" class="form-control" required />
                                </div>
                                <div class="form-group">
                                    <label>Alamat</label>
                                    <textarea name="alamat" class="form-control" rows="3" required></textarea>
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
                                    <label>Alasan Pindah</label>
                                    <select name="alasan_pindah" class="form-control" required>
                                        <option value="" selected disabled>- pilih -</option>
                                        <option value="Pekerjaan">Pekerjaan</option>
                                        <option value="Keamanan">Keamanan</option>
                                        <option value="Kesehatan">Kesehatan</option>
                                        <option value="Perumahan">Perumahan</option>
                                        <option value="Keluarga">Keluarga</option>
                                        <option value="Lainnya">Lainnya</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Tanggal Pindah</label>
                                    <div class="row">
                                        <div class="col-xs-12">
                                            <div class="input-group date">
                                                <div class="input-group-addon ml-2">

                                                </div>
                                                <input type="date" name="tanggal_pindah" class="form-control pull-right">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Alamat Tujuan</label>
                                    <textarea name="alamat_tujuan" class="form-control" rows="3" required></textarea>
                                </div>
                                <div class="form-group">
                                    <label>Jenis Kepindahan</label>
                                    <select name="jenis_pindah" class="form-control" required>
                                        <option value="" selected disabled>- pilih -</option>
                                        <option value="Kepala Keluarga">Kepala Keluarga</option>
                                        <option value="Kepala Keluarga dan Seluruh Anggota Keluarga">Kepala Keluarga dan
                                            Seluruh Anggota Keluarga</option>
                                        <option value="Kepala Keluarga dan Sebagian Keluarga lainnya">Kepala Keluarga dan
                                            Sebagian Keluarga lainnya</option>
                                        <option value="Anggota Keluarga">Anggota Keluarga</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Klasifikasi Pindah</label>
                                    <select name="klasifikasi_pindah" class="form-control" required>
                                        <option value="" selected disabled>- pilih -</option>
                                        <option value="Dalam satu Desa">Dalam satu Desa</option>
                                        <option value="Antar Desa">Antar Desa</option>
                                        <option value="Antar Kecamatan">Antar Kecamatan</option>
                                        <option value="Antar Kab/Kota">Antar Kab/Kota</option>
                                        <option value="Antar Provinsi">Antar Provinsi</option>
                                    </select>
                                </div>
                                <center>
                                    <div class="form-group">
                                        <button class="btn btn-success">Simpan</button>
                                        <a href="<?php echo base_url('Pindah/'); ?>" class="btn btn-danger">Batal</a>
                                    </div>
                                </center>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>