<!DOCTYPE html>
<html>
<head>
    <title>Form Pembayaran Mahasiswa</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #eef2f3;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            padding: 20px;
        }

        .container {
            background: white;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 0 15px rgba(0,0,0,0.2);
            width: 100%;
            max-width: 500px;
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
        }

        label {
            font-weight: bold;
        }

        input[type="text"],
        input[type="number"] {
            width: 100%;
            padding: 8px;
            margin: 5px 0 15px;
            border: 1px solid #ccc;
            border-radius: 6px;
        }

        input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 6px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }

        table {
            border-collapse: collapse;
            width: 100%;
            margin-top: 20px;
        }

        table, td, th {
            border: 1px solid black;
        }

        th {
            background-color: #007bff;
            color: white;
        }

        td, th {
            padding: 10px;
        }

        .error {
            color: red;
            margin-top: 10px;
            text-align: center;
        }

        .result {
            margin-top: 20px;
        }
    </style>
</head>
<body>
<div class="container">
    <h2>Form Pembayaran Mahasiswa</h2>
    <form method="post" action="">
        <label>NPM (13 digit angka):</label>
        <input type="text" name="npm" maxlength="13" pattern="\d{13}" title="Masukkan tepat 13 digit angka" required>

        <label>Nama:</label>
        <input type="text" name="nama" required>

        <label>Prodi:</label>
        <input type="text" name="prodi" required>

        <label>Semester (1-14):</label>
        <input type="number" name="semester" min="1" max="14" required>

        <label>Biaya UKT (Rp):</label>
        <input type="text" name="ukt" required pattern="\d+" title="Masukkan angka saja tanpa titik atau koma">

        <input type="submit" name="submit" value="Hitung">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['submit'])) {
        $npm = $_POST['npm'];
        $nama = trim($_POST['nama']);
        $prodi = trim($_POST['prodi']);
        $semester = $_POST['semester'];
        $ukt_input = $_POST['ukt'];

        // Validasi NPM HARUS 13 digit angka
        if (!preg_match('/^\d{13}$/', $npm)) {
            echo "<div class='error'>NPM harus terdiri dari tepat 13 digit angka.</div>";
        } elseif (!ctype_digit($ukt_input)) {
            echo "<div class='error'>Biaya UKT harus berupa angka tanpa titik/koma.</div>";
        } elseif ($semester < 1 || $semester > 14) {
            echo "<div class='error'>Semester hanya boleh antara 1 sampai 14.</div>";
        } else {
            $ukt = (int)$ukt_input;

            // Hitung diskon
            $diskon = 0;
            if ($ukt >= 5000000) {
                $diskon = 10;
                if ($semester > 8) {
                    $diskon += 5;
                }
            }

            $potongan = $ukt * ($diskon / 100);
            $totalBayar = $ukt - $potongan;

            echo "<div class='result'>";
            echo "<table>";
            echo "<tr><th colspan='2'>Hasil Pembayaran</th></tr>";
            echo "<tr><td>NPM</td><td>$npm</td></tr>";
            echo "<tr><td>Nama</td><td>$nama</td></tr>";
            echo "<tr><td>Prodi</td><td>$prodi</td></tr>";
            echo "<tr><td>Semester</td><td>$semester</td></tr>";
            echo "<tr><td>Biaya UKT</td><td>Rp " . number_format($ukt, 0, ',', '.') . ",-</td></tr>";
            echo "<tr><td>Diskon</td><td>$diskon%</td></tr>";
            echo "<tr><td>Potongan</td><td>Rp " . number_format($potongan, 0, ',', '.') . ",-</td></tr>";
            echo "<tr><td>Total Bayar</td><td>Rp " . number_format($totalBayar, 0, ',', '.') . ",-</td></tr>";
            echo "</table>";
            echo "</div>";
        }
    }
    ?>
</div>
</body>
</html>
