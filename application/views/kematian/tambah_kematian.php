<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800"><strong><?php echo $title ?></strong></h1>
    </div>

    <div class="card" style="width: 60%; margin-bottom: 100px;">
        <div class="card-body">
            <?php if ($this->session->flashdata('sukses')) : ?>
                <div class="callout callout-success">
                    <p style="font-size:14px">
                        <i class="fa fa-check"></i> <?php echo $this->session->flashdata('sukses'); ?>
                    </p>
                </div>
            <?php endif; ?>

            

            <form action="<?php echo base_url('kematian/proses_tambah'); ?>" method="post">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="form-group">
                            <label>Nama Lengkap</label>
                            <input type="hidden" name="id_kematian" value="<? $row->id_kematian ?>">
                            <input type="text" name="nama" class="form-control" required />
                        </div>

                        <div class="form-group">
                            <label>Jenis Kelamin</label>
                            <select name="jenis_kelamin" class="form-control" required>
                                <option value="" selected disabled>- pilih -</option>
                                <option value="Laki Laki">Laki Laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </select>
                        </div>

                        <div class="form-group ml-2">
                            <label>Tempat Tanggal Lahir</label>
                            <div class="row">
                                <div class="col-xs-5">
                                    <input type="text" name="tempat_lahir" class="form-control" placeholder="Tempat">
                                </div>
                                <div class="col-xs-5 ml-3">
                                    <input type="text" name="tanggal_lahir" class="form-control pull-right" placeholder="Tanggal Lahir atau Usia">
                                </div>
                            </div>
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
                            <label>Alamat Duka</label>
                            <textarea name="alamat" class="form-control" rows="3" required></textarea>
                        </div>

                        <div class="form-group">
                            <label>RT</label>
                            <input type="text" name="rt" class="form-control" required />
                        </div>

                        <div class="form-group">
                            <label>RW</label>
                            <select name="rw" class="form-control" required>
                                <option value="" selected disabled>- pilih -</option>
                                <option value="Kepala Dusun Krajan 1">Kepala Dusun Krajan 1</option>
                                <option value="Kepala Dusun Krajan 2">Kepala Dusun Krajan 2</option>
                                <option value="Kepala Dusun Sukamaju">Kepala Dusun Sukamaju</option>
                                <option value="Kepala Dusun Sukamulya">Kepala Dusun Sukamulya</option>
                                <option value="Kepala Dusun WarnaJaya">Kepala Dusun WarnaJaya</option>
                                <option value="Perumahan Bumi Karawang Permai">Perumahan Bumi Karawang Permai</option>
                                <option value="Perumahan Gading Elok 2">Perumahan Gading Elok 2</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Tanggal Wafat</label>
                            <div class="row">
                                <div class="col-xs-4">
                                    <select name="hari_wafat" class="form-control" required>
                                        <option value="" selected disabled>- pilih hari -</option>
                                        <option value="Senin">Senin</option>
                                        <option value="Selasa">Selasa</option>
                                        <option value="Rabu">Rabu</option>
                                        <option value="Kamis">Kamis</option>
                                        <option value="Jumat">Jumat</option>
                                        <option value="Sabtu">Sabtu</option>
                                        <option value="Minggu">Minggu</option>
                                    </select>
                                </div>
                                <div class="col-xs-5 ml-3">
                                    <input type="date" name="tanggal_wafat" class="form-control pull-right" placeholder="tanggal wafat">
                                </div>
                                <div class="col-xs-2">
                                    <div class="input-group time">
                                        <div class="input-group-addon ml-2">
                                            <label for="">Pukul</label>
                                        </div>
                                        <input type="time" name="pukul" class="form-control" required />
                                    </div>
                                </div>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-success">Simpan</button>
                        <a href="<?php echo base_url('kematian'); ?>" class="btn btn-danger">Batal</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>