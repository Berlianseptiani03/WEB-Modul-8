<?php
header('Content-Type: application/json');

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "teratai_pampang";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);

    foreach ($data as $deposit) {
        $nama = $conn->real_escape_string($deposit['nama']);
        $noInduk = $conn->real_escape_string($deposit['noInduk']);
        $tglPenyetoran = $conn->real_escape_string($deposit['tglPenyetoran']);
        $jenisSampah = $conn->real_escape_string($deposit['jenisSampah']);
        $berat = $conn->real_escape_string($deposit['berat']);
        $total = $conn->real_escape_string($deposit['total']);

        $sql = "INSERT INTO deposits (nama, noInduk, tglPenyetoran, jenisSampah, berat, total) 
                VALUES (?, ?, ?, ?, ?, ?)";

        $stmt = $conn->prepare($sql);
        $stmt->bind_param("ssssdd", $nama, $noInduk, $tglPenyetoran, $jenisSampah, $berat, $total);

        if ($stmt->execute() !== TRUE) {
            http_response_code(500);
            echo json_encode(["message" => "Error: " . $stmt->error]);
            exit;
        }
    }

    http_response_code(201);
    echo json_encode(["message" => "Deposits berhasil disimpan."]);
} else {
    http_response_code(405);
    echo json_encode(["message" => "Metode HTTP tidak valid."]);
}

$stmt->close();
$conn->close();
?>
