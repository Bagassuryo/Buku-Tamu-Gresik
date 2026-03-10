<?php
    $host = "localhost";
    $user = "root";
    $pass = "";
    $db = "db_bukutamu";

    try {
        $conn = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    } catch (PDOException $e) {
        die("Koneksi gagal: " . $e->getMessage());
    }
?>