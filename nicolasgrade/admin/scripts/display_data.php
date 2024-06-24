<?php

function displayStudent()
{

    $pdo = connect();
    $stmt = $pdo->prepare("SELECT 
	tbl_students.std_id as id, tbl_students.username as username, tbl_students.first_name as first_name,
    students.middle_name as middle_name, tbl_students.last_name as last_name,tbl_students.gender as gender,
    students.status as status, students.birthday as birthday, sections.name as section_name
    FROM students
    INNER JOIN tbl_year_levels on tbl_students.grade_level_id = tbl_year_levels.id");
    $stmt->execute();

    $data = $stmt->fetchAll();
    return $data;
}

function displayTeachers()
{
    $pdo = connect();
    $stmt = $pdo->prepare("SELECT * FROM `teachers`");
    $stmt->execute();

    $data = $stmt->fetchAll();
    return $data;
}

function displayParents()
{
    $pdo = connect();
    $stmt = $pdo->prepare("SELECT * FROM `parents`");
    $stmt->execute();

    $data = $stmt->fetchAll();
    return $data;
}

function getSection($student_id, $section_id)
{
    $pdo = connect();
    $stmt = $pdo->prepare("SELECT DISTINCT sections.name FROM students
    INNER JOIN sections on students.section_id = sections.id
    WHERE students.id = ? AND section_id = ?");
    $stmt->execute([$student_id, $section_id]);

    $data = $stmt->fetch();
    return $data[0];
}

function getYear($student_id, $section_id)
{
    $pdo = connect();
    $stmt = $pdo->prepare("SELECT DISTINCT year_levels.level FROM students
    INNER JOIN sections on students.section_id = sections.id
    INNER JOIN year_levels on sections.year_level = year_levels.id
    WHERE students.id = ? AND section_id = ?");
    $stmt->execute([$student_id, $section_id]);

    $data = $stmt->fetch();
    return $data[0];
}

function year_levels()
{
    $pdo = connect();
    $stmt = $pdo->prepare("SELECT id, CONCAT('Grade ', level) as year_level FROM year_levels");
    $stmt->execute();

    $data = $stmt->fetchAll();
    return $data;
}

function sections()
{
    $pdo = connect();
    $stmt = $pdo->prepare("SELECT * FROM sections");
    $stmt->execute();

    $data = $stmt->fetchAll();
    return $data;
}

