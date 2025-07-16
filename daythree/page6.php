<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/bootstrap.css">
    <link rel="stylesheet" href="./css/master.css">
</head>

<body class="p-4 font-monospace">
    <?php
    define("br", "<br>");
    echo "<h1 class='text-center'>IM Mohamed Mohamed Lashin</h1><br>";
    print "مرحبا في عالم ال لا لا لاند ";
    $x = 10;
    $y = 10;
    // echo "br";
    echo "<br>";
    echo "x = 10 <br>";
    echo "y = 10 <br>";
    print "the sum is = " . $x + $y;
    echo "<br>";
    echo "the rednder is = " . ($x % $y);
    echo "<br>";
    $bool = $x > $y;
    var_dump($bool);
    echo "<br>";
    $them = 0;
    $thimColor = $them == 0 ? "light" : "dark";
    echo "ur them color is $thimColor";
    echo "<br>";
    // echo "br";
    $degree = 20;
    if (isset($degree)) {
        if ($degree >= 50)
            echo "he was success<br> ";
        else if ($degree > 100)
            echo "please enter an vaild degree<br> ";
        else
            echo "HE was fail<br>";
    } else
        echo "please enter an  Value<br>";

    echo (isset($degree) ? ($degree >= 50 && $degree <= 100 ? "success" : "fail") : "please enter value");


    $sesson = "winter";
    switch ($sesson) {
        case "winter":
            echo "We in the Winter sesson <br>";
            break;
        case "Summer":
            echo "We in the Winter Summer <br>";
            break;
        case "rabii3😑":
            echo "We in the Winter sesson <br>";
            break;
        case "5areff😥":
            echo "We in the Winter sesson <br>";
            break;
    }
    $num = 20;
    echo "the numbers ( way one  ) is : <br><ul>";
    for ($i = 0; $i <= $num; $i++) {
        if ($i % 5 == 0) {
            echo "<li>$i</li>";
        }
    }
    echo "<br></ul>";
    echo "the numbers ( way two  ) is  : <br><ul>";
    for ($i = 0; $i <= $num; $i += 5) {

        echo "<li>$i</li>";

    }
    echo "<br></ul>";
    function sayHello($name)
    {
        echo "Hello $name";
    }

    sayHello("Lash");
    ?>
</body>

</html>