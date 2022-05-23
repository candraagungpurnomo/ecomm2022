<?php
 $page = (isset($_GET['page']))? $_GET['page'] : '';

 if(isset($_SESSION['username'])){ // Jika sudah login
    if($_SESSION['role'] == 'admin'){ // Jika user yang login adalah admin
        // Berikut halaman yang bisa di akses :
        switch($page){
            case 'login': // $page == login (jika isi dari $page adalah home)
            include "views/login.php"; // load file login.php yang ada di folder views
            break;

            case 'home': // $page == home (jika isi dari $page adalah home)
            include "views/home.php"; // load file home.php yang ada di folder views
            break;

            case 'berita': // $page == berita (jika isi dari $page adalah berita)
            include "views/berita.php"; // load file berita.php yang ada di folder views
            break;

            case 'pengguna': // $page == pengguna (jika isi dari $page adalah pengguna)
            include "views/pengguna.php"; // load file pengguna.php yang ada di folder views
            break;

            case 'kontak': // $page == kontak (jika isi dari $page adalah kontak)
            include "views/kontak.php"; // load file kontak.php yang ada di folder views
            break;

            // case 'case_selanjutnya':
            // include "views/case_selanjutnya.php";
            // break;

            // case 'case_selanjutnya':
            // include "views/case_selanjutnya.php";
            // break;

            // case 'case_selanjutnya':
            // include "views/case_selanjutnya.php";
            // break;

        default: // Ini untuk set default jika isi dari $page tidak ada
        // Set halaman 404 Not Found
        header("HTTP/1.0 404 Not Found");
        echo "<h1>404 Not Found</h1>";
        echo "The page that you have requested could not be found.";
        exit();
    }
   }else{ // Jika user yang login adalah operator
        // Berikut halaman yang bisa di akses :
        switch($page){
        case 'login': // $page == login (jika isi dari $page adalah home)
        include "views/login.php"; // load file login.php yang ada di folder views
        break;

        case 'home': // $page == home (jika isi dari $page adalah home)
        include "views/home.php"; // load file home.php yang ada di folder views
        break;

        case 'berita': // $page == berita (jika isi dari $page adalah berita)
        include "views/berita.php"; // load file berita.php yang ada di folder views
        break;

        case 'kontak': // $page == kontak (jika isi dari $page adalah kontak)
        include "views/kontak.php"; // load file kontak.php yang ada di folder views
        break;

// case 'case_selanjutnya':
// include "views/case_selanjutnya.php";
// break;

// case 'case_selanjutnya':
// include "views/case_selanjutnya.php";
// break;

// case 'case_selanjutnya':
// include "views/case_selanjutnya.php";
// break;

        default: // Ini untuk set default jika isi dari $page tidak ada
        // Set halaman 404 Not Found
        header("HTTP/1.0 404 Not Found");
        echo "<h1>404 Not Found</h1>";
        echo "The page that you have requested could not be found.";
        exit();
    }
}
    }else // Jika belum login
        include "views/login.php"; // Set default halamannya adalah "login"
?>