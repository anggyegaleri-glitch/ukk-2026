<?php
session_start();
include 'koneksi.php';

// Cek apakah siswa sudah login
if(!isset($_SESSION['status_login_siswa']) || $_SESSION['status_login_siswa'] != true){
    header("Location: dashboard_siswa.php");
    exit();
}

$nis = $_SESSION['nis'];
$success_message = '';
$error_message = '';

// Ambil data kategori
$kategori_query = mysqli_query($koneksi, "SELECT * FROM kategori ORDER BY ket_kategori");

// Process form input
if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])){
    $id_kategori = mysqli_real_escape_string($koneksi, $_POST['id_kategori']);
    $lokasi = mysqli_real_escape_string($koneksi, $_POST['lokasi']);
    $ket = mysqli_real_escape_string($koneksi, $_POST['ket']);
    
    // Validasi input
    if(empty($id_kategori) || empty($lokasi) || empty($ket)){
        $error_message = '❌ Semua field harus diisi!';
    }
    else {
        // Cari ID pelaporan terbaru
        $last_id = mysqli_fetch_assoc(mysqli_query($koneksi, "SELECT MAX(id_pelaporan) as max_id FROM input_aspirasi"));
        $new_id = $last_id['max_id'] ? $last_id['max_id'] + 1 : 201;
        
        // Insert ke tabel input_aspirasi
        $insert_aspirasi = mysqli_query($koneksi, 
            "INSERT INTO input_aspirasi (id_pelaporan, nis, id_kategori, lokasi, ket) 
             VALUES ('$new_id', '$nis', '$id_kategori', '$lokasi', '$ket')");
        
        if($insert_aspirasi){
            // Insert ke tabel aspirasi dengan status Menunggu
            $insert_status = mysqli_query($koneksi,
                "INSERT INTO aspirasi (id_aspirasi, status, id_pelaporan, feedback)
                 VALUES ('', 'Menunggu', '$new_id', '')");
            
            if($insert_status){
                $success_message = '✅ Aspirasi berhasil diajukan! ID: ' . $new_id;
                // Redirect ke dashboard setelah 2 detik
                echo "<script>setTimeout(function(){ window.location='dashboard_siswa.php'; }, 2000);</script>";
            }
        }
        else {
            $error_message = '❌ Gagal menyimpan aspirasi: ' . mysqli_error($koneksi);
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajukan Aspirasi | Sistem Aspirasi Siswa</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            background: #f5f7fa;
            color: #333;
        }
        
        header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 20px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
        }
        
        .topbar {
            max-width: 1200px;
            margin: 0 auto;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .logo {
            font-size: 20px;
            font-weight: 700;
        }
        
        .header-links a {
            color: white;
            text-decoration: none;
            margin-left: 20px;
            padding: 8px 16px;
            background: rgba(255, 255, 255, 0.2);
            border-radius: 6px;
            transition: all 0.3s;
            display: inline-block;
        }
        
        .header-links a:hover {
            background: rgba(255, 255, 255, 0.3);
        }
        
        .container {
            max-width: 700px;
            margin: 40px auto;
            padding: 0 20px;
        }
        
        .form-box {
            background: white;
            padding: 40px;
            border-radius: 10px;
            box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
        }
        
        h2 {
            color: #1a1a2e;
            margin-bottom: 30px;
            font-size: 26px;
        }
        
        .message {
            padding: 15px;
            margin-bottom: 25px;
            border-radius: 6px;
            font-size: 14px;
            animation: slideDown 0.3s ease-out;
        }
        
        @keyframes slideDown {
            from {
                opacity: 0;
                transform: translateY(-10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        .message.success {
            background: #d1e7dd;
            border: 1px solid #28a745;
            color: #0f5132;
        }
        
        .message.error {
            background: #f8d7da;
            border: 1px solid #dc3545;
            color: #721c24;
        }
        
        .form-group {
            margin-bottom: 20px;
        }
        
        label {
            display: block;
            margin-bottom: 8px;
            color: #333;
            font-weight: 500;
            font-size: 14px;
        }
        
        select,
        input[type="text"],
        textarea {
            width: 100%;
            padding: 12px;
            border: 1.5px solid #e0e0e0;
            border-radius: 7px;
            font-size: 14px;
            font-family: inherit;
            transition: all 0.3s;
        }
        
        select:focus,
        input[type="text"]:focus,
        textarea:focus {
            outline: none;
            border-color: #667eea;
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.08);
        }
        
        textarea {
            resize: vertical;
            min-height: 100px;
        }
        
        .button-group {
            display: flex;
            gap: 10px;
            margin-top: 30px;
        }
        
        button,
        a.btn {
            flex: 1;
            padding: 12px;
            border: none;
            border-radius: 7px;
            font-size: 15px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s;
            text-decoration: none;
            text-align: center;
        }
        
        button[type="submit"] {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
        }
        
        button[type="submit"]:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 20px rgba(102, 126, 234, 0.35);
        }
        
        a.btn {
            background: #e9ecef;
            color: #333;
        }
        
        a.btn:hover {
            background: #dee2e6;
        }
        
        .hint {
            font-size: 13px;
            color: #999;
            margin-top: 5px;
        }
    </style>
</head>
<body>

<header>
    <div class="topbar">
        <div class="logo">📚 Ajukan Aspirasi</div>
        <div class="header-links">
            <a href="dashboard_siswa.php">← Kembali</a>
        </div>
    </div>
</header>

<div class="container">
    <div class="form-box">
        <h2>Ajukan Aspirasi Baru</h2>
        
        <?php if($success_message): ?>
            <div class="message success">
                <?php echo $success_message; ?>
            </div>
        <?php endif; ?>
        
        <?php if($error_message): ?>
            <div class="message error">
                <?php echo $error_message; ?>
            </div>
        <?php endif; ?>
        
        <form method="POST">
            <div class="form-group">
                <label for="id_kategori">📌 Kategori Aspirasi</label>
                <select name="id_kategori" id="id_kategori" required>
                    <option value="">-- Pilih Kategori --</option>
                    <?php while($cat = mysqli_fetch_assoc($kategori_query)): ?>
                        <option value="<?php echo $cat['id_kategori']; ?>">
                            <?php echo $cat['ket_kategori']; ?>
                        </option>
                    <?php endwhile; ?>
                </select>
            </div>
            
            <div class="form-group">
                <label for="lokasi">📍 Lokasi</label>
                <input type="text" id="lokasi" name="lokasi" placeholder="Contoh: Ruang Kelas, Kantin, Lapangan, dll" required>
                <p class="hint">Tempat atau area yang berkaitan dengan aspirasi Anda</p>
            </div>
            
            <div class="form-group">
                <label for="ket">📝 Keterangan / Deskripsi</label>
                <textarea id="ket" name="ket" placeholder="Jelaskan aspirasi atau keluhan Anda dengan detail..." required></textarea>
                <p class="hint">Tuliskan apa yang ingin Anda sampaikan dengan jelas dan lengkap</p>
            </div>
            
            <div class="button-group">
                <button type="submit" name="submit">💾 Ajukan</button>
                <a href="dashboard_siswa.php" class="btn">Batal</a>
            </div>
        </form>
    </div>
</div>

</body>
</html>
