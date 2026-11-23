<?php
//NAMA      : ISTIQOMAH
//NIM       : 250102046
//KELAS     : TI-2B

require_once "koneksi.php";

$versi_server = mysqli_get_server_info($koneksi);
mysqli_close($koneksi);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tes Koneksi Database</title>
</head>
<body>
    <h1>Tes Koneksi Database</h1>
    <p>Koneksi ke MySQL berhasil.</p>

    <table>
        <tr>
            <td>Host</td>
            <td>><?php echo htmlspecialchars($host); ?></td>
        </tr>
        <tr>
            <td>Database</td>
            <td>><?php echo htmlspecialchars($database); ?></td>
        </tr>
        <tr>
            <td>Versi Server</td>
            <td>><?php echo htmlspecialchars($versi_server); ?></td>
        </tr>
    </table>
</body>
</html>