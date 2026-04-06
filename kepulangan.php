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
<html>
<head>
    <title>Kepulangan Tamu</title>
</head>
<body>

<h2>Data Kepulangan Tamu</h2>

<table border="1" cellpadding="10" cellspacing="0">
    <tr>
        <th>No</th>
        <th>Nama</th>
        <th>Aksi</th>
    </tr>

    <?php 
    $no = 1;
    while ($data = $query->fetch(PDO::FETCH_ASSOC)) { 
    ?>
    <tr>
        <td><?= $no++; ?></td>
        <td><?= $data['NAMA_TAMU']; ?></td>
        <td>
            <form method="POST" onsubmit="return confirm('Yakin tamu sudah pulang?')">
                <input type="hidden" name="ID" value="<?= $data['ID']; ?>">
                <button type="submit">Pulang</button>
            </form>
        </td>
    </tr>
    <?php } ?>

    <?php if ($query->rowCount() == 0) { ?>
    <tr>
        <td colspan="6" align="center">Tidak ada tamu yang belum pulang</td>
    </tr>
    <?php } ?>

</table>

</body>
</html>