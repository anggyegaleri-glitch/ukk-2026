<?php
// File ini sudah tidak digunakan, redirect ke pilih_siswa.php
header("Location: pilih_siswa.php");
exit();
?>
        
        <?php if($login_error): ?>
            <div class="error-box">
                <?php echo htmlspecialchars($login_error); ?>
            </div>
        <?php endif; ?>
        
        <form method="POST">
            <input type="text" name="nis" placeholder="Masukkan NIS" required autofocus>
            <button type="submit" name="login">login</button>
        </form>
        
        <div class="footer-links">
            <a href="login.php">← Login Admin</a>
        </div>
    </div>
</div>

</body>
</html>
