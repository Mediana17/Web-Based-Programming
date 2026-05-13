<?php
session_start();
if (!isset($_SESSION['login_Un51k4'])){
    header("Location: login.php?message=" . urlencode("Mengakses fitur harus login dulu kids."));
    exit;
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <h2>Selamat datang, <?= htmlspecialchars($_SESSION['nama']) ?>!</h2>
            <p class="text-muted">ID Pengguna: <?= $_SESSION['id'] ?></p>
            <a href="logout.php" class="btn btn-danger">Logout</a>
        </div>
    </div>
</body>
</html>