<div class="content-wrapper">
    <section class="content">
        <div class="box box-info">
            <div class="box-header">
                <h4 style="text-align:center">
                    <b style="line-height:25px">
                        <?= $title ?> <br>
                    </b>
                </h4>
                <hr>
            </div>

            <div class="box-body">
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
                    <table class="table table-striped">
                        <tr>
                        <th> No Kartu Keluarga </th>
                        <td><?= $detail->no_kk; ?></td>
                        </tr>

                        <tr>
                            <th> Nama Kepala Keluarga</th>
                            <td><?= $detail->nama; ?></td>
                        </tr>

                        <tr>
                            <th> Alamat </th>
                            <td><?= $detail->alamat; ?></td>
                        </tr>

                        <tr>
                            <th> RT</th>
                            <td><?= $detail->rt; ?></td>
                        </tr>
                        <tr>
                            <th> RW </th>
                            <td><?= $detail->rw; ?></td>
                        </tr>
                        <tr>
                            <th> nik</th>
                            <td><?= $detail->nik; ?></td>
                        </tr>
                        <tr>
                            <th> Nama Pemohon</th>
                            <td><?= $detail->nama; ?></td>
                        </tr>


                        <h4><b>Data Kepindahan</b> </h4>
                        <tr>
                            <th> alasan_pindah </th>
                            <td><?= $detail->alasan_pindah; ?></td>
                        </tr>
                        <tr>
                            <th> Alamat Tujuan </th>
                            <td><?= $detail->alamat_tujuan; ?></td>
                        </tr>

                        <tr>
                            <th>Jenis Pindah</th>
                            <td><?= $detail->jenis_pindah; ?></td>
                        </tr>
                        <tr>
                            <th> Klasifikasi Pindah </th>
                            <td><?= $detail->klasifikasi_pindah; ?></td>
                        </tr>

                    </table>
                </div>
            </div>
            <button onClick="goBack()" .GoBack class="btn btn-primary ml-2"> Kembali</button>
            <script>
                function goBack() {
                    window.history.back();
                }
            </script>
    </section>
</div>