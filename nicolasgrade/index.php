<?php
session_start();
require_once ("layout/header.php");

define("ROOT_LEVEL", "");
require ("includes/functions.php");

checkSession();

?>

<header>
    <div class="container-fluid px-5 py-2 d-flex justify-content-between align-items-center">
        <div class="img-logo" style="width:100px">
            <img src="image/Nicolas.png" alt="Nicolas Logo" class="img-fluid">
        </div>

        <div>
            <a href="login.php" class="btn btn-red-outline px-4">Log In</a>
        </div>
    </div>
</header>

<section>
    <div class="container-fluid px-5">
        <div class="row">
            <div class="col-6 m-auto">
                <p class="fs-5 m-0">Welcome to</p>
                <h1 class="text-red fw-bold">Nicolas B. Barreras National High School</h1>
                <h2 class="fs-3">Online Grade Access and Monitoring System</h2>
            </div>
            <div class="col-6">
                <img class="img-fluid" src="image/login.png" alt="">
            </div>
        </div>
    </div>
</section>

<?php
require_once ("layout/footer.php")
    ?>