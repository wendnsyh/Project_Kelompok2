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
                            <form action="<?php echo base_url('Penduduk/proses_edit'); ?>" method="post">
                                <div class="form-group">
                                    <label>No Kartu Keluarga</label>
                                    <input type="text" name="no_kk" value="<?php echo $penduduk->no_kk; ?>" class="form-control" required />
                                    <input type="hidden" name="nik" value="<?php echo $penduduk->nik; ?>" class="form-control" readonly />
                                </div>

                                <div class="form-group">
                                    <label>Nama</label>
                                    <input type="text" name="nama" value="<?php echo $penduduk->nama; ?>" class="form-control" required />
                                </div>
                                <div class="form-group ml-2">
                                    <label>Tempat Tanggal Lahir</label>
                                    <div class="row">
                                        <div class="col-xs-3">
                                            <input type="text" name="tempat_lahir" value="<?php echo $penduduk->tempat_lahir; ?>" class="form-control" placeholder="Tempat">
                                        </div>
                                        <div class="col-xs-3">
                                            <div class="input-group date ml-2">
                                                <input type="date" name="tanggal_lahir" value="<?php echo $penduduk->tanggal_lahir; ?>" class="form-control pull-right" autocomplete="off">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Jenis Kelamin</label>
                                    <select class="select2 form-control custom-select" name="jenis_kelamin" required>
                                        <option value="Laki Laki" <?php if ($penduduk->jenis_kelamin == "L") echo "selected"; ?>>
                                            Laki Laki
                                        </option>
                                        <option value="Perempuan" <?php if ($penduduk->jenis_kelamin == "P") echo "selected"; ?>>
                                            Perempuan
                                        </option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Alamat</label>
                                    <textarea name="alamat" class="form-control" rows="2"><?php echo $penduduk->alamat; ?> </textarea>
                                </div>
                                <div class="form-group">
                                    <label>RT</label>
                                    <input type="text" name="rt" value="<?php echo $penduduk->rt; ?>" class="form-control" required />
                                </div>
                                <div class="form-group">
                                    <label>RW</label>
                                    <input type="text" name="rw" value="<?php echo $penduduk->rw; ?>" class="form-control" required />
                                </div>
                                <div class="form-group">
                                    <label>Agama</label>
                                    <select class="form-control selectlive" name="agama" required>
                                        <option value="<?php echo $penduduk->agama; ?>" selected><?php echo $penduduk->agama; ?>
                                        </option>
                                        <option value="Islam">Islam</option>
                                        <option value="Kristen">Kristen</option>
                                        <option value="Budha">Budha</option>
                                        <option value="Hindu">Hindu</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Pekerjaan</label>
                                    <input type="text" name="pekerjaan" value="<?php echo $penduduk->pekerjaan; ?>" class="form-control" required />
                                </div>
                                <div class="form-group">
                                    <label>Pendidikan Terakhir</label>
                                    <select class="form-control selectlive" name="pendidikan" required>
                                        <option value="<?php echo $penduduk->pendidikan; ?>" selected>
                                            <?php echo $penduduk->pendidikan; ?></option>
                                        <option value="Tidak Sekolah">Tidak Sekolah</option>
                                        <option value="Tidak Tamat SD">Tidak Tamat SD</option>
                                        <option value="SD">SD</option>
                                        <option value="SMP">SMP</option>
                                        <option value="SMA">SMA</option>
                                        <option value="D1">D1</option>
                                        <option value="D2">D2</option>
                                        <option value="D3">D3</option>
                                        <option value="S1">S1</option>
                                        <option value="S2">S2</option>
                                        <option value="S3">S3</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Status Perkawinan</label>
                                    <select class="form-control selectlive" name="status_perkawinan" required>
                                        <option value="<?php echo $penduduk->status_perkawinan; ?>" selected>
                                            <?php echo $penduduk->status_perkawinan; ?></option>
                                        <option value="Menikah">Menikah</option>
                                        <option value="Belum Menikah">Belum Menikah</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Status Tinggal</label>
                                    <select class="form-control selectlive" name="status" required>
                                        <option value="<?php echo $penduduk->status; ?>" selected><?php echo $penduduk->status; ?>
                                        </option>
                                        <option value="Tetap">Tetap</option>
                                        <option value="Kontrak">Kontrak</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Kewarganegaraan</label>
                                    <select class="form-control selectlive" name="kewarganegaraan" required>
                                        <option value="<?php echo $penduduk->kewarganegaraan; ?>" selected>
                                            <?php echo $penduduk->kewarganegaraan; ?></option>
                                        <option value="Indonesia">Indonesia</option>
                                        <option value="Warga Negara Asing">Warga Negara Asing</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-success">Simpan</button>
                                    <a href="<?php echo base_url('Penduduk/'); ?>" class="btn btn-danger">Batal</a>
                                </div>

                            </form>
                        </div>
    </section>
</div>