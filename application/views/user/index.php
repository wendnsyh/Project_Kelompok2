<!-- View: profile.php -->

<div class="container-fluid">
    <h1 class="h3 mb-4 text-gray-800"><?= $title; ?></h1>

    <div class="row">
        <div class="col-lg-12">
            <?= $this->session->flashdata('message') ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-5 mb-3">
                <div class="row-md-5" style="display: flex; justify-content: left; align-items: center; ">
                    <a href="<?= base_url('user/edit'); ?>" class="btn btn-success" style="margin-right: 15px;"><i class=" fas fa-edit"></i>Edit Profile</a>
                    <a href="<?= base_url('user/ubahPassword'); ?>" class="btn btn-primary"><i class="fas fa-lock-open"></i>Ubah Password</a>
                </div>
            </div>
        </div>

        <div class="col-md-7 mb-3">
            <div class="card border border-info" style="display: flex; background: #FFF; width: 100%; height: 100%; box-shadow: -5px 5px 5px 0px rgba(143,143,143,0.73);">
                <div class="card-body">
                    <h5 style="text-align: center;" class="card-title mt-1">Informasi Admin</h5>
                    <hr>
                    <div class="form-group row">
                        <label for="name" class="col-sm-10 col-form-label">Nama</label>
                        <div class="col-sm-12">
                            <input readonly type="text" class="form-control" id="nama" name="nama" value="<?= $user['username']; ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="name" class="col-sm-10 col-form-label">Nama Petugas</label>
                        <div class="col-sm-12">
                            <input readonly type="text" class="form-control" id="nama_petugas" name="nama_petugas" value="<?= $user['nama_petugas']; ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="name" class="col-sm-10 col-form-label">Jabatan</label>
                        <div class="col-sm-12">
                            <input readonly type="text" class="form-control" id="jabatan" name="jabatan" value="<?= $user['level']; ?>">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    window.setTimeout(function() {
        $(".col-lg-12").fadeTo(500, 0).slideUp(500, function() {
            $(this).remove();
        });
    }, 2000);
</script>