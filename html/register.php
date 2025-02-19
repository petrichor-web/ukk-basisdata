<?php 
include "koneksi.php";

if (isset($_POST['username'])) {
    $username = $_POST['username'];
    $password = md5($_POST['password']);  // Hash password dengan md5
    $nama = $_POST['nama'];
    $level = 'petugas';

    $insert = mysqli_query($koneksi, "INSERT INTO user (nama, username, password, level) VALUES ('$nama', '$username', '$password', '$level')");

    if ($insert) {
        echo '<script>
        alert("Pendaftaran berhasil");
        location.href="login.php";  // Redirect ke halaman login
        </script>';
    } else {
        echo '<script>
        alert("Registrasi Gagal.");
        window.location.href = "register.php";  // Kembali ke halaman register jika gagal
        </script>';
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register Kasir</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" href="../assets/img/whale.png" type="image/png">

    <style>
          body {
            background: url('../assets/img/icons/unicons/background.png') no-repeat center center fixed;
            background-size: 150%; /* Perbesar ukuran background */
            background-position: center; /* Pastikan posisi tetap bagus */
        }
        .register-card {
            width: 450px;
            border-radius: 15px; /* Tambahkan border-radius */
            padding: 30px;
            border: 1px solid #ddd;
        }
        .form-control {
            border-radius: 10px; /* Border radius input username & password */
        }
        .btn-register {
            background-color: #FFDFE9; /* Warna tombol */
            border-radius: 10px; /* Border radius tombol */
            border: none; /* Hilangkan border default */
            color: #333; /* Warna teks */
            font-weight: normal; /* Tidak tebal */
        }
        .btn-register:hover {
            background-color: #FFC0CB; /* Warna saat hover */
        }
        .login-link {
            color: #FF92B2; /* Warna Sign Up */
            font-weight: bold;
        }
        .login-link:hover {
            color: #FFC0CB; /* Warna saat hover */
        }
    </style>
</head>
<body class="bg-light d-flex justify-content-center align-items-center vh-100">
    <div class="card shadow-lg register-card">
        <h3 class="text-center mb-3">Register</h3>
        <form method="POST">
            <div class="mb-3">
                <label for="nama" class="form-label">Nama Lengkap</label>
                <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukkan nama lengkap" required>
            </div>
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" id="username" name="username" placeholder="Masukkan username" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan password" required>
            </div>
            <button type="submit" class="btn btn-register w-100">Sign Up</button>
        </form>
        <div class="mt-2 text-center">
            <span>Sudah punya akun?</span> <a href="login.php" class="text-decoration-none login-link">Login</a>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
