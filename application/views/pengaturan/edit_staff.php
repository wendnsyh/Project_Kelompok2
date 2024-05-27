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
                            <form action="<?php echo base_url('Pengaturan/proses_edit/' . $id); ?>" method="post">
                                <div class="form-group">
                                    <label>Nama</label>
                                    <input type="hidden" name="id" value="<?php echo $pengaturan->id_pejabat; ?>" class="form-control" />
                                    <input type="text" name="nama" value="<?php echo $pengaturan->nama_pejabat; ?>" class="form-control" />
                                </div>
                                <div class="form-group">
                                    <label>NIP</label>
                                    <input type="text" name="nip" value="<?php echo $pengaturan->nip_pejabat; ?>" class="form-control" />
                                </div>
                                <div class="form-group">
                                    <label>Jenis Kelamin</label>
                                    <select class="select2 form-control custom-select" name="jenis_kelamin" required>
                                        <option value="Laki Laki" <?php if ($pengaturan->jenis_kelamin == "Laki Laki") echo "selected"; ?>>Laki Laki</option>
                                        <option value="Perempuan" <?php if ($pengaturan->jenis_kelamin == "Perempuan") echo "selected"; ?>>Perempuan</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Jabatan</label>
                                    <select name="jabatan" class="select2 form-control custom-select" required>
                                        <option value="Lurah" <?php if ($pengaturan->jabatan_pejabat == "Lurah") echo "selected"; ?>>Kepala Kelurahan</option>
                                        <option value="Sekertaris Kelurahan" <?php if ($pengaturan->jabatan_pejabat == "Sekertaris Kelurahan") echo "selected"; ?>>Sekertaris Kelurahan</option>
                                        <option value="Seksi Pemerintahan" <?php if ($pengaturan->jabatan_pejabat == "Seksi Pemerintahan") echo "selected"; ?>>Seksi Pemerintahan</option>
                                        <option value="Seksi Pembangunan" <?php if ($pengaturan->jabatan_pejabat == "Seksi Pembangunan") echo "selected"; ?>>Seksi Pembangunan</option>
                                        <option value="Seksi Sosial" <?php if ($pengaturan->jabatan_pejabat == "Seksi Sosial") echo "selected"; ?>>Seksi Sosial</option>
                                        <option value="Seksi Kesejahteraan Rakyat" <?php if ($pengaturan->jabatan_pejabat == "Seksi Kesejahteraan Rakyat") echo "selected"; ?>>Seksi Kesejahteraan Rakyat</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Alamat</label>
                                    <textarea name="alamat" class="form-control" rows="2"><?php echo $pengaturan->alamat; ?></textarea>
                                </div>
                                <div class="form-group">
                                    <input type="submit" name="edit_staff" class="btn btn-success" value="Simpan">
                                    <a href="<?= base_url('Pengaturan/'); ?>" class="btn btn-danger">Batal</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>