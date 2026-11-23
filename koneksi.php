<?php
//NAMA      : ISTIQOMAH
//NIM       : 250102046
//KELAS     : TI-2B

mysqli_report(MYSQLI_REPORT_OFF);

$host = "localhost";
$username = "root";
$password = "";
$database = "db_perpustakaan";

$koneksi = mysqli_connect($host, $username, $password, $database);

if (!$koneksi) {
    die("Koneksi Gagal: " . htmlspecialchars(mysqli_connect_error()));
} else {
    echo "Koneksi berhasil ke database db_perpustakaan";
}

mysqli_set_charset($koneksi, "utf8mb4");
?>

