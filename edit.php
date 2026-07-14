<?php 
include 'koneksi.php'; 

// 1. Mengambil ID produk yang mau diedit dari URL
$id = $_GET['id'];

// 2. Mengambil data lama produk tersebut dari database
$ambil = mysqli_query($konek, "SELECT * FROM produk WHERE id_produk = '$id'");
$pecah = mysqli_fetch_assoc($ambil);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Produk - IceCreamy</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #f8f0f4; }
        .navbar-bg { background: linear-gradient(135deg, #d43f63, #ff7b9c); }
        .card-form { border-radius: 15px; border: none; max-width: 600px; margin: 0 auto; }
    </style>
</head>
<body>

<nav class="navbar navbar-dark navbar-bg shadow-sm mb-4">
    <div class="container">
        <a class="navbar-brand fw-bold" href="admin.php">Admin Panel - Edit Produk 🛠️</a>
        <a href="admin.php" class="btn btn-sm btn-light">Kembali ke Tabel</a>
    </div>
</nav>

<div class="container">
    <div class="card card-form shadow-sm p-4">
        <h4 class="fw-bold mb-4 text-center">Form Edit Es Krim</h4>
        
        <form action="" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label class="form-label fw-semibold">Nama Produk</label>
                <input type="text" name="nama" class="form-control" value="<?php echo $pecah['nama_produk']; ?>" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Harga (Rp)</label>
                <input type="number" name="harga" class="form-control" value="<?php echo $pecah['harga']; ?>" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Stok</label>
                <input type="number" name="stok" class="form-control" value="<?php echo $pecah['stok']; ?>" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Foto Saat Ini</label>
                <div class="mb-2">
                    <img src="images/<?php echo $pecah['gambar']; ?>" width="100" class="img-thumbnail">
                </div>
                <label class="form-label text-muted small">Pilih foto baru jika ingin mengganti foto produk:</label>
                <input type="file" name="foto" class="form-control">
            </div>
            <button type="submit" name="ubah" class="btn btn-warning w-100 mt-2 fw-semibold">Simpan Perubahan</button>
        </form>

        <?php
        // 3. Logika PHP saat tombol "Simpan Perubahan" diklik
        if (isset($_POST['ubah'])) {
            $nama  = $_POST['nama'];
            $harga = $_POST['harga'];
            $stok  = $_POST['stok'];
            
            $nama_gambar = $_FILES['foto']['name'];
            $lokasi_asal = $_FILES['foto']['tmp_name'];
            
            // Jika admin memilih gambar baru
            if (!empty($lokasi_asal)) {
                move_uploaded_file($lokasi_asal, "images/" . $nama_gambar);
                
                // Update data beserta nama gambar barunya
                $query_ubah = mysqli_query($konek, "UPDATE produk SET 
                    nama_produk = '$nama', 
                    harga = '$harga', 
                    stok = '$stok', 
                    gambar = '$nama_gambar' 
                    WHERE id_produk = '$id'");
            } else {
                // Jika admin tidak mengganti gambar, pertahankan gambar lama
                $query_ubah = mysqli_query($konek, "UPDATE produk SET 
                    nama_produk = '$nama', 
                    harga = '$harga', 
                    stok = '$stok' 
                    WHERE id_produk = '$id'");
            }
            
            if ($query_ubah) {
                echo "<script>
                        alert('Data produk berhasil diperbarui!');
                        window.location='admin.php';
                      </script>";
            } else {
                echo "<script>
                        alert('Gagal memperbarui data!');
                      </script>";
            }
        }
        ?>
    </div>
</div>

</body>
</html>