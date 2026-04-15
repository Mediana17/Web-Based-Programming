<html>
<head>
    <title>Soal 1</title>
</head>
<body>
    <h1>Switch Case Kendaraan</h1>
    <form method="post" action="">
        <label for="jumlah_roda">Masukkan Jumlah Roda:</label>
        <input type="text" name="jumlah_roda" id="jumlah_roda">
        <input type="submit" value="Cek Kendaraan">
    </form>

<?php
$jenis_kendaraan = [
    "Andong" => 4,
    "motor" => 2,
    "mobil" => 4,
    "truk" => 4,
    "sepeda" => 2,
    "skuter" => 2,
    "kaisar" => 3,
    "bajaj" => 3,
];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $jumlah_roda = $_POST['jumlah_roda'];

    switch($jumlah_roda) {
        case 2:
            echo "Kendaraan roda 2:<br>";
            foreach($jenis_kendaraan as $nama => $roda) {
                if($roda == 2) {
                    echo "- $nama <br>";
                }
            }
            break;

        case 3:
            echo "Kendaraan roda 3:<br>";
            foreach($jenis_kendaraan as $nama => $roda) {
                if($roda == 3) {
                    echo "- $nama <br>";
                }
            }
            break;

        case 4:
            echo "Kendaraan roda 4:<br>";
            foreach($jenis_kendaraan as $nama => $roda) {
                if($roda == 4) {
                    echo "- $nama <br>";
                }
            }
            break;

        default:
            echo "Jenis kendaraan tidak diketahui";
    }
}
?>
</body>
</html>