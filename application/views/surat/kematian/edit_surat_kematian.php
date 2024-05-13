<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="row justify-content">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="text-center"><b>EDIT SURAT KEMATIAN</b></h4>
                            <hr>
                        </div>

                        <div class="card-body">
                            <?php if ($this->session->flashdata('sukses')) : ?>
                                <div class="alert alert-success" role="alert">
                                    <i class="fa fa-check"></i> <?php echo $this->session->flashdata('sukses'); ?>
                                </div>
                            <?php endif; ?>

                            <form action="<?php echo base_url('SuratKematian/surat_kematian/edit'); ?>" method="post">
                                <input type="hidden" name="id" value="<?php echo $surat_kematian->id_surat_kematian; ?>" />

                                <div class="form-group">
                                    <label>NIK</label>
                                    <select name="nik" class="form-control" required>
                                        <?php foreach ($penduduk as $orang) : ?>
                                            <?php if ($orang->nik == $surat_kematian->nik) : ?>
                                                <option value="<?php echo $orang->nik; ?>" selected>
                                                    <?php echo $orang->nik; ?> - <?php echo $orang->nama; ?>
                                                </option>
                                            <?php else : ?>
                                                <option value="<?php echo $orang->nik; ?>">
                                                    <?php echo $orang->nik; ?> - <?php echo $orang->nama; ?>
                                                </option>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>NIK Pelapor</label>
                                    <select name="pelapor" class="form-control" required>
                                        <?php foreach ($pendudukkk as $orang) : ?>
                                            <?php if ($orang->nik == $surat_kematian->nik_pelapor) : ?>
                                                <option value="<?php echo $orang->nik; ?>" selected>
                                                    <?php echo $orang->nik; ?> - <?php echo $orang->nama; ?>
                                                </option>
                                            <?php else : ?>
                                                <option value="<?php echo $orang->nik; ?>">
                                                    <?php echo $orang->nik; ?> - <?php echo $orang->nama; ?>
                                                </option>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Umur Pelapor</label>
                                    <input type="number" name="umur" class="form-control" placeholder="Umur Pelapor" required value="<?php echo $surat_kematian->umur_pelapor; ?>" />
                                </div>

                                <div class="form-group">
                                    <label>Tempat Tanggal Lahir</label>
                                    <div class="row">
                                        <div class="col">
                                            <input type="text" name="tempat" class="form-control" placeholder="Tempat" value="<?php echo $surat_kematian->tempat_kematian; ?>">
                                        </div>
                                        <div class="col">
                                            <input type="date" name="tanggal" class="form-control" value="<?php echo $surat_kematian->tanggal_kematian; ?>">
                                        </div>
                                        <div class="col">
                                            <select name="hari" class="form-control" required>
                                                <option value="Senin" <?php if ($surat_kematian->hari_kematian == "Senin") echo "selected"; ?>>Senin</option>
                                                <option value="Selasa" <?php if ($surat_kematian->hari_kematian == "Selasa") echo "selected"; ?>>Selasa</option>
                                                <option value="Rabu" <?php if ($surat_kematian->hari_kematian == "Rabu") echo "selected"; ?>>Rabu</option>
                                                <option value="Kamis" <?php if ($surat_kematian->hari_kematian == "Kamis") echo "selected"; ?>>Kamis</option>
                                                <option value="Jumat" <?php if ($surat_kematian->hari_kematian == "Jumat") echo "selected"; ?>>Jumat</option>
                                                <option value="Sabtu" <?php if ($surat_kematian->hari_kematian == "Sabtu") echo "selected"; ?>>Sabtu</option>
                                                <option value="Minggu" <?php if ($surat_kematian->hari_kematian == "Minggu") echo "selected"; ?>>Minggu</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>Pukul</label>
                                    <input type="time" name="jam" class="form-control" id="pukul" required value="<?php echo $surat_kematian->jam_kematian; ?>">
                                </div>

                                <div class="form-group">
                                    <label>Hubungan Sebagai</label>
                                    <input type="text" name="hubungan" class="form-control" placeholder="Hubungan Sebagai" required value="<?php echo $surat_kematian->hubungan_sebagai; ?>">
                                </div>

                                <div class="form-group">
                                    <label>Tanda Tangan</label>
                                    <select name="pejabat" class="form-control" required>
                                        <?php foreach ($pejabat as $pegawai) : ?>
                                            <?php if ($pegawai->id_pejabat == $surat_kematian->id_pejabat) : ?>
                                                <option value="<?php echo $pegawai->id_pejabat; ?>" selected>
                                                    <?php echo $pegawai->nama_pejabat; ?>
                                                </option>
                                            <?php else : ?>
                                                <option value="<?php echo $pegawai->id_pejabat; ?>">
                                                    <?php echo $pegawai->nama_pejabat; ?>
                                                </option>
                                            <?php endif; ?>
                                        <?php endforeach; ?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <input type="submit" name="edit_surat_kematian" class="btn btn-success" value="Simpan">
                                    <a href="<?php echo base_url('SuratKematian/surat_kematian/'); ?>" class="btn btn-danger">Batal</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>