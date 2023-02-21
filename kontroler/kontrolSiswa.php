<?php

include '../request.php';

if (empty($_SESSION['USER']['level'] == "admin")) {
  die("Permission Denied - 422");
}

if (!empty($_GET['aksi'] == "tambah")) {
  $nisn = $_POST['nisn'];
  $nis = $_POST['nis'];
  $nama = $_POST['nama'];
  $id_kelas = $_POST['id_kelas'];
  $alamat = $_POST['alamat'];
  $no_telp = $_POST['no_telp'];
  $password = md5($_POST['password']);

  $tambah = $koneksi->prepare("CALL tambahSiswa('$nisn', '$nis', '$nama', '$id_kelas', '$alamat', '$no_telp', '$password')");
  $tambah->execute();
  header('location:../petugas?page=siswa');
}

if (!empty($_GET['aksi'] == "update")) {
  $nisn = $_POST['nisn'];
  $nis = $_POST['nis'];
  $nama = $_POST['nama'];
  $id_kelas = $_POST['id_kelas'];
  $alamat = $_POST['alamat'];
  $no_telp = $_POST['no_telp'];
  $password = md5($_POST['password']);

  $update = $koneksi->prepare("CALL updateSiswa('$nisn', '$nis', '$nama', '$id_kelas', '$alamat', '$no_telp', '$password')");
  $update->execute();
  header('location:../petugas?page=siswa');
}

if (!empty($_GET['aksi'] == "hapus")) {
  $nisn = $_POST['nisn'];
  $hapus = $koneksi->prepare("CALL hapusSiswa($nisn)");
  $hapus->execute();

  header('location:../petugas?page=siswa');
}