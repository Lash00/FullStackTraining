<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="./images/flower.jpeg" type="image/jpeg">
    <!-- <link rel="stylesheet" href="./css/bootstrap.css"> -->
    <link rel="stylesheet" href="./css/master.css">

    <title><?php echo "Lash Frist Page" ?></title>
    <style>
    .container {
        display: flex;
        justify-content: center;
        align-items: center;
        flex-wrap: wrap;
    }

    .container .card {
        background-color: white;
        width: calc(100% / 3);
        height: 50vh;
        margin-right: 15px;
        border-top-right-radius: 43px;
        border-bottom-left-radius: 25px;
        flex-basis: 27%;
        position: relative;

    }

    form {
        position: absolute;
        width: 82%;
        top: 45%;
        text-align: start;
        left: 45%;
        transform: translate(-50%, -50px);
    }

    table,
    .details {
        position: absolute;
        width: 100%;
        top: 50%;
        text-align: start;
        left: 50%;
        transform: translate(-50%, -50px);
        text-align: center;
    }

    ul {
        list-style-type: circle;
    }

    .details {
        top: 20%;
    }

    table thead tr th {
        background-color: #2bc9e2;
        color: white;
        padding: 5px;
    }

    td {
        background-color: #96a9ab;
        color: white;
        font-weight: 600;
    }

    form input:not(input[type="submit"]) {
        width: 100%;
        padding: 10px;
        /* border-radius: 21px; */
        outline: none;
        border: none;
        border-bottom: 2px solid black;

    }

    .btn {
        text-align: center;
        width: 112%;
        padding: 7px;
        /* margin: 10px auto; */
        border: none;
        background-color: #2688a5;
        color: white;
        font-weight: bold;
        border-radius: 14px;
        font-size: large;
        transition: all 0.5s ease-in-out;
    }

    .btn:hover {
        background-color: green;
    }

    form input {
        margin-bottom: 5%;
    }

    form input,
    form label {
        margin-top: 5%;
    }

    #main {
        background-color: aqua;
        min-height: 100vh;
    }

    h1 {
        color: white;
        font-weight: bold;
        text-align: center;
        padding: 10px;
        background-color: #0a7f7f;
    }

    .btnupdate {
        position: absolute;
        bottom: 10px;
        width: 95%;
        text-align: center;
        margin: auto 8px;
    }

    .btnShow {

        margin: auto 10px;
        width: 95%;
        margin-top: 2%;

    }

    .test {
        display: flex;
        align-items: center;
        justify-content: space-evenly;
        padding-bottom: 18%;
    }
    </style>
</head>

<body id="main">
    <h1>My Cards</h1>
    <div class="container">
        <article class="card">

            <form action="mailto:mohamedmohamedlashin@gmail.com" method="get" enctype="text/plain">
                <label for="name">UserName</label>
                <br>
                <input type="text" name="name" id="name" placeholder="Enter ur name" required>
                <br>
                <label for="pass">UserPass</label>
                <br>
                <input type="password" name="pass" id="pass" placeholder="Enter ur Pass" required>

                <br>

                <input type="submit" value="Login" class="btn">
                <!-- <button class="btn">Login</button> -->
            </form>

        </article>
        <article class="card">
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
            <button class="btn btnupdate">Add Student</button>
        </article>
        <article class="card">

            <div class="details">
                <h2>Usefull Detaled List</h2>
                <div class="test">
                    <details>
                        <summary>Front End</summary>
                        <ul>
                            <li>Html</li>
                            <li>Css</li>
                            <li>js</li>
                            <li>BootStrap</li>
                        </ul>
                    </details>
                    <details>
                        <summary>Flutter</summary>
                        <ul>
                            <li>Dart</li>
                            <li>Flutter</li>
                            <li>State Manegment</li>
                            <li>API</li>
                            <li>Local Storage</li>
                        </ul>
                    </details>
                </div>
                <button class="btn btnShow">Show more</button>
            </div>
        </article>
    </div>
    <script src="./js/bootstrap.bundle.js"></script>
</body>

</html>


<!-- some notes 
 












-->