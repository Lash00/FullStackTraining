<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="./images/flower.jpeg" type="image/jpeg">
    <!-- <link rel="stylesheet" href="./css/bootstrap.css"> -->
    <!-- <link rel="stylesheet" href="./css/master.css"> -->

    <title><?php echo "Lash Frist Page" ?></title>
    <style>
    .containerPage3 {
        background-color: #eee;
        width: 25%;
        padding: 10px 40px 10px 30px;
        position: absolute;
        top: 70%;
        left: 50%;
        transform: translate(-50%, -50%);
        -webkit-transform: translate(-50%, -50%);
        -moz-transform: translate(-50%, -50%);
        -ms-transform: translate(-50%, -50%);
        -o-transform: translate(-50%, -50%);
        box-shadow: -4px 3px 20px 8px #a59c9c;
        border-radius: 15px;
    }

    form {
        margin: 5px auto;
    }

    .containerPage3 form input,
    textarea,
    select {
        width: 100%;
        margin-top: 8px;
        margin-bottom: 12px;
        padding: 10px;
        border: none;
        border-radius: 15px;
    }

    .containerPage3 form label {

        margin-top: 8px;


    }

    form input:hover,
    textarea:hover,
    select:hover {
        border: 2px solid red;

    }

    form input,
    textarea {
        outline: none;
    }

    form input:focus,
    textarea:focus,
    select:focus {
        border: 2px solid green !important;
    }

    .bodyPage3 {
        background: linear-gradient(139deg, black, #fbe5e500);
        min-width: 100vh;
        font-family: monospace;
        color: Green;
        /* position: relative; */

    }

    input[type="submit"]:hover {
        border: none;
    }

    input[type="submit"] {
        background: linear-gradient(139deg, black, #fbe5e500);
        color: white;
        font-weight: bold;
        font-size: large;
        border-radius: 15px;
    }

    table {

        width: 100%;
        gap: 15px;
        text-align: center;
    }

    table thead tr th {
        color: white;
        background-color: red;

    }

    td {
        background-color: #bdbdbd;
        color: white;
    }

    td,
    tr,
    th {
        padding: 5px;
        margin: 3px;
    }

    ol li {
        margin-top: 3px;
    }

    ul {
        list-style-type: disclosure-closed;
        color: #6b6b6b;
    }
    </style>
</head>

<body class="bodyPage3">
    <div class="containerPage3">
        <form action="mailto:mohamedmohamedlashin@gmail.com" method="get" enctype="text/plain">
            <label for="name">UserName</label>
            <br>

            <input type="text" name="name" id="name" placeholder="Enter ur name" required>



            <br>
            <label for="email">UserEmail</label>
            <br>

            <input type="email" name="email" id="email" placeholder="Enter ur email" required>



            <br>
            <label for="pass">UserPass</label>
            <br>
            <input type="password" name="pass" id="pass" placeholder="Enter ur Pass" required>
            <br>

            <label for="message">Message:</label><br>
            <textarea name="message" id="message"></textarea>
            <br>
            <label for="gender">Ur Gender:</label>
            <select name="gender" id="gender" required><br>
                <option value="">Select ur gender</option>
                <option value="m">Male</option>
                <option value="f">Female</option>
            </select>
            <br>

            <input type="submit" value="Login">
        </form>
        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Subject</th>
                    <th>Degree</th>
                </tr>
            <tbody>
                <tr>
                    <td>Mohamed</td>
                    <td>Html</td>
                    <td>+A</td>
                </tr>
                <tr>
                    <td>Ahmed</td>
                    <td>css</td>
                    <td>+A</td>
                </tr>
                <tr>
                    <td>Ayman</td>
                    <td>Js</td>
                    <td>+A</td>
                </tr>
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="3">
                        Will done
                    </td>
                </tr>
            </tfoot>
            </thead>
        </table>
        <h3>Tec I Know</h3>
        <hr>
        <ol type="A">
            <li style="font-weight: bold;">Front End
                <ul>
                    <li>Html</li>
                    <li>Css</li>
                    <li>js</li>
                    <li>BootStrap</li>
                </ul>
            </li>
            <li style="font-weight: bold; margin-top: 10px;">Flutter
                <ul>
                    <li>Dart</li>
                    <li>Flutter</li>
                    <li>State Manegment</li>
                    <li>API</li>
                    <li>Local Storage</li>
                </ul>
            </li>
        </ol>
    </div>

    <script src="./js/bootstrap.bundle.js"></script>
</body>

</html>


<!-- some notes 
 












-->