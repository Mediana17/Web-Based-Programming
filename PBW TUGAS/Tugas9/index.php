<?php
session_start();
if (!isset($_SESSION['login_Un51k4'])) {
    header("Location: login.php?message=" . urlencode("Anda harus login terlebih dahulu."));
    exit;
}

include 'koneksi.php';

$search_nama  = isset($_GET['nama']) ? $_GET['nama'] : '';
$search_jenis = isset($_GET['jenis']) ? $_GET['jenis'] : '';

$stmt = $conn->prepare("SELECT * FROM produk_skincare WHERE Nama_Produk LIKE ? AND Jenis LIKE ? ORDER BY Tanggal_Expired ASC");
$nama_param  = '%' . $search_nama . '%';
$jenis_param = '%' . $search_jenis . '%';
$stmt->bind_param("ss", $nama_param, $jenis_param);
$stmt->execute();
$result = $stmt->get_result();
$stmt->close();

$today    = date('Y-m-d');
$in30days = date('Y-m-d', strtotime('+30 days'));
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <title>Daftar Produk Skincare</title>
</head>
<body>
    <?php include 'nav.php'; ?>
    <div class="container mt-4">
        <h2><i class="bi bi-grid me-2"></i>Daftar Produk Skincare</h2>

        <!-- Pesan sukses/gagal -->
        <?php if (isset($_GET['pesan'])): ?>
            <div class="alert alert-success">
                <i class="bi bi-check-circle me-1"></i>
                <?= htmlspecialchars($_GET['pesan']) ?>
            </div>
        <?php endif; ?>

        <!-- Form Pencarian -->
        <form method="get" class="row g-3 mb-4">
            <div class="col-md-5">
                <label class="form-label">Cari Nama Produk</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-search"></i></span>
                    <input type="text" class="form-control" name="nama"
                        placeholder="Masukkan nama produk"
                        value="<?= htmlspecialchars($search_nama) ?>">
                </div>
            </div>
            <div class="col-md-3">
                <label class="form-label">Cari Jenis</label>
                <div class="input-group">
                    <span class="input-group-text"><i class="bi bi-tag"></i></span>
                    <input type="text" class="form-control" name="jenis"
                        placeholder="Contoh: Serum, Toner"
                        value="<?= htmlspecialchars($search_jenis) ?>">
                </div>
            </div>
            <div class="col-md-2 align-self-end">
                <button type="submit" class="btn btn-primary w-100">
                    <i class="bi bi-search me-1"></i> Cari
                </button>
            </div>
            <div class="col-md-2 align-self-end">
                <a href="index.php" class="btn btn-secondary w-100">
                    <i class="bi bi-arrow-counterclockwise me-1"></i> Reset
                </a>
            </div>
        </form>

        <!-- Keterangan warna -->
        <div class="mb-3">
            <span class="badge bg-danger me-2"><i class="bi bi-x-circle me-1"></i>Expired</span>
            <span class="badge bg-warning text-dark me-2"><i class="bi bi-exclamation-circle me-1"></i>Hampir Expired (30 hari)</span>
            <span class="badge bg-success"><i class="bi bi-check-circle me-1"></i>Aman</span>
        </div>

        <!-- Tabel Produk -->
        <table class="table table-striped table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Nama Produk</th>
                    <th>Merek</th>
                    <th>Jenis</th>
                    <th>Netto</th>
                    <th>Harga</th>
                    <th>Stok</th>
                    <th>Expired</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php while ($row = $result->fetch_assoc()):
                    if ($row['Tanggal_Expired'] < $today) {
                        $rowClass = 'table-danger';
                        $badge = '<span class="badge bg-danger"><i class="bi bi-x-circle me-1"></i>Expired</span>';
                    } elseif ($row['Tanggal_Expired'] <= $in30days) {
                        $rowClass = 'table-warning';
                        $badge = '<span class="badge bg-warning text-dark"><i class="bi bi-exclamation-circle me-1"></i>Hampir Expired</span>';
                    } else {
                        $rowClass = '';
                        $badge = '<span class="badge bg-success"><i class="bi bi-check-circle me-1"></i>Aman</span>';
                    }
                ?>
                <tr class="<?= $rowClass ?>">
                    <td><?= $row['ID'] ?></td>
                    <td><?= htmlspecialchars($row['Nama_Produk']) ?></td>
                    <td><?= htmlspecialchars($row['Merek']) ?></td>
                    <td><?= htmlspecialchars($row['Jenis']) ?></td>
                    <td><?= htmlspecialchars($row['Netto']) ?></td>
                    <td>Rp<?= number_format($row['Harga'], 0, ',', '.') ?></td>
                    <td><?= $row['Stok'] ?></td>
                    <td><?= $row['Tanggal_Expired'] ?> <?= $badge ?></td>
                    <td>
                        <a href="edit.php?id=<?= $row['ID'] ?>" class="btn btn-sm btn-warning">
                            <i class="bi bi-pencil-square"></i> Edit
                        </a>
                        <a href="hapus.php?id=<?= $row['ID'] ?>"
                            class="btn btn-sm btn-danger"
                            onclick="return confirm('Yakin ingin menghapus produk ini?')">
                            <i class="bi bi-trash"></i> Hapus
                        </a>
                    </td>
                </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>