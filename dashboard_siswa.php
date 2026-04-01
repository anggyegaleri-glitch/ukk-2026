<?php 
session_start();
error_reporting(E_ALL);
ini_set('display_errors', 1);
include 'koneksi.php';



$error_msg = '';

/* ==============================
   TAMBAH SISWA
============================== */
if(isset($_POST['add_siswa'])){
    $nis   = mysqli_real_escape_string($koneksi, $_POST['nis']);
    $kelas = mysqli_real_escape_string($koneksi, $_POST['kelas']);

    if(empty($nis) || empty($kelas)){
        $error_msg = "Semua field harus diisi!";
    } else {
        $insert = mysqli_query($koneksi,
            "INSERT INTO tb_siswa (nis, kelas) VALUES ('$nis','$kelas')"
        );

        if($insert){
            echo "<script>alert('Siswa berhasil ditambahkan!'); window.location='dashboard_siswa.php';</script>";
        } else {
            $error_msg = "Gagal menambahkan siswa: " . mysqli_error($koneksi);
        }
    }
}

/* ==============================
   HAPUS SISWA
============================== */
if(isset($_GET['delete'])){
    $nis = mysqli_real_escape_string($koneksi, $_GET['delete']);

    $hapus = mysqli_query($koneksi,
        "DELETE FROM tb_siswa WHERE nis='$nis'"
    );

    if($hapus){
        echo "<script>alert('Siswa berhasil dihapus!'); window.location='dashboard_siswa.php';</script>";
    }
}

/* ==============================
   AMBIL DATA SISWA
============================== */
$data_siswa = mysqli_query($koneksi,
    "SELECT * FROM tb_siswa ORDER BY nis ASC"
);
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Dashboard Siswa</title>

<style>
*{margin:0;padding:0;box-sizing:border-box;}

body{
    font-family:'Segoe UI',sans-serif;
    background:#f4f4f4;
    color:#333;
}

/* HEADER */
header{
    background:#9e9e9e;
    color:white;
    padding:20px;
}

header h1{
    font-size:20px;
}

/* CONTAINER */
.container{
    max-width:1000px;
    margin:40px auto;
    padding:20px;
}

/* BUTTON KEMBALI */
.btn-kembali{
    display:inline-block;
    background:#757575;
    color:white;
    padding:12px 25px;
    border-radius:8px;
    text-decoration:none;
    font-size:16px;
    margin-bottom:30px;
    transition:0.3s;
}

.btn-kembali:hover{
    background:#616161;
}

/* CARD */
.card{
    background:white;
    padding:25px;
    border-radius:10px;
    box-shadow:0 4px 10px rgba(0,0,0,0.05);
    margin-bottom:30px;
    border:1px solid #e0e0e0;
}

/* FORM */
.form-group{
    margin-bottom:15px;
}

label{
    display:block;
    margin-bottom:5px;
    font-weight:600;
}

input{
    width:100%;
    padding:10px;
    border:1px solid #ccc;
    border-radius:5px;
}

input:focus{
    outline:none;
    border-color:#9e9e9e;
    box-shadow:0 0 5px rgba(0,0,0,0.1);
}

.btn-submit{
    background:#9e9e9e;
    color:white;
    padding:10px 20px;
    border:none;
    border-radius:5px;
    cursor:pointer;
    font-weight:600;
}

.btn-submit:hover{
    background:#757575;
}

/* TABLE */
table{
    width:100%;
    border-collapse:collapse;
    background:white;
    border-radius:10px;
    overflow:hidden;
    box-shadow:0 4px 10px rgba(0,0,0,0.05);
}

thead{
    background:#9e9e9e;
    color:white;
}

th, td{
    padding:15px;
    text-align:left;
    border-bottom:1px solid #e0e0e0;
}

tr:nth-child(even){
    background:#f5f5f5;
}

tr:hover{
    background:#eeeeee;
}

/* BUTTON HAPUS */
.btn-hapus{
    background:#757575;
    color:white;
    padding:6px 12px;
    border-radius:5px;
    text-decoration:none;
    font-size:13px;
}

.btn-hapus:hover{
    background:#616161;
}

/* ERROR */
.error-box{
    padding:15px;
    background:#eeeeee;
    color:#333;
    border-radius:5px;
    margin-bottom:20px;
    border:1px solid #ccc;
}
</style>

</head>

<body>

<header>
<h1>📋 Dashboard - Data Siswa</h1>
</header>

<div class="container">

<!-- TOMBOL KEMBALI -->
<a href="index.php" class="btn-kembali">← Kembali</a>

<!-- FORM TAMBAH SISWA -->
<div class="card">
<h2>Tambah Siswa Baru</h2>

<?php if($error_msg){ ?>
<div class="error-box">
<strong>Error:</strong> <?= $error_msg ?>
</div>
<?php } ?>

<form method="POST">
<div class="form-group">
<label>NIS</label>
<input type="text" name="nis" placeholder="Nomor Induk Siswa" required>
</div>

<div class="form-group">
<label>Kelas</label>
<input type="text" name="kelas" placeholder="Contoh: 10 A, 11 B, dll" required>
</div>

<button type="submit" name="add_siswa" class="btn-submit">
Tambah Siswa
</button>
</form>
</div>

<!-- TABEL DATA SISWA -->
<h2>Manajemen Data Siswa</h2>

<table>
<thead>
<tr>
<th>No</th>
<th>NIS</th>
<th>Kelas</th>
<th>Aksi</th>
</tr>
</thead>
<tbody>

<?php 
$no = 1;
while($siswa = mysqli_fetch_assoc($data_siswa)):
?>
<tr>
<td><?php echo $no++; ?></td>
<td><?php echo $siswa['nis']; ?></td>
<td><?php echo $siswa['kelas']; ?></td>
<td>
<a href="dashboard_siswa.php?delete=<?php echo $siswa['nis']; ?>"
   class="btn-hapus"
   onclick="return confirm('Yakin ingin menghapus siswa ini?')">
   Hapus
</a>
</td>
</tr>
<?php endwhile; ?>

</tbody>
</table>

</div>

</body>
</html>
