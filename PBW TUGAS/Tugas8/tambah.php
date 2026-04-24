<?php include 'nav.php'; ?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <title>Tambah Produk</title>
</head>
<body>
    <div class="container mt-4">
        <h2><i class="bi bi-plus-circle me-2"></i>Tambah Produk Skincare</h2>
        <form method="post" action="proses_tambah.php">
            <div class="mb-3">
                <label class="form-label">Nama Produk</label>
                <input type="text" class="form-control" name="nama_produk" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Merek</label>
                <input type="text" class="form-control" name="merek" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Jenis</label>
                <select class="form-select" name="jenis" required>
                    <option value="">-- Pilih Jenis --</option>
                    <option value="Serum">Serum</option>
                    <option value="Toner">Toner</option>
                    <option value="Moisturizer">Moisturizer</option>
                    <option value="Sunscreen">Sunscreen</option>
                    <option value="Face Wash">Face Wash</option>
                    <option value="Essence">Essence</option>
                    <option value="Mask">Mask</option>
                    <option value="Eye Cream">Eye Cream</option>
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">Netto</label>
                <input type="text" class="form-control" name="netto"
                    placeholder="Contoh: 50ml, 100g, 30ml" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Harga (Rp)</label>
                <input type="number" class="form-control" name="harga" min="0" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Stok</label>
                <input type="number" class="form-control" name="stok" min="0" required>
            </div>
            <div class="mb-3">
                <label class="form-label">Tanggal Expired</label>
                <input type="date" class="form-control" name="tanggal_expired" required>
            </div>
            <a href="index.php" class="btn btn-secondary">
                <i class="bi bi-arrow-left me-1"></i> Batal
            </a>
            <button type="submit" class="btn btn-primary">
                <i class="bi bi-save me-1"></i> Simpan
            </button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>