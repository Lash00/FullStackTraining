<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Info</title>
    <link rel="stylesheet" href="./css/bootstrap.css">
    <link rel="stylesheet" href="./css/master.css">
    <link rel="icon" href="./images/flower.jpeg" type="image/jpeg">
</head>

<body class="bg-dark font-monospace">

    <div class="container mt-3 d-flex justify-content-center align-items-center" style="min-height: 100vh;">

        <div class="card w-100  mx-auto p-4">
            <h1 class="card-title text-light bg-danger p-3 text-center  mb-3" style="margin: -1px !important;">
                Student Data
            </h1>
            <table class="table table-striped table-bordered table-hover text-center card-body mt-2">
                <thead>
                    <tr>
                        <th class="bg-dark text-light p-2">Id</th>
                        <th class="bg-dark text-light p-2">Name</th>
                        <th class="bg-dark text-light p-2">Course</th>
                        <th class="bg-dark text-light p-2">Grade</th>
                        <th class="bg-dark text-light p-2">Status</th>
                        <th class="bg-dark text-light p-2">Detalis</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $products = array(
                        "1" => [
                            "name" => "Lashin",
                            "course" => "JS",
                            "Grad" => "100",
                            "Status" => "Passed",

                        ],

                        "2" => [
                            "name" => "Ayman",
                            "course" => "HTML",
                            "Grad" => "30",
                            "Status" => "Passed",
                        ],

                        "3" => [
                            "name" => "Ahmed",
                            "course" => "PHP",
                            "Grad" => "50",
                            "Status" => "Passed",
                        ],

                        "4" => [
                            "name" => "Layla",
                            "course" => "CSS",
                            "Grad" => "40",
                            "Status" => "Faild",
                        ],
                        "5" => [
                            "name" => "Menna",
                            "course" => "MYSQL",
                            "Grad" => "80",
                            "Status" => "Passed",
                        ],

                    );
                    foreach ($products as $id => $product) {

                        echo "<tr ";
                        $them = $product["Grad"] >= 50 ? "class='table-success'" : "class='table-danger'";
                        $bgthem = $product["Grad"] >= 50 ? "bg-success" : "bg-danger";
                        echo "$them >";
                        echo "<td class='std-id$id'>" . $id . "</td>";
                        echo "<td class='std-name$id'>" . $product["name"] . "</td>";
                        echo "<td class='std-course$id'>" . $product["course"] . "</td>";
                        echo "<td class='std-grad$id' ><button class='$bgthem px-2 text-light btn '>" . $product["Grad"] . " %</button></td>";
                        echo "<td class='std-status$id'>" . $product["Status"] . "</td>";
                        echo "<td >
                            <button type='button' class='btn btn-primary std-btn$id view' data-bs-toggle='modal' data-bs-target='#StudentDetalis' >
                             View </button>
                            </td>";
                        echo "</tr>";
                        // data-bs-toggle="modal" data-bs-target="#StudentDetalis"
                    }
                    ?>

                </tbody>
            </table>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="StudentDetalis" tabindex="-1" aria-labelledby="StudentDetalis" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title mx-auto" id="StudentDetalis">Student Information</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        ...
                    </div>
                    <!-- <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Save changes</button>
                    </div> -->
                </div>
            </div>
        </div>
    </div>

    <script>
    let classnum;
    // let btn = document.querySelectorAll(".view");
    // btn.onclick = () => {
    console.log(document.querySelectorAll(".view").length);
    document.querySelectorAll(".view").forEach(
        (ele) => {
            ele.addEventListener('click', () => {
                console.log("*******************************");
                console.log(ele);
                console.log(ele.className);
                const classNames = ele.classList;
                classNames.forEach(
                    (cls) => {
                        if (cls.startsWith("std-btn")) {
                            classnum = cls.replace('std-btn', '');
                        }
                    }
                )
                console.log(classnum);
                let name = document.querySelector(`.std-name${classnum}`);
                let id = document.querySelector(`.std-id${classnum}`);
                let course = document.querySelector(`.std-course${classnum}`);
                let grad = document.querySelector(`.std-grad${classnum}`);
                let status = document.querySelector(`.std-status${classnum}`);
                let contentArea = document.querySelector(`.modal-body`);
                contentArea.innerHTML = "";
                contentArea.innerHTML = `
        <div class="card"></div>
    <ul class="list-group bg-danger p-3 ">
        <li class="list-group-item mt-1"><i><strong class='text-primary me-5'>Student Name :</strong></i>${id.textContent} </li>
        <li class="list-group-item mt-1"><i><strong class='text-primary me-5'>Student Name :</strong></i>${name.textContent} </li>
        <li class="list-group-item mt-1"><i><strong class='text-primary me-5'>Student Name :</strong></i>${course.textContent} </li>
        <li class="list-group-item mt-1"><i><strong class='text-primary me-5'>Student Name :</strong></i>${grad.textContent} </li>
        <li class="list-group-item mt-1"><i><strong class='text-primary me-5'>Student Name :</strong></i>${status.textContent} </li>
    </ul>
</div>   
        `;


            })
        }
    )
    // }
    </script>

    <script src="./js/bootstrap.bundle.js"></script>
</body>

</html>