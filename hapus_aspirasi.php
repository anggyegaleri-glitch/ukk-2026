<?php
session_start();
include 'koneksi.php';

// Cek login
if(!isset($_SESSION['status_login'])){
    header("Location: login.php");
    exit();
}

// Ambil ID
$id = $_GET['id'];

// Hapus data
$hapus = mysqli_query($koneksi, "DELETE FROM tb_input_aspirasi WHERE id_pelaporan='$id'");

if($hapus){
    echo "<script>alert('Data berhasil dihapus');window.location='aspirasi.php';</script>";
} else {
    echo "Error: " . mysqli_error($koneksi);
}
?>
