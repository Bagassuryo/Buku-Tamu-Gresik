<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buku Tamu - Dinas Kominfo Gresik</title>
    <link rel="stylesheet" href="asset/css/style.css">
    <link rel="stylesheet" href="asset/css/form.css">
</head>
<body>
    <header class="site-header">
        <div class="header-inner">
            <div class="branding">
                <img src="asset//img/gresik.png" alt="Logo Gresik" class="logo">
                <img src="asset//img/kominfo.png" alt="Logo Kominfo" class="logo">
            </div>

            <nav class="main-nav">
                <a href="index.php" class="nav-button">Buku Tamu</a>
                <a href="pulang.php" class="nav-button">Pulang</a>
                <a href="skm.php" class="nav-button">SKM</a>
                <a href="login.php" class="nav-button">Login</a>
            </nav>
        </div>
    </header>

    <main class="content">
        <div class="form-wrapper">
            <h1>Buku Tamu</h1>
            <p class="subtitle">DINAS KOMUNIKASI DAN INFORMATIKA KAB GRESIK</p>

            <?php if (isset($_SESSION['error'])): ?>
                <div class="alert alert-error">
                    <?php 
                    echo htmlspecialchars($_SESSION['error']); 
                    unset($_SESSION['error']);
                    ?>
                </div>
            <?php endif; ?>

            <?php if (isset($_SESSION['success'])): ?>
                <div class="alert alert-success">
                    <?php 
                    echo htmlspecialchars($_SESSION['success']); 
                    unset($_SESSION['success']);
                    ?>
                </div>
            <?php endif; ?>

            <form class="guest-form" action="proses.php" method="post" autocomplete="off">
                <div class="form-layanan">
                    <label for="layanan">LAYANAN</label>
                    <select id="layanan" name="layanan" required>
                        <option value="" disabled selected>-- Pilih Layanan --</option>
                        <option value="bidang_sip">Bidang SIP</option>
                        <option value="bidang_spbe">Bidang SPBE</option>
                        <option value="kepala_dinas">Kepala Dinas Kominfo</option>
                        <option value="sekretariat">Sekretariat</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="nama">NAMA (WAJIB DIISI)</label>
                    <input type="text" id="nama" name="nama" placeholder="Masukkan nama lengkap Anda" required>
                </div>

                <div class="form-group">
                    <label for="hp">NO. HP (WAJIB DIISI)</label>
                    <input type="tel" id="hp" name="hp" placeholder="08xxxxxxx" required>
                </div>

                <div class="form-group">
                    <label for="asal">ASAL INSTANSI (WAJIB DIISI)</label>
                    <input type="text" id="asal" name="asal" placeholder="Nama instansi atau perusahaan" required>
                </div>

                <div class="form-group">
                    <label for="keterangan">KETERANGAN</label>
                    <input type="text" id="keterangan" name="keterangan" placeholder="Keperluan Anda" required>
                </div>

                <div class="form-actions">
                    <button type="submit" class="submit-btn">Kirim &rarr;</button>
                </div>
            </form>
        </div>
    </main>

<?php include 'include/footer.php'; ?>

</body>
</html>