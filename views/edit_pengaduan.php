<?php
session_start();
if ($_SESSION['role'] != 'admin') {
  header("Location: login.php");
  exit();
}

include '../config/database.php';
$id_pengaduan = $_GET['id'];
$sql = "SELECT * FROM Pengaduan WHERE id_pengaduan = :id_pengaduan";
$stmt = $pdo->prepare($sql);
$stmt->execute(['id_pengaduan' => $id_pengaduan]);
$pengaduan = $stmt->fetch();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
  $status = $_POST['status'];
  $sql = "UPDATE Pengaduan SET status_pengaduan = :status WHERE id_pengaduan = :id_pengaduan";
  $stmt = $pdo->prepare($sql);
  $stmt->execute(['status' => $status, 'id_pengaduan' => $id_pengaduan]);
  header("Location: admin_dashboard.php");
}
?>

<?php

?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Edit Pengaduan</title>
  <link rel="stylesheet" href="edit.css">
</head>
<body>
  <h1>Edit Pengaduan</h1>
  <form method="POST">
    <label>Status</label>
    <select name="status">
      <option value="diajukan" <?= $pengaduan['status_pengaduan'] == 'diajukan' ? 'selected' : ''; ?>>Diajukan</option>
      <option value="diproses" <?= $pengaduan['status_pengaduan'] == 'diproses' ? 'selected' : ''; ?>>Diproses</option>
      <option value="selesai" <?= $pengaduan['status_pengaduan'] == 'selesai' ? 'selected' : ''; ?>>Selesai</option>
    </select>
    <button type="submit">Simpan</button>
  </form>
</body>
</html>


