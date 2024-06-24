<?php
require_once ("layout/header.php");
session_start();

define("ROOT_LEVEL", "");
require ("includes/functions.php");
checkSession();


?>

<section class="m-5 pt-4 px-5">
    <div class="container-fluid border rounded shadow">
        <div class="row">
            <div class="col-6 text-center p-5">
                <img class="img-fluid w-50" src="image/Nicolas.png" alt="">
                <h1 class="text-red">Online Grade Access and Monitoring System</h1>
                <p class="m-0 text-red fs-5">of</p>
                <p class="m-0 text-red fs-5">Nicolas Barreras B. National High School</p>
            </div>
            <div class="col-6 bg-red p-5 rounded-end">
                <div class="container bg-white rounded p-5">
                    <form action="scripts/login.php" method="POST" class="text-red">
                        <h1 class="mb-5 text-center">Log In</h1>
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" name="username" class="form-control" id="username"
                                aria-describedby="username" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" name="password" class="form-control" id="password"
                                aria-describedby="password" required>
                        </div>
                        <?php
                        if (!empty($_SESSION["error_log"])) {
                            ?>
                            <div class="alert alert-danger" role="alert">
                                <?php
                                echo $_SESSION["error_log"];
                                $_SESSION["error_log"] = false;
                                ?>
                            </div>
                            <?php
                        }
                        ?>
                        <button type="submit" class="btn btn-red w-100">Login</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<?php
require_once ("layout/footer.php")
    ?>