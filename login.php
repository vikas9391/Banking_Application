<?php
session_start();
require "db.php";

$username = $_POST['username'] ?? '';
$password = $_POST['password'] ?? '';

$stmt = $conn->prepare("SELECT id, username, password FROM users WHERE username = ?");
$stmt->bind_param("s", $username);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();

if ($user && password_verify($password, $user['password'])) {
    $_SESSION['user'] = $user['username'];
    $_SESSION['balance'] = 10000;
    header("Location: dashboard.php");
    exit;
}
header("Location: index.php?error=" . urlencode("Invalid username or password"));
exit;
?>