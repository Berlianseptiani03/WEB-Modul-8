<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "teratai_pampang";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);

    if ($data === null) {
        http_response_code(400);
        echo json_encode(["message" => "Invalid JSON data."]);
        exit;
    }

    foreach ($data as $sale) {
        $nama = $conn->real_escape_string($sale['nama']);
        $noInduk = $conn->real_escape_string($sale['noInduk']);
        $tglPenjualan = $conn->real_escape_string($sale['tglPenjualan']);
        $koranKertas = $conn->real_escape_string($sale['koranKertas']);
        $kardus = $conn->real_escape_string($sale['kardus']);
        $botolPlastik = $conn->real_escape_string($sale['botolPlastik']);
        $gelasPlastik = $conn->real_escape_string($sale['gelasPlastik']);
        $kaca = $conn->real_escape_string($sale['kaca']);
        $plastikNonBotol = $conn->real_escape_string($sale['plastikNonBotol']);
        $aluminium = $conn->real_escape_string($sale['aluminium']);
        $kalengBesi = $conn->real_escape_string($sale['kalengBesi']);
        $totalBerat = $conn->real_escape_string($sale['totalBerat']);
        $totalHarga = $conn->real_escape_string($sale['totalHarga']);

        $sql = "INSERT INTO transaksi_penyetoran (nama, noInduk, tglPenjualan, koranKertas, kardus, botolPlastik, gelasPlastik, kaca, plastikNonBotol, aluminium, kalengBesi, totalBerat, totalHarga) 
                VALUES ('$nama', '$noInduk', '$tglPenjualan', '$koranKertas', '$kardus', '$botolPlastik', '$gelasPlastik', '$kaca', '$plastikNonBotol', '$aluminium', '$kalengBesi', '$totalBerat', '$totalHarga')";

        mysqli_querry($conn, $sql);        

        if ($conn->query($sql) !== TRUE) {
            http_response_code(500);
            echo json_encode(["message" => "Error: " . $sql . "<br>" . $conn->error]);
            exit;
        }
    }

    http_response_code(201);
    echo json_encode(["message" => "Data penyetoran berhasil disimpan."]);
} else {
    http_response_code(405);
    echo json_encode(["message" => "Metode HTTP tidak valid."]);
}

$conn->close();
?>
