<?php
session_start();
if (!isset($_SESSION['login_Un51k4'])) {
    header("Location: login.php?message=" . urlencode("Anda harus login terlebih dahulu."));
    exit;
}

include 'koneksi.php';

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];

    $stmt = $conn->prepare("DELETE FROM produk_skincare WHERE ID = ?");
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        header("Location: index.php?pesan=" . urlencode("Produk berhasil dihapus!"));
    } else {
        header("Location: index.php?pesan=" . urlencode("Gagal menghapus produk: " . $stmt->error));
    }

    $stmt->close();
} else {
    header("Location: index.php?pesan=" . urlencode("ID tidak valid!"));
}

$conn->close();
exit;
?>