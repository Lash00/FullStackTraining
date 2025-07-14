<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="./images/flower.jpeg" type="image/jpeg">
    <link rel="stylesheet" href="./css/bootstrap.css">
    <link rel="stylesheet" href="./css/master.css">

    <title><?php echo "Lash Frist Page" ?></title>
</head>

<body class="font-monospace p-3">

    <div>
        <form action="mailto:mohamedmohamedlashin@gmail.com" method="get" enctype="text/plain">
            <label for="name" class="form-label">UserName</label><br>
            <input type="text" name="name" id="name" class="form-control" placeholder="Enter ur name" required>
            <hr>
            <label for="email" class="form-label">UserEmail</label><br>
            <input type="email" name="email" id="email" class="form-control" placeholder="Enter ur email" required>
            <hr>
            <label for="pass" class="form-label">UserPass</label><br>
            <input type="password" name="pass" id="pass" class="form-control" placeholder="Enter ur Pass" required>
            <hr>
            <label for="gender">Ur Gender:</label>
            <select name="gender" id="gender" required>
                <option value="">Select ur gender</option>
                <option value="m">Male</option>
                <option value="f">Female</option>
            </select>
            <br>

            <input type="submit" value="Login" class="btn btn-primary rounded-5 ps-5 pe-5 mb-3 mt-2">
        </form>
        <table class="table table-bordered">
            <tr>
                <th>Student Name </th>
                <th>Student Degree </th>
            </tr>
            <tr>
                <td>Mohmaed lashin</td>
                <td>A+</td>
            </tr>
            <tr>
                <td>Lashin</td>
                <td>A+</td>
            </tr>
            <tr>
                <td>Lash</td>
                <td>A+</td>
            </tr>
        </table>
        <br>
        <h1>How to start programing</h1>
        <hr>
        <ol>
            <li>Basic
                <ul>
                    <li>Programin langauge</li>
                    <li>oop</li>
                    <li>Data structure</li>
                    <li>Algorithm</li>
                </ul>
            </li>
            <li>Tec
                <ul>
                    <li>web</li>
                    <li>mobile</li>
                    <li>network</li>
                    <li>ect....</li>
                </ul>

            </li>

        </ol>
    </div>

    <script src="./js/bootstrap.bundle.js"></script>
</body>

</html>


<!-- some notes 
 












-->