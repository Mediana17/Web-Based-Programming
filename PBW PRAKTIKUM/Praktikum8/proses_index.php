<?php
include 'koneksi.php';
 
$search_judul = isset($_GET['judul']) ? $_GET['judul'] : '';
$search_tahun = isset($_GET['tahun_terbit']) ? $_GET['tahun_terbit'] : '';
 
$stmt = $conn->prepare("SELECT * FROM buku WHERE Judul LIKE ? AND Tahun_Terbit LIKE ?");
$search_judul_param = '%' . $search_judul . '%';
$search_tahun_param = '%' . $search_tahun . '%';
$stmt->bind_param("ss", $search_judul_param, $search_tahun_param);
$stmt->execute();
$result = $stmt->get_result(); 
$stmt->close();
?>