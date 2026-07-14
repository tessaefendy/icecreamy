<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Login - IceCreamy</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<style>
* { box-sizing: border-box; }

body {
  height: 100vh;
  display: flex;
  flex-direction: column; /* Diubah ke column supaya Navbar berada di atas, bukan di samping card */
  justify-content: space-between;
  align-items: center;
  font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto;
  overflow: hidden;
}

/* WARNA NAVBAR (Menyesuaikan tema pink toko es krim kamu) */
.navbar-bg {
  background-color: #d43f63 !important;
  width: 100%;
}

/* BACKGROUND ANIMASI BAWAAN */
body::before {
  content: "";
  position: fixed;
  inset: 0;
  background: url("images/bg.jpg") no-repeat center/cover;
  z-index: -2;
  animation: zoomBg 15s infinite alternate;
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
  to { transform: scale(1.05); }
}

/* KOTAK CARD LOGIN */
.login-container {
  flex: 1;
  display: flex;
  justify-content: center;
  align-items: center;
  width: 100%;
}

.login-box {
  background: rgba(255,255,255,0.95);
  padding: 30px;
  border-radius: 20px;
  width: 100%;
  max-width: 350px;
  box-shadow: 0 10px 30px rgba(0,0,0,0.15);
}

h3 {
  text-align: center;
  margin-bottom: 20px;
  font-weight: bold;
}

/* TOMBOL LOGIN */
.btn-login {
  background: #d43f63;
  color: white;
  border-radius: 20px;
}

.btn-login:hover {
  background: #b92f52;
}
</style>
</head>

<body>


<div class="login-container">
  <div class="login-box">
    <h3>IceCreamy 🍦</h3>

    <form onsubmit="login(event)">
      <div class="mb-3">
        <label>Username</label>
        <input type="text" id="username" class="form-control" required>
      </div>

      <div class="mb-3">
        <label>Password</label>
        <input type="password" id="password" class="form-control" required>
      </div>

      <button type="submit" class="btn btn-login w-100">Login</button>
    </form>

    <p id="error" class="text-danger text-center mt-3"></p>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script>
// ✅ JIKA SUDAH LOGIN → SEKARANG DIALIKHKAN KE HOME.PHP (Bukan .html lagi)
if(localStorage.getItem("isLogin") === "true"){
  window.location.href = "home.php";
}

// ✅ KODE PROSES LOGIN ASLI BAWAANMU
function login(e){
  e.preventDefault();

  const username = document.getElementById("username").value;
  const password = document.getElementById("password").value;

  // LOGIN SEDERHANA (Sudah dialihkan ke .php)
  if(username === "admin" && password === "123"){
    localStorage.setItem("isLogin", "true");
    window.location.href = "home.php";
  } else {
    document.getElementById("error").innerText = "Username atau password salah!";
  }
}
</script>

</body>
</html>