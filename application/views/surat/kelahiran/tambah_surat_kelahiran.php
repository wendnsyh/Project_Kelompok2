<div class="content-wrapper">
    <section class="content">
        <div class="container">
            <div class="row justify-content">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="text-center"><b>TAMBAH SURAT KELAHIRAN</b></h4>
                            <hr>
                        </div>

                        <div class="card-body">
                            <?php if ($this->session->flashdata('sukses')) : ?>
                                <div class="alert alert-success" role="alert">
                                    <?php echo $this->session->flashdata('sukses'); ?>
                                </div>
                            <?php endif; ?>

                            <!-- Tampilkan pesan error validasi -->
                            <?php if (validation_errors()) : ?>
                                <div class="alert alert-danger" role="alert">
                                    <?php echo validation_errors(); ?>
                                </div>
                            <?php endif; ?>

                            <!-- Tampilkan pesan error upload -->
                            <?php if (isset($error) && !empty($error)) : ?>
                                <div class="alert alert-danger" role="alert">
                                    <?php echo $error; ?>
                                </div>
                            <?php endif; ?>

                            <form action="<?php echo base_url('SuratKelahiran/tambah'); ?>" method="post" enctype="multipart/form-data">

                                <div class="form-group">
                                    <label>NIK Ayah</label>
                                    <select name="ayah" class="form-control" required>
                                        <?php foreach ($penduduk as $penduduk) : ?>
                                            <option value="<?php echo $penduduk->nik; ?>">
                                                <?php echo $penduduk->nik; ?> - <?php echo $penduduk->nama; ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>NIK Ibu</label>
                                    <select name="ibu" class="form-control" required>
                                        <?php foreach ($pendudukk as $pendudukk) : ?>
                                            <option value="<?php echo $pendudukk->nik; ?>">
                                                <?php echo $pendudukk->nik; ?> - <?php echo $pendudukk->nama; ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>NIK Pelapor</label>
                                    <select name="pelapor" class="form-control" required>
                                        <?php foreach ($pendudukkk as $pendudukkk) : ?>
                                            <option value="<?php echo $pendudukkk->nik; ?>">
                                                <?php echo $pendudukkk->nik; ?> - <?php echo $pendudukkk->nama; ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Nama Anak</label>
                                    <input type="text" name="nama" class="form-control" placeholder="Nama Anak" required>
                                </div>
                                <div class="form-group">
                                    <label>Surat Pengantar</label>
                                    <input type="file" name="surat_pengantar" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label>Bukti Kelahiran</label>
                                    <input type="file" name="bukti_kelahiran" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label>Jenis Kelamin Anak</label>
                                    <select name="kelamin" class="form-control" required>
                                        <option value="Laki-Laki">Laki-Laki</option>
                                        <option value="Perempuan">Perempuan</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Tempat Tanggal Lahir</label>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <input type="text" name="tempat" class="form-control" placeholder="Tempat">
                                        </div>
                                        <div class="col-md-4">
                                            <input type="date" name="tanggal" class="form-control" required>
                                        </div>
                                        <div class="col-md-4">
                                            <select name="hari" class="form-control" required>
                                                <option value="" selected disabled>- pilih -</option>
                                                <option value="Senin">Senin</option>
                                                <option value="Selasa">Selasa</option>
                                                <option value="Rabu">Rabu</option>
                                                <option value="Kamis">Kamis</option>
                                                <option value="Jumat">Jumat</option>
                                                <option value="Sabtu">Sabtu</option>
                                                <option value="Minggu">Minggu</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>Pukul</label>
                                    <input type="time" name="jam" class="form-control" required>
                                </div>

                                <div class="form-group">
                                    <label>Hubungan Sebagai</label>
                                    <input type="text" name="hubungan" class="form-control" placeholder="Hubungan Sebagai" required>
                                </div>

                                <div class="form-group">
                                    <label>Tanda Tangan</label>
                                    <select name="pejabat" class="form-control" required>
                                        <?php foreach ($pejabat as $data_pejabat) : ?>
                                            <option value="<?php echo $data_pejabat->id_pejabat; ?>">
                                                <?php echo $data_pejabat->nama_pejabat; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <input type="submit" name="tambah_surat_kelahiran" class="btn btn-success" value="Simpan">
                                    <a href="<?php echo base_url('SuratKelahiran'); ?>" class="btn btn-danger">Batal</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>