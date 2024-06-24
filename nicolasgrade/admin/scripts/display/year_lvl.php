<?php

require ("../../../includes/functions.php");

$pdo = connect();
$stmt = $pdo->prepare("SELECT * FROM tbl_year_levels");
$stmt->execute();
$datas = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($datas);