<?php
include "koneksi.php"; // Pastikan koneksi sudah benar

// Validasi ID
if (isset($_GET['penjualanID']) && is_numeric($_GET['penjualanID'])) {
    $id = intval($_GET['penjualanID']);
    
    // Debug: Tampilkan ID yang diterima
    error_log("ID yang diterima: " . $id);
    
    // Hapus dari detailpenjualan terlebih dahulu
    $deleteDetail = mysqli_query($koneksi, "DELETE FROM detailpenjualan WHERE penjualanID=$id");
    
    // Hapus dari penjualan setelah detailpenjualan dihapus
    if ($deleteDetail) {
        $deletePenjualan = mysqli_query($koneksi, "DELETE FROM penjualan WHERE penjualanID=$id");
        
        if ($deletePenjualan) {
            echo '<script>
            alert("Hapus Data Berhasil")
            location.href="penjualan.php"
            </script>';
        } else {
            echo '<script>
            alert("Hapus Data Gagal: ' . mysqli_error($koneksi) . '")
            </script>';
        }
    } else {
        echo '<script>
        alert("Hapus Detail Penjualan Gagal: ' . mysqli_error($koneksi) . '")
        </script>';
    }
}
?>