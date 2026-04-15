<html>
<head>
    <title>Soal 4</title>
</head>
<body>
    <h1>Ternary Operator Ganjil Genap</h1>
    <form method="post" action="">
        <label for="angka">Masukkan Angka:</label>
        <input type="text" name="angka" id="angka">
        <input type="submit" value="Cek">
    </form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $angka = $_POST['angka'];
    
    if (!is_numeric($angka)) {
        echo "<p style='color: red;'>Harap input angka!</p>";
    } else {
        $angka = (int)$angka;
        $status = ($angka % 2 == 0) ? "Genap" : "Ganjil";
        echo "<p>Angka <strong>$angka</strong> adalah <strong style='color: blue;'>$status</strong></p>";
    }
}
?>
</body>
</html>