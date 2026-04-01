<?php
// File ini sudah tidak digunakan, redirect ke dashboard_siswa.php
header("Location: dashboard_siswa.php");
exit();
?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pilih Siswa | Aspirasi Siswa</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        body {
            font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, sans-serif;
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }
        
        .container {
            width: 100%;
            max-width: 400px;
        }
        
        .card {
            background: white;
            padding: 60px 40px;
            border-radius: 10px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
            animation: slideUp 0.6s ease-out;
        }
        
        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(40px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        .card h2 {
            text-align: center;
            color: #1a1a2e;
            margin-bottom: 10px;
            font-size: 28px;
            font-weight: 700;
        }
        
        .subtitle {
            text-align: center;
            color: #999;
            font-size: 14px;
            margin-bottom: 35px;
        }
        
        form {
            display: flex;
            flex-direction: column;
            gap: 16px;
        }
        
        label {
            color: #333;
            font-weight: 500;
            font-size: 14px;
        }
        
        select {
            width: 100%;
            padding: 13px 15px;
            border: 1.5px solid #e0e0e0;
            border-radius: 7px;
            font-size: 15px;
            font-family: inherit;
            background: #f8f9fa;
            transition: all 0.3s ease;
            cursor: pointer;
        }
        
        select:focus {
            outline: none;
            border-color: #667eea;
            background: white;
            box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.08);
        }
        
        select option {
            padding: 10px;
        }
        
        button[type="submit"] {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 13px;
            border: none;
            border-radius: 7px;
            font-size: 16px;
            font-weight: 600;
            cursor: pointer;
            transition: all 0.3s ease;
            margin-top: 6px;
            letter-spacing: 0.3px;
        }
        
        button[type="submit"]:hover {
            transform: translateY(-2px);
            box-shadow: 0 12px 30px rgba(102, 126, 234, 0.35);
        }
        
        button[type="submit"]:active {
            transform: translateY(0);
        }
        
        .footer-links {
            text-align: center;
            margin-top: 25px;
            border-top: 1px solid #eee;
            padding-top: 20px;
        }
        
        .footer-links a {
            color: #667eea;
            text-decoration: none;
            font-size: 14px;
            font-weight: 500;
        }
        
        .footer-links a:hover {
            text-decoration: underline;
        }
        
        .info-box {
            background: #e8f4f8;
            border: 1px solid #b3dfe8;
            padding: 12px;
            border-radius: 6px;
            font-size: 13px;
            color: #0c5460;
            margin-top: 15px;
            text-align: center;
        }
    </style>
</head>
<body>

<div class="container">
    <div class="card">
        <h2>Pilih Siswa</h2>
        <p class="subtitle">Sistem Aspirasi Siswa</p>
        
        <form method="POST">
            <div>
                <label for="nis">👤 Nama / NIS Siswa</label>
                <select name="nis" id="nis" required autofocus>
                    <option value="">-- Pilih Siswa --</option>
                    <?php while($siswa = mysqli_fetch_assoc($siswa_query)): ?>
                        <option value="<?php echo $siswa['nis']; ?>">
                            <?php echo $siswa['nis']; ?> - <?php echo $siswa['kelas']; ?>
                        </option>
                    <?php endwhile; ?>
                </select>
            </div>
            
            <button type="submit" name="pilih_siswa">Masuk Dashboard</button>
        </form>
        
        <div class="info-box">
            ℹ️ Pilih NIS Anda dari dropdown di atas untuk mengakses dashboard
        </div>
        
        <div class="footer-links">
            <a href="index.php">← Kembali ke Beranda</a>
        </div>
    </div>
</div>

</body>
</html>
