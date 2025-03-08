<?php
session_start();

// Cek apakah user sudah login
if (!isset($_SESSION['email'])) {
    header('Location: index.php');
    exit();
}

// Ambil data dari session
$email = $_SESSION['email'];
$nama = $_SESSION['nama'];
$ttl = $_SESSION['ttl'];
$pendidikan = $_SESSION['pendidikan'];
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <title>CV Anda</title>
    <link rel="stylesheet" href="cv.css">
</head>
<body>
    <div class="container">
        <h1><?php echo $nama; ?></h1>
        <img src="Foto_Kucing.jpeg" alt="Foto Profil" class="profile-photo">
        <div class="header">
            <p><span>Email:</span> <?php echo $email; ?></p>
            <p><span>Telepon:</span> +62 000 000 0000</p>
            <p><span>Alamat:</span> Lorem ipsum</p>
        </div>
        <div class="section">
            <h2>Profil</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
        </div>
        <div class="biography">
            <h2>Biografi</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
        </div>
        <div class="section">
            <h2>Pendidikan</h2>
            <p><strong><?php echo $pendidikan; ?></strong></p>
        </div>
        <div class="section">
            <h2>Keahlian</h2>
            <ul>
                <li>Lorem ipsum</li>
                <li>Lorem ipsum</li>
            </ul>
        </div>
        <a href="formcv.php" class="back-button">Kembali ke Form CV</a>
    </div>
</body>
</html>