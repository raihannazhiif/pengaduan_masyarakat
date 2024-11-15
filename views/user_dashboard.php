<?php
session_start();
if ($_SESSION['role'] != 'public') {
  header("Location: login.php");
  exit();
}

include '../config/database.php';
$id_user = $_SESSION['id_user'];
$sql = "SELECT * FROM Pengaduan WHERE id_user = :id_user";
$stmt = $pdo->prepare($sql);
$stmt->execute(['id_user' => $id_user]);
$pengaduan = $stmt->fetchAll();
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Pengaduan Saya</title>
    <link rel="stylesheet" href="user.css"> 
</head>
<body>
    <div class="container">
        <h1>Daftar Pengaduan Saya</h1>

        <a href="form_pengaduan.php" class="btn-tambah">Tambah Pengaduan</a>
        <td>
      <a href="logout.php">logout</a>
  </td>

        <table>
            <thead>
                <tr>
                    <th>Judul</th>
                    <th>Status</th>
                    <th>Tanggal</th>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($pengaduan)) { ?>
                    <tr>
                        <td colspan="3" class="no-data">Belum ada pengaduan yang diajukan.</td>
                    </tr>
                <?php } else { ?>
                    <?php foreach ($pengaduan as $p) { ?>
                    <tr>
                        <td><?= htmlspecialchars($p['judul_pengaduan']); ?></td>
                        <td><?= htmlspecialchars($p['status_pengaduan']); ?></td>
                        <td><?= htmlspecialchars($p['tanggal_pengaduan']); ?></td>
                    </tr>
                    <?php } ?>
                <?php } ?>
            </tbody>
        </table>
    </div>
</body>
</html>

