<div class="card">
  <div class="card-body">
    <h3>Edit Siswa</h3>
    
    <?php
    $nisn = $_GET['id'];
    $siswa = $koneksi->prepare("CALL getSiswaNisn($nisn)");
    $siswa->execute();
    $data = $siswa->fetch();
    $siswa->nextRowset();
    ?>

    <form action="../kontroler/kontrolSiswa.php?aksi=update" method="POST">
      <input type="text" name="nisn" value="<?= $data['nisn'] ?>" class="form-control" placeholder="Masukkan NISN">
      <input type="text" name="nis" value="<?= $data['nis'] ?>" class="form-control" placeholder="Masukkan NIS">
      <input type="text" name="nama" value="<?= $data['nama'] ?>" class="form-control" placeholder="Masukkan Nama">
      <input type="text" name="alamat" value="<?= $data['alamat'] ?>" class="form-control" placeholder="Masukkan Alamat">
      <input type="text" name="no_telp" value="<?= $data['no_telp'] ?>" class="form-control" placeholder="Masukkan No Telp">
      <input type="text" name="password" class="form-control" placeholder="Masukkan Password">

      <select name="id_kelas" class="form-control">
        <?php
        $kelas = $koneksi->prepare("CALL getKelas()");
        $kelas->execute();
        foreach($kelas->fetchAll() as $dataKelas):
        ?>
        <option value="<?= $dataKelas['id_kelas'] ?>"> <?= $dataKelas['nama_kelas'] ?> </option>
        <?php
        endforeach
        ?>
      </select>
      <button class="btn btn-primary">Submit</button>
    </form>
  </div>
</div>