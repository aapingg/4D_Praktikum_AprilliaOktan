<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pertemuan 11</title>
  <link rel="stylesheet" href="style.css"> <!-- opsional, jika kamu pakai CSS -->
</head>
<body>
    <?php
        $hari = "Jumat";


        switch ($hari) {
        case "Senin":
            echo "Hari pertama kerja!"."<br>";
            break;
        case "Jumat":
            echo "Solat jumat!"."<br>";
            break;
        case "Minggu":
            echo "Libur akhir pekan!"."<br>";
            break;
        default:
            echo "Hari biasa"."<br>";
        }
        for ($i = 1; $i <= 5; $i++) {
            echo "Angka ke-”.$i.”<br>";
        }
        $buah = ["Apel", "Jeruk", "Mangga", "Donat"];
        for ($i = 0; $i < count($buah); $i++) {
            echo $buah[$i] . "<br>";
        }
        $nilai = 5;
        while ($nilai <= 5) {
            echo "Nilai: ". $nilai ."<br>";
            $nilai++;
        }
        $mahasiswa = [
            "10001" => "Andi",
            "10002" => "Budi",
            "10003" => "Citra"
        ];
         foreach ($mahasiswa as $nim => $nama) {
            echo "NIM: ". $nim .", Nama:". $nama."<br>";
        }          
        $umur = 18;
        $status = ($umur >= 17) ? "Dewasa" : "Anak-anak";
        echo $status;

      
    ?>
</body>
</html>
