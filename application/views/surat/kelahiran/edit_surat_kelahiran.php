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

                            <form action="<?php echo base_url('SuratKelahiran/edit/' . $surat_kelahiran->id_surat_kelahiran); ?>" method="post">

                                <input type="hidden" name="id" value="<?php echo $surat_kelahiran->id_surat_kelahiran; ?>">

                                <div class="form-group">
                                    <label>NIK Ayah</label>
                                    <select name="ayah" class="form-control" required>
                                        <?php foreach ($penduduk as $ayah) : ?>
                                            <option value="<?php echo $ayah->nik; ?>" <?php echo ($ayah->nik == $surat_kelahiran->nik_ayah) ? 'selected' : ''; ?>>
                                                <?php echo $ayah->nik; ?> - <?php echo $ayah->nama; ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>NIK Ibu</label>
                                    <select name="ibu" class="form-control" required>
                                        <?php foreach ($pendudukk as $ibu) : ?>
                                            <option value="<?php echo $ibu->nik; ?>" <?php echo ($ibu->nik == $surat_kelahiran->nik_ibu) ? 'selected' : ''; ?>>
                                                <?php echo $ibu->nik; ?> - <?php echo $ibu->nama; ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>NIK Pelapor</label>
                                    <select name="pelapor" class="form-control" required>
                                        <?php foreach ($pendudukkk as $pelapor) : ?>
                                            <option value="<?php echo $pelapor->nik; ?>" <?php echo ($pelapor->nik == $surat_kelahiran->nik_pelapor) ? 'selected' : ''; ?>>
                                                <?php echo $pelapor->nik; ?> - <?php echo $pelapor->nama; ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Nama Anak</label>
                                    <input type="text" name="nama" class="form-control" value="<?php echo $surat_kelahiran->nama_anak; ?>" placeholder="Nama Anak" required>
                                </div>

                                <div class="form-group">
                                    <label>Jenis Kelamin Anak</label>
                                    <select name="kelamin" class="form-control" required>
                                        <option value="Laki-Laki" <?php echo ($surat_kelahiran->kelamin_anak == 'Laki-Laki') ? 'selected' : ''; ?>>Laki-Laki</option>
                                        <option value="Perempuan" <?php echo ($surat_kelahiran->kelamin_anak == 'Perempuan') ? 'selected' : ''; ?>>Perempuan</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Tempat Tanggal Lahir</label>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <input type="text" name="tempat" class="form-control" value="<?php echo $surat_kelahiran->tempat_lahir_anak; ?>" placeholder="Tempat">
                                        </div>
                                        <div class="col-md-4">
                                            <input type="date" name="tanggal" class="form-control" value="<?php echo $surat_kelahiran->tanggal_lahir_anak; ?>" required>
                                        </div>
                                        <div class="col-md-4">
                                            <select name="hari" class="form-control" required>
                                                <option value="Senin" <?php echo ($surat_kelahiran->hari_lahir_anak == 'Senin') ? 'selected' : ''; ?>>Senin</option>
                                                <option value="Selasa" <?php echo ($surat_kelahiran->hari_lahir_anak == 'Selasa') ? 'selected' : ''; ?>>Selasa</option>
                                                <option value="Rabu" <?php echo ($surat_kelahiran->hari_lahir_anak == 'Rabu') ? 'selected' : ''; ?>>Rabu</option>
                                                <option value="Kamis" <?php echo ($surat_kelahiran->hari_lahir_anak == 'Kamis') ? 'selected' : ''; ?>>Kamis</option>
                                                <option value="Jumat" <?php echo ($surat_kelahiran->hari_lahir_anak == 'Jumat') ? 'selected' : ''; ?>>Jumat</option>
                                                <option value="Sabtu" <?php echo ($surat_kelahiran->hari_lahir_anak == 'Sabtu') ? 'selected' : ''; ?>>Sabtu</option>
                                                <option value="Minggu" <?php echo ($surat_kelahiran->hari_lahir_anak == 'Minggu') ? 'selected' : ''; ?>>Minggu</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>Pukul</label>
                                    <input type="time" name="jam" class="form-control" value="<?php echo $surat_kelahiran->jam_lahir_anak; ?>" required>
                                </div>

                                <div class="form-group">
                                    <label>Hubungan Sebagai</label>
                                    <input type="text" name="hubungan" class="form-control" value="<?php echo $surat_kelahiran->hubungan_sebagai; ?>" placeholder="Hubungan Sebagai" required>
                                </div>

                                <div class="form-group">
                                    <label>Tanda Tangan</label>
                                    <select name="pejabat" class="form-control" required>
                                        <?php foreach ($pejabat as $data_pejabat) : ?>
                                            <option value="<?php echo $data_pejabat->id_pejabat; ?>" <?php echo ($data_pejabat->id_pejabat == $surat_kelahiran->id_pejabat) ? 'selected' : ''; ?>>
                                                <?php echo $data_pejabat->nama_pejabat; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <input type="submit" name="edit_surat_kelahiran" class="btn btn-success" value="Simpan">
                                    <a href="<?php echo base_url('SuratKelahiran/'); ?>" class="btn btn-danger">Batal</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>