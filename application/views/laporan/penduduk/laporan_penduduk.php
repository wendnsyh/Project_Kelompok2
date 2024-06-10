<div class="container-fluid">
    <?= $this->session->flashdata('pesan'); ?>
    <div class="row">
        <div class="col-lg-12">
            <?php if (validation_errors()) { ?>
                <div class="alert alert-danger" role="alert">
                    <?= validation_errors(); ?>
                </div>
            <?php } ?>
            <?= $this->session->flashdata('pesan'); ?>
            <a href="<?= base_url('Laporan/cetak_laporan_penduduk/'); ?>" class="btn btn-primary mb-3"><i class="fas fa-print"></i> Print</a>
            <a href="<?= base_url('Laporan/laporan_penduduk_pdf/'); ?>" class="btn btn-warning mb-3"><i class="fas fa-file-pdf"></i> Download Pdf</a>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nik</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Tanggal Lahir</th>
                        <th scope="col">Umur</th>
                        <th scope="col">Jenis Kelamin</th>
                        <th scope="col">Pendidikan</th>
                        <th scope="col">Status tinggal</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $nomor_urut = 1;
                    foreach ($penduduk as $p) { ?>
                        <tr>
                            <th scope="row"><?= $nomor_urut++; ?></th>
                            <td><?= $p->nik; ?></td>
                            <td><?= $p->nama; ?></td>
                            <td><?= $p->tanggal_lahir; ?></td>
                            <td><?= $this->m_penduduk->hitung_umur($p->tanggal_lahir) ?> tahun</td>
                            <td><?= $p->jenis_kelamin; ?></td>
                            <td><?= $p->pendidikan; ?></td>
                            <td><?= $p->status; ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
</div>