<?php 
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);
include 'koneksi.php';

// Cek login
if(!isset($_SESSION['status_login']) || $_SESSION['status_login'] != true){
    header("Location: login.php");
    exit();
}

// Ambil data dari 1 tabel saja (AMAN)
$query = mysqli_query($koneksi, "SELECT * FROM tb_input_aspirasi ORDER BY id_pelaporan DESC");

if(!$query){
    die("Error: " . mysqli_error($koneksi));
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Data Aspirasi</title>

<style>
body{
    font-family: Arial;
    background:#f4f4f4;
}

.container{
    width:90%;
    margin:30px auto;
    background:white;
    padding:20px;
    border-radius:10px;
}

/* tombol kembali */
.btn-kembali{
    display:inline-block;
    margin-bottom:15px;
    padding:10px 15px;
    background:#9ca3af;
    color:white;
    text-decoration:none;
    border-radius:8px;
}
.btn-kembali:hover{
    background:#6b7280;
}

table{
    width:100%;
    border-collapse:collapse;
}

th, td{
    padding:10px;
    border:1px solid #ddd;
}

th{
    background:#999;
    color:white;
}
</style>
</head>

<body>

<div class="container">

    <!-- Tombol kembali -->
    <a href="dashboard.php" class="btn-kembali">← Kembali ke Dashboard</a>

    <h2>Data Aspirasi</h2>

    <table>
        <tr>
            <th>No</th>
            <th>ID</th>
            <th>NIS</th>
            <th>Kategori</th>
            <th>Lokasi</th>
        </tr>

        <?php 
        $no = 1;
        while($d = mysqli_fetch_assoc($query)){
        ?>
        <tr>
            <td><?= $no++; ?></td>
            <td><?= $d['id_pelaporan']; ?></td>
            <td><?= $d['nis']; ?></td>
            <td><?= $d['id_kategori']; ?></td>
            <td><?= $d['lokasi']; ?></td>
        </tr>
        <?php } ?>
    </table>
</div>

</body>
</html>
