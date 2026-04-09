<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buku Tamu - Dinas Kominfo Gresik</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
</head>

<body>
    <?php include 'include/header.php'; ?>
    <main class="content">
        <div class="form-wrapper">
            <h1>Buku Tamu</h1>

            <?php if (isset($_SESSION['error'])): ?>
                <div class="alert alert-error">
                    <?php 
                    echo htmlspecialchars($_SESSION['error']); 
                    unset($_SESSION['error']);
                    ?>
                </div>
            <?php endif; ?>

            <form class="guest-form" id="formTamu" action="proses.php" method="post" autocomplete="off">
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
                    <label for="nama">Nama (Wajib Diisi)</label>
                    <input type="text" id="nama" name="nama" placeholder="Masukkan nama lengkap" required>
                </div>

                <div class="form-group">
                    <label for="hp">No. Hp (Wajib Diisi)</label>
                    <input type="number" id="hp" name="hp" placeholder="08xxxxxxxx" required>
                </div>

                <div class="form-group">
                    <label for="asal">Asal Instansi (Wajib Diisi)</label>
                    <input type="text" id="asal" name="asal" placeholder="Nama instansi atau perusahaan" required>
                </div>

                <div class="form-group">
                    <label for="keterangan">Keterangan</label>
                    <input type="text" id="keterangan" name="keterangan" placeholder="Keperluan Anda" required>
                </div>

                <!-- 🔥 tempat simpan foto -->
                <input type="hidden" name="foto" id="foto">

                <!-- kamera (disembunyikan) -->
                <video id="video" autoplay style="display:none;"></video>
                <canvas id="canvas" width="300" height="200" style="display:none;"></canvas>

                <div class="form-actions">
                    <button type="submit" class="submit-btn">Kirim &rarr;</button>
                </div>
            </form>
        </div>
    </main>

<?php include 'include/footer.php'; ?>

<script>
const video = document.getElementById('video');
let siap = false;

// aktifkan kamera
navigator.mediaDevices.getUserMedia({ video: true })
    .then(function(stream) {
        video.srcObject = stream;

        video.onloadeddata = () => {
            siap = true;
        };
    })
    .catch(function(error) {
        alert("Kamera tidak bisa diakses!");
    });

// intercept submit
document.getElementById("formTamu").addEventListener("submit", function(e) {
    e.preventDefault();

    if (!siap) {
        alert("Kamera belum siap!");
        return;
    }

    const canvas = document.getElementById('canvas');
    const context = canvas.getContext('2d');

    // ambil foto
    context.drawImage(video, 0, 0, canvas.width, canvas.height);

    // ubah ke base64
    let dataURL = canvas.toDataURL("image/png");

    // masukkan ke input hidden
    document.getElementById("foto").value = dataURL;

    // submit ulang ke PHP
    this.submit();
});
</script>

</body>
</html>