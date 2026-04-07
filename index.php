<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buku Tamu - Dinas Kominfo Gresik</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/form.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
</head>

<body>
    <?php include 'include/header.php'; ?>
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

            <form class="guest-form" action="proses.php" method="post" autocomplete="off">
                <div class="form-layanan">
                    <label for="layanan">LAYANAN</label>
                    <select id="layanan" name="layanan" required>
                        <option value="" disabled selected>-- Pilih Layanan --</option>
                        <option value="bidang_sip">Bidang SIP</option>
                        <option value="bidang_spbe">Bidang SPBE</option>
                        <option value="bidang_ti">Bidang TI</option>
                        <option value="kepala_dinas">Kepala Dinas Kominfo</option>
                        <option value="radio">Radio</option>
                        <option value="sekretariat">Sekretariat</option>
                        <option value="sekretarias_diskominfo">Sekretarias Dinas Kominfo</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="nama">NAMA (WAJIB DIISI)</label>
                    <input type="text" id="nama" name="nama" placeholder="Masukkan nama lengkap Anda" required>
                </div>

                <div class="form-group">
                    <label for="hp">NO. HP (WAJIB DIISI)</label>
                    <input type="number" id="hp" name="hp" placeholder="08123456789" required>
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