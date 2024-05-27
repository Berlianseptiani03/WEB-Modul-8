<?php
// delete_transaksi.php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "teratai_pampang";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

if ($_SERVER["REQUEST_METHOD"] == "GET" && isset($_GET["id"])) {
    $id = $_GET["id"];

    $sql = "DELETE FROM transaksi_penyetoran WHERE id = $id";
    $result = mysqli_query($conn, $sql);

    if ($result) {
        echo "<script>alert('Data berhasil dihapus.');
        window.location.href = 'lihat_transaksi.php';</script>";
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }
}

mysqli_close($conn);
?>
