<?php
session_start();
if (!isset($_SESSION['user'])) { header("Location:index.php"); exit; }
if ($_SERVER['REQUEST_METHOD']==='POST') {
    $amount=(float)($_POST['amount']??0);
    if($amount>0){
        $_SESSION['balance'] += $amount;
        $_SESSION['transactions'][] = "Deposit: ₹".number_format($amount,2);
        header("Location:dashboard.php?message=".urlencode("Deposit successful"));
        exit;
    }
    $error="Enter a valid amount";
}
?>
<!DOCTYPE html><html><head><title>Deposit</title></head>
<body><h2>Deposit Money</h2>
<?php if(isset($error)) echo "<p style='color:red'>$error</p>"; ?>
<form method="post">
<label>Amount</label><input type="number" name="amount" step="0.01" required>
<button type="submit">Deposit</button>
</form>
<p><a href="dashboard.php">Back to Dashboard</a></p>
</body></html>