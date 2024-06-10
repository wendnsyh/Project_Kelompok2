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
            <a href="<?= base_url('Laporan/cetak_laporan_kelahiran/'); ?>" class="btn btn-primary mb-3"><i class="fas fa-print"></i> Print</a>
            <a href="<?= base_url('Laporan/laporan_kelahiran_pdf/'); ?>" class="btn btn-warning mb-3"><i class="fas fa-file-pdf"></i> Download Pdf</a>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nama</th>
                        <th scope="col">Tanggal Lahir</th>
                        <th scope="col">Alamat</th>
                        <th scope="col">Nama Ayah</th>
                        <th scope="col">Nama Ibu</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $nomor_urut = 1;
                    foreach ($kelahiran as $p) { ?>
                        <tr>
                            <th scope="row"><?= $nomor_urut++; ?></th>
                            <td><?= $p->nama; ?></td>
                            <td><?= date('d F Y', strtotime($p->tanggal_lahir)); ?></td>
                            <td><?= $p->alamat; ?></td>
                            <td><?= $p->nama_ayah; ?></td>
                            <td><?= $p->nama_ibu; ?></td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- /.container-fluid -->
</div>