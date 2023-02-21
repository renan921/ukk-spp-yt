<?php

include '../request.php';

if (empty($_SESSION['USER']['level'] == "admin")) {
  die("Permission Denied - 422");
}

if (!empty($_GET['aksi'] == "tambah")) {
  $id_petugas = $_SESSION['USER']['id'];
  $nisn = $_POST['nisn'];
  $tgl_bayar = $_POST['tgl_bayar'];
  $bulan_bayar = $_POST['bulan_bayar'];
  $tahun_dibayar = $_POST['tahun_dibayar'];
  $id_spp = $_POST['id_spp'];
  $jumlah_bayar = $_POST['jumlah_bayar'];

  $tambah = $koneksi->prepare("CALL tambahPembayaran('$id_petugas', '$nisn', '$tgl_bayar', '$bulan_bayar', '$tahun_dibayar', '$id_spp', '$jumlah_bayar')");
  $tambah->execute();
  header('location:../petugas?page=laporan');
}