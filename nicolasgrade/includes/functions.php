<?php

function checkLogin()
{
    if (empty($_SESSION['logged_in'])) {
        header('Location: ' . ROOT_LEVEL . 'login.php');
        exit;
    }
}

function connect()
{
    try {
        $conn = new PDO("mysql:host=localhost;dbname=grades_db", "root", "");
        return $conn;
    } catch (PDOException $e) {
        echo "Connection Failed" . $e->getMessage();
    }

}

function checkSession()
{
    if (!empty($_SESSION['logged_in'])) {
        header('Location: ' . ROOT_LEVEL . 'admin/index.php');
        exit;
    }
}
