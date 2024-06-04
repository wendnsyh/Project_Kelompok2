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
            <div class="card mb-3 border border-info d-flex justify-content-center align-items-center"
                style="background: #FFF; width: 100%; height: 100%; box-shadow: -5px 5px 5px 0px rgba(143,143,143,0.73);">
                <img class="mt-5 border border-info" style="border-radius: 5%; width: 50%;"
                    src="<?= base_url('assets/img/profile/') . $user['image'] ?>" class="img-fluid"
                    alt="<?= $user['nama'] ?>">
                <div class="card-body d-flex align-items-center flex-column">
                    <h5 class="card-title mt-4 text-center"><?= $user['nama']; ?></h5>
                </div>
                <div class="row-md-5 d-flex justify-content-center align-items-center w-100 h-100"
                    style="background: #FFF;">
                    <a href="<?= base_url('user/edit2'); ?>" class="btn btn-success mr-2">
                        <i class="fas fa-edit"></i> Edit Profile
                    </a>
                    <a href="<?= base_url('user/ubahPassword2'); ?>" class="btn btn-primary">
                        <i class="fas fa-lock-open"></i> Ubah Password
                    </a>
                </div>
            </div>
        </div>

        <div class="col-md-7 mb-3">
            <div class="card border border-info"
                style="background: #FFF; width: 100%; height: 100%; box-shadow: -5px 5px 5px 0px rgba(143,143,143,0.73);">
                <div class="card-body">
                    <h5 class="card-title mt-1 text-center">Informasi Akun</h5>
                    <hr>
                    <div class="form-group row">
                        <label for="name" class="col-sm-12 col-form-label">Nama</label>
                        <div class="col-sm-12">
                            <input readonly type="text" class="form-control" id="nama" name="nama"
                                value="<?= $user['nama']; ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="email" class="col-sm-12 col-form-label">Email</label>
                        <div class="col-sm-12">
                            <input readonly type="text" class="form-control" id="email" name="email"
                                value="<?= $user['email']; ?>">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="level" class="col-sm-12 col-form-label">Level</label>
                        <div class="col-sm-12">
                            <input readonly type="text" class="form-control" id="level" name="level"
                                value="<?= $user['level']; ?>">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    window.setTimeout(function () {
        $(".col-lg-12").fadeTo(500, 0).slideUp(500, function () {
            $(this).remove();
        });
    }, 2000);
</script>