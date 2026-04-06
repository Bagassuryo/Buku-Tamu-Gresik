// hash 1 akun
<?php
$password = "admin"; // ganti dengan password kamu
$hash = password_hash($password, PASSWORD_DEFAULT);
echo $hash;
?>


//hash semua akun 
<?php
require 'config/config.php';

// Ambil semua user
$stmt = $conn->prepare("SELECT * FROM admin");
$stmt->execute();
$users = $stmt->fetchAll(PDO::FETCH_ASSOC);

foreach ($users as $user) {
    // Hash password lama
    $newPassword = password_hash($user["PASSWORD"], PASSWORD_DEFAULT);
    
    // Update ke database
    $update = $conn->prepare("UPDATE admin SET PASSWORD = ? WHERE USERNAME_ADMIN = ?");
    $update->execute([$newPassword, $user["USERNAME_ADMIN"]]);
    
    echo "✅ Password untuk " . $user["USERNAME_ADMIN"] . " berhasil di-hash!<br>";
}

echo "<br>Selesai! Hapus file ini sekarang.";
?>