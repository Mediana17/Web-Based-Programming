<html>
<head>
    <title>Soal 3</title>
</head>
<body>
    <h1>Foreach Hewan</h1>
    <form method="post" action="">
        <label for="nama_hewan1">Masukkan Nama Hewan 1:</label>
        <input type="text" name="nama_hewan1" id="nama_hewan1"> <br><br>
         <label for="nama_hewan2">Masukkan Nama Hewan 2:</label>
        <input type="text" name="nama_hewan2" id="nama_hewan2"> <br><br>
        <label for="nama_hewan3">Masukkan Nama Hewan 3:</label>
        <input type="text" name="nama_hewan3" id="nama_hewan3"> <br><br>
        <label for="nama_hewan4">Masukkan Nama Hewan 4:</label>
        <input type="text" name="nama_hewan4" id="nama_hewan4"> <br><br>
        <label for="nama_hewan5">Masukkan Nama Hewan 5:</label>
        <input type="text" name="nama_hewan5" id="nama_hewan5"> <br><br>
        <input type="submit" value="Cek Hewan">
    </form>
</body>
<?php
$hewan = [
    "Kucing",
    "Anjing",
    "Kelinci",
    "Burung",
    "Ikan"
];

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama_hewan1 = $_POST['nama_hewan1'];
    $nama_hewan2 = $_POST['nama_hewan2'];
    $nama_hewan3 = $_POST['nama_hewan3'];
    $nama_hewan4 = $_POST['nama_hewan4'];
    $nama_hewan5 = $_POST['nama_hewan5'];

    $input_hewan = [$nama_hewan1, $nama_hewan2, $nama_hewan3, $nama_hewan4, $nama_hewan5];

    echo "<h2>Hewan yang Dimasukkan:</h2>";
    foreach ($input_hewan as $hewan_input) {
        echo "- " . htmlspecialchars($hewan_input) . "<br>";
    }

    echo "<h2>Daftar Hewan yang Dikenal:</h2>";
    foreach ($hewan as $hewan_dikenal) {
        echo "- " . htmlspecialchars($hewan_dikenal) . "<br>";
    }
}
?>
</html>