<div class="card">
  <div class="card-body">
    <h3>Tambah Siswa</h3>
    
    <form action="../kontroler/kontrolSiswa.php?aksi=tambah" method="POST">
      <input type="text" name="nisn" class="form-control" placeholder="Masukkan NISN">
      <input type="text" name="nis" class="form-control" placeholder="Masukkan NIS">
      <input type="text" name="nama" class="form-control" placeholder="Masukkan Nama">
      <input type="text" name="alamat" class="form-control" placeholder="Masukkan Alamat">
      <input type="text" name="no_telp" class="form-control" placeholder="Masukkan No Telp">
      <input type="text" name="password" class="form-control" placeholder="Masukkan Password">

      <select name="id_kelas" class="form-control">
        <?php
        $kelas = $koneksi->prepare("CALL getKelas()");
        $kelas->execute();
        foreach($kelas->fetchAll() as $data):
        ?>
        <option value="<?= $data['id_kelas'] ?>"> <?= $data['nama_kelas'] ?> </option>
        <?php
        endforeach
        ?>
      </select>
      <button class="btn btn-primary">Submit</button>
    </form>
  </div>
</div>