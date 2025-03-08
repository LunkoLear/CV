<?php
session_start();
if (!isset($_SESSION['loggedin'])) {
    header('Location: login.php');
    exit;
}

if (isset($_POST['submit'])) {
    // Simpan data CV ke session
    $_SESSION['nama'] = $_POST['nama'];
    $_SESSION['ttl'] = $_POST['ttl'];
    $_SESSION['pendidikan'] = $_POST['pendidikan'];
    header('Location: cv2.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <title>Form CV</title>
    <link rel="stylesheet" href="cv2.css">
</head>
<body>
    <div class="form-container">
        <h1>Form CV</h1>
        <form method="POST">
            <label>Nama:</label>
            <input type="text" name="nama" required>
            <label>Tempat, Tanggal Lahir:</label>
            <input type="text" name="ttl" required>
            <label>Riwayat Pendidikan:</label>
            <textarea name="pendidikan" required></textarea>
            <button type="submit" name="submit">Submit</button>
        </form>
    </div>
</body>
</html>