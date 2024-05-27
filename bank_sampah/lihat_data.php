<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "teratai_pampang";

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$sql = "SELECT * FROM form_penyetoran";
$result = mysqli_query($conn, $sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lihat Data Penyetoran</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #2b5d96;
            color: #fff;
        }

        h1 {
            text-align: center;
        }

        table {
            width: 100%;
            margin-top: 20px;
            border-collapse: collapse;
            background-color: #fff;
            color: black;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #16a085;
            color: #fff;
        }

        .delete-btn {
            background-color: #ff0000;
            color: #fff;
            padding: 5px 10px;
            text-decoration: none;
            border-radius: 20px;
            cursor: pointer;
        }

        .delete-btn:hover {
            background-color: #cc0000;
        }

        button {
            background-color: lightgreen;
            border: none;
            border-radius: 20px;
            margin-top: 20px;
            margin-left: 10px;
            padding: 8px 12px;
            cursor: pointer;
        }

        button:hover {
            background-color: #16a085;
        }

        a {
        text-decoration: none;
        color: black;
        }
    </style>
</head>
<body>

    <h1>Data Penyetoran</h1>

    <table>
        <thead>
            <tr>
                <th>Nomor</th>
                <th>Nama</th>
                <th>No. Induk</th>
                <th>Tgl Penyetoran</th>
                <th>Jenis Sampah</th>
                <th>Berat (kg)</th>
                <th>Total (Rp)</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if (mysqli_num_rows($result) > 0) {
                $no = 1;
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>{$no}</td>";
                    echo "<td>{$row['nama']}</td>";
                    echo "<td>{$row['noInduk']}</td>";
                    echo "<td>{$row['tglPenyetoran']}</td>";
                    echo "<td>{$row['jenisSampah']}</td>";
                    echo "<td>{$row['berat']}</td>";
                    echo "<td>{$row['total']}</td>";
                    echo "<td><a class='delete-btn' href='delete_data.php?id={$row['id']}'>Hapus</a></td>";
                    echo "</tr>";
                    $no++;
                }
            } else {
                echo "<tr><td colspan='8'>Tidak ada data</td></tr>";
            }
            ?>
        </tbody>
    </table>

    <button><a href="form_penyetoran.php">Kembali</a></button>

</body>
</html>

<?php
mysqli_close($conn);
?>
