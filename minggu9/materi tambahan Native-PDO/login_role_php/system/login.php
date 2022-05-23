<?php
session_start(); // Start session nya

include "koneksi.php"; // Load file koneksi.php

$username = $_POST['username']; // Ambil value username yang dikirim dari form
$password = $_POST['password']; // Ambil value password yang dikirim dari form
$password = md5($password); // Kita enkripsi (encrypt) password tadi dengan md5

// Buat query untuk mengecek apakah ada data user dengan username dan password yang dikirim dari form
$sql = $pdo->prepare("SELECT * FROM user WHERE username=:a AND password=:b");
$sql->bindParam(':a', $username);
$sql->bindParam(':b', $password);
$sql->execute(); // Eksekusi querynya

$data = $sql->fetch(); // Ambil datanya dari hasil query tadi

// Cek apakah variabel $data ada datanya atau tidak
if( ! empty($data)){ // Jika tidak sama dengan empty (kosong)
$_SESSION['username'] = $data['username']; // Set session untuk username (simpan username di session)
$_SESSION['nama'] = $data['nama']; // Set session untuk nama (simpan nama di session)
$_SESSION['role'] = $data['role']; // Set session untuk role (simpan role di session)

header("location: ".$base_url."index.php?page=home"); // Kita redirect ke halaman home
}else{ // Jika $data nya kosong
// Buat sebuah cookie untuk menampung data pesan kesalahan
setcookie("message", "Maaf, Username atau Password salah", time()+3600, '/');

header("location: ".$base_url."index.php"); // Redirect kembali ke halaman index.php
}
?>
