<!DOCTYPE html>
<html>

<head>
    <title></title>
</head>

<body>
    <style type="text/css">
        .table-data {
            width: 100%;
            border-collapse: collapse;
        }

        .table-data tr th,
        .table-data tr td {
            border: 1px solid black;
            font-size: 11pt;
            font-family: Verdana;
            padding: 10px 10px 10px 10px;
        }

        .table-data th {
            background-color: grey;
        }

        h3 {
            font-family: Verdana;
        }
    </style>
    <h3>
        <center>LAPORAN DATA KEMATIAN</center>
    </h3>
    <br />
    <table class="table-data">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Nama</th>
                <th scope="col">Tanggal Lahir</th>
                <th scope="col">Jenis Kelamin</th>
                <th scope="col">Alamat</th>
                <th scope="col">Tanggal wafat</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $nomor_urut = 1;
            foreach ($kematian as $p) { ?>
                <tr>
                    <th scope="row"><?= $nomor_urut++; ?></th>
                    <td><?= $p->nama; ?></td>
                    <td><?= $p->tanggal_lahir; ?></td>
                    <td><?= $p->jenis_kelamin; ?></td>
                    <td><?= $p->alamat; ?></td>
                    <td><?= date('d F Y', strtotime($p->tanggal_lahir)); ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
    <script type="text/javascript">
        window.print();
    </script>
</body>

</html>
