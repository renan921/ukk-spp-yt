<div class="card">
  <div class="card-body">
    <h3>Dashboard</h3>
    
    <form action="../kontroler/kontrolPembayaran.php?aksi=tambah" method="POST">
      <label>Pilih Siswa </label>
      <select name="nisn" class="form-control">
        <?php
        $siswa = $koneksi->prepare("CALL getSiswa()");
        $siswa->execute();
        $dataSiswa = $siswa->fetchAll();
        $siswa->nextRowset();
        foreach ($dataSiswa as $data):
        ?>
        <option value="<?= $data['nisn'] ?>"><?= $data['nama'] ?></option>
        <?php
        endforeach
        ?>
      </select>
      <label>Tanggal Bayar</label>
      <input type="date" name="tgl_bayar" class="form-control">
      <label>Bulan Bayar</label>
      <input type="text" name="bulan_bayar" class="form-control">
      <label>Tahun dibayar</label>
      <input type="text" name="tahun_dibayar" class="form-control">
      <label>Pilih SPP </label>
      <select name="id_spp" class="form-control">
        <?php
        $spp = $koneksi->prepare("CALL getSpp()");
        $spp->execute();
        $dataSpp = $spp->fetchAll();
        foreach ($dataSpp as $ambilSpp):
        ?>
        <option value="<?= $ambilSpp['id_spp'] ?>">
          <?= $ambilSpp['tahun'] ?> - <?= $ambilSpp['nominal'] ?>
        </option>
        <?php
        endforeach
        ?>
      </select>
      <label>Jumlah Bayar</label>
      <input type="number" name="jumlah_bayar" class="form-control">
      <button class="btn btn-primary">Submit</button>
    </form>
  </div>
</div>