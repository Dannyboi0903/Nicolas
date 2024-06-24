<?php
session_start();

include ('layout/header.php');
require ('scripts/display_data.php');

define("ROOT_LEVEL", "../");
require (ROOT_LEVEL . "includes/functions.php");

checkLogin();

// $students = displayStudent();
// $teachers = displayTeachers();
// $parents = displayParents();

$_SESSION['page'] = 'dashboard';

?>

<div class="container-fluid">
  <div class="row">

    <?php include ('layout/nav.php') ?>

    <div class="col-lg-10">

      <!-- Content -->
      <div class="container p-3 mb-5">

        <!-- Header -->
        <div class="d-flex justify-content-between align-items-center">
          <div class="title">
            <button class="btn btn-red me-3 d-lg-none" id="openNav"><i class="bi bi-list"></i></button>
            <h1 class="fs-3 text-red d-inline">Dashboard</h1>
          </div>
          <div class="profile justify-content-between d-none d-sm-flex align-items-center position-relative">
            <p class="mb-0 me-2 text-red fw-bold">Admin</p>
            <div style="width: 50px; cursor: pointer" id="profileDrpDwn">
              <img class="img-fluid" src="../image/users.png" alt="users" />
            </div>
            <div class="d-none position-absolute bg-white d-flex flex-column border end-0 p-2 shadow-sm rounded"
              style="width: 150px;bottom: -120px" id="drpDwn">
              <a class="btn btn-red mb-3" href="#">Profile</a>
              <a class="btn btn-red" href="../scripts/logout.php">Log Out</a>
            </div>
          </div>
        </div>

        <!-- Totals -->
        <div class="row mt-5 g-3">

          <div class="col-12 col-sm-6">

            <div class="row">
              <div class="col-12 col-sm-6 mb-4">
                <div class="card shadow-sm p-3 h-100">
                  <h2 class="text-red" id="teacher">

                  </h2>
                  <p class="mb-0 text-red fs-4">Teachers</p>
                </div>
              </div>
              <div class="col-12 col-sm-6 mb-4">
                <div class="card shadow-sm p-3 h-100">
                  <h2 class="text-red" id="students">

                  </h2>
                  <p class="mb-0 text-red fs-4">Students</p>
                </div>
              </div>

              <!-- Notice Board -->
              <div class="col-12">
                <h2 class="fs-2 text-red lh-lg">
                  "Welcome, Admin! Your journey to efficient management begins now. Let's excel together!"
                </h2>
              </div>

            </div>

          </div>

          <div class="d-none d-sm-block col-6">
            <img class="img-fluid" src="../image/nicolasss.jpg" alt="">
          </div>


        </div>
      </div>
    </div>
  </div>

  <script>
    $(document).ready(function () {
      $.get('./scripts/display/students.php', function (data) {
        students = JSON.parse(data)

        $('#students').html(students.length)
      })

      $('#profileDrpDwn').on('click', function () {
        if ($('#drpDwn').hasClass('d-none')) {
          $('#drpDwn').removeClass('d-none')

        } else {
          $('#drpDwn').addClass('d-none')
        }

      })
    })
  </script>

  <?php

  require_once ('layout/footer.php');