<?php 
include 'koneksi.php'; 
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - IceCreamy</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { 
            background: #fdf5f7; 
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, sans-serif;
        }
        .navbar-bg { 
            background: linear-gradient(135deg, #d43f63, #ff7b9c); 
        }
        .card-admin { 
            border-radius: 20px; 
            border: none; 
            background: white;
        }
        .table-custom thead {
            background: linear-gradient(135deg, #d43f63, #f86b89);
            color: white;
        }
        .btn-add {
            background: #d43f63;
            color: white;
            border: none;
            border-radius: 10px;
            transition: 0.2s;
        }
        .btn-add:hover {
            background: #ba3253;
            color: white;
            transform: translateY(-2px);
        }
        .btn-warning-custom {
            background-color: #ffca28;
            color: #4f1a3d;
            border: none;
            font-weight: 600;
        }
        .btn-danger-custom {
            background-color: #ff5252;
            color: white;
            border: none;
        }
        .img-preview {
            border-radius: 10px;
            object-fit: cover;
        }
    </style>
</head>
<body>

<nav class="navbar navbar-dark navbar-bg shadow-sm mb-5">
    <div class="container">
        <a class="navbar-brand fw-bold" href="admin.php">IceCreamy Admin Panel 🛠️</a>
        <a href="menu.php" class="btn btn-sm btn-light fw-semibold text-danger px-3 rounded-pill">Lihat Website</a>
    </div>
</nav>

<div class="container mb-5">
    <div class="card card-admin shadow p-4 p-md-5">
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-3 mb-4">
            <div>
                <h3 class="fw-bold" style="color: #4f1a3d;">Kelola Menu Es Krim 🍦</h3>
                <p class="text-muted small mb-0">Tambah, ubah, atau hapus produk yang tampil di halaman utama.</p>
            </div>
            <a href="tambah.php" class="btn btn-add px-4 py-2 fw-semibold shadow-sm">+ Tambah Produk Baru</a>
        </div>

        <div class="table-responsive">
            <table class="table table-custom table-hover align-middle text-center border-0">
                <thead>
                    <tr class="align-middle">
                        <th style="border-top-left-radius: 12px; border-bottom-left-radius: 12px; width: 8%;">No</th>
                        <th style="width: 15%;">Gambar</th>
                        <th class="text-start">Nama Produk</th>
                        <th style="width: 18%;">Harga</th>
                        <th style="width: 10%;">Stok</th>
                        <th style="border-top-right-radius: 12px; border-bottom-right-radius: 12px; width: 18%;">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $no = 1;
                    $ambil = mysqli_query($konek, "SELECT * FROM produk");
                    while($pecah = mysqli_fetch_assoc($ambil)) {
                    ?>
                    <tr style="border-bottom: 1px solid #f1e4e8;">
                        <td class="fw-bold text-muted"><?php echo $no++; ?></td>
                        <td>
                            <img src="images/<?php echo $pecah['gambar']; ?>" width="65" height="65" class="img-preview shadow-sm border">
                        </td>
                        <td class="text-start fw-bold" style="color: #4f1a3d;"><?php echo $pecah['nama_produk']; ?></td>
                        <td class="fw-semibold text-danger">Rp <?php echo number_format($pecah['harga'], 0, ',', '.'); ?></td>
                        <td class="text-muted fw-medium"><?php echo $pecah['stok']; ?> pcs</td>
                        <td>
                            <div class="d-flex justify-content-center gap-2">
                                <a href="edit.php?id=<?php echo $pecah['id_produk']; ?>" class="btn btn-sm btn-warning-custom px-3 rounded-pill">Edit</a>
                                <a href="hapus.php?id=<?php echo $pecah['id_produk']; ?>" onclick="return confirm('Yakin ingin menghapus produk ini?')" class="btn btn-sm btn-danger-custom px-3 rounded-pill">Hapus</a>
                            </div>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

</body>
</html>