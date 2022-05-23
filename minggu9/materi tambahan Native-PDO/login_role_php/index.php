<?php
session_start(); // Start session nya

// Kita cek apakah user sudah login atau belum
// Cek nya dengan cara cek apakah terdapat session username atau tidak
    if(isset($_SESSION['username'])){ // Jika session username ada berarti dia sudah login
        include "layouts/backend.php"; // Kita panggil template backend
    }else{ // Jika user belum login
        include "layouts/login.php"; // Kita panggil template login
    }
?>