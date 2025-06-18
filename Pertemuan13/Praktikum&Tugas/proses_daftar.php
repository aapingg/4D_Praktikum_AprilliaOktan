<?php
include 'koneksi_db.php'; // Pastikan file ini mengatur $conn

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama = $_POST['username'];
    $password = $_POST['password'];

    // Enkripsi kata sandi
    $hash = password_hash($password, PASSWORD_DEFAULT);

    // Simpan ke tabel pengguna
    $stmt = $conn->prepare("INSERT INTO pengguna (nama, katasandi) VALUES (?, ?)");
    $stmt->bind_param("ss", $nama, $hash);

    if ($stmt->execute()) {
        header("Location: login.php?message=" . urlencode("Pendaftaran berhasil. Silakan login."));
    } else {
        header("Location: daftar.php?message=" . urlencode("Gagal daftar. Username mungkin sudah dipakai."));
    }

    $stmt->close();
    $conn->close();
}
?>
