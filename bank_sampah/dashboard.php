<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=, initial-scale=1.0" />
    <title>Menu Utama</title>
  </head>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      background-color: #2b5d96;
    }

    header {
      background-color: rgb(104, 159, 227);
      color: #fff;
      padding: 10px;
      text-align: center;
    }

    .container {
      max-width: 800px;
      margin: 20px auto;
      padding: 20px;
      background-color: rgb(104, 159, 227);
      background-size: cover;
      background-position: center;
      box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
      border-radius: 8px;
    }

    h1, h2, h3 {
      color: white;
    }

    p {
      color: #fff;
    }

    .services {
      display: flex;
      flex-wrap: wrap;
      justify-content: space-around;
      margin-top: 20px;
    }

    .service {
      flex: 0 1 calc(25% - 20px);
      margin: 10px;
      text-align: center;
      padding: 10px;
      border: 1px solid #ddd;
      border-radius: 8px;
      background-color: #ecf0f1;
      transition: background-color 0.3s ease;
    }

    .service a {
      text-decoration: none;
      color: inherit;
    }

    .service:hover {
      background-color: #d2d7db;
    }

    .service-weighing-transaction {
      background-color: #e67e22; 
    }

    .service-sales-transaction {
      background-color: #16a085; 
    }

    footer {
      background-color: #2c3e50;
      color: #fff;
      text-align: center;
      padding: 10px;
      position: fixed;
      bottom: 0;
      width: 100%;
    }
  </style>

  <body>
    <header>
      <h1>Bank Sampah Unit</h1>
      <p>Teratai Pampang</p>
    </header>

    <div class="container">
      <h2>Selamat Datang di Bank Sampah Unit Teratai Pampang</h2>
      <p>
        Bank Sampah Unit adalah tempat pengelolaan sampah yang bertujuan untuk
        mendaur ulang sampah dan menjaga kebersihan lingkungan. Mari bergabung
        dan berkontribusi untuk lingkungan yang lebih baik!
      </p>

        <div class="service service-weighing-transaction">
          <a href="transaksi_penyetoran.php">
            <h3>Transaksi penyetoran</h3>
            <p>Mencatat transaksi penyetoran sampah.</p>
          </a>
        </div>

        <div class="service service-sales-transaction">
          <a href="form_penyetoran.php">
            <h3>Form penyetoran</h3>
            <p>Mengisi data sampah.</p>
          </a>
        </div>
      </div>
    </div>

    <footer>&copy; 2023 Bank Sampah Unit Teratai Pampang</footer>
  </body>
</html>
