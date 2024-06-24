<?php
session_start();

require_once ('layout/header.php');
require ('scripts/display_data.php');

define("ROOT_LEVEL", "../");
require ("../includes/functions.php");

checkLogin();

$_SESSION['page'] = 'teacher';

?>
<div class="container-fluid">
    <div class="row">

        <?php include ('layout/nav.php') ?>

        <div class="col-lg-10">

            <!-- Content -->
            <div class="container p-3 pb-5">

                <!-- Header -->
                <div class="d-flex justify-content-between align-items-center">
                    <div class="title">
                        <button class="btn btn-red me-3 d-lg-none" id="openNav"><i class="bi bi-list"></i></button>
                        <h1 class="fs-3 text-red d-inline">Teachers</h1>
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

                <!-- Teacher Management -->

                <div class="col-12 mb-5">
                    <div class="border shadow-sm mt-5 rounded p-3" style="min-height: 75vh;">
                        <div class="row g-3">
                            <div class="col-lg-2">
                                <button class="btn btn-red me-3 w-100" data-bs-toggle="modal"
                                    data-bs-target="#addTeacher">
                                    Add Teachers
                                </button>
                            </div>
                            <div class="col-lg-4">
                                <input type="text" class="form-control" id="fullname_search"
                                    placeholder="Search Grade(e.g.:  7)">
                            </div>
                            <div class="overflow-x-scroll">
                                <table class="table mt-3" style="min-width:100vw;">
                                    <thead class="table-red">
                                        <th>First Name</th>
                                        <th>Middle Name</th>
                                        <th>Last Name</th>
                                        <th>Grade Level</th>
                                        <th>Section</th>
                                        <th>Strand</th>
                                    </thead>
                                    <tbody id="tableBody">
                                    </tbody>
                                </table>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Add Teacher Modal -->
    <div class="modal fade" id="addTeacher" tabindex="-1" aria-labelledby="addTeacherLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="scripts/add_teacher.php" method="POST" id="add_tch">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="addTeacherLabel">Add Teacher</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="fname" class="form-label">First Name *</label>
                            <input type="text" class="form-control" name="fname" id="fname" required>
                        </div>
                        <div class="mb-3">
                            <label for="mname" class="form-label">Middle Name</label>
                            <input type="text" class="form-control" name="mname" id="mname">
                        </div>
                        <div class="mb-3">
                            <label for="lname" class="form-label">Last Name *</label>
                            <input type="text" class="form-control" name="lname" id="lname" required>
                        </div>
                        <div class="mb-3">
                            <label for="gradeLevel" class="form-label">Grade</label>
                            <select id="gradeLevel" class="form-select" name="glevel" aria-label="Grade Level" required>
                                <option value="">-- Grade--</option>
                            </select>
                            <div class="mb-3" id="strand_container">
                                <label for="strands" class="form-label">Strand</label>
                                <select id="strands" class="form-select" name="strand" aria-label="Strand Selection">
                                    <option value="Null">-- Strand --</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="section" class="form-label">Section</label>
                                <input class="form-control" type="text" name="section" id="section" required>
                            </div>
                            <div class="mb-3">
                                <label for="username" class="form-label">Username *</label>
                                <input class="form-control" type="text" name="username" id="username" required>
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password *</label>
                                <input class="form-control" type="text" name="password" id="password" required>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-red">Add Teacher</button>
                        </div>
                </form>
            </div>
        </div>
    </div>


    <?php require_once ('layout/footer.php'); ?>

    <script src="https://code.jquery.com/jquery-3.7.1.js"
        integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>


        $(document).ready(function () {

            $.get('./scripts/display/strands.php', function (data) {
                strands = JSON.parse(data)

                tag = ``
                strands.forEach(strand => {
                    tag += `<option value="${strand.id}">${strand.strand_name}</option>`
                })

                $('#strands').append(tag)
            })

            $.get('./scripts/display/year_lvl.php', function (data) {
                levels = JSON.parse(data)

                tag = ``
                levels.forEach(level => {
                    tag += `<option value="${level.id}">${level.grade_number}</option>`
                })
                $('#gradeLevel').append(tag)
            })

            $("#add_tch").submit(function (event) {
                event.preventDefault()

                fname = $(this).find('input[name=fname]').val()
                mname = $(this).find('input[name=mname]').val()
                lname = $(this).find('input[name=lname]').val()
                glevel = $(this).find('select[name=glevel] option:selected').val()
                strand = $(this).find('select[name=strand] option:selected').val()
                section = $(this).find('input[name=section]').val()
                username = $(this).find('input[name=username]').val()
                password = $(this).find('input[name=password]').val()

                $.post("scripts/add_teacher.php", {
                    fname: fname, mname: mname,
                    lname: lname, strand: strand,
                    glevel: glevel, section: section,
                    username: username, password: password
                }).done(function (data) {
                    console.log(data)
                    Swal.fire({
                        title: "Teacher Added!",
                        text: "The teacher added successfully!",
                        icon: "success"
                    }).then((result) => {
                        if (result.isConfirmed) {
                            location.reload()
                        }
                    });
                })
            })

            $.get('./scripts/display/teachers.php', function (data) {
                teacher = JSON.parse(data)


                $("#tableBody").html('')
                tag = ``
                teacher.forEach(student => {
                    tag += `<tr>`
                    tag += `<td>${student.first_name}</td>`
                    tag += `<td>${student.middle_name}</td>`
                    tag += `<td>${student.last_name}</td>`
                    tag += `<td>${student.grade_number}</td>`
                    tag += `<td>${student.section}</td>`
                    tag += `<td>${student.strand_name == null ? '' : student.strand_name}</td>`
                    tag += `</tr>`
                })
                $('#tableBody').append(tag)
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