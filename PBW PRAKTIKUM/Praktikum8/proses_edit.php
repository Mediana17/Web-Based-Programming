<?php
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST'){
    $id = $_POST['id'];
    $judul = $_POST['judul'];
    $penulis = $_POST['penulis'];
    $tahun_terbit = $_POST['tahun_terbit'];
    $harga = $_POST['harga'];
    $stok = $_POST['stok'];

    $stmt = $conn->prepare("UPDATE buku SET Judul=?, Penulis=?, Tahun_Terbit=?, Harga=?, Stok=? WHERE id=?");
    $stmt->bind_param("ssiiii", $judul, $penulis, $tahun_terbit, $harga, $stok, $id);

    if ($stmt->execute()) {
        echo "<script>
                alert('Data berhasil diperbarui!');
                window.location.href = 'index.php';
              </script>";
    } else {
        echo "<script>
                alert('Gagal memperbarui data: " . addslashes($stmt->error) . "');
                window.location.href = 'index.php';
              </script>";
    }

    $stmt->close();
}