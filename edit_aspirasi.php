<?php
include 'koneksi.php';

$id = $_GET['id'];

$data = mysqli_fetch_assoc(mysqli_query($koneksi,
"SELECT * FROM tb_input_aspirasi WHERE id_pelaporan='$id'"
));

if(isset($_POST['update'])){
    $lokasi = $_POST['lokasi'];
    $ket = $_POST['ket'];

    mysqli_query($koneksi,
    "UPDATE tb_input_aspirasi 
     SET lokasi='$lokasi', ket='$ket'
     WHERE id_pelaporan='$id'");

    echo "<script>alert('Berhasil diupdate');window.location='dashboard.php';</script>";
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Edit Aspirasi</title>

<style>
:root{
--primary:#FA8072;
--soft:#FFE4C4;
}

body{
font-family:Arial;
background:var(--soft);
}

.box{
width:400px;
margin:100px auto;
background:white;
padding:25px;
border-radius:10px;
}

input,textarea{
width:100%;
padding:10px;
margin-bottom:10px;
border:1px solid #ccc;
border-radius:6px;
}

button{
width:100%;
padding:10px;
background:var(--primary);
color:white;
border:none;
border-radius:6px;
}
</style>
</head>

<body>

<div class="box">
<h3>Edit Aspirasi</h3>

<form method="POST">
<input type="text" value="<?= $data['nis'] ?>" readonly>

<input type="text" name="lokasi" value="<?= $data['lokasi'] ?>">

<textarea name="ket"><?= $data['ket'] ?></textarea>

<button name="update">Update</button>
</form>

</div>

</body>
</html>