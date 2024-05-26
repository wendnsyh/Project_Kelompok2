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

                            <form action="<?= base_url('Pemakaman/edit/' . $id); ?>" method="post">
                                <div class="form-group">
                                    <label>NIK</label>
                                    <select name="nik" class="form-control" required>
                                        <?php foreach ($penduduk as $p) : ?>
                                            <option value="<?= $p->nik; ?>" <?= ($p->nik == $pemakaman->nik) ? 'selected' : ''; ?>>
                                                <?= $p->nik; ?> - <?= $p->nama; ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Tempat Pemakaman</label>
                                    <input type="text" name="tempat" value="<?= $pemakaman->tempat_pemakaman; ?>" class="form-control" placeholder="Tempat" required>
                                </div>

                                <div class="form-group">
                                    <label>Hari Pemakaman</label>
                                    <select name="hari" class="form-control" required>
                                        <option value="<?= $pemakaman->hari_pemakaman; ?>" selected><?= $pemakaman->hari_pemakaman; ?></option>
                                        <option value="Senin">Senin</option>
                                        <option value="Selasa">Selasa</option>
                                        <option value="Rabu">Rabu</option>
                                        <option value="Kamis">Kamis</option>
                                        <option value="Jumat">Jumat</option>
                                        <option value="Sabtu">Sabtu</option>
                                        <option value="Minggu">Minggu</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label>Tanggal Dimakamkan</label>
                                    <div class="input-group date">
                                        <div class="input-group-addon">
                                          
                                        </div>
                                        <input type="date" name="tanggal" value="<?= $pemakaman->tanggal_dimakamkan; ?>" class="form-control pull-right" placeholder="Tanggal Dimakamkan" required>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>Pukul</label>
                                    <div class="input-group">
                                        <input type="time" name="jam" value="<?= $pemakaman->jam_dimakamkan; ?>" class="form-control timepicker" required>
                                        <div class="input-group-addon">
                                            <i class="fa fa-clock-o"></i>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label>Tanda Tangan</label>
                                    <select name="pejabat" class="form-control" required>
                                        <?php foreach ($pejabat as $data_pejabat) : ?>
                                            <option value="<?= $data_pejabat->id_pejabat; ?>" <?= ($data_pejabat->id_pejabat == $pemakaman->id_pejabat) ? 'selected' : ''; ?>>
                                                <?= $data_pejabat->nama_pejabat; ?>
                                            </option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <input type="submit" name="edit_pemakaman" class="btn btn-success" value="Simpan">
                                    <a href="<?= base_url('Pemakaman/'); ?>" class="btn btn-danger">Batal</a>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>