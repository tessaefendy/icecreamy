<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Contact</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
* {
  box-sizing: border-box;
}

/* BACKGROUND */
body {
  min-height: 100vh;
  font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Arial;
  color: #4b1c32;
  overflow-x: hidden;
}

/* Background image animasi */
body::before {
  content: "";
  position: fixed;
  inset: 0;
  background: url("images/bg.jpg") no-repeat center/cover;
  z-index: -2;
  animation: zoomBg 18s ease-in-out infinite alternate;
}

body::after {
  content: "";
  position: fixed;
  inset: 0;
  background: linear-gradient(180deg, rgba(255,236,242,0.9), rgba(255,202,218,0.9));
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

/* CARD GLASS */
.contact-card {
  background: rgba(255,255,255,0.85);
  border-radius: 20px;
  padding: 25px;
  backdrop-filter: blur(10px);
  box-shadow: 0 10px 30px rgba(0,0,0,0.1);
  transition: 0.3s;
}

.contact-card:hover {
  transform: translateY(-5px);
}

/* ICON */
.contact-icon {
  width: 50px;
  height: 50px;
  border-radius: 50%;
  background: #ffd6e1;
  display: flex;
  align-items: center;
  justify-content: center;
  font-size: 1.3rem;
  color: #d43f63;
}

/* BUTTON */
.btn-pink {
  background: #150e11;
  border: none;
  color: white;
  border-radius: 25px;
  padding: 10px;
}

.btn-pink:hover {
  background: #e65385;
}

/* FORM */
.form-control {
  border-radius: 10px;
  border: 1px solid #eee;
}

.form-control:focus {
  border-color: #ff6fa1;
  box-shadow: 0 0 0 0.1rem rgba(255,111,161,0.2);
}

/* TITLE */
.section-title {
  font-weight: 700;
  margin-bottom: 10px;
}

/* MOBILE */
@media (max-width:576px){
  .contact-card {
    padding: 20px;
  }
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

<!-- NAVBAR -->
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
                
            </div>
        </div>
    </div>
</nav>
<!-- CONTENT -->
<div class="container py-5">
  <div class="row g-4 align-items-stretch">

    <!-- INFO -->
    <div class="col-lg-6">
      <div class="contact-card h-100">
        <h3 class="section-title">Hubungi Kami</h3>
        <p class="text-muted mb-3">Kontak: <strong>Ice Creamy</strong></p>
        <p class="mb-4">Kami siap membantu kamu. Hubungi kami melalui informasi berikut.</p>

        <div class="d-flex align-items-start gap-3 mb-3">
          <div class="contact-icon">📱</div>
          <div>
            <strong>WhatsApp</strong><br>
            <small>082283767450</small>
          </div>
        </div>

        <div class="d-flex align-items-start gap-3 mb-3">
          <div class="contact-icon">📸</div>
          <div>
            <strong>Instagram</strong><br>
            <small>@icecreamy.id</small>
          </div>
        </div>

        <div class="d-flex align-items-start gap-3">
          <div class="contact-icon">📍</div>
          <div>
            <strong>Alamat</strong><br>
            <small>Jalan Es Krim No. 12, Jakarta</small>
          </div>
        </div>

      </div>
    </div>

    <!-- FORM -->
    <div class="col-lg-6">
      <div class="contact-card h-100">
        <h3 class="section-title">Kirim Pesan</h3>
        <p class="text-muted">Isi form di bawah ini ya 👇</p>

        <form>
          <div class="mb-3">
            <input type="text" class="form-control" placeholder="Nama kamu">
          </div>

          <div class="mb-3">
            <input type="email" class="form-control" placeholder="Email">
          </div>

          <div class="mb-3">
            <textarea class="form-control" rows="5" placeholder="Pesan..."></textarea>
          </div>

          <button class="btn btn-pink w-100">Kirim Pesan</button>
        </form>

      </div>
    </div>

  </div>
</div>

<!-- FOOTER -->
<footer class="text-center py-3">
  <small>Created By Tessa Putri 🍦</small>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>