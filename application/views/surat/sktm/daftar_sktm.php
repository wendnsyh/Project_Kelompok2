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
                    <a href="<?php echo base_url('Sktm/tambah/'); ?>" class="btn btn-success ml-2">Tambah
                        Surat Keterangan Tidak Mampu</a>
                </p>
                <table id="data" class="table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                        <tr class="active">
                            <th style="text-align:center">No</th>
                            <th style="text-align:center">NIK Anak</th>
                            <th style="text-align:center">Nama Anak</th>
                            <th style="text-align:center">NIK Ayah</th>
                            <th style="text-align:center">Nama Ayah</th>
                            <th style="text-align:center">Tanda Tangan</th>
                            <th style="text-align:center">Aksi</th>
                        </tr>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($surat as $surat) {
                            $ayah = $this->db->query("SELECT * FROM penduduk WHERE nik='$surat->nik_ayah'")->row();
                        ?>
                            <tr>
                                <td style="text-align:center"><?php echo $no; ?></td>
                                <td><?php echo $surat->nik; ?></td>
                                <td><?php echo $surat->nama; ?></td>
                                <td><?php echo $ayah->nik; ?></td>
                                <td><?php echo $ayah->nama; ?></td>
                                <td><?php echo $surat->nama_pejabat; ?></td>
                                <td style="text-align:center">
                                    <a href="<?php echo base_url('Sktm/edit/' . $surat->id_sktm); ?>" class="btn btn-success btn-xs"><i class="fa fa-edit"></i> Edit</a>
                                    <a href="<?php echo base_url('Sktm/hapus/' . $surat->id_sktm); ?>" class="btn btn-danger btn-xs" onClick="return confirm('Yakin Akan Menghapus Data?');"><i class="fa fa-trash-o"></i> Hapus</a>
                                    <a target="blank" href="<?php echo base_url('Sktm/cetak/' . $surat->id_sktm); ?>" class="btn btn-info btn-xs"><i class="fa fa-print"></i> Cetak</a>
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