<?php
$con = mysqli_connect("localhost", "root", "", "products");
$response = array();
if ($con) {



    $sql = "select * from requests";


    $result = mysqli_query($con, $sql);
    if ($result) {
        header("content-type: JSON");
        $i = 0;
        while ($row = mysqli_fetch_assoc($result)) {

            $response[$i]['requestby'] = $row['requestby'];
            $response[$i]['description'] = $row['description'];


            $i++;
        }
        echo json_encode($response, JSON_PRETTY_PRINT);
    }
} else {
    echo 'eror';
}
