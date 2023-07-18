<?php
$con = mysqli_connect("localhost", "root", "", "products");
$response = array();
if ($con) {

    if (isset($_GET["findname"]) && !empty(trim($_GET["findname"]))) {
        $findname = mysqli_real_escape_string($con, $_GET["findname"]);

        $sql = "select * from products where itemnumber= '$findname' ";

        $result = mysqli_query($con, $sql);

        if ($result->num_rows != 0) {
            header("content-type: JSON");
            $i = 0;
            while ($row = mysqli_fetch_assoc($result)) {
                $response[$i]['id'] = $row['id'];
                $response[$i]['itemnumber'] = $row['itemnumber'];
                $response[$i]['color'] = $row['color'];
                $response[$i]['size'] = $row['size'];
                $response[$i]['brandname'] = $row['brandname'];
                $response[$i]['stockroomname'] = $row['stockroomname'];
                $response[$i]['tal'] = $row['tal'];
                $i++;
            }
            echo json_encode($response, JSON_PRETTY_PRINT);
        } else {
            $myArr = array("makach", "had", "le", "prouct");
            $myJSON = json_encode($myArr);
            echo $myJSON;
        }
    } else {
        $response = array("error" => "Search input is empty.");
        echo json_encode($response);
    }
} else {
    $response = array("error" => "Database connection error.");
    echo json_encode($response);
}
