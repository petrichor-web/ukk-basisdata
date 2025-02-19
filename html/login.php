<?php 
include "koneksi.php";

if (isset($_POST['username'])) {
    $username = $_POST['username'];
    $password = md5($_POST['password']);  // Hash password dengan md5

    $cek = mysqli_query($koneksi, "SELECT * FROM user WHERE username='$username' AND password='$password'");

    if (mysqli_num_rows($cek) > 0) {
        $data = mysqli_fetch_array($cek);
        $_SESSION['user'] = $data;
        $_SESSION['level'] = $data['level'];

       // Check user level and redirect accordingly
        if ($data['level'] === 'admin') {
          echo '<script>alert("Berhasil Login sebagai Admin");location.href="Dashboard.php"</script>';
        } elseif ($data['level'] === 'petugas') {
          echo '<script>alert("Berhasil Login sebagai Petugas");location.href="Dashboard.php"</script>';
        } else {
          echo '<script>alert("Level user tidak dikenali.");</script>';
        }
      } else {
        echo '<script>alert("Username/Password salah");</script>';
      }
}
?>


<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Food</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" href="../assets/img/whale.png" type="image/png">

    <style>
            body {
            background: url('../assets/img/icons/unicons/background.png') no-repeat center center fixed;
            background-size: 150%;
            background-position: center;
        }
        .login-card {
            width: 450px;
            border-radius: 15px; /* Tambahkan border-radius */
            padding: 30px;
            border: 1px solid #ddd; /* Tambahkan border agar lebih terlihat */
        }
        .form-control {
            border-radius: 10px; /* Border radius input username & password */
        }
        .btn-login {
            background-color: #FFDFE9; /* Warna tombol */
            border-radius: 10px; /* Border radius tombol */
            border: none; /* Hilangkan border default */
            color: #333; /* Warna teks */
            font-weight: normal; /* Tidak tebal */
        }
        .btn-login:hover {
            background-color: #FFC0CB; /* Warna saat hover */
        }
        .signup-link {
            color: #FF92B2; /* Warna Sign Up */
            font-weight: bold;
        }
        .signup-link:hover {
            color: #FFC0CB; /* Warna saat hover */
        }
    </style>

</head>
<body class="bg-light d-flex justify-content-center align-items-center vh-100">
    <div class="card shadow-lg p-4 login-card">
        <h3 class="text-center mb-3">Fina Login</h3>
        <form method="POST">
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" id="username" name="username" placeholder="masukkan username" require>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="masukkan password" required>
            </div>
            <button type="submit" class="btn btn-login w-100">Login</button>
        </form>
        <div class="mt-2 text-center">
            <span>Don't have an account?</span> <a href="register.php" class="text-decoration-none signup-link">Sign Up</a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
