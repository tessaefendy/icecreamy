<!DOCTYPE html>
<html lang="en">
<head>

<script>
// ✅ Proteksi Halaman: Jika belum login, dialihkan ke login.php (bukan .html)
if(localStorage.getItem("isLogin") !== "true"){
  window.location.href = "login.php";
}

// ✅ Fungsi Logout yang akan dipanggil tombol merah
function logout(e){
  e.preventDefault(); // Mencegah reload halaman otomatis
  localStorage.removeItem("isLogin"); // Menghapus status login
  window.location.href = "login.php"; // Pindah ke halaman login.php
}
</script>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>IceCreamy</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
* { box-sizing: border-box; }

/* BACKGROUND */
body {
  min-height: 100vh;
  font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Arial;
}

body::before {
  content: "";
  position: fixed;
  inset: 0;
  background: url("images/bg.jpg") center/cover no-repeat;
  z-index: -2;
  animation: zoomBg 20s infinite alternate;
}

body::after {
  content: "";
  position: fixed;
  inset: 0;
  background: rgba(255,255,255,0.85);
  z-index: -1;
}

@keyframes zoomBg {
  from { transform: scale(1); }
  to { transform: scale(1.08); }
}

/* NAVBAR */
.navbar-bg {
  background: linear-gradient(135deg, #d43f63, #ff7b9c);
}

/* HERO */
.hero-section {
  min-height: 85vh;
  background:
    linear-gradient(rgba(0,0,0,0.4), rgba(0,0,0,0.4)),
    url("images/hero.jpg") center/cover no-repeat;
  border-radius: 30px;
  margin: 40px;
  padding: 60px;
  display: flex;
  align-items: center;
}

.hero-content {
  max-width: 500px;
  color: white;
}

/* SECTION */
.section-title {
  text-align: center;
  font-weight: 700;
  margin-bottom: 30px;
}

/* CARD */
.card {
  border: none;
  border-radius: 15px;
  overflow: hidden;
  transition: 0.3s;
}

.card:hover {
  transform: translateY(-5px);
  box-shadow: 0 10px 20px rgba(0,0,0,0.1);
}

.card img {
  height: 180px;
  object-fit: cover;
}

.price {
  color: #d43f63;
  font-weight: bold;
}

/* PROMO */
.promo-box {
  background: linear-gradient(135deg, rgba(255,105,150,0.9), rgba(212,63,99,0.9));
  color: white;
  border-radius: 25px;
  padding: 40px;
  text-align: center;
  box-shadow: 0 15px 30px rgba(212,63,99,0.3);
  backdrop-filter: blur(5px);
  border: 1px solid rgba(255,255,255,0.2);
  transition: 0.3s;
}

.promo-box:hover {
  transform: translateY(-5px);
}

/* BUTTON */
.btn-pink {
  background: #ff6fa1;
  color: white;
  border-radius: 20px;
}

.btn-pink:hover {
  background: #e65385;
}

/* FOOTER */
footer {
  background: linear-gradient(135deg, rgba(212,63,99,0.95), rgba(255,111,161,0.95)) !important;
  color: white;
  margin: 0;
  padding: 18px 0;
}

footer small {
  color: rgba(255,255,255,0.9) !important;
}
</style>
</head>

<body>

<nav class="navbar navbar-dark navbar-bg navbar-expand-lg shadow-sm">
    <div class="container">
        <a class="navbar-brand fw-bold" href="home.php">IceCreamy 🍦</a>

        <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse justify-content-end" id="navbarNav">
            <div class="d-flex flex-column flex-lg-row gap-2 mt-3 mt-lg-0">
                <a href="home.php" class="btn btn-light">Home</a>
                <a href="menu.php" class="btn btn-light">Menu</a>
                <a href="contact.php" class="btn btn-light">Contact</a>
                <a href="#" onclick="logout(event)" class="btn btn-danger">Logout</a>
            </div>
        </div>
    </div>
</nav>

<div class="hero-section">
  <div class="container">
    <div class="hero-content">
      <h1 class="fw-bold display-4">Sweet Moments Start Here 🍨</h1>
      <p class="lead">Nikmati es krim premium dengan rasa terbaik setiap hari</p>
      <a href="menu.php" class="btn btn-pink mt-3 px-4 py-2">Order Now</a>
    </div>
  </div>
</div>

<div class="container mb-5">
  <div class="promo-box">
    <h3>🔥 Promo Hari Ini</h3>
    <p>Beli 2 GRATIS 1 untuk Strawberry 🍓</p>
    <a href="menu.php" class="btn btn-light">Ambil Promo</a>
  </div>
</div>

<div class="container mb-5">
  <h3 class="section-title">Best Seller 🍦</h3>

  <div class="row g-4 justify-content-center">

    <div class="col-6 col-md-4">
      <div class="card shadow-sm h-100">
        <img src="images/matcha.jpg" class="card-img-top img-fluid" alt="Matcha ice cream">
        <div class="card-body text-center">
          <h6 class="mb-2">Matcha</h6>
          <div class="price">$3.00</div>
        </div>
      </div>
    </div>

    <div class="col-6 col-md-4">
      <div class="card shadow-sm h-100">
        <img src="images/chocolate.jpg" class="card-img-top img-fluid" alt="Chocolate ice cream">
        <div class="card-body text-center">
          <h6 class="mb-2">Chocolate</h6>
          <div class="price">$3.50</div>
        </div>
      </div>
    </div>

  </div>
</div>

<footer class="text-center py-3">
  <small>Created By Tessa Putri 🍦</small>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>