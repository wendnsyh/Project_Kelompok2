<div class="content-wrapper">
    <section class="content">
        <div class="box box-info">
            <div class="box-header">
                <h4 style="text-align:center"><b><?= $title; ?></b></h4>
                <hr>
            </div>

            <div class="box-body table-responsive ml-3">

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

                <div class="navbar-search">
                    <!-- Form pencarian -->
                    <form class="form-inline mr-auto" action="<?php echo base_url('penduduk/search') ?>" method="post">
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
                <a href="<?php echo base_url('penduduk') ?>" class="btn btn-secondary mt-3 mb-3">Kembali</a>

                <style>
                    .styled-table {
                        width: 100%;
                        border-collapse: collapse;
                        border-radius: 10px;
                        overflow: hidden;
                    }

                    .styled-table thead th {
                        background-color: #007bff;
                        color: #fff;
                        text-align: center;
                        padding: 10px;
                        border: 1px solid #ddd;
                    }

                    .styled-table tbody td {
                        text-align: center;
                        padding: 10px;
                        border: 1px solid #ddd;
                    }

                    .styled-table tbody tr:nth-child(even) {
                        background-color: #f2f2f2;
                    }

                    .styled-table tbody tr:hover {
                        background-color: #ddd;
                    }

                    .dataTables_wrapper .dataTables_filter {
                        float: right;
                        margin-right: 80px;
                    }
                </style>

                <!-- Tampilkan hasil pencarian -->
                <div class="table-responsive">
                    <table class="table table-bordered styled-table" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>NIK</th>
                                <th>Nama</th>
                                <th>Tanggal Lahir</th>
                                <th>Jenis Kelamin</th>
                                <th>Pendidikan</th>
                                <th>Umur</th>
                                <th>Status Tinggal</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (!empty($penduduk)) : ?>
                                <?php $no = 1; ?>
                                <?php foreach ($penduduk as $p) : ?>
                                    <tr>
                                        <td><?= $no; ?></td>
                                        <td><?= $p->nik; ?></td>
                                        <td><?= $p->nama; ?></td>
                                        <td><?= date('d F Y', strtotime($p->tanggal_lahir)); ?></td>
                                        <td><?= $p->jenis_kelamin; ?></td>
                                        <td><?= $p->pendidikan; ?></td>
                                        <td><?= $this->m_penduduk->hitung_umur($p->tanggal_lahir) ?> tahun</td>
                                        <td><?= $p->status; ?></td>
                                        <td>
                                            <a href="<?= base_url('penduduk/edit/' . $p->nik); ?>" class="btn btn-success btn-sm mr-1 mb-1"><i class="fas fa-edit"></i> Edit</a>
                                            <a href="<?= base_url('penduduk/hapus/' . $p->nik); ?>" class="btn btn-danger btn-sm mr-1 mb-1" onClick="return confirm('Yakin Akan Menghapus Data?');"><i class="fa fa-trash-o"></i> Hapus</a>
                                            <a href="<?= base_url('penduduk/detail/' . $p->nik); ?>" class="btn btn-info btn-sm mb-1"><i class="fa fa-info-circle"></i> Detail</a>
                                        </td>
                                    </tr>
                                    <?php $no++; ?>
                                <?php endforeach; ?>
                            <?php else : ?>
                                <tr>
                                    <td colspan="9" style="text-align:center">Data tidak ditemukan</td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>

                <!-- Pagination links -->
                <div class="pagination-links mt-3">
                    <?php echo isset($pagination) ? $pagination : ''; ?>
                </div>

            </div>
        </div>
    </section>
</div>