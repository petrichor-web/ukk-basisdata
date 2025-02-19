<?php
include "koneksi.php";
// session_start();
if(!isset($_SESSION['user'])) {
  header('location:login.php');
  exit();
}

$level = isset($_SESSION['level']) ? $_SESSION['level'] : '';

if (isset($_GET['pelangganID']) && is_numeric($_GET['pelangganID'])) {
    $id = intval($_GET['pelangganID']);
    $query = mysqli_query($koneksi, "SELECT * FROM pelanggan WHERE pelangganID = $id");
    if (mysqli_num_rows($query) == 0) {
        echo '<script>alert("ID tidak valid atau tidak ditemukan")</script>';
        exit();
    }
    $data = mysqli_fetch_assoc($query);
} else {
    echo '<script>alert("ID tidak valid")</script>';
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $namapelanggan = $_POST['namapelanggan'];
    $alamat = $_POST['alamat'];
    $nomortelepon = $_POST['nomortelepon'];

    if (!empty($namapelanggan) && !empty($alamat) && !empty($nomortelepon)) {
        $query = "UPDATE pelanggan SET namapelanggan='$namapelanggan', alamat='$alamat', nomortelepon='$nomortelepon' WHERE pelangganID=$id";
        if (mysqli_query($koneksi, $query)) {
            echo '<script>alert("Data berhasil disimpan"); window.location.href="Pelanggan.php";</script>';
        } else {
            echo '<script>alert("Error: ' . mysqli_error($koneksi) . '")</script>';
        }
    } else {
        echo '<script>alert("Semua field harus diisi!")</script>';
    }
}
?>


<!DOCTYPE html>

<!-- =========================================================
* Sneat - Bootstrap 5 HTML Admin Template - Pro | v1.0.0
==============================================================

