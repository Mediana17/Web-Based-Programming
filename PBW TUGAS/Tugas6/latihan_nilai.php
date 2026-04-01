<html>
<head>
    <title>Cek predikat nilai mahasiswa</title>
</head>
<body>
    <form method="post" action="">
        <table border="1" cellpadding="5">
            <tr>
                <td>Nama:</td>
                <td><input type="text" name="nama"></td>
            </tr>
            <tr>
                <td>Nilai:</td>
                <td><input type="text" name="nilai"></td>
            </tr>
        </table>
        <input type="submit" value="Proses">
    </form>

    <?php
        if (isset($_POST["nama"]) && isset($_POST["nilai"])) {
            $nama = $_POST["nama"];
            $nilai = $_POST["nilai"];
            $predikat = "";
            $status = "";

            if (!is_numeric($nilai) || $nilai < 0 || $nilai > 100) {
                $predikat = "Nilai tidak valid.";
                $status = "Masukkan nilai antara 0 dan 100";
            } elseif ($nilai >= 85) {
                $predikat = "A";
                $status = "Lulus";
            } elseif ($nilai >= 75) {
                $predikat = "B";
                $status = "Lulus";
            } elseif ($nilai >= 65) {
                $predikat = "C";
                $status = "Lulus";
            } elseif ($nilai >= 50) {
                $predikat = "D";
                $status = "Tidak Lulus-Mengulang";
            } else {
                $predikat = "E";
                $status = "Tidak Lulus-Mengulang";
            }

            echo "Nama: " . $nama . "<br>";
            echo "Nilai: " . $nilai . "<br>";
            echo "Predikat: " . $predikat . "<br>";
            echo "Status: " . $status . "<br>";
        }
    ?>
</body>
</html>