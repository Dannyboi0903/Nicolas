<?php

session_start();

require ("../../includes/functions.php");

$first_name = $_POST['fname'];
$middle_name = $_POST['mname'];
$last_name = $_POST['lname'];
$grade_level = $_POST['glevel'];
$section = $_POST['section'];
$strand = $_POST['strand'];
$username = $_POST['username'];
$password = $_POST['password'];



$pdo = connect();
$stmt = $pdo->prepare("INSERT INTO `tbl_teacher` (username, password, first_name, middle_name, 
    last_name, grade_level, section, strand) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
$stmt->execute([$username, $password, $first_name, $middle_name, $last_name, $grade_level, $section, $strand]);

