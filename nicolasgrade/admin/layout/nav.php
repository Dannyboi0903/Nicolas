<!-- Navigation Bar -->
<div class="col-lg-2 d-none d-lg-block col-sm-12 border" style="height: 100vh">
    <div class="logo w-50 m-auto my-3">
        <img class="img-fluid" src="../image/Nicolas.png" alt />
    </div>
    <ul class="navbar-nav">
        <li class="nav-item my-2">
            <a class="btn btn-red-outline <?= $_SESSION['page'] == 'dashboard' ? 'active' : '' ?> w-100"
                href="index.php">Dashboard</a>
        </li>
        <li class="nav-item my-2">
            <a class="btn btn-red-outline <?= $_SESSION['page'] == 'teacher' ? 'active' : '' ?> w-100"
                href="teacher.php">Teachers</a>
        </li>
        <li class="nav-item my-2">
            <a class="btn btn-red-outline <?= $_SESSION['page'] == 'parent' ? 'active' : '' ?> w-100"
                href="parent.php">Parents</a>
        </li>
        <li class="nav-item my-2">
            <a class="btn btn-red-outline <?= $_SESSION['page'] == 'student' ? 'active' : '' ?> w-100"
                href="student.php">Students</a>
        </li>
        <li class="nav-item my-2">
            <a class="btn btn-red-outline <?= $_SESSION['page'] == 'subject' ? 'active' : '' ?> w-100"
                href="subject.php">Subjects</a>
        </li>
        <li class="nav-item my-2">
            <a class="btn btn-red-outline <?= $_SESSION['page'] == 'student record' ? 'active' : '' ?> w-100"
                href="student record.php">Students Record</a>
        </li>

    </ul>
</div>

<div class="col-lg-2 d-none position-fixed bg-white overflow-y-scroll col-sm-12 border h-100 pb-5 z-3" id="mNav">
    <div class="close text-end">
        <button class="btn btn-red mt-3" id="closeNav">
            <i class="bi bi-x-lg"></i>
        </button>
    </div>
    <div class=" logo w-50 m-auto my-3">
        <img class="img-fluid" src="../image/Nicolas.png" alt />
    </div>
    <div class="d-sm-none profile d-grid justify-content-center border-top border-bottom my-2 py-3">
        <div class="d-flex justify-content-center">
            <img class="img-fluid float-center" src="../image/users.png" alt />
        </div>
        <p class="mb-0 text-center text-red fw-bold">Admin</p>
        <ul class="navbar-nav">
            <li class="nav-item my-2">
                <a class="btn btn-red-outline w-100" href="#">Profile</a>
            </li>
            <li class="nav-item my-2">
                <a class="btn btn-red-outline w-100" href="../scripts/logout.php">Logout</a>
            </li>
        </ul>
    </div>
    <ul class="navbar-nav pb-5">
        <li class="nav-item my-2">
            <a class="btn btn-red-outline <?= $_SESSION['page'] == 'dashboard' ? 'active' : '' ?> w-100"
                href="index.php">Dashboard</a>
        </li>
        <li class="nav-item my-2">
            <a class="btn btn-red-outline <?= $_SESSION['page'] == 'teacher' ? 'active' : '' ?> w-100"
                href="teacher.php">Teachers</a>
        </li>
        <li class="nav-item my-2">
            <a class="btn btn-red-outline <?= $_SESSION['page'] == 'parent' ? 'active' : '' ?> w-100"
                href="parent.php">Parents</a>
        </li>
        <li class="nav-item my-2">
            <a class="btn btn-red-outline <?= $_SESSION['page'] == 'student' ? 'active' : '' ?> w-100"
                href="student.php">Students</a>
        </li>
        <li class="nav-item my-2">
            <a class="btn btn-red-outline <?= $_SESSION['page'] == 'subject' ? 'active' : '' ?> w-100"
                href="student.php">Subjects</a>
        </li>
        <li class="nav-item my-2">
            <a class="btn btn-red-outline w-100" href="#">Student Records</a>
        </li>
    </ul>
</div>