<div class="content-wrapper">
    <section class="content">
        <div class="container">
            <div class="row justify-content">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="text-center"><b>TAMBAH SURAT KEMATIAN</b></h4>
                            <hr>
                        </div>

                        <div class="card-body">
                            <?php if ($this->session->flashdata('sukses')) : ?>
                                <div class="alert alert-success" role="alert">
                                    <?php echo $this->session->flashdata('sukses'); ?>
                                </div>
                            <?php endif; ?>

                            <form action="<?php echo base_url('SuratKematian/tambah'); ?>" method="post">
                                <div class="form-group">
                                    <label>NIK</label>
                                    <select name="nik" class="form-control" required>
                                        <?php foreach ($penduduk as $penduduk) : ?>
                                            <option value="<?php echo $penduduk->nik; ?>">
                                                <?php echo $penduduk->nik; ?> - <?php echo $penduduk->nama; ?>
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
                                    <label>Umur Pelapor</label>
                                    <input type="number" name="umur" class="form-control" placeholder="Umur Pelapor" required>
                                </div>

                                <div class="form-group">
                                    <label>Tempat Tanggal Lahir</label>
                                    <div class="row">
                                        <div class="col">
                                            <input type="text" name="tempat" class="form-control" placeholder="Tempat">
                                        </div>
                                        <div class="col">
                                            <input type="date" name="tanggal" class="form-control">
                                        </div>
                                        <div class="col">
                                            <select name="hari" class="form-control" required>
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
                                    <input type="submit" name="tambah_surat_kematian" class="btn btn-success" value="Simpan">
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
