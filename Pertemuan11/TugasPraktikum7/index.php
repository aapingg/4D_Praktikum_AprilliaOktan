<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Tugas Praktikum 7</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #ffe6f0;
      color: #660033;
      margin: 0;
      padding: 0;
    }

    header {
      background-color: #ff99cc;
      color: white;
      padding: 20px;
      text-align: center;
    }

    nav {
      background-color: #ffccdd;
      padding: 10px;
      text-align: center;
    }

    nav a {
      color: #660033;
      text-decoration: none;
      margin: 0 15px;
      font-weight: bold;
    }

    nav a:hover {
      text-decoration: underline;
    }

    main {
      padding: 20px;
      background-color: #fff0f5;
      min-height: 300px;
    }

    footer {
      background-color: #ff99cc;
      text-align: center;
      padding: 10px;
      color: white;
      position: relative;
      bottom: 0;
      width: 100%;
    }

    h2 {
      color: #cc0066;
    }

    .box {
      background: white;
      padding: 15px;
      border-radius: 10px;
      box-shadow: 0 0 10px #ffb6c1;
      max-width: 600px;
      margin: auto;
    }
  </style>
</head>
<body>
  <header>
    <h1>Tugas Praktikum 7</h1>
  </header>

  <nav>
    <a href="?page=soal1">Soal 1: Switch Kendaraan</a>
    <a href="?page=soal2">Soal 2: For Loop Bilangan Genap</a>
    <a href="?page=soal3">Soal 3: Foreach Daftar Nama Hewan</a>
    <a href="?page=soal4">Soal 4: Ternary Ganjil Genap</a>
  </nav>

  <main>
    <div class="box">
      <?php
        if (isset($_GET['page'])) {
          $page = $_GET['page'];
          if (file_exists($page . ".php")) {
            include $page . ".php";
          } else {
            echo "<p>Halaman tidak ditemukan.</p>";
          }
        } else {
          echo "<p>Silakan pilih soal dari menu di atas.</p>";
        }
      ?>
    </div>
  </main>

  <footer>
    &copy; Tugas Praktikum 7 | Aprillia Oktan (2310631170004)
  </footer>
</body>
</html>