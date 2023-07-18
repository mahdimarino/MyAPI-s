<?php
$con = mysqli_connect("localhost", "root", "", "products");
$response = array();
if ($con) {



    $sql = "select * from client_reservastion";


    $result = mysqli_query($con, $sql);
    if ($result) {
        header("content-type: JSON");
        $i = 0;
        while ($row = mysqli_fetch_assoc($result)) {
            $response[$i]['reservation_id'] = $row['reservation_id'];
            $response[$i]['itemnumber'] = $row['itemnumber'];
            $response[$i]['color'] = $row['color'];


            $i++;
        }
        echo json_encode($response, JSON_PRETTY_PRINT);
    }
} else {
    echo 'eror';
}
