<div class="content-wrapper">
    <section class="content">
        <div class="box box-info">
            <div class="box-header">


                <h4 style="text-align:center"><b>DATA PENGATURAN</b></h4>
                <hr>
            </div>

            <div class="box-body table-responsive">

                <?php echo $this->session->flashdata('pesan'); ?>

                <p>
                    <a href="<?= base_url('Pengaturan/tambah/'); ?>" class="ml-2 btn btn-sm btn-success ">Tambah Data Staff</a>
                </p>
                <table id="data" class="table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                        <tr class="active">
                            <th style="text-align:center">No</th>
                            <th style="text-align:center">Nama Pejabat</th>
                            <th style="text-align:center">NIP Pejabat</th>
                            <th style="text-align:center">Jenis Kelamin</th>
                            <th style="text-align:center">Jabatan</th>
                            <th style="text-align:center">Aksi</th>
                        </tr>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($pengaturan as $pengaturan) {
                        ?>
                            <tr>
                                <td style="text-align:center"><?php echo $no; ?></td>
                                <td><?php echo $pengaturan->nama_pejabat; ?></td>
                                <td><?php echo $pengaturan->nip_pejabat; ?></td>
                                <td><?php echo $pengaturan->jenis_kelamin; ?></td>
                                <td><?php echo $pengaturan->jabatan_pejabat; ?></td>
                                <td style="text-align:center">
                                    <a href="<?php echo base_url('pengaturan/edit/' . $pengaturan->id_pejabat); ?>" class="btn btn-success btn-xs"><i class="fa fa-edit"></i> Edit</a>
                                    <a href="<?php echo base_url('pengaturan/hapus/' . $pengaturan->id_pejabat); ?>" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Hapus</a>
                                </td>
                            </tr>
                        <?php
                            $no++;
                        }
                        ?>
                    </tbody>
                </table>
            </div>
    </section>
</div>