<div class="content-wrapper">
    <section class="content">
        <h4 style="text-align: center;"><strong>Detail Data Kelahiran</strong></h4>

        <table class="table ml-2">
            <tr>
                <th>Nama Lengkap</th>
                <td><?php echo $detail->nama; ?></td>
            </tr>
            <tr>
                <th>Hari</th>
                <td><?php echo $detail->hari; ?></td>
            </tr>
            <tr>
                <th>Tempat Lahir</th>
                <td><?php echo $detail->tempat_lahir; ?></td>
            </tr>
            <tr>
                <th>Tanggal Lahir</th>
                <td><?php echo $detail->tanggal_lahir; ?></td>
            </tr>
            <tr>
                <th>Pukul</th>
                <td><?php echo $detail->pukul; ?></td>
            </tr>
            <tr>
                <th>Jenis Kelamin</th>
                <td><?php echo $detail->jenis_kelamin; ?></td>
            </tr>
            <tr>
                <th>Alamat</th>
                <td><?php echo $detail->alamat; ?></td>
            </tr>
            <tr>
                <th>Nama Ayah</th>
                <td><?php echo $detail->nama_ayah; ?></td>
            </tr>
            <tr>
                <th>Pekerjaan Ayah</th>
                <td><?php echo $detail->pekerjaan_ayah; ?></td>
            </tr>
            <tr>
                <th>Nama Ibu</th>
                <td><?php echo $detail->nama_ibu; ?></td>
            </tr>
            <tr>
                <th>Pekerjaan Ibu</th>
                <td><?php echo $detail->pekerjaan_ibu; ?></td>
            </tr>
            <tr>
                <th>Rt</th>
                <td><?php echo $detail->rt; ?></td>
            </tr>
            <tr>
                <th>Rw</th>
                <td><?php echo $detail->rw; ?></td>
            </tr>
        </table>
        <button onclick="goBack()" class="btn btn-primary ml-2">Kembali</button>
        <script>
            function goBack() {
                window.history.back();
            }
        </script>
    </section>
</div>