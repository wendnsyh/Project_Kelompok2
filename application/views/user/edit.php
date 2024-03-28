<!-- Begin Page Content -->
<div class="container-fluid" style="height: 85vh">

    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800"><?= $judul; ?></h1>
    <div class="row">
        <div class="col-lg-8">
            <?= form_open_multipart('user/edit'); ?>
            <div class="form-group row">
                <label for="name" class="col-sm-3 col-form-label">Nama lengkap</label>
                <div class="col-sm-9">
                    <input type="text" class="form-control" id="nama" name="nama" value="<?= $user['nama']; ?>">
                </div>
            </div>
            <div class="form-group row">
                <div class="col-sm-3">Foto profil</div>
                <div class="col-sm-9">
                    <div class="row">
                        <div class="col-sm-3">
                            <img style="border-radius: 10%;" src="<?= base_url('assets/img/profile/') . $user['image']; ?>" class="img-thumbnail">
                        </div>
                        <div class="col-sm-9">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input" name="image" id="image">
                                <label class="custom-file-label" for="image">Pilih gambar</label>
                            </div>
                        </div>
                    </div>
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