<?php
session_start();
require 'config/config.php';

// set timezone
date_default_timezone_set('Asia/Jakarta');

/* =========================
   PROSES PULANG
========================= */
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    if (empty($_POST['ID'])) {
        echo "<script>alert('Pilih tamu dulu!');</script>";
        exit;
    }

    $ID = $_POST['ID'];

    $query = $conn->prepare("
        UPDATE user 
        SET PULANG = NOW() 
        WHERE ID_USER = :ID_USER AND PULANG IS NULL
    ");

    $query->execute(['ID_USER' => $ID]);

    // refresh halaman biar data hilang dari list
    header("Location: pulang.php");
    exit;
}

/* =========================
   AMBIL DATA UNTUK DROPDOWN
========================= */
$dataTamu = $conn->query("
    SELECT ID_USER, NAMA_TAMU 
    FROM user 
    WHERE PULANG IS NULL 
    ORDER BY NAMA_TAMU ASC
");
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Kepulangan Tamu</title>

<style>
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: Arial, sans-serif;
}

body {
    background: #f5f5f5;
}

/* NAVBAR */
.navbar {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 15px 30px;
    background: linear-gradient(to right, #2c7be5, #4b3cc4);
}

.navbar .logo {
    display: flex;
    align-items: center;
    gap: 10px;
}

.navbar img {
    height: 40px;
}

.navbar .menu a {
    text-decoration: none;
    background: white;
    padding: 8px 15px;
    border-radius: 5px;
    margin-left: 10px;
    color: #333;
    font-size: 14px;
}

/* CONTENT */
.container {
    text-align: center;
    padding: 50px 20px;
    position: relative;
}

/* WATERMARK */
.container::before {
    content: "";
    background: url('assets/img/rusa.png') no-repeat center;
    background-size: contain;
    opacity: 0.55;
    position: absolute;
    top: 100%;
    left: 50%;
    transform: translate(-50%, -50%);
    width: 700px;
    height: 700px;
    z-index: 0;
    pointer-events: none;
}

.content {
    position: relative;
    z-index: 1;
}

/* TITLE */
h1 {
    font-size: 40px;
    margin-bottom: 40px;
}

/* FORM */
.form-group {
    width: 60%;
    margin: auto;
    display: block;
    text-align: right;
}

/* SELECT */
.form-group select {
    width: 100%;
    border: none;
    border-bottom: 2px solid #999;
    padding: 10px;
    outline: none;
    background: transparent;
    margin-bottom: 40px;
    font-size: 14px;
}

/* BUTTON */
.form-group .btn {
    display: inline-block;
    background: #2c5aa0;
    color: white;
    border-radius: 5px;
    padding: 10px 20px;
    cursor: pointer;
    border: none;
}

.form-group .btn:hover {
    background: #1d3f73;
}
</style>

</head>
<body>

<?php include 'include/header.php'; ?>

<!-- CONTENT -->
<div class="container">
    <div class="content">
        <h1>KEPULANGAN TAMU</h1>

        <!-- FORM DROPDOWN -->
        <form method="POST" class="form-group">
            <select name="ID" required>
                <option value="" disabled selected>-- Pilih Tamu --</option>

                <?php while ($tamu = $dataTamu->fetch(PDO::FETCH_ASSOC)) : ?>
                    <option value="<?= $tamu['ID_USER']; ?>">
                        <?= $tamu['NAMA_TAMU']; ?>
                    </option>
                <?php endwhile; ?>

            </select>

            <button type="submit" class="btn">Kirim ➤</button>
        </form>
    </div>
</div>

<?php include 'include/footer.php'; ?>

</body>
</html>