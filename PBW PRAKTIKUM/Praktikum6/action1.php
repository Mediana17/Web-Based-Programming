<?php
if (isset($_POST['ktp'])) {
    $ktp = $_POST['ktp'];
    echo "KTP: " . htmlspecialchars($ktp) . "<br>";
}
?>