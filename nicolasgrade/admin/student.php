<?php
session_start();

require_once ('layout/header.php');
require ('scripts/display_data.php');

define("ROOT_LEVEL", "../");
require ("../includes/functions.php");

checkLogin();

$_SESSION['page'] = 'student';

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
                        <h1 class="fs-3 text-red d-inline">Students</h1>
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

                <!-- Notice Board -->

                <div class="col-12 mb-5">
                    <div class="border shadow-sm mt-5 rounded p-3" style="min-height: 75vh;">
                        <div class="row g-3">
                            <div class="col-lg-2">
                                <button class="btn btn-red me-3 w-100" data-bs-toggle="modal"
                                    data-bs-target="#addStudents">
                                    Add Students
                                </button>
                            </div>
                            <div class="col-lg-4">
                                <input type="text" class="form-control" id="fullname_search"
                                    placeholder="(e.g. JUAN DELA CRUZ)">
                            </div>
                            <div class="col-lg-2">
                                <input type="number" min="7" max="12" class="form-control" id="grd_lvl_search"
                                    placeholder="(Grade level e.g.: 7)">
                            </div>
                            <div class="col-lg-2">
                                <input type="text" class="form-control" id="section_search"
                                    placeholder="(Section e.g.: A)">
                            </div>
                            <div class="col-lg-2">
                                <input type="text" class="form-control" id="strand_search" placeholder="(e.g.: HUMSS)">
                            </div>
                        </div>
                        <div class="overflow-x-scroll">
                            <table class="table mt-3" style="min-width:100vw;">
                                <thead class="table-red">
                                    <th>Student Identifier</th>
                                    <th>First Name</th>
                                    <th>Middle Name</th>
                                    <th>Last Name</th>
                                    <th>Strand</th>
                                    <th>Section</th>
                                    <th>Year Level</th>
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

