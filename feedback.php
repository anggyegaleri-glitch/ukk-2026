<?php
session_start();
include 'koneksi.php';

$id = $_GET['id'];

$data = mysqli_fetch_assoc(mysqli_query($koneksi,
"SELECT * FROM tb_input_aspirasi WHERE id_pelaporan='$id'"
));

if(isset($_POST['kirim'])){
    $feedback = $_POST['feedback'];
    $status = $_POST['status'];

    mysqli_query($koneksi,
    "UPDATE tb_input_aspirasi 
     SET feedback='$feedback', status='$status'
     WHERE id_pelaporan='$id'");

    echo "<script>alert('Berhasil');window.location='dashboard.php';</script>";
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Feedback</title>
<style>
body{font-family:Arial;background:#FFE4C4;}
.box{
width:400px;margin:100px auto;background:white;
padding:20px;border-radius:10px;
}
textarea,select{
width:100%;padding:10px;margin-bottom:10px;
}
button{
width:100%;padding:10px;background:#FA8072;color:white;border:none;
}
</style>
</head>

<body>

<div class="box">
<h3>Feedback Admin</h3>

<form method="POST">
<textarea name="feedback" placeholder="Isi feedback..."><?= $data['feedback'] ?></textarea>

<select name="status">
<option>Menunggu</option>
<option>Diproses</option>
<option>Selesai</option>
</select>

<button type="submit" name="kirim">Simpan</button>
</form>

</div>

</body>
</html>