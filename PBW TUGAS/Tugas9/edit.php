<?php
session_start();
if (!isset($_SESSION['login_Un51k4'])) {
    header("Location: login.php?message=" . urlencode("Anda harus login terlebih dahulu."));
    exit;
}

include 'koneksi.php';
include 'nav.php';

$id = isset($_GET['id']) && is_numeric($_GET['id']) ? $_GET['id'] : 0;

$stmt = $conn->prepare("SELECT * FROM produk_skincare WHERE ID = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();
$stmt->close();

if (!$row) {
    echo "Produk tidak ditemukan!";
    exit;
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <title>Edit Produk</title>
</head>
<body>
    <div class="container mt-4">
        <h2><i class="bi bi-pencil-square me-2"></i>Edit Produk Skincare</h2>
        <form method="post" action="proses_edit.php">
            <input type="hidden" name="id" value="<?= $row['ID'] ?>">
            <div class="mb-3">
                <label class="form-label">Nama Produk</label>
                <input type="text" class="form-control" name="nama_produk"
                    value="<?= htmlspecialchars($row['Nama_Produk']) ?>" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Merek</label>
                <input type="text" class="form-control" name="merek"
                    value="<?= htmlspecialchars($row['Merek']) ?>" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Jenis</label>
                <select class="form-select" name="jenis" required>
                    <?php
                    $jenis_list = ['Serum', 'Toner', 'Moisturizer', 'Sunscreen', 'Face Wash', 'Essence', 'Mask', 'Eye Cream'];
                    foreach ($jenis_list as $j):
                    ?>
                    <option value="<?= $j ?>" <?= $row['Jenis'] === $j ? 'selected' : '' ?>><?= $j ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">Netto</label>
                <input type="text" class="form-control" name="netto"
                    value="<?= htmlspecialchars($row['Netto']) ?>"
                    placeholder="Contoh: 50ml, 100g, 30ml" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Harga (Rp)</label>
                <input type="number" class="form-control" name="harga"
                    value="<?= $row['Harga'] ?>" min="0" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Stok</label>
                <input type="number" class="form-control" name="stok"
                    value="<?= $row['Stok'] ?>" min="0" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Tanggal Expired</label>
                <input type="date" class="form-control" name="tanggal_expired"
                    value="<?= $row['Tanggal_Expired'] ?>" required>
            </div>
            <a href="index.php" class="btn btn-secondary">
                <i class="bi bi-arrow-left me-1"></i> Batal
            </a>
            <button type="submit" class="btn btn-primary">
                <i class="bi bi-save me-1"></i> Update
            </button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>