<?php
$con = mysqli_connect("localhost", "root", "", "products");
$response = array();
if ($con) {



    $sql = "select * from products";


    $result = mysqli_query($con, $sql);

    if ($result->num_rows != 0) {
        header("content-type: JSON");
        $i = 0;
        while ($row = mysqli_fetch_assoc($result)) {
            $response[$i]['id'] = $row['id'];
            $response[$i]['itemnumber'] = $row['itemnumber'];
            $response[$i]['barcode'] = $row['barcode'];
            $response[$i]['color'] = $row['color'];
            $response[$i]['size'] = $row['size'];
            $response[$i]['brandname'] = $row['brandname'];
            $response[$i]['stockroomname'] = $row['stockroomname'];
            $response[$i]['tal'] = $row['tal'];
            $i++;
        }
        echo json_encode($response, JSON_PRETTY_PRINT);
    }
} else {
    echo 'eror';
}
