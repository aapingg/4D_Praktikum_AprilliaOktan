<?php include 'nav.php'; include 'koneksi_db.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Data Pelanggan</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container mt-4">
  <h2>Data Pelanggan</h2>

  <!-- Form Pencarian -->
  <form method="get" class="row mb-4">
    <div class="col-md-5">
      <label class="form-label">Cari Berdasarkan Nama</label>
      <input type="text" class="form-control" name="nama" placeholder="Masukkan nama" value="<?= isset($_GET['nama']) ? htmlspecialchars($_GET['nama']) : '' ?>">
    </div>
    <div class="col-md-5">
      <label class="form-label">Cari Berdasarkan Email</label>
      <input type="text" class="form-control" name="email" placeholder="Masukkan email" value="<?= isset($_GET['email']) ? htmlspecialchars($_GET['email']) : '' ?>">
    </div>
    <div class="col-md-2 d-flex align-items-end">
      <button type="submit" class="btn btn-primary me-2">Cari</button>
      <a href="data_pelanggan.php" class="btn btn-secondary">Reset</a>
    </div>
  </form>

  <!-- Tabel Pelanggan -->
  <table class="table table-bordered table-striped">
    <thead>
      <tr>
        <th>ID</th>
        <th>Nama</th>
        <th>Alamat</th>
        <th>Email</th>
        <th>Telepon</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $where = [];
      if (!empty($_GET['nama'])) {
          $nama = $conn->real_escape_string($_GET['nama']);
          $where[] = "Nama LIKE '%$nama%'";
      }
      if (!empty($_GET['email'])) {
          $email = $conn->real_escape_string($_GET['email']);
          $where[] = "Email LIKE '%$email%'";
      }

      $sql = "SELECT * FROM pelanggan";
      if ($where) {
          $sql .= " WHERE " . implode(" AND ", $where);
      }
      $sql .= " ORDER BY ID DESC";

      $result = $conn->query($sql);
      if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
              echo "<tr>
                      <td>{$row['ID']}</td>
                      <td>{$row['Nama']}</td>
                      <td>{$row['Alamat']}</td>
                      <td>{$row['Email']}</td>
                      <td>{$row['Telepon']}</td>
                      <td>
                        <a href='form_edit_pelanggan.php?id={$row['ID']}' class='btn btn-warning btn-sm'>Edit</a>
                        <a href='hapus_data_pelanggan.php?id={$row['ID']}' class='btn btn-danger btn-sm' onclick=\"return confirm('Yakin ingin menghapus?')\">Hapus</a>
                      </td>
                    </tr>";
          }
      } else {
          echo "<tr><td colspan='6' class='text-center'>Data tidak ditemukan.</td></tr>";
      }
      ?>
    </tbody>
  </table>
</div>
</body>
</html>
