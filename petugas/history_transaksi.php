<div class="card">
  <div class="card-body">
    <h3>History Transaksi <?=$_GET['nisn']?></h3>
    <!-- <a href="cetak_laporan.php" target="_blank" class="btn btn-warning">Cetak Laporan</a> -->
    <a href="#" onclick="window.print();" class="btn btn-warning">Cetak Laporan</a>

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
      $nisn = $_GET['nisn'];
      $pembayaran = $koneksi->prepare("CALL getPembayaranNisn($nisn)");
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