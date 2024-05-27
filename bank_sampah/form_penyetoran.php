<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "teratai_pampang";

$conn = mysqli_connect($servername, $username, $password, $dbname);
if(isset($_POST["submit"])){
  $nama = htmlspecialchars($_POST["nama"]);
  $noInduk = htmlspecialchars($_POST["noInduk"]);
  $tglPenyetoran = htmlspecialchars($_POST["tglPenyetoran"]);
  $jenisSampah = htmlspecialchars($_POST["jenisSampah"]);
  $berat = htmlspecialchars($_POST["berat"]);
  $total = htmlspecialchars($_POST["total"]);

  $sql = "INSERT INTO form_penyetoran (nama, noInduk, tglPenyetoran, jenisSampah, berat, total) 
          VALUES ('$nama', '$noInduk', '$tglPenyetoran', '$jenisSampah', '$berat', '$total')";

  mysqli_query($conn, $sql); 

  if(mysqli_affected_rows($conn) > 0){
      echo "<script>alert('Data Berhasil Ditambahkan');
  document.location.href = 'form_penyetoran.php';</script>";
  }else{
      echo "<script>alert('Data Gagal Ditambahkan');
  document.location.href = 'form_penyetoran.php';</script>";
}
}
?>
<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Form Penyetoran</title>
        <style>
            body {
                font-family: Arial, sans-serif;
                margin: 20px;
                background-color: #2b5d96;
            }

            h1 {
                text-align: center;
                color: #fff;
            }

            form {
                max-width: 600px;
                margin: 0 auto;
                background-color: #fff;
                padding: 20px;
            }

            label {
                display: block;
                margin-bottom: 8px;
            }

            input {
                width: 100%;
                padding: 8px;
                margin-bottom: 16px;
                box-sizing: border-box;
                background-color: rgb(216, 216, 216);
            }

            .btn {
                padding: 10px;
                cursor: pointer;
                margin: 10px;
                border-radius: 20px;
                background-color: rgb(104, 159, 227);
                color: #fff;
                width: 20%;
                border: none;
            }

            .btn:hover {
                background-color: #2b5d96;
            }

            .btn1{
        background-color: #16a085;
        color: #fff;
        padding: 10px;
        cursor: pointer;
        border: none;
        border-radius: 20px;
        width: 20%;
        margin: 10px;
        margin-left: 35%;
        text-decoration: none;
        font-size: 15px;
      }

      .btn1:hover {
        background-color: lightgreen;
      }

      button {
            background-color: lightgreen;
            color: #fff;
            border: none;
            border-radius: 20px;
            margin-top: 20px;
            margin-left: 10px;
            margin-bottom: 20px;
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

    <h1>FORM PENYETORAN</h1>

    <form id="depositForm" method="post">
        <label for="nama">Nama:</label>
        <input type="text" id="nama" name="nama" required>
        
        <label for="noInduk">No. Induk:</label>
        <input type="text" id="noInduk" name="noInduk" required>

        <label for="tglPenyetoran">Tgl Penyetoran:</label>
        <input type="date" id="tglPenyetoran" name="tglPenyetoran" required>

        <label for="jenisSampah">Jenis Sampah:</label>
        <input type="text" id="JenisSampah" name="jenisSampah" required>

        <label for="berat">Berat (kg):</label>
        <input type="number" id="berat" name="berat" step="0.01" onchange="calculateTotal()" required>

        <label for="total">Total (Rp):</label>
        <input type="number" id="total" name="total" readonly required>

        <input class="btn" type="reset" onclick="resetForm()" value="Reset">
        <input class="btn" type="submit" value="Simpan" name="submit" onclick>
        <a class="btn1" href="lihat_data.php">Lihat Data</a>
    </form>

    <button><a href="dashboard.php">Menu Utama</a></button>

    <script>
        function calculateTotal() {
            const berat = parseFloat(document.getElementById("berat").value) || 0;
            const hargaPerKg = 1000; // Ganti dengan harga sesuai kebijakan Anda

            const total = berat * hargaPerKg;
            document.getElementById("total").value = total.toFixed(2);
        }

        function resetForm() {
            document.getElementById("nama").value = "";
            document.getElementById("noInduk").value = "";
            document.getElementById("tglPenyetoran").value = "";
            document.getElementById("jenisSampah").value = "";
            document.getElementById("berat").value = "";
            document.getElementById("total").value = "";
        }

    </script>

    </body>
    </html>
