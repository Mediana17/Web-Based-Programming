<?php
session_start();
session_destroy();
header("Location: login.php?message=" . urlencode("Anda telah logout."));
exit;
?>
