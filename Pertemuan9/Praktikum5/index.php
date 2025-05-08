<?php
echo "Halo, selamat datang di dunia PHP!<br>";
   $nama = "Aprillia";
   $umur = 20;
   $berat = 55.5;
   $buah = ["apel", "jeruk", "mangga"];
   $data = null;

   // Menampilkan nilai variabel
   echo "Nama: " . $nama . "<br>";
   echo "Umur: " . $umur . " tahun<br>";
   echo "Berat badan saya". $berat ."kg<br>";
   define("SITE_NAME", "unsika.ac.id");
   define("VERSION", "1.0");
   echo "Selamat datang di " . SITE_NAME . "<br>";
   echo "Versi Sistem: " . VERSION . "<br>";
   echo $buah[1];
   class Mahasiswa {
    public $nama;
    public function sapa() {
        return "Halo, saya $this->nama";
        }
    }
    $mhs = new Mahasiswa();
    $mhs->nama = "Jeni";
    echo $mhs->sapa();
    var_dump($data);

?>

