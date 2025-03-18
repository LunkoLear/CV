<?php
session_start();
if (!isset($_SESSION['loggedin'])) {
    header('Location: login.php');
    exit;
}

if (isset($_POST['submit'])) {
    $_SESSION['nama'] = $_POST['nama'];
    $_SESSION['ttl'] = $_POST['ttl'];
    $_SESSION['pendidikan'] = $_POST['pendidikan'];

    if (isset($_FILES['foto']) && $_FILES['foto']['error'] == 0) {
        $tempFile = $_FILES["foto"]["tmp_name"];
        $imageFileType = strtolower(pathinfo($_FILES["foto"]["name"], PATHINFO_EXTENSION));
        $targetDir = "uploads/";
        
        $check = getimagesize($tempFile);
        if ($check === false) {
            echo "File bukan gambar.";
            exit;
        }

        if ($_FILES["foto"]["size"] > 500000) {
            echo "Maaf, ukuran file terlalu besar.";
            exit;
        }

        if (!in_array($imageFileType, ['jpg', 'png', 'jpeg', 'gif'])) {
            echo "Maaf, hanya file JPG, JPEG, PNG & GIF yang diizinkan.";
            exit;
        }

        $newFileName = $targetDir . uniqid() . "." . $imageFileType;

        if (move_uploaded_file($tempFile, $newFileName)) {
            $_SESSION['foto'] = $newFileName; 
        } else {
            echo "Maaf, terjadi kesalahan saat mengupload file.";
            exit;
        }
    }

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
        <form method="POST" enctype="multipart/form-data">
            <label>Nama:</label>
            <input type="text" name="nama" required>
            <label>Tempat, Tanggal Lahir:</label>
            <input type="text" name="ttl" required>
            <label>Riwayat Pendidikan:</label>
            <textarea name="pendidikan" required></textarea>
            <label>Foto Anda:</label>
            <input type="file" name="foto" accept="image/jpeg, image/png, image/jpg, image/gif" required>
            <button type="submit" name="submit">Submit</button>
        </form>
    </div>
</body>
</html>
