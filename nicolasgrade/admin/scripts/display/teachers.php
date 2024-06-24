<?php

require ("../../../includes/functions.php");

$pdo = connect();
$stmt = $pdo->prepare("SELECT tbl_teacher.*, tbl_year_levels.grade_number, tbl_strands.strand_name FROM tbl_teacher 
LEFT JOIN tbl_year_levels ON tbl_year_levels.id = tbl_teacher.grade_level 
LEFT JOIN tbl_strands ON tbl_strands.id = tbl_teacher.strand");
$stmt->execute();
$datas = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($datas);