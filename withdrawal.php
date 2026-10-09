<?php
session_start();
if (!isset($_SESSION['user'])) { header("Location:index.php"); exit; }
if ($_SERVER['REQUEST_METHOD']==='POST') {
    $amount=(float)($_POST['amount']??0);
    if($amount<=0) $error="Enter a valid amount";
    elseif($amount>($_SESSION['balance']??0)) $error="Insufficient balance";
    else {
        $_SESSION['balance'] -= $amount;
        $_SESSION['transactions'][] = "Withdrawal: ₹".number_format($amount,2);
        header("Location:dashboard.php?message=".urlencode("Withdrawal successful"));
        exit;
    }
}
?>
<!DOCTYPE html><html><head><title>Withdrawal</title></head>
<body><h2>Withdrawal</h2>
<?php if(isset($error)) echo "<p style='color:red'>$error</p>"; ?>
<form method="post">
<label>Amount</label><input type="number" name="amount" step="0.01" required>
<button type="submit">Withdraw</button>
</form>
<p><a href="dashboard.php">Back to Dashboard</a></p>
</body></html>