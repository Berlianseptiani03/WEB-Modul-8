<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lihat Transaksi</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #2b5d96;
            margin: 0;
            padding: 0;
            color: #fff;
        }

        h1, h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
            background-color: #fff;
            color: black;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: orange;
            color: #fff;
        }

        .aksi {
            text-align: center;
        }

        .btn {
            background-color: red;
            color: #fff;
            padding: 8px 12px;
            cursor: pointer;
            border: none;
            display: inline-block;
            text-decoration: none;
            margin-right: 5px;
            border-radius: 20px;
        }

        .btn:hover {
            background-color: darkred;
        }

        button {
            background-color: yellow;
            border: none;
            border-radius: 20px;
            margin-top: 20px;
            margin-left: 10px;
            padding: 8px 12px;
            cursor: pointer;
        }

        button:hover {
            background-color: orange;
        }

        a {
        text-decoration: none;
        color: black;
        }
    </style>
</head>
<body>
    <h1>Daftar Transaksi Penyetoran</h1>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama</th>
                <th>No. Induk</th>
                <th>Tgl. Penjualan</th>
                <th>Koran/Kertas (kg)</th>
                <th>Kardus (kg)</th>
                <th>Botol Plastik (kg)</th>
                <th>Gelas Plastik (kg)</th>
                <th>Kaca (kg)</th>
                <th>Plastik Non Botol (kg)</th>
                <th>Aluminium (kg)</th>
                <th>Kaleng Besi (kg)</th>
                <th>Total (kg)</th>
                <th>Total (Rp)</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>

            <?php
            // Tambahkan koneksi ke database
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "teratai_pampang";

            $conn = mysqli_connect($servername, $username, $password, $dbname);

            if (!$conn) {
                die("Connection failed: " . mysqli_connect_error());
            }

            // Ambil data dari database
            $sql = "SELECT * FROM transaksi_penyetoran";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
                $no = 1;
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>{$no}</td>";
                    echo "<td>{$row['nama']}</td>";
                    echo "<td>{$row['noInduk']}</td>";
                    echo "<td>{$row['tglPenjualan']}</td>";
                    echo "<td>{$row['koranKertas']}</td>";
                    echo "<td>{$row['kardus']}</td>";
                    echo "<td>{$row['botolPlastik']}</td>";
                    echo "<td>{$row['gelasPlastik']}</td>";
                    echo "<td>{$row['kaca']}</td>";
                    echo "<td>{$row['plastikNonBotol']}</td>";
                    echo "<td>{$row['aluminium']}</td>";
                    echo "<td>{$row['kalengBesi']}</td>";
                    echo "<td>{$row['total']}</td>";
                    echo "<td>{$row['total']}</td>";
                    echo "<td class='aksi'>";
                    echo "<a class='btn' href='delete_transaksi.php?id={$row['id']}'>Delete</a>";
                    echo "</td>";
                    echo "</tr>";
                    $no++;
                }
            } else {
                echo "<tr><td colspan='15'>Tidak ada data</td></tr>";
            }

            mysqli_close($conn);
            ?>

        </tbody>
    </table>

    <button><a href="transaksi_penyetoran.php">Kembali</a></button>
</body>
</html>
