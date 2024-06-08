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

                            <form action="<?php echo base_url('SkPindah/edit/' . $id); ?>" method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                <label>NIK Kepala Keluarga</label>
                                <input type="hidden" name="id" class="form-control" required value="<?php echo $pindah->id_pindah; ?>" />
                                <select name="nik_kepala" class="form-control" required>
                                    <?php
                                    foreach ($penduduk as $penduduk) :
                                        if ($penduduk->nik == $pindah->nik_kepala_keluarga) {
                                    ?>
                                            <option value="<?php echo $penduduk->nik; ?>" selected><?php echo $penduduk->nik; ?> - <?php echo $penduduk->nama; ?></option>
                                        <?php
                                        } else {
                                        ?>
                                            <option value="<?php echo $penduduk->nik; ?>"><?php echo $penduduk->nik; ?> - <?php echo $penduduk->nama; ?></option>
                                    <?php
                                        }
                                    endforeach;
                                    ?>
                                </select>
                        </div>
                        <div class="form-group">
                            <label>NIK Pemohon</label>
                            <select name="nik_pemohon" class="form-control" required>
                                <?php
                                foreach ($pendudukk as $pendudukk) :
                                    if ($pendudukk->nik == $pindah->nik_pemohon) {
                                ?>
                                        <option value="<?php echo $pendudukk->nik; ?>" selected><?php echo $pendudukk->nik; ?> - <?php echo $pendudukk->nama; ?></option>
                                    <?php
                                    } else {
                                    ?>
                                        <option value="<?php echo $pendudukk->nik; ?>"><?php echo $pendudukk->nik; ?> - <?php echo $pendudukk->nama; ?></option>
                                <?php
                                    }
                                endforeach;
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Alasan Pindah</label>
                            <select name="alasan" class="form-control" required>
                                <option value="Pekerjaan" <?php if ($pindah->alasan_pindah == "Pekerjaan") {
                                                                echo "selected";
                                                            } ?>>Pekerjaan</option>
                                <option value="Pendidikan" <?php if ($pindah->alasan_pindah == "Pendidikan") {
                                                                echo "selected";
                                                            } ?>>Pendidikan</option>
                                <option value="Keamanan" <?php if ($pindah->alasan_pindah == "Keamanan") {
                                                                echo "selected";
                                                            } ?>>Keamanan</option>
                                <option value="Kesehatan" <?php if ($pindah->alasan_pindah == "Kesehatan") {
                                                                echo "selected";
                                                            } ?>>Kesehatan</option>
                                <option value="Perumahan" <?php if ($pindah->alasan_pindah == "Perumahan") {
                                                                echo "selected";
                                                            } ?>>Perumahan</option>
                                <option value="Keluarga" <?php if ($pindah->alasan_pindah == "Keluarga") {
                                                                echo "selected";
                                                            } ?>>Keluarga</option>
                                <option value="Lainnya" <?php if ($pindah->alasan_pindah == "Lainnya") {
                                                            echo "selected";
                                                        } ?>>Lainnya</option>
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Alamat Tujuan</label>
                            <textarea name="alamat" class="form-control" placeholder="Alamat Tujuan" required><?php echo $pindah->alamat_pindah; ?></textarea>
                        </div>

                        <div class="form-group">
                            <label>RT</label>
                            <input type="text" name="rt" class="form-control" placeholder="RT" required value="<?php echo $pindah->rt_pindah; ?>" />
                        </div>
                        <div class="form-group">
                            <label>RW</label>
                            <input type="text" name="rw" class="form-control" placeholder="RW" required value="<?php echo $pindah->rw_pindah; ?>" />
                        </div>

                        <div class="form-group">
                            <label>Desa</label>
                            <input type="text" name="desa" class="form-control" placeholder="Desa" required value="<?php echo $pindah->desa_pindah; ?>" />
                        </div>
                        <div class="form-group">
                            <label>Kecamatan</label>
                            <input type="text" name="kecamatan" class="form-control" placeholder="Kecamatan" required value="<?php echo $pindah->kecamatan_pindah; ?>" />
                        </div>
                        <div class="form-group">
                            <label>kota</label>
                            <input type="text" name="kota" class="form-control" placeholder="kota" required value="<?php echo $pindah->kota_pindah; ?>" />
                        </div>
                        <div class="form-group">
                            <label>Provinsi</label>
                            <input type="text" name="provinsi" class="form-control" placeholder="Provinsi" required value="<?php echo $pindah->provinsi_pindah; ?>" />
                        </div>
                        <div class="form-group">
                            <label>Kode Pos</label>
                            <input type="text" name="kode_pos" class="form-control" placeholder="Kode Pos" required value="<?php echo $pindah->kode_pos_pindah; ?>" />
                        </div>

                        <div class="form-group">
                            <label>Suray Pengantar</label>
                            <input type="file" name="surat_pengantar" class="form-control" required value="<?php echo $pindah->surat_pengantar; ?>" />
                        </div>

                        <div class="form-group">
                            <label>Tanda Tangan</label>
                            <select name="pejabat" class="form-control" required>
                                <?php
                                foreach ($pejabat as $pejabat) :
                                    if ($pejabat->id_pejabat == $pindah->id_pejabat) {
                                ?>
                                        <option value="<?php echo $pejabat->id_pejabat; ?>"><?php echo $pejabat->nama_pejabat; ?></option>
                                    <?php
                                    } else {
                                    ?>
                                        <option value="<?php echo $pejabat->id_pejabat; ?>"><?php echo $pejabat->nama_pejabat; ?></option>
                                <?php
                                    }
                                endforeach;
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <input type="submit" name="edit_pindah" class="btn btn-success" value="Simpan">
                            <a href="<?php echo base_url('SkPindah/'); ?>" class="btn btn-danger">Batal</a>
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