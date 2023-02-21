<?php

require('../request.php');

if (!empty($_GET['aksi'] == 'loginPetugas')) {
  // eksekusi login
  $username = $_POST['username'];
  $password = md5($_POST['password']);

  $hasil = $koneksi->prepare("CALL getLoginPetugas('$username', '$password')");
  $hasil->execute();
  
  $petugas = $hasil->fetch();

  if ($petugas) {
    $_SESSION['USER']['id'] = $petugas['id_petugas'];
    $_SESSION['USER']['tipe'] = 'petugas';
    $_SESSION['USER']['level'] = $petugas['level'];

    header('location:../petugas');
  } else {
    echo "Login gagal";
  }
}

if (!empty($_GET['aksi'] == 'loginSiswa')) {
  // eksekusi login
  $nisn = $_POST['nisn'];
  $password = md5($_POST['password']);

  $hasil = $koneksi->prepare("CALL getLoginSiswa('$nisn', '$password')");
  $hasil->execute();
  
  $siswa = $hasil->fetch();

  if ($siswa) {
    $_SESSION['USER']['id'] = $siswa['nisn'];
    $_SESSION['USER']['tipe'] = 'siswa';

    header('location:../siswa');
  } else {
    echo "Login gagal";
  }
}

if (!empty($_GET['aksi'] == 'logout')) {
  $tipe = $_SESSION['USER']['tipe'];
  session_destroy();
  if ($tipe == "petugas") {
    header('location:../login.php');
  } else {
    header('location:../login-siswa.php');
  }
}