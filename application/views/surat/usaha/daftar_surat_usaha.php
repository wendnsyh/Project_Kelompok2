<div class="content-wrapper">
    <section class="content">
        <div class="box box-info">
            <div class="box-header">
                <h4 style="text-align:center"><b><?= $title ?></b></h4>
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
                    <a href="<?= base_url('SkUsaha/tambah'); ?>" class="btn btn-success ml-2">Tambah Surat Keterangan Usaha</a>
                </p>
                <table id="data" class="table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                        <tr class="active">
                            <th style="text-align:center">No</th>
                            <th style="text-align:center">NIK</th>
                            <th style="text-align:center">Nama</th>
                            <th style="text-align:center">Nama Usaha</th>
                            <th style="text-align:center">Sejak</th>
                            <th style="text-align:center">Alamat Usaha</th>
                            <th style="text-align:center">Tanda Tangan</th>
                            <th style="text-align:center">Surat Pengantar</th>
                            <th style="text-align:center">Bukti Usaha</th>
                            <th style="text-align:center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($surat as $surat) :
                        ?>
                            <tr>
                                <td style="text-align:center"><?= $no; ?></td>
                                <td><?= $surat->nik; ?></td>
                                <td><?= $surat->nama; ?></td>
                                <td><?= $surat->nama_usaha; ?></td>
                                <td><?= $surat->sejak_usaha; ?></td>
                                <td><?= $surat->alamat_usaha; ?></td>
                                <td><?= $surat->nama_pejabat; ?></td>
                                <td style="text-align:center"><?= $surat->surat_pengantar ? 'Yes' : 'No'; ?></td>
                                <td style="text-align:center"><?= $surat->bukti_usaha ? 'Yes' : 'No'; ?></td>
                                <td style="text-align:center">
                                    <a href="<?= base_url('SkUsaha/edit/' . $surat->id_usaha); ?>" class="btn btn-success btn-xs"><i class="fa fa-edit"></i> Edit</a>
                                    <a href="<?= base_url('SkUsaha/hapus/' . $surat->id_usaha); ?>" class="btn btn-danger btn-xs ml-2" onClick="return confirm('Yakin Akan Menghapus Data?');"><i class="fa fa-trash-o"></i> Hapus</a>
                                    <a target="_blank" href="<?= base_url('SkUsaha/cetak/' . $surat->id_usaha); ?>" class="btn btn-info btn-xs mt-2"><i class="fa fa-print"></i> Cetak</a>
                                </td>
                            </tr>
                        <?php
                            $no++;
                        endforeach;
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>