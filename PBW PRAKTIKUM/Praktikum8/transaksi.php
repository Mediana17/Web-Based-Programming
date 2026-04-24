<?php
include 'koneksi.php';
include 'nav.php';

$buku_result = $conn->query("SELECT ID, Judul FROM buku");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>Buat Pesanan</title>
</head>
<body>
    <div class="container mt-4">
        <h2>Buat Pesanan Baru</h2>
        <?php if (isset($_GET['message'])): ?>
            <div class="alert alert-info"><?= htmlspecialchars($_GET['message']) ?></div>
        <?php endif; ?>

        <form method="post" action="proses_transaksi.php">
            <h4 class="mb-3">Data Pelanggan</h4>

            <div class="mb-3">
                <label for="nama_pelanggan" class="form-label">Nama Pelanggan</label>
                <input type="text" class="form-control" id="nama_pelanggan"
                    name="nama_pelanggan" placeholder="Masukkan nama pelanggan" required>
            </div>
            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat</label>
                <input type="text" class="form-control" id="alamat"
                    name="alamat" placeholder="Masukkan alamat" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" class="form-control" id="email"
                    name="email" placeholder="Masukkan email" required>
            </div>
            <div class="mb-3">
                <label for="telepon" class="form-label">Telepon</label>
                <input type="text" class="form-control" id="telepon"
                    name="telepon" placeholder="Masukkan nomor telepon" required>
            </div>

            <h4 class="mb-3">Daftar Buku</h4>
            <div class="mb-3">
                <label for="buku_id" class="form-label">Pilih Buku</label>
                <select class="form-select" name="buku[1][id]" id="buku_id" required>
                    <option value="">Pilih Buku</option>
                    <?php while($row = $buku_result->fetch_assoc()): ?>
                        <option value="<?= $row['ID'] ?>"><?= htmlspecialchars($row['Judul']) ?></option>
                    <?php endwhile; ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="kuantitas" class="form-label">Jumlah Buku</label>
                <input type="number" class="form-control" id="kuantitas"
                    name="buku[1][kuantitas]" min="1" required>
            </div>
            <button type="submit" class="btn btn-primary">Buat Pesanan</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>