<div class="card">
  <div class="card-body">
    <h3>Edit Kelas</h3>
    
    <?php
    $id = $_GET['id'];
    $kelas = $koneksi->prepare("CALL getKelasId('$id')");
    $kelas->execute();
    $data = $kelas->fetch();
    ?>

    <form action="../kontroler/kontrolKelas.php?aksi=update" method="POST">
      <input type="hidden" name="id" value="<?= $data['id_kelas'] ?>">
      <input type="text" name="nama_kelas" value="<?= $data['nama_kelas'] ?>" class="form-control" placeholder="Masukkan kelas">
      <input type="text" name="kompetensi_keahlian" value="<?= $data['kompetensi_keahlian'] ?>" class="form-control" placeholder="Masukkan kompetensi keahlian">
      <button class="btn btn-primary">Submit</button>
    </form>
  </div>
</div>