<?php
session_start();
include 'koneksi.php';

$nis = $_GET['nis'];

// 🔥 Hapus dulu data di tb_input_aspirasi
mysqli_query($koneksi, "DELETE FROM tb_input_aspirasi WHERE nis='$nis'");

// 🔥 Baru hapus siswa
mysqli_query($koneksi, "DELETE FROM tb_siswa WHERE nis='$nis'");

echo "<script>
        alert('Data siswa berhasil dihapus');
        window.location='kelola_siswa.php';
      </script>";
?>