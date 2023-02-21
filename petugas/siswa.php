<div class="card">
  <div class="card-body">
    <h3>Siswa</h3>
    <a href="?page=tambah_siswa" class="btn btn-primary">+ Tambah Siswa</a>

    <table class="table">
      <tr>
        <th>No</th>
        <th>NISN</th>
        <th>NIS</th>
        <th>Nama</th>
        <th>Kelas</th>
        <th>Alamat</th>
        <th>No Telp</th>
        <th>Aksi</th>
      </tr>
      <?php
      $siswa = $koneksi->prepare("CALL getSiswa()");
      $siswa->execute();

      foreach($siswa->fetchAll() as $no=>$data):
      ?>
      <tr>
        <td><?= $no+1 ?></td>
        <td><?= $data['nisn'] ?></td>
        <td><?= $data['nis'] ?></td>
        <td><?= $data['nama'] ?></td>
        <td><?= $data['nama_kelas'] ?></td>
        <td><?= $data['alamat'] ?></td>
        <td><?= $data['no_telp'] ?></td>
        <td>
          <a href="?page=edit_siswa&id=<?= $data['nisn'] ?>">Edit</a>
          <form action="../kontroler/kontrolSiswa.php?aksi=hapus" method="POST">
            <input type="hidden" name="nisn" value="<?= $data['nisn'] ?>">
            <button class="btn btn-sm btn-danger">Delete</button>
          </form>
          <a href="?page=history_transaksi&nisn=<?= $data['nisn'] ?>" 
            class="btn btn-sm btn-warning">
            History
          </a>
        </td>
      </tr>
      <?php
      endforeach
      ?>
    </table>
  </div>
</div>