<?php include 'koneksi.php'; ?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Menu</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
* {
  box-sizing: border-box;
}

/* BACKGROUND ANIMASI */
body {
  font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto;
  min-height: 100vh;
  overflow-x: hidden;
  display: flex;
  flex-direction: column;
}

main.page-content {
  flex: 1;
}

/* background image */
body::before {
  content: "";
  position: fixed;
  top: 0;
  left: 0;
  width: 110%;
  height: 110%;
  background: url("images/bg.jpg") no-repeat center/cover;
  z-index: -2;
  animation: zoomBg 20s ease-in-out infinite alternate;
}

/* overlay */
body::after {
  content: "";
  position: fixed;
  inset: 0;
  background: rgba(255,255,255,0.8);
  z-index: -1;
}

@keyframes zoomBg {
  0% { transform: scale(1); }
  100% { transform: scale(1.1); }
}

/* NAVBAR */
.navbar-bg {
  background: linear-gradient(135deg, #d43f63, #ff7b9c);
}

/* CARD */
.section-title {
  text-align: center;
  font-weight: 700;
  margin-bottom: 1.5rem;
  color: #4f1a3d;
}

.card {
  border: none;
  border-radius: 16px;
  overflow: hidden;
  transition: 0.25s;
}

.card:hover {
  transform: translateY(-5px);
  box-shadow: 0 8px 18px rgba(0,0,0,0.1);
}

.card-img-top {
  width: 100%;
  height: 220px;
  object-fit: contain;
  background: #f8f0f4;
  padding: 0.75rem;
}

.card-body {
  display: flex;
  flex-direction: column;
  gap: 0.75rem;
}

.card-body .btn {
  margin-top: auto;
}

.price {
  color: #d43f63;
  font-weight: 600;
}

/* CART */
.cart-box {
  background: white;
  border-radius: 16px;
  padding: 15px;
  border: 1px solid #eee;
}

.cart-item {
  display: flex;
  justify-content: space-between;
  align-items: center;
  font-size: 0.9rem;
  margin-bottom: 10px;
}

.qty-btn {
  border: none;
  background: #eee;
  padding: 2px 8px;
  border-radius: 5px;
}

.remove {
  color: red;
  cursor: pointer;
  font-size: 0.8rem;
}

@media (min-width:768px){
  .cart-sticky {
    position: sticky;
    top: 90px;
  }
}

/* FOOTER */
footer {
  background: linear-gradient(135deg, rgba(212,63,99,0.95), rgba(255,111,161,0.95));
  color: white;
  padding: 18px 0;
  margin-top: 40px;
}

footer small {
  color: rgba(255,255,255,0.95);
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
            </div>
        </div>
    </div>
</nav>

<main class="page-content">
  <div class="container py-5">
    <h3 class="section-title">Best Seller Menu</h3>
    <div class="row g-4">

      <div class="col-md-8">
        <div class="row g-4">

          <?php
          // Mengambil data produk dari database menggunakan variabel $konek
          $ambil_data = mysqli_query($konek, "SELECT * FROM produk");
          
          // Looping otomatis dari phpMyAdmin
          while($pecah = mysqli_fetch_assoc($ambil_data)) {
              $harga_js = $pecah['harga'] / 1000;
          ?>
          <div class="col-6 d-flex">
            <div class="card w-100">
              <img src="images/<?php echo $pecah['gambar']; ?>" class="card-img-top">
              <div class="card-body text-center">
                <h6 class="mb-2"><?php echo $pecah['nama_produk']; ?></h6>
                <div class="price">Rp. <?php echo number_format($pecah['harga'], 0, ',', '.'); ?></div>
                <button onclick="addToCart('<?php echo $pecah['nama_produk']; ?>', <?php echo $harga_js; ?>)" class="btn btn-sm btn-outline-danger">Add</button>
              </div>
            </div>
          </div>
          <?php } ?>

        </div>
      </div>

      <div class="col-md-4">
        <div class="cart-box cart-sticky">
          <h6>🛒 Cart</h6>
          <div id="cart"></div>
          <hr>
          <b>Total: Rp <span id="total">0.000</span></b>

          <button onclick="checkoutWA()" class="btn btn-success w-100 mt-3">
            Checkout WhatsApp
          </button>
        </div>
      </div>

    </div>
  </div>
</main>

<footer class="text-center">
  <small>Created By Tessa Putri 🍦</small>
</footer>

<script>
let cart = JSON.parse(localStorage.getItem("cart")) || [];

function saveCart(){
  localStorage.setItem("cart", JSON.stringify(cart));
}

function addToCart(name, price){
  let item = cart.find(i => i.name === name);
  if(item){ item.qty++; }
  else { cart.push({name, price, qty:1}); }
  saveCart(); renderCart();
}

function changeQty(name, delta){
  let item = cart.find(i => i.name === name);
  item.qty += delta;
  if(item.qty <= 0){
    cart = cart.filter(i => i.name !== name);
  }
  saveCart(); renderCart();
}

function removeItem(name){
  cart = cart.filter(i => i.name !== name);
  saveCart(); renderCart();
}

function renderCart(){
  let html = "";
  let total = 0;

  cart.forEach(item => {
    total += item.price * item.qty;

    html += `
    <div class="cart-item">
      <div>${item.name}<br><small>Rp ${item.price}.000</small></div>
      <div>
        <button class="qty-btn" onclick="changeQty('${item.name}', -1)">-</button>
        ${item.qty}
        <button class="qty-btn" onclick="changeQty('${item.name}', 1)">+</button>
      </div>
      <div>
        Rp ${(item.price * item.qty).toLocaleString('id-ID')}.000<br>
        <span class="remove" onclick="removeItem('${item.name}')">remove</span>
      </div>
    </div>`;
  });

  document.getElementById("cart").innerHTML = html;
  document.getElementById("total").innerText = total.toLocaleString('id-ID') + ".000";
}

function checkoutWA(){
  let text = "Order:%0A";
  cart.forEach(item => {
    text += `${item.name} x${item.qty}%0A`;
  });
  text += `%0ATotal: Rp ${document.getElementById("total").innerText}`;
  window.open(`https://wa.me/6282283767450?text=${text}`);
}

// 🔒 PROTEKSI LOGIN (.PHP)
if(localStorage.getItem("isLogin") !== "true"){
  window.location.replace("login.php");
}

// 🚪 LOGOUT FINAL (.PHP)
function logout(){
  localStorage.clear();
  window.location.replace("login.php");
}

renderCart();
</script>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>