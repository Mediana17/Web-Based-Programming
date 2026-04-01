<html>
<head>
    <title>Cek Diskon UKT Mahasiswa</title>
</head>
<body>
    <form method="post" action="">
        <table border="1" cellpadding="5">
            <tr>
                <td>NPM:</td>
                <td><input type="text" name="npm"></td>
            </tr>
            <tr>
                <td>Nama:</td>
                <td><input type="text" name="nama"></td>
            </tr>
            <tr>
                <td>Prodi:</td>
                <td><input type="text" name="prodi"></td>
            </tr>
            <tr>
                <td>Semester:</td>
                <td><input type="text" name="semester"></td>
            </tr>
            <tr>
                <td>Biaya UKT:</td>
                <td><input type="number" name="ukt"></td>
            </tr>
        </table>
        <input type="submit" value="Proses">
    </form>

    <?php
        if (isset($_POST["npm"]) && isset($_POST["ukt"])) {
            $npm = $_POST["npm"];
            $nama = $_POST["nama"];
            $prodi = $_POST["prodi"];
            $semester = $_POST["semester"];
            $ukt = $_POST["ukt"];
            $diskon = 0;
        
            if (!is_numeric($ukt) || $ukt < 0) {
                echo "Biaya UKT tidak valid." . "<br>";
            } else if ($ukt >= 5000000 && $semester > 8) {
                $diskon = 0.15;
            } elseif ($ukt >= 5000000) {
                $diskon = 0.10;
            }
                $biaya_bayar = $ukt - ($ukt * $diskon);
                echo "NPM: " . $npm . "<br>";
                echo "Nama: " . $nama . "<br>";
                echo "Prodi: " . $prodi . "<br>";
                echo "Semester: " . $semester . "<br>";
                echo "Biaya UKT: Rp " . number_format($ukt, 0, ',', '.') . ",-<br>";
                echo "Diskon: " . ($diskon * 100) . "%<br>";
                echo "Biaya yang Harus Dibayar: Rp " . number_format($biaya_bayar, 0, ',', '.') . ",-<br>";
        }
    ?>
</body>
</html>