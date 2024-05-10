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

                    /* Memindahkan fitur pencarian ke pojok kanan atas */
                    .dataTables_wrapper .dataTables_filter {
                        float: right;
                        margin-right: 80px;
                    }

                </style>

                <table id="data" class="styled-table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>NIK</th>
                            <th>Nama</th>
                            <th>Tanggal Lahir</th>
                            <th>Jenis Kelamin</th>
                            <th>Pendidikan</th>
                            <th>Status Tinggal</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1; ?>
                        <?php foreach ($penduduk as $p) : ?>
                            <tr>
                                <td><?= $no; ?></td>
                                <td><?= $p->nik; ?></td>
                                <td><?= $p->nama; ?></td>
                                <td><?= date('d F Y', strtotime($p->tanggal_lahir)); ?></td>
                                <td><?= $p->jenis_kelamin; ?></td>
                                <td><?= $p->pendidikan; ?></td>
                                <td><?= $p->status; ?></td>
                                <td>
                                    <a href="<?= base_url('penduduk/edit/' . $p->nik); ?>" class="btn btn-success btn-sm mr-1 mb-1"><i class="fas fa-edit"></i> Edit</a>
                                    <a href="<?= base_url('penduduk/hapus/' . $p->nik); ?>" class="btn btn-danger btn-sm mr-1 mb-1" onClick="return confirm('Yakin Akan Menghapus Data?');"><i class="fa fa-trash-o"></i> Hapus</a>
                                    <a href="<?= base_url('penduduk/detail/' . $p->nik); ?>" class="btn btn-info btn-sm mb-1"><i class="fa fa-info-circle"></i> Detail</a>
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