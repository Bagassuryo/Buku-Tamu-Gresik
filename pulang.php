<?php 
include 'config.php';
if(isset($_GET['deleteid'])){
    $id=$_GET['deleteid'];

    $sql="delete from 'crud' where id=$id";
    $result=mysqli_query($con,$sql);
    if($result){
        echo "Deleted succesfull";    
    }else{
        die(mysqli_error($con));
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Kepulangan Tamu</title>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&family=Montserrat:wght@700;800&display=swap" rel="stylesheet"/>
  <style>
    *, *::before, *::after {
      box-sizing: border-box;
      margin: 0;
      padding: 0;
    }

    :root {
      --blue-dark: #1a3a6b;
      --blue-mid: #2255a4;
      --blue-light: #3a7bd5;
      --gold: #f0a500;
      --gold-light: #ffc840;
      --white: #ffffff;
      --gray-bg: #f0f4f8;
      --gray-text: #555;
      --shadow: 0 4px 24px rgba(26,58,107,0.13);
    }

    body {
      font-family: 'Poppins', sans-serif;
      background: var(--gray-bg);
      min-height: 100vh;
      display: flex;
      flex-direction: column;
    }

    /* ── NAVBAR ── */
    header {
      background: linear-gradient(90deg, var(--blue-dark) 0%, var(--blue-mid) 60%, var(--blue-light) 100%);
      padding: 0 32px;
      height: 62px;
      display: flex;
      align-items: center;
      justify-content: space-between;
      box-shadow: 0 3px 16px rgba(0,0,0,0.22);
      position: sticky;
      top: 0;
      z-index: 100;
    }

    .header-logos {
      display: flex;
      align-items: center;
      gap: 14px;
    }

    .logo-circle {
      width: 44px;
      height: 44px;
      border-radius: 50%;
      background: var(--white);
      display: flex;
      align-items: center;
      justify-content: center;
      box-shadow: 0 2px 8px rgba(0,0,0,0.18);
      overflow: hidden;
    }

    /* Gresik logo placeholder */
    .logo-gresik {
      background: linear-gradient(135deg, #fff 60%, #e8eef7 100%);
      border: 2px solid var(--gold);
    }
    .logo-gresik svg {
      width: 28px; height: 28px;
    }

    /* Kominfo logo placeholder */
    .logo-kominfo {
      background: linear-gradient(135deg, #fff 60%, #e8eef7 100%);
    }
    .logo-kominfo svg {
      width: 26px; height: 26px;
    }

    nav {
      display: flex;
      align-items: center;
      gap: 10px;
    }

    nav a {
      display: inline-flex;
      align-items: center;
      gap: 6px;
      padding: 7px 16px;
      border-radius: 6px;
      border: 1.5px solid rgba(255,255,255,0.45);
      color: var(--white);
      font-size: 0.82rem;
      font-weight: 500;
      text-decoration: none;
      letter-spacing: 0.02em;
      transition: background 0.2s, border-color 0.2s, transform 0.15s;
      cursor: pointer;
    }

    nav a:hover {
      background: rgba(255,255,255,0.15);
      border-color: var(--white);
      transform: translateY(-1px);
    }

    nav a.btn-login {
      background: var(--gold);
      border-color: var(--gold);
      color: var(--blue-dark);
      font-weight: 700;
    }
    nav a.btn-login:hover {
      background: var(--gold-light);
      border-color: var(--gold-light);
    }

    nav a .icon {
      font-size: 0.95rem;
    }

    /* ── MAIN CONTENT ── */
    main {
      flex: 1;
      display: flex;
      align-items: center;
      justify-content: center;
      padding: 48px 16px;
      position: relative;
    }

    /* Watermark */
    .watermark {
      position: absolute;
      left: 50%;
      top: 50%;
      transform: translate(-50%, -50%);
      width: 340px;
      opacity: 0.07;
      pointer-events: none;
      user-select: none;
      z-index: 0;
    }

    .card {
      background: var(--white);
      border-radius: 18px;
      box-shadow: var(--shadow);
      padding: 52px 64px 48px 64px;
      width: 100%;
      max-width: 560px;
      position: relative;
      z-index: 1;
      animation: cardIn 0.55s cubic-bezier(.22,1,.36,1) both;
    }

    @keyframes cardIn {
      from { opacity: 0; transform: translateY(28px) scale(0.98); }
      to   { opacity: 1; transform: translateY(0) scale(1); }
    }

    .card-title {
      font-family: 'Montserrat', sans-serif;
      font-size: 1.8rem;
      font-weight: 800;
      color: var(--blue-dark);
      text-align: center;
      letter-spacing: 0.04em;
      margin-bottom: 38px;
      position: relative;
    }

    .card-title::after {
      content: '';
      display: block;
      width: 54px;
      height: 4px;
      background: linear-gradient(90deg, var(--blue-mid), var(--gold));
      border-radius: 2px;
      margin: 12px auto 0;
    }

    /* Form */
    .form-group {
      margin-bottom: 28px;
    }

    .form-group label {
      display: block;
      font-size: 0.88rem;
      font-weight: 600;
      color: var(--blue-dark);
      margin-bottom: 8px;
      letter-spacing: 0.01em;
    }

    .form-group input {
      width: 100%;
      border: none;
      border-bottom: 2px solid #c8d6e8;
      background: transparent;
      padding: 8px 2px;
      font-family: 'Poppins', sans-serif;
      font-size: 0.97rem;
      color: #222;
      outline: none;
      transition: border-color 0.25s;
    }

    .form-group input:focus {
      border-bottom-color: var(--blue-mid);
    }

    .form-group input::placeholder {
      color: #b0b8c5;
    }

    /* Submit row */
    .form-submit {
      display: flex;
      justify-content: flex-end;
      margin-top: 36px;
    }

    .btn-kirim {
      display: inline-flex;
      align-items: center;
      gap: 8px;
      background: linear-gradient(90deg, var(--blue-mid), var(--blue-light));
      color: var(--white);
      border: none;
      border-radius: 8px;
      padding: 11px 30px;
      font-family: 'Poppins', sans-serif;
      font-size: 0.95rem;
      font-weight: 600;
      letter-spacing: 0.03em;
      cursor: pointer;
      box-shadow: 0 4px 16px rgba(34,85,164,0.28);
      transition: background 0.2s, transform 0.15s, box-shadow 0.2s;
    }

    .btn-kirim:hover {
      background: linear-gradient(90deg, var(--blue-light), var(--blue-mid));
      transform: translateY(-2px);
      box-shadow: 0 8px 24px rgba(34,85,164,0.36);
    }

    .btn-kirim:active {
      transform: translateY(0);
      box-shadow: 0 2px 8px rgba(34,85,164,0.18);
    }

    .btn-kirim .arrow {
      font-size: 1.1rem;
    }

    /* ── FOOTER ── */
    footer {
      background: linear-gradient(90deg, var(--blue-dark) 0%, var(--blue-mid) 100%);
      color: rgba(255,255,255,0.88);
      text-align: center;
      padding: 16px 32px;
      font-size: 0.82rem;
      letter-spacing: 0.01em;
    }

    /* ── WATERMARK SVG (Gresik 53 Th) ── */
    .wm-svg text {
      font-family: 'Montserrat', sans-serif;
      font-weight: 900;
    }

    /* Responsive */
    @media (max-width: 600px) {
      .card {
        padding: 36px 24px 32px;
      }
      .card-title {
        font-size: 1.3rem;
      }
      header {
        padding: 0 14px;
      }
      nav a span.label {
        display: none;
      }
    }
  </style>
</head>
<body>

  <!-- HEADER -->
  <header>
    <div class="header-logos">
      <!-- Logo Gresik -->
      <div class="logo-circle logo-gresik">
        <svg viewBox="0 0 40 40" fill="none" xmlns="WhatsApp Image 2026-03-03 at 14.28.01.jpeg">
          <circle cx="20" cy="20" r="18" fill="#1a3a6b"/>
          <polygon points="20,6 24,16 34,16 26,23 29,33 20,27 11,33 14,23 6,16 16,16" fill="#f0a500"/>
        </svg>
      </div>
      <!-- Logo Kominfo -->
      <div class="logo-circle logo-kominfo">
        <svg viewBox="0 0 40 40" fill="none" xmlns="WhatsApp Image 2026-03-03 at 14.28.01 (1).jpeg">
          <circle cx="20" cy="20" r="18" fill="#2255a4"/>
          <rect x="10" y="14" width="20" height="3" rx="1.5" fill="white"/>
          <rect x="10" y="19" width="20" height="3" rx="1.5" fill="white"/>
          <rect x="10" y="24" width="14" height="3" rx="1.5" fill="white"/>
        </svg>
      </div>
    </div>

    <nav>
      <a href="#">
        <span class="icon">📋</span>
        <span class="label">Buku Tamu</span>
      </a>
      <a href="#">
        <span class="icon">🚪</span>
        <span class="label">Pulang</span>
      </a>
      <a href="#">
        <span class="icon">📊</span>
        <span class="label">SKM</span>
      </a>
      <a href="#" class="btn-login">
        <span class="icon">🔑</span>
        <span class="label">Login</span>
      </a>
    </nav>
  </header>

  <!-- MAIN -->
  <main>
    <!-- Watermark Gresik 53 Th -->
    <div class="watermark">
      <svg class="wm-svg" viewBox="0 0 340 360" xmlns="image 2.png">
        <!-- "53" big number -->
        <text x="20" y="240" font-size="200" fill="#2255a4" font-weight="900" font-family="Montserrat, sans-serif" opacity="0.9">53</text>
        <!-- "Th" superscript -->
        <text x="270" y="130" font-size="70" fill="#2255a4" font-weight="700" font-family="Montserrat, sans-serif" opacity="0.9">Th</text>
        <!-- GRESIK text -->
        <text x="30" y="295" font-size="48" fill="#2255a4" font-weight="900" letter-spacing="6" font-family="Montserrat, sans-serif" opacity="0.9">GRESIK</text>
        <!-- sub text -->
        <text x="50" y="320" font-size="14" fill="#2255a4" font-family="Poppins, sans-serif" opacity="0.9">1487 - 2026</text>
        <text x="32" y="340" font-size="12" fill="#2255a4" font-family="Poppins, sans-serif" opacity="0.9">Semangat Gresik Baru Lebih Maju</text>
      </svg>
    </div>

    <!-- Card -->
    <div class="card">
      <h1 class="card-title">KEPULANGAN TAMU</h1>

      <div class="form-group">
        <label for="nama">Nama</label>
        <input type="text" id="nama" name="nama" placeholder="Masukkan nama Anda..." autocomplete="off"/>
      </div>

      <div class="form-submit">
        <button class="btn-kirim" type="button">
          Kirim
          <span class="arrow">➤</span>
        </button>
      </div>
    </div>
  </main>

</body>

<?php include "footer.php"; ?>
</html>
