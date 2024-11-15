<?php
session_start();
if ($_SESSION['role'] != 'public') {
  header("Location: login.php");
  exit();
}

include '../config/database.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $id_user = $_SESSION['id_user'];
  $judul_pengaduan = $_POST['judul_pengaduan'];
  $deskripsi = $_POST['deskripsi'];

  $sql = "INSERT INTO Pengaduan (id_user, judul_pengaduan, deskripsi) VALUES (:id_user, :judul_pengaduan, :deskripsi)";
  $stmt = $pdo->prepare($sql);
  $stmt->execute([
    'id_user' => $id_user,
    'judul_pengaduan' => $judul_pengaduan,
    'deskripsi' => $deskripsi
  ]);

  header("Location: user_dashboard.php");
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Form Pengaduan Baru</title>
  <link rel="stylesheet" href="form.css"> 
</head>
<body>
  <h1>Form Pengaduan Baru</h1>
  <form method="POST">
    <label for="judul_pengaduan">Judul Pengaduan</label>
    <input type="text" name="judul_pengaduan" id="judul_pengaduan" required>
    
    <label for="deskripsi">Deskripsi Pengaduan</label>
    <textarea name="deskripsi" id="deskripsi" required></textarea>
    
    <button type="submit">Kirim Pengaduan</button>
  </form>
</body>
</html>
