<?php
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nama_produk     = $_POST['nama_produk'];
    $merek           = $_POST['merek'];
    $jenis           = $_POST['jenis'];
    $netto           = $_POST['netto'];
    $harga           = $_POST['harga'];
    $stok            = $_POST['stok'];
    $tanggal_expired = $_POST['tanggal_expired'];

    $stmt = $conn->prepare("INSERT INTO produk_skincare (Nama_Produk, Merek, Jenis, Netto, Harga, Stok, Tanggal_Expired) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssids", $nama_produk, $merek, $jenis, $netto, $harga, $stok, $tanggal_expired);

    if ($stmt->execute()) {
        header("Location: index.php?pesan=" . urlencode("Produk berhasil ditambahkan!"));
    } else {
        header("Location: tambah.php?pesan=" . urlencode("Gagal menambahkan produk: " . $stmt->error));
    }

    $stmt->close();
    $conn->close();
    exit;
}
?>