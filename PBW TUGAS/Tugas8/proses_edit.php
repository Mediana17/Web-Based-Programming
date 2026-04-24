<?php
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id              = $_POST['id'];
    $nama_produk     = $_POST['nama_produk'];
    $merek           = $_POST['merek'];
    $jenis           = $_POST['jenis'];
    $netto           = $_POST['netto'];
    $harga           = $_POST['harga'];
    $stok            = $_POST['stok'];
    $tanggal_expired = $_POST['tanggal_expired'];

    $stmt = $conn->prepare("UPDATE produk_skincare SET Nama_Produk=?, Merek=?, Jenis=?, Netto=?, Harga=?, Stok=?, Tanggal_Expired=? WHERE ID=?");
    $stmt->bind_param("ssssdisi", $nama_produk, $merek, $jenis, $netto, $harga, $stok, $tanggal_expired, $id);

    if ($stmt->execute()) {
        header("Location: index.php?pesan=" . urlencode("Produk berhasil diperbarui!"));
    } else {
        header("Location: index.php?pesan=" . urlencode("Gagal memperbarui produk: " . $stmt->error));
    }

    $stmt->close();
    $conn->close();
    exit;
}
?>