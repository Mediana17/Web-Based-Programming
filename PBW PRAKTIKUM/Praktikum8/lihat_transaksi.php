<?php
include 'koneksi.php';

$query = "SELECT 
    Pesanan.ID AS Pesanan_ID, 
    Pelanggan.Nama AS Nama_Pelanggan,
    Pelanggan.Alamat,
    Pelanggan.Email,
    Pelanggan.Telepon,
    Pesanan.Tanggal_Pesanan, 
    Pesanan.Total_Harga,
    GROUP_CONCAT(buku.Judul SEPARATOR ', ') AS Judul_Buku,
    SUM(Detail_Pesanan.Kuantitas) AS Total_Kuantitas
FROM Pesanan 
JOIN Pelanggan ON Pesanan.Pelanggan_ID = Pelanggan.ID
JOIN Detail_Pesanan ON Pesanan.ID = Detail_Pesanan.Pesanan_ID
JOIN buku ON Detail_Pesanan.Buku_ID = buku.ID
GROUP BY Pesanan.ID, Pelanggan.Nama, Pelanggan.Alamat, Pelanggan.Email, Pelanggan.Telepon, Pesanan.Tanggal_Pesanan, Pesanan.Total_Harga";

$result = $conn->query($query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Daftar Pesanan</title>
</head>
<body>
    <?php include 'nav.php'; ?>
    <div class="container mt-4">
        <h2>Daftar Pesanan</h2>
        <table class="table table-striped table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>ID Pesanan</th>
                    <th>Nama Pelanggan</th>
                    <th>Alamat</th>
                    <th>Email</th>
                    <th>Telepon</th>
                    <th>Buku Dibeli</th>
                    <th>Jumlah</th>
                    <th>Tanggal Pesanan</th>
                    <th>Total Harga</th>
                </tr>
            </thead>
            <tbody>
                <?php while($row = $result->fetch_assoc()): ?>
                <tr>
                    <td><?= $row['Pesanan_ID'] ?></td>
                    <td><?= htmlspecialchars($row['Nama_Pelanggan']) ?></td>
                    <td><?= htmlspecialchars($row['Alamat']) ?></td>
                    <td><?= htmlspecialchars($row['Email']) ?></td>
                    <td><?= htmlspecialchars($row['Telepon']) ?></td>
                    <td><?= htmlspecialchars($row['Judul_Buku']) ?></td>
                    <td><?= $row['Total_Kuantitas'] ?> pcs</td>
                    <td><?= $row['Tanggal_Pesanan'] ?></td>
                    <td>Rp<?= number_format($row['Total_Harga'], 0, ',', '.') ?></td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>