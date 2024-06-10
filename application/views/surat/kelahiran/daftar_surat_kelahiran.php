<div class="content-wrapper">
    <section class="content">
        <div class="box box-info">
            <div class="box-header">
                <h4 style="text-align: center;"><b><?= $title ?></b></h4>
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

                <!-- Tampilkan pesan error validasi -->
                <?php if (validation_errors()) : ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo validation_errors(); ?>
                    </div>
                <?php endif; ?>

                <!-- Tampilkan pesan error upload -->
                <?php if (isset($error) && !empty($error)) : ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo $error; ?>
                    </div>
                <?php endif; ?>
                <p>
                    <a href="<?php echo base_url('SuratKelahiran/tambah'); ?>" class="btn btn-success ml-2">Tambah
                        Surat Kelahiran</a>
                </p>

                <table id="data" class="table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                        <tr class="active">

                            <th style="text-align: center;">No</th>
                            <th style="text-align: center;">Nama Anak</th>
                            <th style="text-align: center;">Jenis Kelamin</th>
                            <th style="text-align: center;">Tempat/Tanggal lahir</th>
                            <th style="text-align: center;">Hubungan</th>
                            <th style="text-align: center;">Surat Pengantar</th>
                            <th style="text-align: center;">Bukti Kelahiran</th>
                            <th style="text-align: center;">Pejabat</th>
                            <th style="text-align: center;">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php
                        $no = 1;
                        foreach ($surat_kelahiran as $surat) {
                            $ibu = $this->db->query("SELECT * FROM penduduk WHERE nik='$surat->nik_ibu'")->row();
                            $pelapor = $this->db->query("SELECT * FROM penduduk WHERE nik='$surat->nik_pelapor'")->row();
                        ?>
                            <tr>
                                <td style="text-align:center"><?php echo $no; ?></td>
                                <td><?php echo $surat->nama_anak; ?></td>
                                <td><?php echo $surat->kelamin_anak; ?></td>
                                <td><?php echo $surat->tempat_lahir_anak; ?>/
                                    <?= date('d F Y', strtotime($surat->tanggal_lahir_anak)); ?></td>
                                <td><?php echo $surat->hubungan_sebagai; ?></td>
                                <td style="text-align:center"><?= $surat->surat_pengantar ? 'Yes' : 'No'; ?></td>
                                <td style="text-align:center"><?= $surat->bukti_kelahiran ? 'Yes' : 'No'; ?></td>
                                <td><?= $surat->nama_pejabat; ?></td>
                                <td style="text-align:center">
                                    <a href="<?php echo base_url('SuratKelahiran/edit/' . $surat->id_surat_kelahiran); ?>" class="btn btn-success btn-sm"><i class="fa fa-edit"></i> Edit</a>
                                    <a href="<?php echo base_url('SuratKelahiran/hapus/' . $surat->id_surat_kelahiran); ?>" class="btn btn-danger btn-sm" onClick="return confirm('Yakin Akan Menghapus Data?');"><i class="fa fa-trash-o"></i> Hapus</a>
                                    <a target="blank" href="<?php echo base_url('SuratKelahiran/cetak/' . $surat->id_surat_kelahiran); ?>" class="btn btn-info btn-sm"><i class="fa fa-print"></i> Cetak</a>
                            </tr>
                            </td>


                        <?php
                            $no++;
                        }
                        ?>
                    </tbody>
                    </tbody>

                </table>
            </div>

        </div>
    </section>
</div>