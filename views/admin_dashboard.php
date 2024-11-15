<?php
session_start();
if ($_SESSION['role'] != 'admin') {
  header("Location: login.php");
  exit();
}

include '../config/database.php';
$sql = "SELECT p.*, u.nama AS nama_user FROM Pengaduan p JOIN User u ON p.id_user = u.id_user";
$stmt = $pdo->prepare($sql);
$stmt->execute();
$pengaduan = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Daftar Semua Pengaduan</title>
  <link rel="stylesheet" href="admins.css"> <!-- Linking to external CSS -->
</head>
<body>
  <h1>Daftar Semua Pengaduan</h1>
  <td>
      <a href="logout.php">logout</a>
  </td>
  <table>
    <thead>
      <tr>
        <th>Nama User</th>
        <th>Judul</th>
        <th>Status</th>
        <th>Tanggal</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($pengaduan as $p) { ?>
      <tr>
        <td><?= $p['nama_user']; ?></td>
        <td><?= $p['judul_pengaduan']; ?></td>
        <td><?= $p['status_pengaduan']; ?></td>
        <td><?= $p['tanggal_pengaduan']; ?></td>
        <td>
          <a href="edit_pengaduan.php?id=<?= $p['id_pengaduan']; ?>">Edit</a>
         
        </td>
      </tr>
      <?php } ?>
    </tbody>
  </table>
</body>
</html>





