<?php
session_start();
if (!isset($_SESSION['user'])) { header("Location:index.php"); exit; }
if ($_SERVER['REQUEST_METHOD']==='POST') {
    $account=trim($_POST['account']??'');
    $amount=(float)($_POST['amount']??0);
    if($account==='' || $amount<=0) $error="Enter valid account number and amount";
    elseif($amount>($_SESSION['balance']??0)) $error="Insufficient balance";
    else {
        $_SESSION['balance'] -= $amount;
        $_SESSION['transactions'][] = "Transfer to ".$account.": ₹".number_format($amount,2);
        header("Location:dashboard.php?message=".urlencode("Fund transfer successful"));
        exit;
    }
}
?>
<!DOCTYPE html><html><head><title>Fund Transfer</title></head>
<body><h2>Fund Transfer</h2>
<?php if(isset($error)) echo "<p style='color:red'>$error</p>"; ?>
<form method="post">
<label>Beneficiary Account</label><input type="text" name="account" required>
<label>Amount</label><input type="number" name="amount" step="0.01" required>
<button type="submit">Transfer</button>
</form>
<p><a href="dashboard.php">Back to Dashboard</a></p>
</body></html>