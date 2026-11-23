
<?php
//NAMA      : ISTIQOMAH
//NIM       : 250102046
//KELAS     : TI-2B

session_start();

$pesan = $_SESSION['pesan'] ?? "";
$errors = $_SESSION['errors'] ?? [];

unset($_SESSION['pesan']);
unset($_SESSION['errors']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Pendaftaran Anggota</title>
</head>
<body>

    <h2>FORM PENDAFTARAN ANGGOTA PERPUSTAKAAN</h2>

    <?php
    if ($pesan != "") {
        echo "<p>" . htmlspecialchars($pesan) . "</p>";
    }

    if (!empty($errors)) {
        echo "<ul>";
        foreach ($errors as $error) {
            echo "<li>" . htmlspecialchars($error) . "</li>";
        }
        echo "</ul>";
    }
    ?>

    <form action="proses_anggota.php" method="post">

        <label for="no_anggota">Nomor Anggota</label><br>
        <input type="text" id="no_anggota" name="no_anggota"
        maxlength="15" required>
        <br><br>

        <label for="nama_lengkap">Nama Lengkap</label><br>
        <input type="text" id="nama_lengkap" name="nama_lengkap"
        maxlength="100" required>
        <br><br>

        <label for="email">Email</label><br>
        <input type="text" id="email" name="email"
        maxlength="100" required>
        <br><br>

        <label for="no_hp">Nomor HP</label><br>
        <input type="text" id="no_hp" name="no_hp"
        maxlength="13" required>
        <br><br>

        <label for="jenis_anggota">Jenis Anggota</label><br>
        <select name="jenis_anggota" id="jenis_anggota" required>
            <option value="">Pilih Jenis Anggota</option>
            <option value="Mahasiswa">Mahasiswa</option>
            <option value="Dosen">Dosen</option>
            <option value="Tenaga Kependidikan">Tenaga Kependidikan</option>
        </select>
        <br><br>

        <label for="alamat">Alamat</label><br>
        <textarea name="alamat" id="alamat" required></textarea>
        <br><br>

        <button type="submit">Daftar</button>

    </form>

</body>
</html>
