<?php
// Mulai sesi
session_start();


session_unset();

session_destroy();

// Redirect ke halaman konfirmasi logout
header("Location: logout_confirmation.php");
exit();
?>
