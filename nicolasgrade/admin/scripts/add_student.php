<?php

session_start();

require ("../../includes/functions.php");

$std_id = substr(md5(random_bytes(12)), 0, 12);
$fname = $_POST['fname'];
$mname = $_POST['mname'];
$lname = $_POST['lname'];
$strand = $_POST['strand'] == "NULL" ? null : $_POST['strand'];
$ylevel = $_POST['ylevel'];
$section = $_POST['section'];

$pdo = connect();
$stmt = $pdo->prepare("INSERT INTO `tbl_students`(std_id,first_name, middle_name, 
    last_name, grade_level_id, strand_id, section) VALUES (?,?,?,?,?,?,?)");
$stmt->execute([$std_id, $fname, $mname, $lname, $ylevel, $strand, $section]);
