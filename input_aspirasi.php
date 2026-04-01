<?php
include 'koneksi.php';

if(isset($_POST['kirim'])){

    // Ambil data & amankan
    $nis         = isset($_POST['nis']) ? mysqli_real_escape_string($koneksi, $_POST['nis']) : '';
    $id_kategori = isset($_POST['id_kategori']) ? mysqli_real_escape_string($koneksi, $_POST['id_kategori']) : '';
    $lokasi      = isset($_POST['lokasi']) ? mysqli_real_escape_string($koneksi, $_POST['lokasi']) : '';
    $ket         = isset($_POST['ket']) ? mysqli_real_escape_string($koneksi, $_POST['ket']) : '';

    // Validasi kosong
    if($nis == '' || $id_kategori == '' || $lokasi == '' || $ket == ''){
        echo "<script>alert('Semua field wajib diisi!');</script>";
    } else {

        // Validasi NIS harus ada
        $cek = mysqli_query($koneksi, "SELECT * FROM tb_siswa WHERE nis='$nis'");

        if(mysqli_num_rows($cek) == 0){
            echo "<script>
                    alert('NIS tidak terdaftar!');
                    window.location='dashboard.php';
                  </script>";
        } else {

            // Insert data
            $query = "INSERT INTO tb_input_aspirasi 
                      (nis, id_kategori, lokasi, ket) 
                      VALUES 
                      ('$nis','$id_kategori','$lokasi','$ket')";

            $result = mysqli_query($koneksi, $query);

            if($result){
                echo "<script>
                        alert('Aspirasi berhasil dikirim');
                        window.location='dashboard.php';
                      </script>";
            } else {
                echo "Error: " . mysqli_error($koneksi);
            }
        }
    }
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Input Aspirasi</title>

<style>
*{
    box-sizing:border-box;
    font-family: Arial, sans-serif;
}
body{
    margin:0;
    background:#f4f4f4;
}
.container{
    width:400px;
    margin:80px auto;
    background:white;
    padding:30px;
    border-radius:15px;
    box-shadow:0 6px 18px rgba(0,0,0,0.08);
}
h2{
    text-align:center;
    margin-bottom:25px;
    color:#333;
}
input, textarea, select{
    width:100%;
    padding:12px;
    margin-bottom:15px;
    border-radius:8px;
    border:1px solid #d1d5db;
    background:#fafafa;
    font-size:14px;
}
input:focus, textarea:focus, select:focus{
    outline:none;
    border:1px solid #6b7280;
    background:white;
}
button{
    width:100%;
    padding:12px;
    border:none;
    border-radius:8px;
    background:#4b5563;
    color:white;
    font-weight:bold;
    cursor:pointer;
}
button:hover{
    background:#2f2f2f;
}

/* tombol kembali */
.btn-kembali{
    display:block;
    margin-top:10px;
    text-align:center;
    padding:12px;
    background:#9ca3af;
    color:white;
    text-decoration:none;
    border-radius:8px;
}
.btn-kembali:hover{
    background:#6b7280;
}
</style>
</head>

<body>

<div class="container">
    <h2>✨ Kirim Aspirasi</h2>

    <form method="POST">

        <!-- Input NIS -->
        <input type="text" name="nis" placeholder="Masukkan NIS" required>

        <!-- Dropdown Kategori -->
        <select name="id_kategori" required>
            <option value="">-- Pilih Kategori --</option>
            <?php
            $kategori = mysqli_query($koneksi, "SELECT * FROM tb_kategori");
            while($k = mysqli_fetch_array($kategori)){
                echo "<option value='".$k['id_kategori']."'>".$k['ket_kategori']."</option>";
            }
            ?>
        </select>

        <!-- Input Lokasi -->
        <input type="text" name="lokasi" placeholder="Lokasi" required>

        <!-- Isi Aspirasi -->
        <textarea name="ket" rows="5" placeholder="Tulis Aspirasi Anda..." required></textarea>

        <button type="submit" name="kirim">Kirim Aspirasi</button>
    </form>

    <!-- Tombol kembali -->
    <a href="dashboard.php" class="btn-kembali">← Kembali ke Dashboard</a>

</div>

</body>
</html>
