<?php
session_start();
require 'config/config.php';

if(!isset($_SESSION["login"])){
    header("location: login.php");
    exit;
}

/* LOGOUT */
if (isset($_GET['logout'])) {
    session_destroy();
    header("Location: login.php");
    exit;
}

/* SEARCH */
$search = "";
if (isset($_GET['search'])) {
    $search = $_GET['search'];
    $query = $conn->prepare("SELECT * FROM USER 
        WHERE NAMA_TAMU LIKE :search
        OR LAYANAN LIKE :search 
        OR TANGGAL LIKE :search
        OR ASAL_INSTANSI LIKE :search");
    $query->execute([
        'search' => "%$search%"
    ]);
} else {
    $query = $conn->query("SELECT * FROM user");
}

/* EXPORT EXCEL */
if (isset($_GET['export'])) {
    header("Content-Type: application/vnd-ms-excel");
    header("Content-Disposition: attachment; filename=rekap_data.xls");

    echo "Layanan\tNama\tNo HP\tInstansi\tKeterangan\tTanggal\tDatang\tPulang\tFoto\n";

    $export = $conn->query("SELECT * FROM user");
    while ($data = $export->fetch(PDO::FETCH_ASSOC)) {

        echo $data['LAYANAN']."\t".
             $data['NAMA_TAMU']."\t".
             $data['NO_HP']."\t".
             $data['ASAL_INSTANSI']."\t".
             $data['KETERANGAN']."\t".
             $data['TANGGAL']."\t".
             $data['DATANG']."\t".
             $data['PULANG']."\t".
             $data['FOTO']."\n";
    }
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Rekapan Data</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
</head>

<style>

body{
    margin: 0;
}

.search-box{
    margin-left: 25px;
    margin-top: 8px;
    display: flex;
    align-items: center;
    background-color: white;
    border-radius: 5px;
    padding: 2px;
    border: 1px solid #ccc;
}

.search-box input{
    border: none;
    outline: none;
    padding: 8px 12px;
    border-radius: 25px;
    width: 150px;
    font-size: 14px;
}

.search-box button{
    border: none;
    background-color: #1B75BC;
    color: white;
    padding: 8px 12px;
    border-radius: 5px;
    cursor: pointer;
}

.search-box button:hover{
    background-color: #155a94;
}

/* efek saat diklik */
.search-box input:focus{
    width: 200px;
    transition: 0.3s;
}

.navbar-button{
    transition: 0,3s;
}

.navbar-button a:hover{
    background-color: #1B75BC;
    color: white;
    border: none;
    transform: translateY(-2px);
    box-shadow: 0 3px 5px black;
}

h2{
    margin-left: 50px;
}

ul{
    margin: 0;
    padding: 0;
    list-style-type: none;
    overflow: hidden;
    background: linear-gradient(to right, #1B75BC, #2E3192);
}

ul li{
    float: right;
}

ul li a{
    display: block;
    padding: 10px 16px;
    text-align: center;
    text-decoration: none;
    color: black;
    background-color: white;
    border: 1px solid #1B75BC;
    border-radius: 3px;
    margin: 8px 5px;
    font-size: 14px;
    display: flex;
    align-items: center;
    justify-content: space-between; /* teks kiri, icon kanan */
    gap: 8px;
}

.material-icons{
    font-size: 15px;
}

table{
    border-collapse: collapse;
    width: 100%;
}

th, td{
    border: 1px solid;
    padding: 10px;
    text-align: center;
}

th{
    background-color: #1B75BC;
}
</style>

<body>

<nav class="navbar">
    <ul>
        <li style="float: left;">
            <form method="GET" class="search-box">
                <input type="text" name="search" placeholder="Cari Data..." value="<?= $search ?>">
                <button type="submit">Search</button>
            </form>
        </li>

        <li class="navbar-button" style="margin-right:20px"><a href="rekap.php?logout=true">Logout<i class="material-icons">logout</i></a></li>
        <li class="navbar-button" ><a href="rekap.php?export=true">Export Excel<i class="material-icons">download</i></a></li>
    </ul>
</nav>

<h2>Rekap Data Tamu</h2>

<table>
    <tr>
        <th>Layanan</th>
        <th>Nama</th>
        <th>Nomer HP</th>
        <th>Asal Instansi</th>
        <th>Keterangan</th>
        <th>Tanggal</th>
        <th>Datang</th>
        <th>Pulang</th>
        <th>Foto</th>
    </tr>

    <?php while ($data = $query->fetch(PDO::FETCH_ASSOC)) { ?>
    <tr>
        <td><?= $data['LAYANAN']; ?></td>
        <td><?= $data['NAMA_TAMU']; ?></td>
        <td><?= $data['NO_HP']; ?></td>
        <td><?= $data['ASAL_INSTANSI']; ?></td>
        <td><?= $data['KETERANGAN']; ?></td>
        <td><?= $data['TANGGAL']; ?></td>
        <td><?= $data['DATANG']; ?></td>
        <td><?= $data['PULANG']; ?></td>
        <td>
            <img src="foto/<?= $data['FOTO']; ?>" width="70">
        </td>
    </tr>
    <?php } ?>

</table>

</body>

</html>
