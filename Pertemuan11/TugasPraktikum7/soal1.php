<?php
$jumlah_roda = 4;
echo "<h2>Soal 1: Switch</h2>";

switch ($jumlah_roda) {
  case 2:
    echo "Kendaraan: Motor";
    break;
  case 3:
    echo "Kendaraan: Becak";
    break;
  case 4:
    echo "Kendaraan: Mobil";
    break;
  case 6:
  case 8:
    echo "Kendaraan: Truk";
    break;
  default:
    echo "Kendaraan tidak dikenal";
}
?>