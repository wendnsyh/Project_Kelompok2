<div class="content-wrapper">
    <section class="content">
        <div class="box box-info">
            <div class="box-header">
                <h4 style="text-align:center"><b>DATA PENDUDUK DESA 12</b></h4>
                <hr>
            </div>

            <div class="box-body table-responsive">

                <?php if ($this->session->flashdata('sukses')) : ?>
                    <div class="callout callout-success">
                        <p style="font-size:14px">
                            <i class="fa fa-check"></i> <?= $this->session->flashdata('sukses'); ?>
                        </p>
                    </div>
                <?php endif; ?>

                <p>
                    <a href="<?= base_url('penduduk/tambah'); ?>" class="ml-2 btn btn-sm btn-success">Tambah Data Penduduk</a>
                </p>

                <table id="data" class="table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                        <tr class="active">
                            <th style="text-align:center">No</th>
                            <th style="text-align:center">NIK</th>
                            <th style="text-align:center">Nama</th>
                            <th style="text-align:center">Tanggal Lahir</th>
                            <th style="text-align:center">Jenis Kelamin</th>
                            <th style="text-align:center">Pendidikan</th>
                            <th style="text-align:center">Status Tinggal</th>
                            <th style="text-align:center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>
                        <?php foreach ($penduduk as $p) : ?>
                            <tr>
                                <td style="text-align:center"><?= $no; ?></td>
                                <td><?= $p->nik; ?></td>
                                <td><?= $p->nama; ?></td>
                                <td><?= date('d F Y', strtotime($p->tanggal_lahir)); ?></td>
                                <td><?= $p->jenis_kelamin; ?></td>
                                <td><?= $p->pendidikan; ?></td>
                                <td><?= $p->status; ?></td>
                                <td style="text-align:center">
                                    <a href="<?= base_url('penduduk/edit/' . $p->nik); ?>" class="btn btn-success btn-sm"><i class="fas fa-edit"></i> Edit</a>
                                    <a href="<?= base_url('penduduk/hapus/' . $p->nik); ?>" class="btn btn-danger btn-sm" onClick="return confirm('Yakin Akan Menghapus Data?');"><i class="fa fa-trash-o"></i> Hapus</a>
                                    <a href="<?= base_url('penduduk/detail/' . $p->nik); ?>" class="btn btn-info btn-sm"><i class="fa fa-info-circle"></i> Detail</a>
                                </td>
                            </tr>
                            <?php $no++; ?>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>