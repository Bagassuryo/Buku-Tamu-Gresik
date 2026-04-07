<?php
session_start();
include 'config/config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Ambil data dari form
    $layanan = $_POST['layanan'];
    $nama = trim($_POST['nama']);
    $hp = trim($_POST['hp']);
    $asal = trim($_POST['asal']);
    $keterangan = trim($_POST['keterangan']);

    // Validasi sederhana
    if (empty($nama) || empty($hp) || empty($asal) || empty($keterangan) || empty($layanan)) {
        $_SESSION['error'] = 'Semua field wajib diisi!';
        header('Location: index.php');
        exit;
    }

    // Mapping layanan ke enum database
    $layanan_map = [
        'bidang_sip' => 'BIDANG SIP',
        'bidang_spbe' => 'BIDANG SPBE',
        'bidang_ti' => 'BIDANG TI',
        'kepala_dinas' => 'KEPALA DINAS KOMINFO',
        'radio' => 'RADIO',
        'sekretariat' => 'SEKRETARIAT',
        'sekretarias_diskominfo' => 'SEKRETARIS DINAS KOMINFO'
    ];
    $layanan_db = $layanan_map[$layanan] ?? '';

    if (!$layanan_db) {
        $_SESSION['error'] = 'Layanan tidak valid!';
        header('Location: index.php');
        exit;
    }

    // Validasi nomor HP: harus angka dan panjang 10-13 digit
    if (!is_numeric($hp) || strlen($hp) < 10 || strlen($hp) > 13) {
        $_SESSION['error'] = 'Nomor HP harus berupa angka dengan panjang 10-13 digit!';
        header('Location: index.php');
        exit;
    }

    try {
        // Insert ke database
        $stmt = $conn->prepare("INSERT INTO user (LAYANAN, NAMA_TAMU, NO_HP, ASAL_INSTANSI, KETERANGAN, FOTO) VALUES (?, ?, ?, ?, ?, '')");
        $stmt->execute([$layanan_db, $nama, $hp, $asal, $keterangan]);

        header('Location: index.php');
        exit;
    } catch (PDOException $e) {
        $_SESSION['error'] = 'Gagal menyimpan data: ' . $e->getMessage();
        header('Location: index.php');
        exit;
    }
} else {
    // Jika bukan POST, redirect
    header('Location: index.php');
    exit;
}
?>