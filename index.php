<?php
session_start();
if (isset($_SESSION['user'])) {
    header("Location: dashboard.php");
    exit;
}
$error = $_GET['error'] ?? '';
?>
<!DOCTYPE html>
<html>
<head>
<title>Banking Application - Login</title>
<style>
body{font-family:Arial;background:#f2f5f9;display:flex;justify-content:center;align-items:center;height:100vh}
.box{background:white;padding:30px;width:350px;border-radius:10px;box-shadow:0 2px 12px #bbb}
input,button{width:100%;padding:11px;margin:8px 0;box-sizing:border-box}
button{background:#1976d2;color:white;border:0;border-radius:5px;cursor:pointer}
.error{color:#d00}
h2{text-align:center}
</style>
</head>
<body>
<div class="box">
<h2>Banking Application</h2>
<?php if($error): ?><p class="error"><?=htmlspecialchars($error)?></p><?php endif; ?>
<form method="post" action="login.php">
<input type="text" name="username" placeholder="Username" required>
<input type="password" name="password" placeholder="Password" required>
<button type="submit">Login</button>
</form>
<p><b>Demo login:</b> admin / admin123</p>
</div>
</body>
</html>
