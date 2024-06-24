<?php

require ("../../../includes/functions.php");

$pdo = connect();
$stmt = $pdo->prepare("SELECT tbl_students.*, tbl_year_levels.grade_number, tbl_strands.strand_name FROM tbl_students 
LEFT JOIN tbl_year_levels ON tbl_year_levels.id = tbl_students.grade_level_id 
LEFT JOIN tbl_strands ON tbl_strands.id = tbl_students.strand_id");
$stmt->execute();
$datas = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($datas);