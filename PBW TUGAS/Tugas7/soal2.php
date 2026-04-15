<html>
<head>
    <title>Soal 2</title>
</head>
<body>
    <h1>For Loop Ganjil Genap</h1>
    <form method="post" action="">
        <label for="jumlah_awal">Masukkan Angka Awal:</label>
        <input type="text" name="jumlah_awal" id="jumlah_awal"> <br><br>
        <label for="jumlah_akhir">Masukkan Angka Akhir:</label>
        <input type="text" name="jumlah_akhir" id="jumlah_akhir"> <br><br>
        <input type="submit" value="Cek Angka">
    </form>
<?php
if (isset($_POST["jumlah_awal"]) && isset($_POST["jumlah_akhir"])) {
    $jumlah_awal = $_POST["jumlah_awal"];
    $jumlah_akhir = $_POST["jumlah_akhir"];

    if (!is_numeric($jumlah_awal) || $jumlah_awal <= 0 || !ctype_digit($jumlah_awal)) {
        echo "Masukkan angka awal yang valid (angka positif).";
    } else {
        echo "<h2>Angka Ganjil:</h2>";
        for ($i = $jumlah_awal; $i <= $jumlah_akhir; $i++) {
            if ($i % 2 != 0) {
                echo $i . " ";
            }
        }

        echo "<h2>Angka Genap:</h2>";
        for ($i = $jumlah_awal; $i <= $jumlah_akhir; $i++) {
            if ($i % 2 == 0) {
                echo $i . " ";
            }
        }
    }
}
?>
</html>