<?php
include "koneksi.php"; // Pastikan koneksi sudah benar

// Validasi ID
if (isset($_GET['pelangganID']) && is_numeric($_GET['pelangganID'])) {
    $id = intval($_GET['pelangganID']);
    
    // Debug: Tampilkan ID yang diterima
    error_log("ID yang diterima: " . $id);
    
    // Cek apakah pelanggan memiliki transaksi di tabel penjualan
    $cek = mysqli_query($koneksi, "SELECT * FROM penjualan WHERE pelangganID = $id");
    
    if (mysqli_num_rows($cek) > 0) {
        // Jika ada transaksi terkait, tampilkan peringatan
        echo '<script>
        alert("Gagal menghapus! Pelanggan ini masih memiliki transaksi di tabel penjualan.");
        location.href="pelanggan.php";
        </script>';
    } else {
        // Jika tidak ada transaksi terkait, lanjutkan penghapusan
        $query = mysqli_query($koneksi, "DELETE FROM pelanggan WHERE pelangganID = $id");
        
        if ($query) {
            echo '<script>
            alert("Hapus Data Berhasil");
            location.href="pelanggan.php";
            </script>';
        } else {
            echo '<script>
            alert("Hapus Data Gagal: ' . mysqli_error($koneksi) . '");
            </script>';
        }
    }
} else {
    echo '<script>
    alert("ID pelanggan tidak valid!");
    location.href="pelanggan.php";
    </script>';
}
?>
