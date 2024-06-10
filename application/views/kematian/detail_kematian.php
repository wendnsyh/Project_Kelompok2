<div class="content-wrapper">
    <section>
        <table class="table">
            <h4 style="text-align: center;"><strong>Detail Kematian</strong></h4>
            <tr>
                <th> NIK </th>
                <td><?php echo $detail->nik ?> </td>
            </tr>
            <tr>
                <th> Nama Lengkap </th>
                <td><?php echo $detail->nama ?> </td>
            </tr>

            <th> Tempat Lahir</th>
            <td><?php echo $detail->tempat_lahir; ?></td>
            </tr>
            <tr>
                <th> Tanggal Lahir </th>
                <td><?php echo $detail->tanggal_lahir; ?></td>
            </tr>
            <tr>
                <th> Jenis Kelamin </th>
                <td><?php echo $detail->jenis_kelamin; ?></td>
            </tr>
            <tr>
                <th> Alamat </th>
                <td><?php echo $detail->alamat; ?></td>
            </tr>
            <tr>
                <th> Hari Wafat </th>
                <td><?php echo $detail->hari_wafat; ?></td>
            </tr>
            <tr>
                <th> Tanggal Wafat </th>
                <td><?php echo $detail->tanggal_wafat; ?></td>
            </tr>
            <tr>
                <th> Pukul </th>
                <td><?php echo $detail->pukul; ?></td>
            </tr>
            <tr>
                <th> Sebab Wafat </th>
                <td><?php echo $detail->sebab_wafat ?></td>
            </tr>
            <tr>
                <th> Tempat Wafat </th>
                <td><?php echo $detail->tempat_wafat; ?></td>
            </tr>

            </tr>
        </table>
        <button onClick="goBack()" .GoBack class="btn btn-primary ml-2"> Kembali</button>
        <script>
            function goBack() {
                window.history.back();
            }
        </script>
    </section>
</div>