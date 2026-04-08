<?php 
session_start();
include 'koneksi.php';

// Cek login admin
if(!isset($_SESSION['status_login'])){
    header("Location: login.php");
    exit();
}

// Ambil data siswa
$query = mysqli_query($koneksi, "SELECT * FROM tb_siswa ORDER BY nis DESC");
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Kelola Siswa</title>

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

:root{
    --primary:#FA8072;
    --soft:#FFE4C4;
    --dark:#333;
    --white:#ffffff;
    --danger:#e74c3c;
    --success:#27ae60;
}

*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:Arial;
}

body{
    background:var(--soft);
}

/* container */
.container{
    width:90%;
    margin:40px auto;
    background:var(--white);
    padding:25px;
    border-radius:12px;
    box-shadow:0 8px 20px rgba(0,0,0,0.08);
}

/* header */
.header{
    display:flex;
    justify-content:space-between;
    align-items:center;
    margin-bottom:20px;
}

h2{
    color:var(--dark);
}

/* tombol */
.btn{
    padding:10px 14px;
    border:none;
    border-radius:6px;
    color:white;
    text-decoration:none;
    font-size:14px;
}

.btn-tambah{
    background:var(--primary);
}

.btn-edit{
    background:#f39c12;
}

.btn-hapus{
    background:var(--danger);
}

.btn-kembali{
    background:#6b7280;
}

/* table */
table{
    width:100%;
    border-collapse:collapse;
}

th, td{
    padding:10px;
    border:1px solid #ddd;
    text-align:center;
}

th{
    background:var(--primary);
    color:white;
}

/* hover */
tr:hover{
    background:#fff3f2;
}
</style>
</head>

<body>

<div class="container">

    <div class="header">
        <h2>📚 Kelola Data Siswa</h2>

        <div>
            <a href="tambah_siswa.php" class="btn btn-tambah">+ Tambah</a>
            <a href="dashboard.php" class="btn btn-kembali">← Kembali</a>
        </div>
    </div>

    <table>
        <tr>
            <th>No</th>
            <th>NIS</th>
            <th>Nama</th>
            <th>Kelas</th>
            <th>Aksi</th>
        </tr>

        <?php 
        $no = 1;
        while($d = mysqli_fetch_assoc($query)){
        ?>
        <tr>
            <td><?= $no++; ?></td>
            <td><?= $d['nis']; ?></td>
            <td><?= $d['nama']; ?></td>
            <td><?= $d['kelas']; ?></td>
            <td>
                <a href="edit_siswa.php?nis=<?= $d['nis']; ?>" class="btn btn-edit">Edit</a>
                <a href="hapus_siswa.php?nis=<?= $d['nis']; ?>" 
                   class="btn btn-hapus"
                   onclick="return confirm('Yakin ingin hapus?');">
                   Hapus
                </a>
            </td>
        </tr>
        <?php } ?>

    </table>

</div>

</body>
</html>
