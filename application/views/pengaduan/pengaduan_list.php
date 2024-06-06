<div class="container mt-5">
    <div class="section-title text-center">
        <h2>Daftar Pengaduan</h2>
    </div>
    <?php if ($this->session->flashdata('success')) : ?>
        <div class="alert alert-danger">
            <?php echo $this->session->flashdata('success'); ?>
        </div>
    <?php endif; ?>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Subjek</th>
                <th>Pesan</th>
                <th>Tanggal</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 1;
            foreach ($pengaduan as $p) : ?>
                <tr>
                    <td style="text-align:center"><?php echo $no; ?></td>
                    <td><?php echo $p['name']; ?></td>
                    <td><?php echo $p['email']; ?></td>
                    <td><?php echo $p['subject']; ?></td>
                    <td><?php echo $p['message']; ?></td>
                    <td><?php echo $p['created_at']; ?></td>
                    <td>
                        <a href="<?php echo base_url('pengaduan/view/' . $p['id']); ?>" class="btn btn-info btn-sm">Detail</a>
                        <a href="<?php echo base_url('pengaduan/delete/' . $p['id']); ?>" class="btn btn-danger btn-sm mt-2" onclick="return confirm('Apakah Anda yakin ingin menghapus pengaduan ini?')">Hapus</a>
                    </td>
                </tr>
            <?php
                $no++;
            endforeach; ?>
        </tbody>
    </table>
</div>