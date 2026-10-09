<?php
session_start();
if (!isset($_SESSION['user'])) {
    header("Location: index.php");
    exit;
}
$balance = $_SESSION['balance'] ?? 10000;
$message = $_GET['message'] ?? '';
?>
<!DOCTYPE html>
<html>
<head>
<title>Banking Application - Dashboard</title>
<style>
body{font-family:Arial;background:#eef3f8;margin:0}
.nav{background:#1976d2;color:white;padding:18px}
.container{max-width:800px;margin:30px auto;background:white;padding:30px;border-radius:10px}
.card{padding:20px;background:#f5f7fa;margin:10px 0;border-radius:8px}
a{display:inline-block;margin:6px;padding:10px 15px;background:#1976d2;color:white;text-decoration:none;border-radius:5px}
.msg{color:green;font-weight:bold}
</style>
</head>
<body>
<div class="nav"><b>Banking Application</b> | Welcome, <?=htmlspecialchars($_SESSION['user'])?></div>
<div class="container">
<h2>Dashboard</h2>
<?php if($message): ?><p class="msg"><?=htmlspecialchars($message)?></p><?php endif; ?>
<div class="card"><h3>Current Balance</h3><h1>₹<?=number_format($balance,2)?></h1></div>
<a href="deposit.php">Deposit</a>
<a href="withdrawal.php">Withdrawal</a>
<a href="transfer.php">Fund Transfer</a>
<a href="transactions.php">Transaction History</a>
<a href="logout.php">Logout</a>
</div>
</body>
</html>
