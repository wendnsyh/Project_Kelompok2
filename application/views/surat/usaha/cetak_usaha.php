<style type="text/css">
    @media print and (width: 21cm) and (height: 33cm) {
        @page {
            margin: 1cm;
        }
    }

    .tabelku {
        border: 1px solid black;
        border-collapse: collapse;
        padding: 2px;
        width: 100%;
    }

    .tabelku td {
        padding: 5px;
    }
</style>
<style type="text/css" media="print">
    @page {
        size: portrait;
    }
</style>
<img src="<?php echo base_url('assets/images/kop-surat.png'); ?>" width="100%" height="30%">
<br /><br /><br />
<center>
    <font size="5"><u><b>SURAT KETERANGAN USAHA</b></u></font><br />Nomor:
    503/<?php echo $usaha->id_usaha; ?>/VII/DS/<?php echo substr($usaha->tanggal_usaha, 0, 4); ?>
</center>
<br /><br /><br />
<font align="justify">
    Yang bertanda tangan di bawah ini, <?php echo $usaha->jabatan_pejabat; ?> Kelurahan Serpong Kecamatan Serpong
    Kota Tangerang Selatan Provinsi Banten, menerangkan bahwa:
</font>
<table witdh="100%">
    <tr>
        <td width="20%">Nama Lengkap</td>
        <td width="3%">:</td>
        <td width="77%"><?php echo $usaha->nama; ?></td>
    </tr>
    <tr>
        <td>NIK</td>
        <td>:</td>
        <td><?php echo $usaha->nik; ?></td>
    </tr>
    <tr>
        <td>Tempat/Tanggal Lahir</td>
        <td>:</td>
        <td><?php echo $usaha->tempat_lahir; ?>/<?= date('d F Y', strtotime($usaha->tanggal_lahir)); ?></td>
    </tr>
    <tr>
        <td>Jenis Kelamin</td>
        <td>:</td>
        <td><?php echo $usaha->jenis_kelamin; ?></td>
    </tr>
    <tr>
        <td>Agama</td>
        <td>:</td>
        <td><?php echo $usaha->agama; ?></td>
    </tr>
    <tr>
        <td>Status Perkawinan</td>
        <td>:</td>
        <td><?php echo $usaha->status_perkawinan; ?></td>
    </tr>
    <tr>
        <td>Pekerjaan</td>
        <td>:</td>
        <td><?php echo $usaha->pekerjaan; ?></td>
    </tr>
    <tr>
        <td>Alamat</td>
        <td>:</td>
        <td><?php echo $usaha->alamat; ?></td>
    </tr>
</table>
<br>
<font align="justify">
    Benar pada saat ini yang bersangkutan tersebut di atas membuka/mempunyai usaha sebagai berikut:
</font>

<table width="100%">
    <tr>
        <td width="20%">Jenis Usaha</td>
        <td width="3%">:</td>
        <td width="77%"><?php echo $usaha->nama_usaha; ?></td>
    </tr>
    <tr>
        <td>Mulai Usaha</td>
        <td>:</td>
        <td>Sejak Tahun <?php echo $usaha->sejak_usaha; ?> sampai sekarang</td>
    </tr>
    <tr>
        <td>Alamat Usaha</td>
        <td>:</td>
        <td><?php echo $usaha->alamat_usaha; ?></td>
    </tr>
</table>
<br>
<font align="justify">
    Demikian surat keterangan ini dibuat dengan sebenar-benarnya agar dapat digunakan sebagaimana mestinya.</br>    
</font>
</br>

<table width="100%">
    <tr>
        <td width="50%"></td>
        <td width="50%">
            <center>Serpong, <?= date('d F Y', strtotime($usaha->tanggal_usaha)); ?></center>
        </td>
    </tr>
    <tr>
        <td>
            <center>Yang Bersangkutan</center>
        </td>
        <td>
            <center>Kepala Kelurahan Serpong</center>
        </td>
    </tr>
    <tr>
        <td height="80"></td>
        <td height="80"></td>
    </tr>
    <tr>
        <td>
            <center><b><u><?php echo $usaha->nama; ?></u></b></center>
        </td>
        <td>
            <center><b><u><?php echo $usaha->nama_pejabat; ?></u></b></center>
        </td>
    </tr>
    <tr>
        <td></td>
        <td>
            <center>NIP. <?php echo $usaha->nip_pejabat; ?></center>
        </td>
    </tr>
</table>
<script>
    window.print();
</script>