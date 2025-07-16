<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/bootstrap.css">
    <link rel="stylesheet" href="./css/master.css">
</head>

<body class="bg-dark d-flex justify-content-center align-items-center font-monospace" style="min-height: 100vh;">
    <div class=" container">
        <div class="row ">
            <div class="col-lg col-md col-sm col-12">
                <div class="card w-75 mx-auto">
                    <h1 style=" margin: -1px !important;"
                        class="card-title bg-danger p-3 text-light text-center rounded-2 mt-0 ">
                        Add New Student </h1>
                    <form action="" class="was-validated p-3">
                        <div class="container">
                            <!-- Frist row name and email -->
                            <div class="row mt-2">
                                <!--start name input -->
                                <div class="col-lg col-md col-sm col-12">
                                    <div class="name">
                                        <label class="form-label text-success fw-bold" for="name">Full Name </label>
                                        <input type="text" name="name" required class="form-control is-valid" id="name"
                                            placeholder="Enter ur name ">
                                        <div class="name-valid">

                                        </div>
                                    </div>
                                </div>
                                <!-- end name input -->
                                <!--Start email input -->
                                <div class="col-lg col-md col-sm col-12">
                                    <div class="email">
                                        <label class="form-label text-success fw-bold" for="email">Enter Email </label>
                                        <input type="email" name="email" required class="form-control is-valid"
                                            id="email" placeholder="Enter ur email ">
                                        <div class="email-valid">

                                        </div>
                                    </div>
                                </div>
                                <!--end  email input -->
                            </div>
                            <!-- end the Frist row  -->

                            <!-- Second row age & gender & degree -->
                            <div class="row mt-2">
                                <!--start age input -->
                                <div class="col-lg col-md col-sm col-12">
                                    <div class="age">
                                        <label class="form-label text-success fw-bold" for="age">Age</label>
                                        <input type="number" min="0" name="age" required class="form-control is-valid"
                                            id="age" placeholder="Enter ur age ">
                                        <div class="age-valid">
                                        </div>
                                    </div>
                                </div>
                                <!-- end age input -->

                                <!--Start gender input -->
                                <div class="col-lg col-md col-sm col-12">
                                    <div class="email">
                                        <label class="form-label text-success fw-bold" for="gander">Gender </label>
                                        <select name="gender" id="gender" class="form-control is-valid" required>
                                            <!-- to make the frist option hidden from the selecct list use ( hidden ) -->
                                            <!-- but i think its more pretty  -->
                                            <option value="" disabled selected
                                                class="text-center bg-danger text-light p-2">
                                                Chooise Gender
                                            </option>
                                            <option value="male">Male</option>
                                            <option value="female">Female</option>
                                        </select>
                                        <div class="gender-valid">

                                        </div>
                                    </div>
                                </div>
                                <!--end  gender input -->

                                <!--Start degree input -->
                                <div class="col-lg col-md col-sm col-12">
                                    <!-- deg -> degree -->
                                    <div class="deg">
                                        <label class="form-label text-success fw-bold" for="deg">Degree </label>
                                        <input type="text" maxlength="2" name="deg" required
                                            class="form-control is-valid" id="deg" placeholder="Enter ur degree ">
                                        <div class="deg-valid">

                                        </div>
                                    </div>
                                </div>
                                <!--end  degree input -->
                            </div>
                            <!-- end the Second row  -->
                            <!-- start therd row -->
                            <div class="row mt-2">
                                <div class="col-lg col-md col-sm col-12">
                                    <lable class="form-label text-success fw-bold  for=" tArea">Notes</lable>
                                    <textarea required name="textArea" class="form-control mt-2" is-valid" id="tArea"
                                        rows="5"></textarea>
                                    <div class="tArea-valid">

                                    </div>
                                </div>
                            </div>
                            <!-- end therd row -->
                            <!-- Start th fourth row -->
                            <div class="row mt-3">
                                <div class="col-lg col-md col-sm col-12">
                                    <input class="btn btn-danger w-100 mt-2 fw-bold" id="submit" type="submit"
                                        value="Add Student ">
                                </div>
                                <div class="col-lg col-md col-sm col-12">
                                    <button type="button" class="btn btn-secondary w-100 mt-2  text-light fw-bold"
                                        data-bs-toggle="modal" data-bs-target="#ShowStudent">Show Student </button>

                                </div>
                            </div>
                            <!-- end  th fourth row -->

                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- start model  -->
        <div class="modal fade " id="ShowStudent" tabindex="-1" aria-labelledby="ShowStudentLabel" aria-hidden="true">
            <div class="modal-dialog ">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="ShowStudentLabel">Students</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <h1>Students Data </h1>

                        <div class="container">
                            <div class="row">
                                <div class="col">
                                    <!-- w-100 table table-bordered table-dark table-hover text-center rounded-2 overflow-hidden -->
                                    <table class="table table-bordered text-center caption-top " cellspacing="10">
                                        <caption class="text-light">List of users</caption>
                                        <thead>
                                            <tr>
                                                <th scope="col" class="bg-danger text-light ">ID</th>
                                                <th scope="col" class="bg-danger text-light">Name</th>
                                                <th scope="col" class="bg-danger text-light">Sign</th>
                                                <th scope="col" class="bg-danger text-light">Rating</th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $names = array("Lash", "Mohamed", "Lahin", "Ayman", "Layla", "Amira", );
                                            $degrees = array(95, 75, 100, 50, 40, 70, );
                                            function calcSign($dig)
                                            {
                                                if ($dig >= 85 && $dig <= 100) {
                                                    return "أمتياز";
                                                } else if ($dig >= 70 && $dig < 85) {
                                                    return "جيد جدا";

                                                } else if ($dig >= 55 && $dig < 70) {
                                                    return "جيد";
                                                } else if ($dig >= 45 && $dig < 55) {
                                                    return "مقبول";
                                                } else if ($dig == 45) {
                                                    return "مقبول مشروط";
                                                } else if ($dig < 45) {
                                                    return "ساقط";
                                                } else {
                                                    return "ادخل قيمه صحيحه ";
                                                }

                                            }
                                            for ($i = 0; $i < count($names); $i++) {
                                                echo "<tr>";
                                                echo "<td >" . $i + 1 . "</td>";
                                                echo "<td >" . $names[$i] . "</td>";
                                                echo "<td >" . $degrees[$i] . "</td>";
                                                echo "<td >" . calcSign($degrees[$i]) . "</td>";
                                                echo "</tr>";
                                            }

                                            ?>
                                        </tbody>
                                    </table>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                    </div>
                </div>
            </div>
        </div>
        <!-- end model  -->
    </div>
    <script src="./js/bootstrap.bundle.js"></script>
    <script>
        let name = document.getElementById("name");
        let nameVal = document.querySelector(".name-valid");

        let email = document.getElementById("email");
        let emailVal = document.querySelector(".email-valid");

        let deg = document.getElementById("deg");
        let degVal = document.querySelector(".deg-valid");

        let gender = document.getElementById("gender");
        let genderVal = document.querySelector(".gender-valid");

        let age = document.getElementById("age");
        let ageVal = document.querySelector(".age-valid");

        let tArea = document.getElementById("tArea");
        let tAreaVal = document.querySelector(".tArea-valid");



        let submit = document.getElementById("submit");
        submit.onclick = () => {
            if (name.value == "") {
                nameVal.innerHTML = "<font color=red class='mt-2'>Plese enter ur name </font>"
            }
            if (email.value == "") {
                emailVal.innerHTML = "<font color=red class='mt-2'>Plese enter ur email </font>"
            }
            if (age.value == "") {
                ageVal.innerHTML = "<font color=red class='mt-2'>Plese enter ur age </font>"
            }
            if (gender.value == "") {
                genderVal.innerHTML = "<font color=red class='mt-2'>Plese Select  ur Gender </font>"
            }
            if (deg.value == "") {
                degVal.innerHTML = "<font color=red class='mt-2'>Plese Enter Ur Degree </font>"
            }
            if (tArea.value == "") {
                tAreaVal.innerHTML = "<font color=red class='mt-2'>Plese Enter Ur Degree </font>"
            }
            if (tArea.value != "" && deg.value != "" && gender.value != "" && age.value != "" && email.value != "" &&
                name.value != "") {
                window.alert("Student Has Add Successfuly");
            }
        }
        name.oninput = () => nameVal.innerHTML = "";
        email.oninput = () => emailVal.innerHTML = "";
        age.oninput = () => ageVal.innerHTML = "";
        gender.oninput = () => genderVal.innerHTML = "";
        deg.oninput = () => degVal.innerHTML = "";
        tArea.oninput = () => tAreaVal.innerHTML = "";
    </script>
</body>

</html>