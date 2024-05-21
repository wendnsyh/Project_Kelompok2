<!-- Begin Page Content -->
<div class="container-fluid" style="height: 85vh">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $judul; ?></h1>
    <div class="row">
        <div class="col-lg-8">
            <?= form_open_multipart('user/edit'); ?>
            <div class="form-group row">
                <label for="name" class="col-sm-3 col-form-label">Nama</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="nama" name="nama" value="<?= $user['username']; ?>" readonly>
                </div>
            </div>

            <div class="form-group row">
                <label for="name" class="col-sm-3 col-form-label">Nama Petugas</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="nama_petugas" name="nama_petugas"
                        value="<?= $user['nama_petugas']; ?>">
                </div>
            </div>

            <div class="form-group row">
                <label for="jabatan" class="col-sm-3 col-form-label">Jabatan</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="jabatan" name="jabatan" value="<?= $user['level']; ?>" readonly>
                </div>
            </div>


            <div class="form-group row justify-content-end">
                <div class="col-sm-9">
                    <button type="submit" class="btn btn-primary">Apply</button>
                </div>
            </div>
            <?= form_close(); ?>
        </div>
    </div>
    <!-- /.container-fluid -->
</div>
<!-- End of Main Content -->