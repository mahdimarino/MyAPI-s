<?php


include 'conixion.php';


$con = mysqli_connect($HostName, $HostUser, $HostPass, $DatabaseName);


$json = file_get_contents('php://input');


$obj = json_decode($json, true);


$name = $obj['requestby'];
$description = $obj['description'];

// Creating SQL query and insert the record into MySQL database table.
$Sql_Query = "insert into requests (requestby,description) values ('$name','$description')";


if (mysqli_query($con, $Sql_Query)) {

    // If the record inserted successfully then show the message.
    $MSG = 'Thank you for adding request';

    // Converting the message into JSON format.
    $json = json_encode($MSG);

    // Echo the message.
    echo $json;
} else {

    echo 'Try Again';
}
mysqli_close($con);
