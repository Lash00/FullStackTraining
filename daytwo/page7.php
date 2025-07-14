<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="./images/flower.jpeg" type="image/jpeg">
    <title>Document</title>
    <style>
    body {
        min-height: 100vh;
        background: linear-gradient(139deg, black, #fbe5e500);
        transition: all 5s ease-in-out;
        font-family: monospace;
    }

    input {
        margin-top: 8px;
        margin-bottom: 12px;
        margin-left: 2%;
        padding: 10px;
        border: none;
        border-radius: 15px;
        outline: none;
    }

    input:focus {
        box-shadow: 0px 0px 13px green;
    }

    .container {
        position: absolute;
        width: 50%;
        top: 30%;
        /* width: 100%; */
        left: 50%;
        /* background-color: red; */
        transform: translate(-50%, -50%);
        text-align: center;

    }

    .btn {
        text-align: center;
        width: 100%;
        padding: 7px;
        /* margin: 10px auto; */
        border: none;
        background-color: #2688a5;
        color: white;
        font-weight: bold;
        margin-top: 3%;
        ;
        border-radius: 14px;
        font-size: large;
        cursor: pointer;
        box-shadow: 0px 0px 13px #585858;
    }

    .btn:active {
        box-shadow: none;

    }

    table {
        margin-top: 4%;
        width: 100%;
        animation: upDown 2s infinite ease-in-out;
        position: relative;


    }

    @keyframes upDown {

        0%,
        100% {
            transform: translateY(0);
        }

        50% {
            transform: translateY(-10px);

        }



    }

    td {
        background-color: #ffffff;
        padding: 8px;
        font-size: large;
        margin: 10px;
    }

    table thead tr th {
        background-color: #2bc9e2;
        color: white;
        padding: 5px;
    }

    label {
        color: white;
        font-weight: bold;
        font-size: larger;

    }
    </style>
</head>

<body>

    <div class="container">
        <form action="">
            <label for="name">Ur Name</label>
            <input type="text" id="name" style="    margin-right: 10%;" required>
            <label for="deg">Ur degree</label>
            <input type="text" id="deg" maxlength="2" required>
            <button type="button" class="btn">Show Result</button>
        </form>
        <div class="resultTable"> </div>

        <script src="js/page7.js"></script>
</body>

</html>