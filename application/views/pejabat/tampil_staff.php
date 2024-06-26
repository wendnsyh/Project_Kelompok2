<div class="content-wrapper">
    <section class="content">
        <div class="box box-info">
            <div class="box-header">
                <h4 style="text-align:center"><b><?= $title ; ?></b></h4>
                <hr>
            </div>

            <div class="box-body table-responsive">
                <?php echo $this->session->flashdata('pesan'); ?>

                <p>
                    <a href="<?= base_url('pejabat/tambah/'); ?>" class="ml-2 btn btn-sm btn-success">Tambah Data Staff</a>
                </p>
                <table id="data" class="table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                        <tr class="active">
                            <th style="text-align:center">No</th>
                            <th style="text-align:center">Nama Pejabat</th>
                            <th style="text-align:center">NIP Pejabat</th>
                            <th style="text-align:center">Jenis Kelamin</th>
                            <th style="text-align:center">Jabatan</th>
                            <th style="text-align:center">Foto</th>
                            <th style="text-align:center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($pejabat as $p) : ?>
                            <tr>
                                <td style="text-align:center"><?php echo $no; ?></td>
                                <td><?php echo $p->nama_pejabat; ?></td>
                                <td><?php echo $p->nip_pejabat; ?></td>
                                <td><?php echo $p->jenis_kelamin; ?></td>
                                <td><?php echo $p->jabatan_pejabat; ?></td>
                                <td>
                                    <img src="<?= base_url('uploads/pejabat/' . $p->image) ?>" alt="Foto" style="max-width: 100px; max-height: 100px;">
                                </td>

                                <td style="text-align:center">
                                    <a href="<?php echo base_url('pejabat/edit/' . $p->id_pejabat); ?>" class="btn btn-success btn-xs"><i class="fa fa-edit"></i> Edit</a>
                                    <a href="<?php echo base_url('pejabat/hapus/' . $p->id_pejabat); ?>" class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Hapus</a>
                                </td>
                            </tr>
                        <?php
                            $no++;
                        endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</div>