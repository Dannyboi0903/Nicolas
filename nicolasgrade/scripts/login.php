<?php

session_start();

require ("../includes/functions.php");

$username = $_POST['username'];
$password = $_POST['password'];

$pdo = connect();
$stmt = $pdo->prepare("SELECT * FROM `tbl_acad_chairpersons` WHERE `username` = ? AND `password` = ?");
$stmt->execute([$username, $password]);

$data = $stmt->fetch(PDO::FETCH_ASSOC);

if ($data) {
    $_SESSION['logged_in'] = $data['username'];
    header('Location: ../admin/index.php');
} else {
    $_SESSION['error_log'] = "User not found";
    header('Location: ../login.php');
}