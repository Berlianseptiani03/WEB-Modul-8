<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "teratai_pampang";

$conn = mysqli_connect($servername, $username, $password, $dbname);
if(isset($_POST["submit"])){
  $nama = htmlspecialchars($_POST["nama"]);
  $noInduk = htmlspecialchars($_POST["noInduk"]);
  $tglPenjualan = htmlspecialchars($_POST["tglPenjualan"]);
  $koranKertas = htmlspecialchars($_POST["korangkertas"]);
  $kardus = htmlspecialchars($_POST["kardus"]);
  $botolPlastik = htmlspecialchars($_POST["botolPlastik"]);
  $gelasPlastik = htmlspecialchars($_POST["gelasPlastik"]);
  $kaca = htmlspecialchars($_POST["kaca"]);
  $plastikNonBotol = htmlspecialchars($_POST["plastikNonBotol"]);
  $aluminium = htmlspecialchars($_POST["aluminium"]);
  $kalengBesi = htmlspecialchars($_POST["kalengBesi"]);
  $totalBerat = htmlspecialchars($_POST["totalBerat"]);
  $total = htmlspecialchars($_POST["total"]);

  $sql = "INSERT INTO transaksi_penyetoran (nama, noInduk, tglPenjualan, koranKertas, kardus, botolPlastik, gelasPlastik, kaca, plastikNonBotol, aluminium, kalengBesi, total) 
          VALUES ('$nama', '$noInduk', '$tglPenjualan', '$koranKertas', '$kardus', '$botolPlastik', '$gelasPlastik', '$kaca', '$plastikNonBotol', '$aluminium', '$kalengBesi', '$total')";

  mysqli_query($conn, $sql); 

  if(mysqli_affected_rows($conn) > 0){
      echo "<script>alert('Data Berhasil Ditambahkan');
  document.location.href = 'transaksi_penyetoran.php';</script>";
  }else{
      echo "<script>alert('Data Gagal Ditambahkan');
  document.location.href = 'transaksi_penyetoran.php';</script>";
}
}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Transaksi Penyetoran Jenis Sampah</title>
    <style>
      body,
      h1,
      h2,
      h3,
      p,
      ul,
      li {
        margin: 0;
        padding: 0;
      }

      body {
        font-family: "Arial", sans-serif;
        background-color: #2b5d96;
        margin: 0;
        padding: 0;
      }

      h1 {
        text-align: center;
        margin-bottom: 20px;
        color: #fff;
      }

      h2 {
        text-align: center;
        margin-bottom: 20px;
        color: #fff;
      }

      form {
        max-width: 600px;
        margin: 0 auto;
        background-color: #fff;
        padding: 20px;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        border-radius: 8px;
      }

      label {
        display: block;
        margin-bottom: 8px;
      }

      input {
        width: calc(100% - 16px);
        padding: 8px;
        margin-bottom: 16px;
        box-sizing: border-box;
        background-color: rgb(216, 216, 216);
      }

      .btn{
        background-color: #2b5d96;
        color: #fff;
        padding: 10px;
        cursor: pointer;
        border: none;
        border-radius: 20px;
        display: inline-block;
        width: 20%;
        margin: 10px;
      }

      .btn:hover {
        background-color: rgb(104, 159, 227);
      }
      
      .btn1{
        background-color: orange;
        color: #fff;
        padding: 10px;
        cursor: pointer;
        border: none;
        border-radius: 20px;
        width: 20%;
        margin: 10px;
        margin-left: 28%;
        text-decoration: none;
        font-size: 15px;
      }

      .btn1:hover {
        background-color: yellow;
        color: black;
      }

      button {
            background-color: yellow;
            border: none;
            border-radius: 20px;
            margin-top: 20px;
            margin-left: 10px;
            margin-bottom: 20px;
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
    <h1>Transaksi Penyetoran</h1>
    <h2>Jenis Sampah</h2>

    <form id="salesForm" method="post" action="">
      <label for="nama">Nama:</label>
      <input type="text" id="nama" name="nama" required />

      <label for="noInduk">No. Induk:</label>
      <input type="text" id="noInduk" name="noInduk" required />

      <label for="tglPenjualan">Tgl. Penjualan:</label>
      <input type="date" id="tglPenjualan" name="tglPenjualan" required />

      <label for="koranKertas">Koran/Kertas (kg):</label>
      <input type="number" id="koranKertas" name="korangkertas" step="0.01" onchange="calculateTotal()" required/>

      <label for="kardus">Kardus (kg):</label>
      <input type="number" id="kardus" name="kardus" step="0.01" onchange="calculateTotal()" required/>

      <label for="botolPlastik">Botol Plastik (kg):</label>
      <input type="number" id="botolPlastik" name="botolPlastik" step="0.01" onchange="calculateTotal()" required/>

      <label for="gelasPlastik">Gelas Plastik (kg):</label>
      <input type="number" id="gelasPlastik" name="gelasPlastik" step="0.01" onchange="calculateTotal()" required/>

      <label for="kaca">Kaca (kg):</label>
      <input type="number" id="kaca" name="kaca" step="0.01" onchange="calculateTotal()" required/>

      <label for="plastikNonBotol">Plastik Non Botol (kg):</label>
      <input type="number" id="plastikNonBotol" name="plastikNonBotol" step="0.01" onchange="calculateTotal()" required/>

      <label for="aluminium">Aluminium (kg):</label>
      <input type="number" id="aluminium" name="aluminium" step="0.01" onchange="calculateTotal()" required/>

      <label for="kalengBesi">Kaleng/Besi (kg):</label>
      <input type="number" id="kalengBesi" name="kalengBesi" step="0.01" onchange="calculateTotal()" required/>

      <label for="totalBerat">Total (kg):</label>
      <input type="text" id="totalBerat" name="totalBerat" readonly />

      <label for="totalHarga">Total (Rp):</label>
      <input type="text" id="totalHarga" name="total" readonly />

      <input class="btn" type="reset" onclick="resetForm()" value="Reset">
      <input class="btn" type="submit" value="Simpan" name="submit" onclick>
      <a class="btn1" href="lihat_transaksi.php">Lihat Transaksi</a>
    </form>

    <button><a href="dashboard.php">Menu Utama</a></button>

    <script>

      function resetForm() {
        document.getElementById("nama").value = "";
        document.getElementById("noInduk").value = "";
        document.getElementById("tglPenjualan").value = "";
        document.getElementById("koranKertas").value = "";
        document.getElementById("kardus").value = "";
        document.getElementById("botolPlastik").value = "";
        document.getElementById("gelasPlastik").value = "";
        document.getElementById("kaca").value = "";
        document.getElementById("plastikNonBotol").value = "";
        document.getElementById("aluminium").value = "";
        document.getElementById("kalengBesi").value = "";
        document.getElementById("totalBerat").value = "";
        document.getElementById("totalHarga").value = "";
      }

      function displaySales() {
        const salesList = document.getElementById("salesList");
        salesList.innerHTML = "";

        sales.forEach((sale, index) => {
          const row = salesList.insertRow();
          row.insertCell(0).innerHTML = index + 1;
          row.insertCell(1).innerHTML = sale.nama;
          row.insertCell(2).innerHTML = sale.noInduk;
          row.insertCell(3).innerHTML = sale.tglPenjualan;
          row.insertCell(4).innerHTML = sale.koranKertas;
          row.insertCell(5).innerHTML = sale.kardus;
          row.insertCell(6).innerHTML = sale.botolPlastik;
          row.insertCell(7).innerHTML = sale.gelasPlastik;
          row.insertCell(8).innerHTML = sale.kaca;
          row.insertCell(9).innerHTML = sale.plastikNonBotol;
          row.insertCell(10).innerHTML = sale.aluminium;
          row.insertCell(11).innerHTML = sale.kalengBesi;
          row.insertCell(12).innerHTML = sale.totalBerat;
          row.insertCell(13).innerHTML = sale.totalHarga;
          row.insertCell(
            14
          ).innerHTML = `<button onclick="deleteSale(${index})">Hapus</button>`;
        });
      }

      function deleteSale(index) {
        sales.splice(index, 1);
        displaySales();
      }

      function calculateTotal() {
        const koranKertas =
          parseFloat(document.getElementById("koranKertas").value) || 0;
        const kardus = parseFloat(document.getElementById("kardus").value) || 0;
        const botolPlastik =
          parseFloat(document.getElementById("botolPlastik").value) || 0;
        const gelasPlastik =
          parseFloat(document.getElementById("gelasPlastik").value) || 0;
        const kaca = parseFloat(document.getElementById("kaca").value) || 0;
        const plastikNonBotol =
          parseFloat(document.getElementById("plastikNonBotol").value) || 0;
        const aluminium =
          parseFloat(document.getElementById("aluminium").value) || 0;
        const kalengBesi =
          parseFloat(document.getElementById("kalengBesi").value) || 0;

        const totalBerat =
          koranKertas +
          kardus +
          botolPlastik +
          gelasPlastik +
          kaca +
          plastikNonBotol +
          aluminium +
          kalengBesi;
        const pricePerKg = 1000; // Ganti dengan harga sesuai kebijakan Anda
        const totalHarga = totalBerat * pricePerKg;

        document.getElementById("totalBerat").value = totalBerat.toFixed(2);
        document.getElementById("totalHarga").value = totalHarga.toFixed(2);
      }

    </script>
  </body>
</html>
