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
                            <i class="fa fa-check"></i> <?php echo $this->session->flashdata('sukses'); ?>
                        </p>
                    </div>
                <?php endif; ?>

                <p>
                    <a href="<?php echo base_url('Faq/add_faq'); ?>" class="btn btn-success ml-2">Tambah Faq Inovasi</a>
                </p>

                <table id="data" class="table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                        <tr class="active">
                            <th style="text-align:center">No</th>
                            <th style="text-align:center">Pertanyaan</th>
                            <th style="text-align:center">Jawaban</th>
                            <th style="text-align:center">Foto</th>
                            <th style="text-align:center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($faqs as $faq) :
                        ?>
                            <tr>
                                <td style="text-align:center"><?= $no; ?></td>
                                <td><?= $faq['question']; ?></td>
                                <td><?= $faq['answer']; ?></td>
                                <td style="text-align:center">
                                    <?php if (!empty($faq['image'])) : ?>
                                        <img src="<?= base_url('uploads/faq/' . $faq['image']); ?>" alt="Foto" style="max-width: 100px; max-height: 100px;">
                                    <?php else : ?>
                                        <p>Tidak ada gambar</p>
                                    <?php endif; ?>
                                </td>
                                <td style="text-align:center">
                                    <a href="<?php echo base_url('faq/edit_faq/' . $faq['id']); ?>" class="btn btn-warning btn-sm">Edit</a>
                                    <a href="<?php echo base_url('faq/delete_faq/' . $faq['id']); ?>" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus FAQ ini?');">Hapus</a>
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