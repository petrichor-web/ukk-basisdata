<?php
include "koneksi.php"; // Pastikan koneksi sudah benar

// Validasi ID
if (isset($_GET['produkID']) && is_numeric($_GET['produkID'])) {
    $id = intval($_GET['produkID']);

    // Debug: Tampilkan ID yang diterima
    error_log("ID yang diterima: " . $id);

    // Hapus data terkait di detailpenjualan
    mysqli_query($koneksi, "DELETE FROM detailpenjualan WHERE produkID=$id");

    // Hapus produk
    $query = mysqli_query($koneksi, "DELETE FROM produk WHERE produkID=$id");

    if ($query) {
        echo '<script>
        alert("Hapus Data Berhasil")
        location.href="produk.php"
        </script>';
    } else {
        echo '<script>
        alert("Hapus Data Gagal: ' . mysqli_error($koneksi) . '")
        </script>';
    }
}
?>