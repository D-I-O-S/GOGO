<?php include $_SERVER['DOCUMENT_ROOT']."/db_config.php"; ?>

<?php
    $user_pid = $_POST["user_pid"];
    $code_pid = $_POST["code_pid"];
    $category = $_POST["category"];
//    $category = ["과일", "채소", "정육/달걀", "수산물", "유제품", "양곡/견과류", "양념/조미료", "소스", "기타"];
    if($category == "전체"){
        $result = mysqli_query($con, "SELECT * FROM Enroll WHERE code_pid = '".$code_pid."' ORDER BY foodname asc");
    }
    else{
        $result = mysqli_query($con, "SELECT * FROM Enroll WHERE user_pid = '".$user_pid."' AND category = '".$category."' ORDER BY foodname asc");
    }

    $response = array();

    while($row = mysqli_fetch_array($result)){
        array_push($response, array("enroll_pid"=> $row[0], "user_pid"=> $row[1], "code_pid" => $row[2], "category" => $row[3], "foodname" => $row[4], "exp_start" => $row[5], "exp_end" => $row[6], "lo1" => $row[7], "lo2" => $row[8], "lo3" => $row[9], "memo" => $row[10]));
    }
    echo json_encode(array("response" => $response));


?>

