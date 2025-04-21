<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perhitungan Total Pembelian</title>
</head>
<body style="font-family: sans-serif; border: 1px solid black; width: 600px; padding: 15px; margin: auto; margin-top: 15px;">

<?php
// Daftar barang dan harga satuan
$barang = array(
    "Keyboard" => 150000,
    "Mouse" => 50000,
    "Monitor" => 1500000,
    "Flashdisk" => 75000,
    "Speaker" => 120000
);

// Nama barang yang dibeli
$namabarang = "Keyboard";
$hargasatuan = $barang[$namabarang];
$jumlahBeli = 2;

$totalharga = $hargasatuan * $jumlahBeli;
$pajak = $totalharga * 0.10;
$totalbayar = $totalharga + $pajak;

echo "<h2>Perhitungan Total Pembelian (Dengan Array)</h2><hr>";
echo "<b>Nama Barang:</b> $namabarang <br>";
echo "Harga Satuan: Rp " . number_format($hargasatuan, 0, ',', '.') . "<br>";
echo "Jumlah Beli: $jumlahBeli <br>";
echo "Total Harga (Sebelum Pajak): Rp " . number_format($totalharga, 0, ',', '.') . "<br>";
echo "Pajak (10%): Rp " . number_format($pajak, 0, ',', '.') . "<br>";
echo "<b>Total Bayar: Rp " . number_format($totalbayar, 0, ',', '.') . "</b>";
?>

</body>
</html>
