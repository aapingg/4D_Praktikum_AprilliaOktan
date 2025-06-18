<?php include 'nav.php'; include 'koneksi_db.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
   <title>Tambah Pelanggan</title>
</head>
<body>
   <div class="container mt-4">
       <h2>Tambah Pelanggan Baru</h2>

       <?php
       if ($_SERVER["REQUEST_METHOD"] == "POST") {
           $nama    = $_POST['nama'];
           $alamat  = $_POST['alamat'];
           $email   = $_POST['email'];
           $telepon = $_POST['telepon'];

           $sql = "INSERT INTO pelanggan (Nama, Alamat, Email, Telepon)
                   VALUES ('$nama', '$alamat', '$email', '$telepon')";

           if ($conn->query($sql) === TRUE) {
               echo "<div class='alert alert-success'>Pelanggan berhasil ditambahkan.</div>";
           } else {
               echo "<div class='alert alert-danger'>Gagal menambahkan: " . $conn->error . "</div>";
           }
       }
       ?>

       <form method="post" action="">
           <div class="mb-3">
               <label for="nama" class="form-label">Nama</label>
               <input type="text" class="form-control" id="nama" name="nama" required>
           </div>
           <div class="mb-3">
               <label for="alamat" class="form-label">Alamat</label>
               <input type="text" class="form-control" id="alamat" name="alamat">
           </div>
           <div class="mb-3">
               <label for="email" class="form-label">Email</label>
               <input type="email" class="form-control" id="email" name="email">
           </div>
           <div class="mb-3">
               <label for="telepon" class="form-label">Telepon</label>
               <input type="text" class="form-control" id="telepon" name="telepon">
           </div>
           <button type="submit" class="btn btn-primary">Tambah Pelanggan</button>
       </form>

       <hr class="my-5">

       <h3>Daftar Pelanggan</h3>
       <table class="table table-bordered table-striped">
           <thead>
               <tr>
                   <th>ID</th>
                   <th>Nama</th>
                   <th>Alamat</th>
                   <th>Email</th>
                   <th>Telepon</th>
               </tr>
           </thead>
           <tbody>
               <?php
               $result = $conn->query("SELECT * FROM pelanggan ORDER BY ID DESC");
               if ($result->num_rows > 0) {
                   while ($row = $result->fetch_assoc()) {
                       echo "<tr>
                               <td>{$row['ID']}</td>
                               <td>{$row['Nama']}</td>
                               <td>{$row['Alamat']}</td>
                               <td>{$row['Email']}</td>
                               <td>{$row['Telepon']}</td>
                             </tr>";
                   }
               } else {
                   echo "<tr><td colspan='5' class='text-center'>Tidak ada data.</td></tr>";
               }
               ?>
           </tbody>
       </table>
   </div>
</body>
</html>
