<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Sistem Aspirasi Siswa</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

   <style>
*{
    margin:0;
    padding:0;
    box-sizing:border-box;
    font-family:'Segoe UI',sans-serif;
}

body{
    height:100vh;
    display:flex;
    justify-content:center;
    align-items:center;
    background:#f4f4f4;
}

/* CONTAINER */
.container{
    text-align:center;
}

.container h1{
    font-size:38px;
    margin-bottom:10px;
    color:#333;
}

.container p{
    margin-bottom:50px;
    color:#666;
}

/* CARD WRAPPER */
.card-wrapper{
    display:flex;
    gap:40px;
    justify-content:center;
    flex-wrap:wrap;
}

/* CARD */
.card{
    width:280px;
    padding:40px 30px;
    border-radius:15px;
    background:white;
    border:1px solid #e0e0e0;
    box-shadow:0 4px 10px rgba(0,0,0,0.05);
    transition:0.3s;
    cursor:pointer;
}

.card:hover{
    transform:translateY(-8px);
}

.card h2{
    margin:20px 0 10px;
    color:#444;
}

.card p{
    font-size:14px;
    margin-bottom:25px;
    color:#666;
}

/* BUTTON */
.btn{
    padding:10px 20px;
    border:none;
    border-radius:25px;
    background:#9e9e9e;
    color:white;
    font-weight:bold;
    cursor:pointer;
    transition:0.3s;
}

.btn:hover{
    background:#757575;
}

/* FOOTER */
footer{
    position:absolute;
    bottom:20px;
    width:100%;
    text-align:center;
    font-size:13px;
    color:#777;
}
</style>
</head>
<body>

<div class="container">
    <h1>🎓 Sistem Aspirasi Siswa</h1>
    <p>Wadah penyampaian aspirasi dan keluhan siswa secara digital & transparan</p>

    <div class="card-wrapper">

        <div class="card">
            <h2>👨‍💼 Admin</h2>
            <p>Kelola, verifikasi, dan pantau seluruh aspirasi siswa.</p>
            <a href="login.php">
                <button class="btn">Login Admin</button>
            </a>
        </div>

        <div class="card">
            <h2>🎓 Siswa</h2>
            <p>Ajukan aspirasi dan pantau statusnya dengan mudah.</p>
            <a href="dashboard_siswa.php">
                <button class="btn">Masuk Siswa</button>
            </a>
        </div>

    </div>
</div>

<footer>
    © 2026 Sistem Aspirasi Siswa | Sekolah Kamu
</footer>

</body>
</html>
