<?php
include 'koneksi.php';

// Mengambil id_produk yang dikirim lewat URL tombol hapus
$id = $_GET['id'];

// Perintah SQL untuk menghapus data berdasarkan ID produk tersebut
$hapus = mysqli_query($konek, "DELETE FROM produk WHERE id_produk = '$id'");

if ($hapus) {
    echo "<script>
            alert('Produk berhasil dihapus!');
            window.location='admin.php';
          </script>";
} else {
    echo "<script>
            alert('Gagal menghapus produk!');
            window.location='admin.php';
          </script>";
}
?>