<?php
include("../navebar.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Student</title>
    <link rel="stylesheet" href="../css/bootstrap.css">
    <link rel="stylesheet" href="../css/master.css">
    <link rel="stylesheet" href="../css/all.min.css">
    <link rel="stylesheet" href="../css/normalize.css">
</head>

<body class="main-bg  flex-column m-auto ">
    <div class="container  center " style="min-height: 90vh;">
        <div class="row">
            <div class="col ">
                <div class="card shape w-100 p-5 mx-auto myShadow" style=" background-color: #12988d;">
                    <form action="" method="post" class="was-validated p-5 bg-light shape " id="enroll">
                        <h3 class="text-center text-success fw-bold">Add enrolles </h3>
                        <div class="error"> </div>
                        <div class="row">
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <section>
                                    <label for="std_name" class="form-label">Student Name</label>
                                    <select name="stdName" id="std_name" class="form-control is-valid" required>
                                        <option value="" hidden selected disabled>Select Student Name</option>

                                    </select>
                                </section>
                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-12">
                                <section>
                                    <label for="cours_name" class="form-label">Course Title</label>
                                    <select name="coursName" id="cours_name" class="form-control is-valid" required>
                                        <option value="" hidden selected disabled>choose Course Title</option>

                                    </select>
                                </section>

                            </div>
                        </div>
                        <select name="degree" id="degree" class="form-control is-valid mt-2" required>
                            <option value="" hidden selected disabled>choose Std Degree</option>

                        </select>


                        <section class="text-center">
                            <input type="hidden" name="enrol" val="1">
                            <input type="submit" value="Enroll Now " id="add"
                                class="btn shape logBtnColor text-light p-2 w-100 mt-3">
                        </section>


                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        // get data from the students 
        let names = document.getElementById('std_name');
        let courses = document.getElementById('cours_name');
        let degSelect = document.getElementById('degree');
        fetch('http://localhost/NTI/api_task/LashSystem.php?type=students')
            .then(res => res.json())
            .then(data => {
                console.log(data);
                if (data.success) {

                    // let names = document.getElementById('std_name');

                    data.data.forEach(element => {
                        names.innerHTML += `
                   <option value=${element.id}>${element.name}</option>`
                    });
                }
            })
        // get data from the cources 
        fetch('http://localhost/NTI/api_task/LashSystem.php?type=courses')
            .then(res => res.json())
            .then(data => {
                console.log(data);
                if (data.success) {



                    data.data.forEach(element => {
                        courses.innerHTML += `
                   <option value=${element.id}>${element.title}</option>`
                    });
                }
            })

        let degrees = ['A', 'B', 'C', 'D', 'f'];
        degrees.forEach(deg => {
            degSelect.innerHTML += `
 <option value=${deg}>${deg}</option>

                `;
        })
        let form = document.getElementById('enroll');

        form.addEventListener('submit', (e) => {
            e.preventDefault();
            fetch('../server/post.php', {
                method: 'POST',
                headers: {
                    "Content-Type": "application/json"
                },
                body: JSON.stringify({
                    type: 'enrolles',
                    std_id: names.value,
                    cours_id: courses.value,
                    deg: degSelect.value,
                })
            }).then(res => res.json())
                .then(data => {
                    console.log(data);
                    if (data.success == true) {
                        window.alert(data.message);
                        names.value = '';
                        courses.value = '';
                        degSelect.value = '';

                    } else {
                        let err = document.querySelector('.error')
                        err.innerHTML = `

                <div class='alert alert-danger text-center'>${data.message}</div>
                `;
                    }
                })
        })
    </script>

</body>

</html>