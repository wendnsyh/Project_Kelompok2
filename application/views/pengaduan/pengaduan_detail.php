<div class="content-wrapper">
  <section class="content">
    <h4 style="text-align: center;"><strong>Detail Pengaduan</strong></h4>

    <table class="table ml-2">

      <tr>
        <th> Nama </th>
        <td><?php echo $detail->name; ?></td>
      </tr>
      <tr>
        <th> Email </th>
        <td><?php echo $detail->email; ?></td>
      </tr>
      <tr>
        <th> Subject </th>
        <td><?php echo $detail->subject ?> </td>
      </tr>
      <tr>
        <th> Pesan </th>
        <td><?php echo $detail->message ?> </td>
      </tr>
      <tr>
        <th> Tanggal Pengaduan </th>
        <td><?= date('d F Y', strtotime($detail->created_at)); ?>
      </tr>
      </td>
     
    </table>
    <button onClick="goBack()" .GoBack class="btn btn-primary ml-2"> Kembali</button>
    <script>
      function goBack() {
        window.history.back();
      }
    </script>
  </section>
</div>