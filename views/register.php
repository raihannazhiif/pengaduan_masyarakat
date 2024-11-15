<?php
session_start();


include '../config/database.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  
  $username = $_POST['username'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $confirm_password = $_POST['confirm_password'];


  if ($password != $confirm_password) {
    echo "Password dan konfirmasi password tidak cocok!";
    exit();
  }

  // Hash password sebelum disimpan ke database
  $hashed_password = password_hash($password, PASSWORD_DEFAULT);

  // Query untuk menyimpan data ke database
  $sql = "INSERT INTO User (username, email, password, role) VALUES (:username, :email, :password, 'public')";
  $stmt = $pdo->prepare($sql);
  
  try {
  
    $stmt->execute([
      'username' => $username,
      'email' => $email,
      'password' => $hashed_password
    ]);
    echo "Registrasi berhasil! <a href='login.php'>Login sekarang</a>";
  } catch (PDOException $e) {
 
    echo "Error: " . $e->getMessage();
  }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Registrasi Pengguna</title>
  <link rel="stylesheet" href="register.css">
</head>
<body>
  <h1>Registrasi Pengguna Baru</h1>
  <form method="POST">
    <label>Username</label>
    <input type="text" name="username" required>
    
    <label>Email</label>
    <input type="email" name="email" required>
    
    <label>Password</label>
    <input type="password" name="password" required>
    
    <label>Konfirmasi Password</label>
    <input type="password" name="confirm_password" required>
    
    <button type="submit">Daftar</button>
  </form>
</body>
</html>
