<?php
header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");
// $person = [];
if ($_SERVER["SERVER_NAME"] != "localhost") {
    $person = [
        "data" => [
            "message" => "unAllowed access method Use the localhost",
        ],
        "connection" => "false",

    ];
    echo (json_encode($person));
} else {
    $person = [
        "data" => [
            [
                "id" => "1",
                "Name" => "Lashin",
                "Gender" => "Male",
                "age" => "20",
                "Postion" => "Senior Software Engnner",
            ],
            [
                "id" => "2",
                "Name" => "Layla",
                "Gender" => "Female",
                "age" => "20",
                "Postion" => "Doctor",
            ],

        ],
        "connection" => "true",
    ];
    echo (json_encode($person));
}


?>