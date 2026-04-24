<?php
include 'koneksi.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $conn->begin_transaction();
    try {
        $nama_pelanggan = trim($_POST['nama_pelanggan']);
        $alamat         = trim($_POST['alamat']);
        $email          = trim($_POST['email']);
        $telepon        = trim($_POST['telepon']);

        if (empty($nama_pelanggan) || empty($alamat) || empty($email) || empty($telepon)) {
            throw new Exception("Semua data pelanggan harus diisi.");
        }

        $stmt = $conn->prepare("INSERT INTO pelanggan (Nama, Alamat, Email, Telepon) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $nama_pelanggan, $alamat, $email, $telepon);
        $stmt->execute();
        $pelanggan_id = $stmt->insert_id;
        $stmt->close();

        // Buat pesanan baru
        $tanggal_pesanan = date('Y-m-d');
        $total_harga = 0;

        $stmt = $conn->prepare("INSERT INTO pesanan (Tanggal_Pesanan, Pelanggan_ID, Total_Harga) VALUES (?, ?, ?)");
        $stmt->bind_param("sid", $tanggal_pesanan, $pelanggan_id, $total_harga);
        $stmt->execute();
        $pesanan_id = $stmt->insert_id;
        $stmt->close();

        // Proses setiap buku yang dipesan
        foreach ($_POST['buku'] as $buku) {
            $buku_id   = $buku['id'];
            $kuantitas = $buku['kuantitas'];

            // Cek harga dan stok
            $stmt = $conn->prepare("SELECT Harga, Stok FROM buku WHERE ID = ?");
            $stmt->bind_param("i", $buku_id);
            $stmt->execute();
            $stmt->bind_result($harga_per_satuan, $stok);
            $stmt->fetch();
            $stmt->close();

            if ($stok < $kuantitas) {
                throw new Exception("Stok buku tidak cukup.");
            }

            // Insert detail pesanan
            $stmt = $conn->prepare("INSERT INTO Detail_Pesanan (Pesanan_ID, Buku_ID, Kuantitas, Harga_Per_Satuan) VALUES (?, ?, ?, ?)");
            $stmt->bind_param("iiid", $pesanan_id, $buku_id, $kuantitas, $harga_per_satuan);
            $stmt->execute();
            $stmt->close();

            $total_harga += $kuantitas * $harga_per_satuan;

            // Kurangi stok
            $stmt = $conn->prepare("UPDATE buku SET Stok = Stok - ? WHERE ID = ?");
            $stmt->bind_param("ii", $kuantitas, $buku_id);
            $stmt->execute();
            $stmt->close();
        }

        // Update total harga pesanan
        $stmt = $conn->prepare("UPDATE pesanan SET Total_Harga = ? WHERE ID = ?");
        $stmt->bind_param("di", $total_harga, $pesanan_id);
        $stmt->execute();
        $stmt->close();

        $conn->commit();
        header("Location: transaksi.php?message=" . urlencode("Pesanan berhasil dibuat."));
        exit;

    } catch (Exception $e) {
        $conn->rollback();
        header("Location: transaksi.php?message=" . urlencode("Gagal: " . $e->getMessage()));
        exit;
    }
}
?>