<!-- Modal -->
<div class="modal fade" id="addStudents" tabindex="-1" aria-labelledby="addStudentLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form action="scripts/add_student.php" method="POST" id="add_std">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="addStudentLabel">Add Students</h1>
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
                        <label for="stdType" class="form-label">Student Type *</label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="stdType" id="stdType1" value="JHS"
                                checked>
                            <label class="form-check-label" for="stdType1">
                                Junior High School
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="stdType" id="stdType2" value="SHS">
                            <label class="form-check-label" for="stdType2">
                                Senior High School
                            </label>
                        </div>
                    </div>
                    <div class="mb-3" id="strand_container">
                        <label for="strands" class="form-label">Strands</label>
                        <select id="strands" class="form-select" name="strand" aria-label="Strand Selection" required>
                            <option value="NULL">-- Strands --</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="yearLevel" class="form-label">Year Level</label>
                        <select id="yearLevel" class="form-select" name="ylevel" aria-label="Year Level Selection"
                            required>
                            <option value="">-- Year Level--</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="section" class="form-label">Section</label>
                        <input class="form-control" type="text" name="section" id="section">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-red">Add
                        Students</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
    crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    $(document).ready(function () {
        stdType = $("#stdType1").is(":checked")

        if (stdType) {
            $("#strand_container").css("display", "none")
        }

        $("#stdType1").click(function () {
            $("#strand_container").css("display", "none")

            $.get('./scripts/display/year_lvl.php', function (data) {
                levels = JSON.parse(data)

                filteredLvl = levels.filter(data => data.grade_number < 11)

                $('#yearLevel').html('')
                tag = `<option value="">-- Year Level--</option>`
                filteredLvl.forEach(level => {
                    tag += `<option value="${level.id}">${level.grade_number}</option>`
                })
                $('#yearLevel').append(tag)
            })
        })

        $("#stdType2").click(function () {
            $("#strand_container").css("display", "block")

            $.get('./scripts/display/year_lvl.php', function (data) {
                levels = JSON.parse(data)

                filteredLvl = levels.filter(data => data.grade_number > 10)

                $('#yearLevel').html('')
                tag = `<option value="">-- Year Level--</option>`
                filteredLvl.forEach(level => {
                    tag += `<option value="${level.id}">${level.grade_number}</option>`
                })
                $('#yearLevel').append(tag)
            })
        })

        $.get('./scripts/display/strands.php', function (data) {
            strands = JSON.parse(data)

            tag = ``
            strands.forEach(strand => {
                tag += `<option value="${strand.id}">${strand.strand_name}</option>`
            })

            $('#strands').append(tag)
        })

        $.get('./scripts/display/students.php', function (data) {
            students = JSON.parse(data)

            $("#tableBody").html('')
            tag = ``
            students.forEach(student => {
                tag += `<tr>`
                tag += `<td>${student.std_id}</td>`
                tag += `<td>${student.first_name}</td>`
                tag += `<td>${student.middle_name}</td>`
                tag += `<td>${student.last_name}</td>`
                tag += `<td>${student.strand_name == null ? '' : student.strand_name}</td>`
                tag += `<td>${student.section}</td>`
                tag += `<td>${student.grade_number}</td>`
                tag += `</tr>`
            })
            $('#tableBody').append(tag)
        })

        $.get('./scripts/display/year_lvl.php', function (data) {
            levels = JSON.parse(data)

            filteredLvl = levels.filter(data => data.grade_number < 11)

            tag = ``
            filteredLvl.forEach(level => {
                tag += `<option value="${level.id}">${level.grade_number}</option>`
            })
            $('#yearLevel').append(tag)
        })

        $("#add_std").submit(function (event) {
            event.preventDefault()

            fname = $(this).find('input[name=fname]').val()
            mname = $(this).find('input[name=mname]').val()
            lname = $(this).find('input[name=lname]').val()
            ylevel = $(this).find('select[name=ylevel] option:selected').val()
            section = $(this).find('input[name=section]').val()
            strand = $(this).find('select[name=strand] option:selected').val()
            stdType = $(this).find('input[name=stdType]').val()

            $.post("scripts/add_student.php", {
                fname: fname,
                stdType: stdType, mname: mname,
                lname: lname, strand: strand,
                ylevel: ylevel, section: section
            }).done(function (data) {
                Swal.fire({
                    title: "Student Added!",
                    text: "The student added successfully!",
                    icon: "success"
                }).then((result) => {
                    if (result.isConfirmed) {
                        location.reload()
                    }
                });
            })
        })

        $('#fullname_search').on('input', function () {
            fullname = $(this).val()
            $.get('./scripts/search.php', {
                fullname: fullname
            }, function (data) {
                students = JSON.parse(data)

                populateStudents(students)
            })

        })

        $('#grd_lvl_search').on('input', function () {
            gradeLevel = $(this).val()
            $.get('./scripts/search.php', {
                gradeLevel: gradeLevel
            }, function (data) {
                students = JSON.parse(data)

                populateStudents(students)
            })

        })

        $('#section_search').on('input', function () {
            section = $(this).val()
            $.get('./scripts/search.php', {
                section: section
            }, function (data) {
                students = JSON.parse(data)

                populateStudents(students)
            })

        })

        $('#strand_search').on('input', function () {
            strand = $(this).val()
            $.get('./scripts/search.php', {
                strand: strand
            }, function (data) {
                students = JSON.parse(data)

                populateStudents(students)
            })

        })

        function populateStudents(students) {
            $("#tableBody").html('')
            tag = ``
            students.forEach(student => {
                tag += `<tr>`
                tag += `<td>${student.std_id}</td>`
                tag += `<td>${student.first_name}</td>`
                tag += `<td>${student.middle_name}</td>`
                tag += `<td>${student.last_name}</td>`
                tag += `<td>${student.strand_name == null ? '' : student.strand_name}</td>`
                tag += `<td>${student.section}</td>`
                tag += `<td>${student.grade_number}</td>`
                tag += `</tr>`
            })
            $('#tableBody').append(tag)
        }

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