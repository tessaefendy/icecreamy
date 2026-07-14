<?php 
include 'koneksi.php'; 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Produk Baru - IceCreamy</title>
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
        <a class="navbar-brand fw-bold" href="admin.php">Admin Panel - Tambah Produk 🍦</a>
        <a href="admin.php" class="btn btn-sm btn-light">Kembali ke Tabel</a>
    </div>
</nav>

<div class="container">
    <div class="card card-form shadow-sm p-4">
        <h4 class="fw-bold mb-4 text-center">Form Tambah Es Krim Baru</h4>
        
        <form action="" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label class="form-label fw-semibold">Nama Produk</label>
                <input type="text" name="nama" class="form-control" placeholder="Contoh: Ice Cream Vanilla" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Harga (Rp)</label>
                <input type="number" name="harga" class="form-control" placeholder="Contoh: 15000" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Stok Awal</label>
                <input type="number" name="stok" class="form-control" placeholder="Contoh: 20" required>
            </div>
            <div class="mb-3">
                <label class="form-label fw-semibold">Foto Produk</label>
                <input type="file" name="foto" class="form-control" required>
            </div>
            <button type="submit" name="simpan" class="btn btn-primary w-100 mt-2">Simpan ke Database</button>
        </form>

        <?php
        // Logika PHP untuk memproses data form setelah tombol simpan diklik
        if (isset($_POST['simpan'])) {
            $nama  = $_POST['nama'];
            $harga = $_POST['harga'];
            $stok  = $_POST['stok'];
            
            // Mengambil informasi file gambar yang diupload
            $nama_gambar = $_FILES['foto']['name'];
            $lokasi_asal = $_FILES['foto']['tmp_name'];
            
            // Memindahkan file gambar asli ke dalam folder images kamu
            move_uploaded_file($lokasi_asal, "images/" . $nama_gambar);
            
            // Memasukkan nama teks dan nama gambar ke tabel produk di database
            $query_tambah = mysqli_query($konek, "INSERT INTO produk (nama_produk, harga, stok, gambar) 
                                                VALUES ('$nama', '$harga', '$stok', '$nama_gambar')");
            
            if ($query_tambah) {
                echo "<script>
                        alert('Produk baru berhasil ditambahkan!');
                        window.location='admin.php';
                      </script>";
            } else {
                echo "<script>
                        alert('Gagal menambahkan produk!');
                      </script>";
            }
        }
        ?>
    </div>
</div>

</body>
</html>