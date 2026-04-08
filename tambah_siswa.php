<?php
session_start();
include 'koneksi.php';

if(isset($_POST['simpan'])){
    $nis   = $_POST['nis'];
    $nama  = $_POST['nama'];
    $kelas = $_POST['kelas'];

    mysqli_query($koneksi, "INSERT INTO tb_siswa (nis,nama,kelas)
    VALUES('$nis','$nama','$kelas')");

    echo "<script>alert('Berhasil');window.location='kelola_siswa.php';</script>";
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Tambah Siswa</title>
<style>

:root{
    --primary:#FA8072;
    --soft:#FFE4C4;
    --dark:#333;
    --white:#ffffff;
    --danger:#e74c3c;
    --success:#27ae60;
}

/* RESET */
*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family: Arial, sans-serif;
}

body{
    background:var(--soft);
}

/* CONTAINER */
.container{
    width:90%;
    margin:30px auto;
    background:var(--white);
    padding:20px;
    border-radius:15px;
    box-shadow:0 5px 15px rgba(0,0,0,0.05);
}

/* TABLE FIX BIAR GA ANCUR */
.table-wrapper{
    overflow-x:auto;
}

table{
    width:100%;
    border-collapse:collapse;
    min-width:600px;
}

th, td{
    padding:12px;
    border:1px solid #ddd;
    text-align:left;
}

th{
    background:var(--primary);
    color:white;
}

tr:nth-child(even){
    background:#f9f9f9;
}

/* BUTTON */
.btn{
    padding:6px 12px;
    border-radius:6px;
    text-decoration:none;
    color:white;
    font-size:13px;
}

.btn-edit{ background:#3498db; }
.btn-hapus{ background:var(--danger); }
.btn-kembali{
    display:inline-block;
    margin-bottom:15px;
    background:var(--primary);
    padding:10px 15px;
}

body{background:#FFE4C4;font-family:Arial;}
.box{width:400px;margin:60px auto;background:white;padding:20px;border-radius:10px;}
input{width:100%;padding:10px;margin-bottom:10px;}
button{width:100%;padding:10px;background:#FA8072;color:white;border:none;}
</style>
</head>
<body>

<div class="box">
<h2>Tambah Siswa</h2>

<form method="POST">
<input type="text" name="nis" placeholder="NIS" required>
<input type="text" name="nama" placeholder="Nama" required>
<input type="text" name="kelas" placeholder="Kelas" required>

<button name="simpan">Simpan</button>
</form>

</div>

</body>
</html>
