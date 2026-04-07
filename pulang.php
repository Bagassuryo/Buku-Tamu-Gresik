<?php
session_start();
require 'config/config.php';

// set timezone
date_default_timezone_set('Asia/Jakarta');

/* =========================
   PROSES PULANG
========================= */
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $ID = $_POST['ID'];

    $query = $conn->prepare("
        UPDATE user 
        SET PULANG = NOW() 
        WHERE ID = :ID AND PULANG IS NULL
    ");

    $query->execute(['ID' => $ID]);

    // refresh halaman biar data hilang dari list
    header("Location: kepulangan.php");
    exit;
}

/* =========================
   AMBIL DATA
========================= */
$query = $conn->query("
    SELECT * FROM user 
    WHERE PULANG IS NULL 
    ORDER BY tanggal DESC
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

/* watermark */
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

.form-group input {
    width: 100%;
    border: none;
    border-bottom: 2px solid #999;
    padding: 10px;
    outline: none;
    background: transparent;
    margin-bottom: 40px;
}

.form-group .btn {
    display: inline-block;
    background: #2c5aa0;
    color: white;
    border-radius: 5px;
    padding: 10px 20px;
    cursor: pointer;
}

</style>

</head>
<body>

<?php include 'include/header.php'; ?>
<!-- CONTENT -->
<div class="container">
    <div class="content">
        <h1>KEPULANGAN TAMU</h1>

        <!-- FORM INPUT -->
        <form method="POST" class="form-group">
            <input type="text" name="ID" placeholder="Nama / ID Tamu" required>
            <button type="submit" class="btn">Kirim ➤</button>
        </form>
    </div>
</div>

<?php include 'include/footer.php'; ?>
</body>
</html>
