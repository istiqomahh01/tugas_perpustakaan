<?php
//NAMA      : ISTIQOMAH
//NIM       : 250102046
//KELAS     : TI-2B

session_start();

require_once "koneksi.php";

if ($_SERVER["REQUEST_METHOD"] != "POST") {
    header("Location: form_anggota.php");
    exit;
}

$no_anggota = trim($_POST['no_anggota'] ?? "");
$nama_lengkap = trim($_POST['nama_lengkap'] ?? "");
$email = trim($_POST['email'] ?? "");
$no_hp = trim($_POST['no_hp'] ?? "");
$jenis_anggota = trim($_POST['jenis_anggota'] ?? "");
$alamat = trim($_POST['alamat'] ?? "");

$errors = [];

if (empty($no_anggota)) {
    $errors[] = "Nomor anggota wajib diisi.";
} elseif (!ctype_digit($no_anggota) || strlen($no_anggota) > 15) {
    $errors[] = "Nomor anggota harus berupa angka maksimal 15 digit.";
}

if (empty($nama_lengkap)) {
    $errors[] = "Nama lengkap wajib diisi.";
} elseif (strlen($nama_lengkap) > 100) {
    $errors[] = "Nama maksimal 100 karakter.";
}

if (empty($email)) {
    $errors[] = "Email wajib diisi.";
} elseif (strlen($email) > 100 || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errors[] = "Format email tidak valid.";
}

if (empty($no_hp)) {
    $errors[] = "Nomor HP wajib diisi.";
} elseif (!ctype_digit($no_hp) || strlen($no_hp) < 10 || strlen($no_hp) > 13) {
    $errors[] = "Nomor HP harus berupa angka 10 sampai 13 digit.";
}

$pilihan = ["Mahasiswa", "Dosen", "Tenaga Kependidikan"];

if (!in_array($jenis_anggota, $pilihan)) {
    $errors[] = "Jenis anggota tidak valid.";
}

if (empty($alamat)) {
    $errors[] = "Alamat wajib diisi.";
}

if (!empty($errors)) {
    $_SESSION['errors'] = $errors;
    header("Location: form_anggota.php");
    exit;
}

$sql = "INSERT INTO anggota
        (no_anggota, nama_lengkap, email, no_hp, jenis_anggota, alamat)
        VALUES (?, ?, ?, ?, ?, ?)";

$stmt = mysqli_prepare($koneksi, $sql);

if ($stmt) {
    mysqli_stmt_bind_param(
        $stmt,
        "ssssss",
        $no_anggota,
        $nama_lengkap,
        $email,
        $no_hp,
        $jenis_anggota,
        $alamat
    );

    if (mysqli_stmt_execute($stmt)) {
        $_SESSION['pesan'] = "Pendaftaran anggota berhasil disimpan.";
    } else {
        $_SESSION['pesan'] = "Pendaftaran gagal: " . mysqli_stmt_error($stmt);
    }

    mysqli_stmt_close($stmt);
} else {
    $_SESSION['pesan'] = "Terjadi kesalahan pada proses penyimpanan.";
}

mysqli_close($koneksi);

header("Location: form_anggota.php");
exit;
?>