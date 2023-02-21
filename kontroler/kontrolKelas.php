<?php

include '../request.php';

if (empty($_SESSION['USER']['level'] == "admin")) {
  die("Permission Denied - 422");
}

if (!empty($_GET['aksi'] == "tambah")) {
  $nama_kelas = $_POST['nama_kelas'];
  $kompetensi_keahlian = $_POST['kompetensi_keahlian'];

  $tambah = $koneksi->prepare("CALL tambahKelas('$nama_kelas', '$kompetensi_keahlian')");
  $tambah->execute();
  header('location:../petugas?page=kelas');
}

if (!empty($_GET['aksi'] == "update")) {
  $id = $_POST['id'];
  $nama_kelas = $_POST['nama_kelas'];
  $kompetensi_keahlian = $_POST['kompetensi_keahlian'];

  $update = $koneksi->prepare("CALL updateKelas('$id', '$nama_kelas', '$kompetensi_keahlian')");
  $update->execute();
  header('location:../petugas?page=kelas');
}

if (!empty($_GET['aksi'] == "hapus")) {
  $id = $_POST['id'];
  $delete = $koneksi->prepare("CALL hapusKelas('$id')");
  $delete->execute();
  header('location:../petugas?page=kelas');
}