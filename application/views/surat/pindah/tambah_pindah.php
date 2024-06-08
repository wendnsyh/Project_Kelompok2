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

                            <form action="<?= base_url('SkPindah/tambah'); ?>" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label>NIK Kepala Keluarga</label>
                                    <select name="nik_kepala" class="form-control" required>
                                        <?php
                                        foreach ($penduduk as $penduduk) :
                                        ?>
                                            <option value="<?php echo $penduduk->nik; ?>">
                                                <?php echo $penduduk->nik; ?> - <?php echo $penduduk->nama; ?>
                                            </option>
                                        <?php
                                        endforeach;
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>NIK Pemohon</label>
                                    <select name="nik_pemohon" class="form-control" required>
                                        <?php
                                        foreach ($pendudukk as $pendudukk) :
                                        ?>
                                            <option value="<?php echo $pendudukk->nik; ?>">
                                                <?php echo $pendudukk->nik; ?> - <?php echo $pendudukk->nama; ?>
                                            </option>
                                        <?php
                                        endforeach;
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Alasan Pindah</label>
                                    <select name="alasan" class="form-control" required>
                                        <option value="Pekerjaan">Pekerjaan</option>
                                        <option value="Pendidikan">Pendidikan</option>
                                        <option value="Keamanan">Keamanan</option>
                                        <option value="Kesehatan">Kesehatan</option>
                                        <option value="Perumahan">Perumahan</option>
                                        <option value="Keluarga">Keluarga</option>
                                        <option value="Lainnya">Lainnya</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Alamat Tujuan</label>
                                    <textarea name="alamat" class="form-control" placeholder="Alamat Tujuan" required></textarea>
                                </div>

                                <div class="form-group">
                                    <label>RT</label>
                                    <input type="text" name="rt" class="form-control" placeholder="RT" required />
                                </div>
                                <div class="form-group">
                                    <label>RW</label>
                                    <input type="text" name="rw" class="form-control" placeholder="RW" required />
                                </div>
                                <div class="form-group">
                                    <label>Desa</label>
                                    <input type="text" name="desa" class="form-control" placeholder="Desa" required />
                                </div>
                                <div class="form-group">
                                    <label>Kecamatan</label>
                                    <input type="text" name="kecamatan" class="form-control" placeholder="Kecamatan" required />
                                </div>
                                <div class="form-group">
                                    <label>kota</label>
                                    <input type="text" name="kota" class="form-control" placeholder="kota" required />
                                </div>
                                <div class="form-group">
                                    <label>Provinsi</label>
                                    <input type="text" name="provinsi" class="form-control" placeholder="Provinsi" required />
                                </div>
                                <div class="form-group">
                                    <label>Kode Pos</label>
                                    <input type="text" name="kode_pos" class="form-control" placeholder="Kode Pos" required />
                                </div>
                                <div class="form-group">
                                    <label>Foto</label>
                                    <input type="file" name="surat_pengantar" class="form-control" required />
                                </div>
                                <div class="form-group">
                                    <label>Tanda Tangan</label>
                                    <select name="pejabat" class="form-control" required>
                                        <?php
                                        foreach ($pejabat as $data_pejabat) :
                                        ?>
                                            <option value="<?php echo $data_pejabat->id_pejabat; ?>">
                                                <?php echo $data_pejabat->nama_pejabat; ?></option>
                                        <?php
                                        endforeach;
                                        ?>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <input type="submit" name="tambah_pindah" class="btn btn-success" value="Simpan">
                                    <a href="<?php echo base_url('surat/pindah/'); ?>" class="btn btn-danger">Batal</a>
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