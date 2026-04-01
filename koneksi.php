<?php
// Koneksi ke MySQL tanpa database terlebih dahulu
$koneksi = mysqli_connect("localhost:3307", "root", "");

if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

// Buat database jika belum ada
$database_name = "db_aspirasi";
$create_db = mysqli_query($koneksi, "CREATE DATABASE IF NOT EXISTS $database_name");

// Pilih database
mysqli_select_db($koneksi, $database_name);

// Set charset
mysqli_set_charset($koneksi, "utf8mb4");
?>
