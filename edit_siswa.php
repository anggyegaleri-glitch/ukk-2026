<?php
session_start();
include 'koneksi.php';

if(!isset($_SESSION['status_login'])){
    header("Location: login.php");
    exit();
}

$nis = $_GET['nis'];

// Ambil data siswa
$data = mysqli_query($koneksi, "SELECT * FROM tb_siswa WHERE nis='$nis'");
$d = mysqli_fetch_assoc($data);

// Update data
if(isset($_POST['update'])){
    $kelas = mysqli_real_escape_string($koneksi, $_POST['kelas']);

    mysqli_query($koneksi, "UPDATE tb_siswa SET kelas='$kelas' WHERE nis='$nis'");

    echo "<script>
            alert('Data berhasil diupdate');
            window.location='kelola_siswa.php';
          </script>";
}
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Edit Siswa</title>

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
}

/* RESET */
*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family: Arial;
}

body{
    background:var(--soft);
    display:flex;
    justify-content:center;
    align-items:center;
    height:100vh;
}

/* CARD */
.card{
    background:var(--white);
    padding:30px;
    width:350px;
    border-radius:15px;
    box-shadow:0 6px 20px rgba(0,0,0,0.1);
}

/* TITLE */
.card h2{
    margin-bottom:20px;
    color:var(--dark);
}

/* INPUT */
input{
    width:100%;
    padding:12px;
    margin-bottom:15px;
    border-radius:8px;
    border:1px solid #ddd;
    font-size:14px;
}

/* BUTTON */
button{
    width:100%;
    padding:12px;
    border:none;
    border-radius:8px;
    background:var(--primary);
    color:white;
    font-weight:bold;
    cursor:pointer;
}

button:hover{
    opacity:0.9;
}

/* BACK */
.back{
    display:block;
    margin-top:10px;
    text-align:center;
    text-decoration:none;
    color:var(--primary);
}
</style>
</head>

<body>

<div class="card">
    <h2>Edit Siswa</h2>

    <form method="POST">
        <!-- NIS (readonly) -->
        <input type="text" value="<?= $d['nis']; ?>" readonly>

        <!-- KELAS -->
        <input type="text" name="kelas" value="<?= $d['kelas']; ?>" required>

        <button type="submit" name="update">Update</button>
    </form>

    <a href="kelola_siswa.php" class="back">← Kembali</a>
</div>

</body>
</html>