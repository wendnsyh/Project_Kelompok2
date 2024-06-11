<div class="content-wrapper">
    <section class="content">
        <div class="box box-info">
            <div class="box-header">
                <h4 style="text-align:center;"><b><?= $title; ?></b></h4>
                <hr>
            </div>

            <div class="box-body table-responsive">
                <?php if ($this->session->flashdata('sukses')) { ?>
                    <div class="callout callout-success">
                        <p style="font-size:14px">
                            <i class="fa fa-check"></i> <?php echo $this->session->flashdata('sukses'); ?>
                        </p>
                    </div>
                <?php } ?>

                <p>
                    <a href="<?php echo base_url('kematian/tambah'); ?>" class="btn btn-success ml-2">Tambah Data Kematian</a>
                </p>
                <br>

                <div class="navbar-search">
                    <!-- Form pencarian -->
                    <form class="form-inline mr-auto" action="<?php echo base_url('kematian/search') ?>" method="post">
                        <div class="input-group">
                            <input type="text" name="keyword" class="form-control bg-light border-2 small" placeholder="Search for..." style="border-color: #4e73df;">
                            <div class="input-group-append">
                                <button class="btn btn-primary" type="submit">
                                    <i class="fas fa-search fa-sm"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>

                <!-- Tombol kembali -->
                <a href="<?php echo base_url('kematian') ?>" class="btn btn-secondary mt-3 mb-3">Kembali</a>

                <table id="data" class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr class="active">
                            <th style="text-align:center">No</th>
                            <th style="text-align:center">Nama</th>
                            <th style="text-align:center">Tanggal Lahir</th>
                            <th style="text-align:center">Jenis Kelamin</th>
                            <th style="text-align:center">Alamat</th>
                            <th style="text-align:center">Tanggal Wafat</th>
                            <th style="text-align:center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($kematian)) {
                            $no = 1;
                            foreach ($kematian as $item) {

                        ?>
                                <tr>
                                    <td style="text-align:center"><?php echo $no; ?></td>
                                    <td><?php echo isset($item->nama) ? $item->nama : ''; ?></td>
                                    <td><?= isset($item->tanggal_lahir) ? date('d F Y', strtotime($item->tanggal_lahir)) : ''; ?></td>
                                    <td><?php echo isset($item->jenis_kelamin) ? $item->jenis_kelamin : ''; ?></td>
                                    <td><?php echo isset($item->alamat) ? $item->alamat : ''; ?></td>
                                    <td style="text-align:center"><?= isset($item->tanggal_wafat) ? date('d F Y', strtotime($item->tanggal_wafat)) : ''; ?></td>
                                    <td style="text-align:center">
                                        <a href="<?php echo base_url('kematian/edit/' . (isset($item->id_kematian) ? $item->id_kematian : '')); ?>" class="btn btn-success btn-sm"><i class="fa fa-edit"></i> Edit</a>
                                        <a href="<?php echo base_url('kematian/hapus/' . (isset($item->id_kematian) ? $item->id_kematian : '')); ?>" class="btn btn-danger btn-sm" onClick="return confirm('Yakin Akan Menghapus Data?');"><i class="fa fa-trash-o"></i> Hapus</a>
                                        <a href="<?php echo base_url('kematian/detail/' . (isset($item->id_kematian) ? $item->id_kematian : '')); ?>" class="btn btn-info btn-sm"><i class="fa fa-info-circle"></i> Detail</a>
                                    </td>
                                </tr>
                            <?php $no++;
                            }
                        } else { ?>
                            <tr>
                                <td colspan="7" style="text-align:center">Data tidak ditemukan</td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
                <div class="pagination-links mt-3">
                    <?php echo isset($pagination) ? $pagination : ''; ?>
                </div>
            </div>
        </div>
    </section>
</div>