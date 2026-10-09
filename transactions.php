<?php
session_start();
if (!isset($_SESSION['user'])) { header("Location:index.php"); exit; }
$transactions=$_SESSION['transactions']??[];
?>
<!DOCTYPE html><html><head><title>Transaction History</title></head>
<body><h2>Transaction History</h2>
<?php if(!$transactions): ?><p>No transactions yet.</p><?php else: ?>
<ul><?php foreach($transactions as $t): ?><li><?=htmlspecialchars($t)?></li><?php endforeach; ?></ul>
<?php endif; ?>
<p><a href="dashboard.php">Back to Dashboard</a></p>
</body></html>