<?php
define("PAJAK", 0.1);

$harga_barang = [
    "Jam Beker" => 500000,
    "Kotak Musik" => 105000,
    "Gramofon" => 276000,
    "Piringan Hitam" => 150000
];

$nama_barang = "";
$harga_satuan = 0;
$jumlah_beli = 0;
$total_harga = 0;
$nilai_pajak = 0;
$total_bayar = 0;
$proses = false;

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama_barang = $_POST['nama_barang'];
    $jumlah_beli = $_POST['jumlah_beli'];
    $harga_satuan = $harga_barang[$nama_barang];
    $total_harga = $harga_satuan * $jumlah_beli;
    $nilai_pajak = $total_harga * PAJAK;
    $total_bayar = $total_harga + $nilai_pajak;
    $proses = true;
}
?>

<html>
    <head>
        <title>Toko Antik</title>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <div class = "container">
            <div class = "form-input">
                <h3>Input Pembelian Barang</h3>
                <form method = "post">
                    <div class="form-group">
                        <label>Nama Barang:</label>
                        <select name="nama_barang">
                            <?php foreach ($harga_barang as $nama => $harga): ?>
                                <option value="<?php echo $nama; ?>"><?php echo $nama; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Jumlah Beli:</label>
                        <input type="number" name="jumlah_beli" required>
                    </div>
                    <button type="submit">Hitung</button>
                </form>
            </div>

            <?php if ($proses): ?>
            <div class="hasil-box">
                <div class="hasil-judul">Perhitungan Total Pembelian (Dengan Array)</div>
                <p>Nama Barang: <?php echo $nama_barang; ?></p>
                <p>Harga Satuan: Rp <?php echo number_format($harga_satuan, 0, ',', '.'); ?></p>
                <p>Jumlah Beli: <?php echo $jumlah_beli; ?></p>
                <p>Total Harga (Sebelum Pajak): Rp <?php echo number_format($total_harga, 0, ',', '.'); ?></p>
                <p>Pajak (10%): Rp <?php echo number_format($nilai_pajak, 0, ',', '.'); ?></p>
                <p><strong>Total Bayar: Rp <?php echo number_format($total_bayar, 0, ',', '.'); ?></strong></p>
            </div>
            <?php endif; ?>
        </div>
    </body>
</html>