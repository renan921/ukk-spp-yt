<?php
if (empty($_SESSION['USER']['level'] == "admin")) {
  die("Permission Denied - 422");
}
?>

<div class="card">
  <div class="card-body">
    <h3>Kelas</h3>
    <a href="?page=tambah_kelas" class="btn btn-primary">+ Tambah Kelas</a>

    <table class="table">
      <tr>
        <th>No</th>
        <th>Nama Kelas</th>
        <th>Kompetensi Keahlian</th>
        <th>Aksi</th>
      </tr>
      <?php
      $kelas = $koneksi->prepare("CALL getKelas()");
      $kelas->execute();

      foreach($kelas->fetchAll() as $no=>$data):
      ?>
      <tr>
        <td><?= $no+1 ?></td>
        <td><?= $data['nama_kelas'] ?></td>
        <td><?= $data['kompetensi_keahlian'] ?></td>
        <td>
          <a href="?page=edit_kelas&id=<?= $data['id_kelas'] ?>">Edit</a>
          <form action="../kontroler/kontrolKelas.php?aksi=hapus" method="POST">
            <input type="hidden" name="id" value="<?= $data['id_kelas'] ?>">
            <button class="btn btn-sm btn-danger">Delete</button>
          </form>
        </td>
      </tr>
      <?php
      endforeach
      ?>
    </table>
  </div>
</div>