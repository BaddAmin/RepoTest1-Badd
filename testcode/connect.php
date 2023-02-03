<?php

header("Access-Control-AllowOrigin *");
header("Content-Type: application/json; charset=UTF-8");

//creating array for JSON response
$response = array();

//check
if (isset($_GET['temp']) && isset($_GET['hum'])) {

    $temp = $_GET['temp'];
    $hum = $_GET['hum'];

    // include DB connect class
    $filepath = realpath(dirname(__FILE__));
    require_once($filepath . "/db_connect.php");

    //connecting to DB
    $db = new DB_CONNECT();

    // Fire SQL query to insert data in weather
    $result = mysql_query("INSERT INTO weather(temp,hum) VALUES('$temp', '$hum')");

    if ($result) {
        //succesful inserted
        $response["success"] = 1;
        $response["message"] = "Weather succesfully created.";

        //show JSON response
        echo json_encode($response);

    } else {
        // failed to insert data in DB
        $response["success"] = 0;
        $response["message"] = "Something wrong.";

        echo json_encode($response);

    }
} else
 {
    // if required para is missing
    $response["success"] = 0;
    $response["message"] = "Parameter(s) are missing. Please check the request.";
    echo json_encode($response);
}

?>