<?php
include 'koneksi.php';

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = $_GET['id'];

    $stmt = $conn->prepare("DELETE FROM buku WHERE ID = ?"); 
    $stmt->bind_param("i", $id); 
    
    if ($stmt->execute()) {
        echo "<script>
                alert('Data berhasil dihapus!');
                window.location.href = 'index.php';
              </script>";
    } else {
        echo "<script>
                alert('Gagal menghapus data: " . addslashes($stmt->error) . "');
                window.location.href = 'index.php';
              </script>";
    }

    $stmt->close();
} else {
    echo "<script>
            alert('ID tidak valid!');
            window.location.href = 'index.php';
          </script>";
}
$conn->close();
?>