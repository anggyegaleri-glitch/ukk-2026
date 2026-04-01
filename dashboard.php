<?php
session_start();
include 'koneksi.php';

if(!isset($_SESSION['status_login'])){
    header("Location: login.php");
    exit();
}

/* ===== HITUNG STATISTIK ===== */
$menunggu = mysqli_fetch_assoc(mysqli_query($koneksi,
    "SELECT COUNT(*) as total FROM tb_input_aspirasi WHERE status='Menunggu'"
))['total'];

$proses = mysqli_fetch_assoc(mysqli_query($koneksi,
    "SELECT COUNT(*) as total FROM tb_input_aspirasi WHERE status='Diproses'"
))['total'];

$selesai = mysqli_fetch_assoc(mysqli_query($koneksi,
    "SELECT COUNT(*) as total FROM tb_input_aspirasi WHERE status='Selesai'"
))['total'];
?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Dashboard Admin</title>

<style>
*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family: Arial, sans-serif;
}

body{
    display:flex;
    background:#f5f5f5;
}

/* ===== SIDEBAR ===== */
.sidebar{
    width:240px;
    background:#2f2f2f;
    min-height:100vh;
    padding:25px 20px;
    color:white;
}

.sidebar h2{
    margin-bottom:30px;
    font-size:20px;
}

.sidebar ul{
    list-style:none;
}

.sidebar ul li{
    margin-bottom:15px;
}

.sidebar ul li a{
    text-decoration:none;
    color:#d1d5db;
    display:block;
    padding:10px;
    border-radius:8px;
    transition:0.3s;
}

.sidebar ul li a:hover{
    background:#4b5563;
    color:white;
}

/* ===== MAIN ===== */
.main{
    flex:1;
    padding:30px;
}

.header{
    margin-bottom:25px;
}

.header h1{
    font-size:24px;
    color:#333;
}

/* ===== CARD ===== */
.cards{
    display:grid;
    grid-template-columns:repeat(auto-fit, minmax(200px,1fr));
    gap:20px;
    margin-bottom:30px;
}

.card{
    padding:25px;
    border-radius:15px;
    font-size:18px;
    font-weight:bold;
    background:white;
    color:#333;
    box-shadow:0 6px 15px rgba(0,0,0,0.05);
}

.menunggu{
    border-left:6px solid #9ca3af;
}

.proses{
    border-left:6px solid #6b7280;
}

.selesai{
    border-left:6px solid #4b5563;
}

/* ===== BOX ===== */
.box{
    background:white;
    padding:30px;
    border-radius:15px;
    box-shadow:0 6px 15px rgba(0,0,0,0.05);
}

.box h3{
    margin-bottom:15px;
    color:#333;
}

.box p{
    margin-bottom:15px;
    line-height:1.6;
    color:#555;
}
</style>
</head>

<body>

<!-- ===== SIDEBAR ===== -->
<div class="sidebar">
    <h2>✨ Admin Panel</h2>
    <ul>
        <li><a href="dashboard.php">Dashboard</a></li>
        <li><a href="input_aspirasi.php">Input Aspirasi</a></li>
        <li><a href="aspirasi.php">Kelola Aspirasi</a></li>
        <li><a href="logout.php">Logout</a></li>
    </ul>
</div>

<!-- ===== MAIN ===== -->
<div class="main">

    <div class="header">
        <h1>Dashboard Admin Web Aspirasi</h1>
    </div>

    <div class="cards">
        <div class="card menunggu">
            Aspirasi Menunggu <br><br>
            <?php echo $menunggu; ?>
        </div>

        <div class="card proses">
            Aspirasi Diproses <br><br>
            <?php echo $proses; ?>
        </div>

        <div class="card selesai">
            Aspirasi Selesai <br><br>
            <?php echo $selesai; ?>
        </div>
    </div>

    <div class="box">
        <h3>🚀 Kendali Aspirasi Ada di Tangan Anda</h3>

        <p>
        Dashboard ini menjadi pusat pengawasan seluruh aspirasi siswa
        yang masuk ke dalam sistem.
        </p>

        <p>
        Sebagai admin, Anda memiliki peran penting dalam memastikan
        setiap aspirasi diproses dengan cepat dan transparan.
        </p>

        <p>
        Kelola dengan bijak dan jadikan setiap masukan sebagai langkah
        menuju lingkungan sekolah yang lebih baik.
        </p>
    </div>

</div>

</body>
</html>
