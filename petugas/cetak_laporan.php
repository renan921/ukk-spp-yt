<?php
require('../request.php');

if (empty($_SESSION)) {
  session_start();
}

if (empty($_SESSION['USER']['level'] == "admin")) {
  die("Permission Denied - 422");
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body onload="window.print();">
<div class="card">
  <div class="card-body">
    <h3>Laporan Transaksi</h3>
    <table class="table">
      <tr>
        <th>No</th>
        <th>Petugas</th>
        <th>Siswa</th>
        <th>Tanggal Bayar</th>
        <th>Bulan Bayar</th>
        <th>Tahun Dibayar</th>
        <th>SPP</th>
        <th>Jumlah Bayar</th>
      </tr>
      <?php
      $pembayaran = $koneksi->prepare("CALL getPembayaran()");
      $pembayaran->execute();
      foreach($pembayaran->fetchAll() as $no=>$data):
      ?>
      <tr>
        <td><?= $no+1 ?></td>
        <td><?= $data['nama_petugas'] ?></td>
        <td><?= $data['nama'] ?></td>
        <td><?= $data['tgl_bayar'] ?></td>
        <td><?= $data['bulan_bayar'] ?></td>
        <td><?= $data['tahun_bayar'] ?></td>
        <td><?= $data['tahun'] ?> - <?= $data['nominal'] ?></td>
        <td><?= $data['jumlah_bayar'] ?></td>
      </tr>
      <?php
      endforeach
      ?>
    </table>
  </div>
</div>
</body>
</html>