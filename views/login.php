<?php
session_start();
include '../config/database.php';



if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $username = $_POST['username'];
  $password = $_POST['password'];

  $sql = "SELECT * FROM User WHERE username = :username";
  $stmt = $pdo->prepare($sql);
  $stmt->execute(['username' => $username]);

  $user = $stmt->fetch();
  if ($user && password_verify($password, $user['password'])) {
    $_SESSION['id_user'] = $user['id_user'];
    $_SESSION['role'] = $user['role'];
    header("Location: " . ($user['role'] == 'admin' ? 'admin_dashboard.php' : 'user_dashboard.php'));
  } else {
    echo "Login gagal! Username atau password salah.";
  }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Pengaduan Masyarakat</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="login-container">
        <h2>Login Pengguna</h2>
        
        <form method="POST" class="login-form">
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" name="username" id="username" required placeholder="Masukkan username">
            </div>
            
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" required placeholder="Masukkan password">
            </div>
            
            <button type="submit" class="submit-btn">Login</button>
            
            <div class="footer-links">
                <a href="#">Lupa Password?</a> | <a href="register.php">Daftar Akun</a>
            </div>
        </form>
    </div>
</body>
</html>
