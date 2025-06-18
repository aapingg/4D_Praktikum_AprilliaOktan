<?php
include 'koneksi_db.php';

$id = $_POST['id'];
$nama = $_POST['nama'];
$email = $_POST['email'];
$alamat = $_POST['alamat'];
$telepon = $_POST['telepon'];

// Update data pelanggan
$stmt = $conn->prepare("UPDATE Pelanggan SET Nama=?, Email=?, Alamat=?, Telepon=? WHERE ID=?");
$stmt->bind_param("ssssi", $nama, $email, $alamat, $telepon, $id);

if ($stmt->execute()) {
    header("Location: data_pelanggan.php");
} else {
    echo "Gagal mengupdate data: " . $conn->error;
}
?>
