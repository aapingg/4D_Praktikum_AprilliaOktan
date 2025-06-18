<?php
include 'koneksi_db.php';

if (isset($_GET['id'])) {
    $id = (int)$_GET['id'];

    // Gunakan prepared statement agar aman dari SQL injection
    $stmt = $conn->prepare("DELETE FROM pelanggan WHERE ID = ?");
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        header('Location: data_pelanggan.php?message=' . urlencode("Data berhasil dihapus."));
    } else {
        header('Location: data_pelanggan.php?message=' . urlencode("Gagal menghapus data."));
    }

    $stmt->close();
} else {
    header('Location: data_pelanggan.php?message=' . urlencode("ID tidak ditemukan."));
}
exit;
