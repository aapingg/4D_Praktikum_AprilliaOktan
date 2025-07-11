<!DOCTYPE html>
<html>
<head>
   <title>Daftar Akun</title>
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">
   <h2>Buat Akun Baru</h2>
   <?php if (isset($_GET['message'])): ?>
       <div class="alert alert-info"><?= htmlspecialchars($_GET['message']) ?></div>
   <?php endif; ?>
   <form method="post" action="proses_daftar.php">
       <div class="mb-3">
           <label>Nama pengguna:</label>
           <input type="text" name="username" class="form-control" required>
       </div>
       <div class="mb-3">
           <label>Kata sandi:</label>
           <input type="password" name="password" class="form-control" required>
       </div>
       <button type="submit" class="btn btn-success">Daftar</button>
       <a href="login.php" class="btn btn-secondary">Kembali ke Login</a>
   </form>
</body>
</html>