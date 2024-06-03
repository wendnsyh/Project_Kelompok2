<div class="content-wrapper">
    <section class="content">
        <div class="box box-info">
            <div class="box-header">


                <h4 style="text-align:center"><b><?= $title ?></b></h4>
                <hr>
            </div>

            <div class="box-body table-responsive">

                <?php
                if ($this->session->flashdata('sukses')) {
                ?>
                    <div class="callout callout-success">
                        <p style="font-size:14px">
                            <i class="fa fa-check"></i> <?php echo $this->session->flashdata('sukses'); ?>
                        </p>
                    </div>
                <?php
                }
                ?>
                <p>
                    <a href="<?php echo base_url('SkPindah/tambah'); ?>" class="btn btn-success ml-2">Tambah Surat
                        pindah</a>
                </p>
                <table id="data" class="table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                        <tr class="active">
                            <th style="text-align:center">No</th>
                            <th style="text-align:center">NoKk</th>
                            <th style="text-align:center">Nik Kepala Keluarga</th>
                            <th style="text-align:center">Nama Kepala Keluarga</th>
                            <th style="text-align:center">Nik Pemohon</th>
                            <th style="text-align:center">Nama Pemohon</th>
                            <th style="text-align:center">Surat Pengantar</th>
                            <th style="text-align:center">Tanda Tangan</th>
                            <th style="text-align:center">Aksi</th>
                        </tr>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($surat as $surat) {
                            $pemohon = $this->db->query("SELECT * FROM penduduk WHERE nik='$surat->nik_pemohon'")->row();
                        ?>
                            <tr>
                                <td style="text-align:center"><?php echo $no; ?></td>
                                <td><?php echo $surat->no_kk; ?></td>
                                <td><?php echo $surat->nik; ?></td>
                                <td><?php echo $surat->nama; ?></td>
                                <td><?php echo $pemohon->nik; ?></td>
                                <td><?php echo $pemohon->nama; ?></td>
                                <td style="text-align:center"><?= $surat->surat_pengantar ? 'Yes' : 'No'; ?></td>   
                                <td><?php echo $surat->nama_pejabat; ?></td>
                                <td style="text-align:center">
                                    <a href="<?php echo base_url('SkPindah/edit/' . $surat->id_pindah); ?>" class="btn btn-success btn-xs"><i class="fa fa-edit"></i> Edit</a>
                                    <a href="<?php echo base_url('SkPindah/hapus/' . $surat->id_pindah); ?>" class="btn btn-danger btn-xs" onClick="return confirm('Yakin Akan Menghapus Data?');"><i class="fa fa-trash-o"></i> Hapus</a>
                                    <a target="blank" href="<?php echo base_url('SkPindah/cetak/' . $surat->id_pindah); ?>" class="btn btn-info btn-xs mt-2"><i class="fa fa-print"></i> Cetak</a>
                            </tr>
                            </td>
                        <?php
                            $no++;
                        }
                        ?>
                    </tbody>
                </table>
            </div>
    </section>
</div>