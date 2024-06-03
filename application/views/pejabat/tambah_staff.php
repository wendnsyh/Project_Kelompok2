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

                            <form action="<?= base_url('pejabat/tambah'); ?>" method="post">
                                <div class="form-group">
                                    <label>NIP</label>
                                    <input type="text" name="nip" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Nama</label>
                                    <input type="text" name="nama" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label>Jenis Kelamin</label>
                                    <select name="kelamin" class="form-control" required>
                                        <option value="" selected disabled>- pilih -</option>
                                        <option value="Laki Laki">Laki Laki</option>
                                        <option value="Perempuan">Perempuan</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Jabatan</label>
                                    <select name="jabatan" class="form-control" required>
                                        <option value="">--</option>
                                        <option value="lurah">Lurah</option>
                                        <option value="Sekretaris Kelurahan">Sekretaris Kelurahan</option>
                                        <option value="Seksi Pemerintahan">Seksi Pemerintahan</option>
                                        <option value="Seksi Pembangunan">Seksi Pembangunan</option>
                                        <option value="Seksi Sosial">Seksi Sosial</option>
                                        <option value="Seksi Kesejahteraan">Seksi Kesejahteraan Rakyat</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label>Alamat</label>
                                    <textarea name="alamat" class="form-control" rows="3" required></textarea>
                                </div>
                                <div class="form-group">
                                    <div class="form-group">
                                        <input type="submit" name="tambah_staff" class="btn btn-success" value="Simpan">
                                        <a href="<?= base_url('pejabat/'); ?>" class="btn btn-danger">Batal</a>
                                    </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>