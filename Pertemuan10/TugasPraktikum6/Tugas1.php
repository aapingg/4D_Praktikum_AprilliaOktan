<!DOCTYPE html>
<html>
<head>
    <title>Latihan Nilai Mahasiswa</title>
</head>
<body>
    <h2>Form Penilaian Mahasiswa</h2>
    <form method="post" action="">
        Nama: <input type="text" name="nama" required><br><br>
        Nilai (0-100): <input type="number" name="nilai" min="0" max="100" required><br><br>
        <input type="submit" value="Proses">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $nama = trim($_POST['nama']);
        $nilai = $_POST['nilai'];

        // Validasi nilai antara 0 sampai 100
        if (!is_numeric($nilai) || $nilai < 0 || $nilai > 100) {
            echo "<p style='color:red;'>Nilai harus antara 0 sampai 100.</p>";
            exit;
        }

        // Menentukan predikat
        if ($nilai >= 85) {
            $predikat = "A";
        } elseif ($nilai >= 75) {
            $predikat = "B";
        } elseif ($nilai >= 65) {
            $predikat = "C";
        } elseif ($nilai >= 50) {
            $predikat = "D";
        } else {
            $predikat = "E";
        }

        // Menentukan status
        $status = ($predikat == "A" || $predikat == "B" || $predikat == "C") ? "Lulus" : "Tidak Lulus";

        // Tampilkan hasil
        echo "<hr>";
        echo "<h3>Hasil Penilaian</h3>";
        echo "Nama : $nama <br>";
        echo "Nilai : $nilai <br>";
        echo "Predikat : $predikat <br>";
        echo "Status : $status";
    }
    ?>
</body>
</html>