* Product Page: https://themeselection.com/products/sneat-bootstrap-html-admin-template/
* Created by: ThemeSelection
* License: You must have a valid license purchased in order to legally use the theme for your project.
* Copyright ThemeSelection (https://themeselection.com)

=========================================================
 -->
<!-- beautify ignore:start -->
<html
  lang="en"
  class="light-style layout-menu-fixed"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="../assets/"
  data-template="vertical-menu-template-free"
>
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"
    />

    <title>FOOD</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" href="../assets/img/whale.png" type="image/png">
    <link rel="icon" type="image/x-icon" href="../assets/img/favicon/favicon.ico" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap"
      rel="stylesheet"
    />

    <!-- Icons. Uncomment required icon fonts -->
    <link rel="stylesheet" href="../assets/vendor/fonts/boxicons.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="../assets/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="../assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="../assets/css/demo.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />

    <link rel="stylesheet" href="../assets/vendor/libs/apex-charts/apex-charts.css" />

    <style>
       body {
    background: url('../assets/img/pink.png') no-repeat center center fixed;
    background-size: cover;
  }
  .gradient-text {
    background: linear-gradient(90deg, #7ACCFF, #FF92B2);
    -webkit-background-clip: text;
    background-clip: text; /* Menambahkan versi standar */
    -webkit-text-fill-color: transparent;
    /* text-fill-color: transparent; Menambahkan versi standar (tidak berfungsi di banyak browser) */
    display: inline-block; /* Pastikan elemen dapat mengambil lebar */
  }
    .sb-sidenav {
    display: flex;
    flex-direction: column;
    height: 100vh; /* Pastikan sidebar penuh tinggi */
}

.sb-sidenav-footer {
    margin-top: auto; /* Dorong elemen ke bawah */
    margin-left: 10px;
}
.card {
    background-color: rgba(255, 255, 255, 0.2) !important; 
    backdrop-filter: blur(10px); 
    border-radius: 10px; 
    padding: 20px;
}

.table {
    background-color: transparent !important;
    border-collapse: collapse;
}

th, td {
    background-color: transparent !important;
    color: black;
    border: 1px solid rgba(255, 255, 255, 0.5); /* Transparan dengan batas */
}
.form-control {
    background-color: #DAE7FF !important;
}
  </style>
    <!-- Page CSS -->

    <!-- Helpers -->
    <script src="../assets/vendor/js/helpers.js"></script>

    <!--! Template customizer & Theme config files MUST be included after core stylesheets and helpers.js in the <head> section -->
    <!--? Config:  Mandatory theme config file contain global vars & default theme options, Set your preferred theme option in this file.  -->
    <script src="../assets/js/config.js"></script>
  </head>

  <body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
      <div class="layout-container">

      <!-- Menu -->

      <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme" style="background-color: #DAE7FF !important;">
          <div class="app-brand demo">
            <a href="dashboard.php" class="app-brand-link">
              <span class="app-brand-logo demo">
                <svg
                  width="25"
                  viewBox="0 0 25 42"
                  version="1.1"
                  xmlns="http://www.w3.org/2000/svg"
                  xmlns:xlink="http://www.w3.org/1999/xlink"
                >
                  <defs>
                    <path
                      d="M13.7918663,0.358365126 L3.39788168,7.44174259 C0.566865006,9.69408886 -0.379795268,12.4788597 0.557900856,15.7960551 C0.68998853,16.2305145 1.09562888,17.7872135 3.12357076,19.2293357 C3.8146334,19.7207684 5.32369333,20.3834223 7.65075054,21.2172976 L7.59773219,21.2525164 L2.63468769,24.5493413 C0.445452254,26.3002124 0.0884951797,28.5083815 1.56381646,31.1738486 C2.83770406,32.8170431 5.20850219,33.2640127 7.09180128,32.5391577 C8.347334,32.0559211 11.4559176,30.0011079 16.4175519,26.3747182 C18.0338572,24.4997857 18.6973423,22.4544883 18.4080071,20.2388261 C17.963753,17.5346866 16.1776345,15.5799961 13.0496516,14.3747546 L10.9194936,13.4715819 L18.6192054,7.984237 L13.7918663,0.358365126 Z"
                      id="path-1"
                    ></path>
                    <path
                      d="M5.47320593,6.00457225 C4.05321814,8.216144 4.36334763,10.0722806 6.40359441,11.5729822 C8.61520715,12.571656 10.0999176,13.2171421 10.8577257,13.5094407 L15.5088241,14.433041 L18.6192054,7.984237 C15.5364148,3.11535317 13.9273018,0.573395879 13.7918663,0.358365126 C13.5790555,0.511491653 10.8061687,2.3935607 5.47320593,6.00457225 Z"
                      id="path-3"
                    ></path>
                    <path
                      d="M7.50063644,21.2294429 L12.3234468,23.3159332 C14.1688022,24.7579751 14.397098,26.4880487 13.008334,28.506154 C11.6195701,30.5242593 10.3099883,31.790241 9.07958868,32.3040991 C5.78142938,33.4346997 4.13234973,34 4.13234973,34 C4.13234973,34 2.75489982,33.0538207 2.37032616e-14,31.1614621 C-0.55822714,27.8186216 -0.55822714,26.0572515 -4.05231404e-15,25.8773518 C0.83734071,25.6075023 2.77988457,22.8248993 3.3049379,22.52991 C3.65497346,22.3332504 5.05353963,21.8997614 7.50063644,21.2294429 Z"
                      id="path-4"
                    ></path>
                    <path
                      d="M20.6,7.13333333 L25.6,13.8 C26.2627417,14.6836556 26.0836556,15.9372583 25.2,16.6 C24.8538077,16.8596443 24.4327404,17 24,17 L14,17 C12.8954305,17 12,16.1045695 12,15 C12,14.5672596 12.1403557,14.1461923 12.4,13.8 L17.4,7.13333333 C18.0627417,6.24967773 19.3163444,6.07059163 20.2,6.73333333 C20.3516113,6.84704183 20.4862915,6.981722 20.6,7.13333333 Z"
                      id="path-5"
                    ></path>
                  </defs>
                  
                  <img src="../assets/img/whale.png" alt="Payments" class="rounded" style="width: 40px; height: auto; position: relative; top: -20px;">

                </svg>
              </span>
              <span class="app-brand-text demo menu-text fw-bolder ms-2 gradient-text">Food</span>
              </a>


            <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
              <i class="bx bx-chevron-left bx-sm align-middle"></i>
            </a>
          </div>

          <div class="menu-inner-shadow"></div>

          <ul class="menu-inner py-1">
            <!-- Dashboard -->
            <li class="menu-item">
              <a href="dashboard.php" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Dashboard</div>
              </a>
            </li>

           <!-- Pelanggan -->
           <li class="menu-item active">
            <a href="Pelanggan.php" class="menu-link">
              <i class="menu-icon tf-icons bx bx-group"></i>
              <div data-i18n="Analytics">Pelanggan</div>
            </a>
          </li>
             
          <!-- Produk -->
          <?php if ($level == 'admin') { ?>
          <li class="menu-item">
            <a href="produk.php" class="menu-link">
              <i class="menu-icon tf-icons bx bx-box"></i> <!-- Changed icon -->
              <div data-i18n="Analytics">Produk/Barang</div>
            </a>
          </li>
          <?php } ?>

          <!-- Penjualanan -->
          <li class="menu-item">
            <a href="Penjualan.php" class="menu-link">
              <i class="menu-icon tf-icons bx bx-cart"></i> <!-- Changed icon -->
              <div data-i18n="Analytics">Pembelian</div>
            </a>
          </li>

          <!-- Log Out -->
          <li class="menu-item">
            <a href="logout.php" class="menu-link">
              <i class="menu-icon tf-icons bx bx-log-out"></i> <!-- Changed icon -->
              <div data-i18n="Analytics">Log Out</div>
            </a>
          </li>

           <!-- Pengguna  -->
           <div class="sb-sidenav-footer">
          <div class="small">Logged in ad:</div>
          <?php echo $_SESSION['user']['nama']; ?>
        </div>



          </aside>

          <div class="layout-page">

<!-- Navbar -->

<nav
          class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme"
          id="layout-navbar"
        >
          <div class="layout-menu-toggle navbar-nav align-items-xl-center me-3 me-xl-0 d-xl-none">
            <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
              <i class="bx bx-menu bx-sm"></i>
            </a>
          </div>

          <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
          <h4 style="margin-top: 10px;">Pelanggan</h4>


            <ul class="navbar-nav flex-row align-items-center ms-auto">
              <!-- Place this tag where you want the button to render. -->
              
        </nav>

          <!-- / Navbar -->

          <!-- content -->
          <div class="container-xxl flex-grow-1 container-p-y">
        
                      <!-- Basic Bootstrap Table -->
                      <div class="card">
                <h5 class="card-header fw-bold">Table Ubah Pelanggan</h5>
                
                <div class="table-responsive text-nowrap">
                  <a href="Pelanggan.php" class="btn btn-danger ms-3">kembali</a>
                  <hr>
                  
                  <form method="post">
    <table class="table table-bordered">
        <tr>
            <td width="200">Nama Pelanggan</td>
            <td width="1">:</td>
            <td><input class="form-control" value="<?php echo htmlspecialchars($data['namapelanggan'] ?? ''); ?>" type="text" name="namapelanggan"></td>
        </tr>   
        <tr>
            <td>Alamat</td>
            <td>:</td>
            <td><textarea name="alamat" rows="5" class="form-control"><?php echo htmlspecialchars($data['alamat'] ?? ''); ?></textarea></td>
        </tr>
        <tr>
            <td>No Telpon</td>
            <td>:</td>
            <td><input class="form-control" value="<?php echo htmlspecialchars($data['nomortelepon'] ?? ''); ?>" type="number" step="0" name="nomortelepon"></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td>
                <button type="submit" class="btn btn-primary">Simpan</button>
                <button type="reset" class="btn btn-danger">Reset</button>
            </td>
        </tr>
    </table>
</form>

          </div>
              <!--/ Basic Bootstrap Table -->
          <!-- //content -->

          <div class="content-backdrop fade"></div>
          </div>

          </div>

            <!-- Overlay -->
            <div class="layout-overlay layout-menu-toggle"></div>

          </div>
    <!-- / Layout wrapper -->

    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="../assets/vendor/libs/jquery/jquery.js"></script>
    <script src="../assets/vendor/libs/popper/popper.js"></script>
    <script src="../assets/vendor/js/bootstrap.js"></script>
    <script src="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>

    <script src="../assets/vendor/js/menu.js"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="../assets/vendor/libs/apex-charts/apexcharts.js"></script>

    <!-- Main JS -->
    <script src="../assets/js/main.js"></script>

    <!-- Page JS -->
    <script src="../assets/js/dashboards-analytics.js"></script>

    <!-- Place this tag in your head or just before your close body tag. -->
    <script async defer src="https://buttons.github.io/buttons.js"></script>
  </body>
</html>           