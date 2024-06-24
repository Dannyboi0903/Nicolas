<?php
require_once ('../../includes/functions.php');


if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $conn = connect();
    $fullname = isset($_GET['fullname']) ? $_GET['fullname'] : '';
    $gradeLevel = isset($_GET['gradeLevel']) ? $_GET['gradeLevel'] : '';
    $section = isset($_GET['section']) ? $_GET['section'] : '';
    $strand = isset($_GET['strand']) ? $_GET['strand'] : '';

    $sql = "SELECT tbl_students.*, tbl_year_levels.grade_number, tbl_strands.strand_name FROM tbl_students";

    $sql .= " LEFT JOIN tbl_year_levels ON tbl_year_levels.id = tbl_students.grade_level_id";
    $sql .= " LEFT JOIN tbl_strands ON tbl_strands.id = tbl_students.strand_id";


    if (!empty($fullname)) {
        $sql .= " WHERE first_name LIKE '%$fullname%' OR middle_name LIKE '%$fullname%' OR last_name LIKE '%$fullname%'";
    }

    if (!empty($gradeLevel)) {
        $sql .= " WHERE grade_number = $gradeLevel";
    }

    if (!empty($section)) {
        $sql .= " WHERE section LIKE '%$section%'";
    }

    if (!empty($strand)) {
        $sql .= " WHERE strand_name LIKE '%$strand%'";
    }




    $stmt = $conn->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

    if ($result) {
        echo json_encode($result);
    } else {
        echo json_encode([]);
    }
} else {
    echo json_encode(['error' => 'Invalid request method']);
}
