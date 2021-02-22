<!--캘린더에서 전체 보여주기, 구입날짜, 유통기한 날짜 반환할 것-->

<?php include $_SERVER['DOCUMENT_ROOT']."/db_config.php"; ?>

<?php
    $code_pid = $_POST["code_pid"];

    $result = mysqli_query($con, "SELECT exp_start, exp_end FROM Enroll WHERE code_pid = '".$code_pid."'");
    $response = array();
    $response["success"] = true;
    
    while($row = mysqli_fetch_array($result)){
        array_push($response, array("exp_start" => $row[0], "exp_end" => $row[1]));
    }

//    while(mysqli_stmt_fetch($statement)){
//        $response["success"] = true;
//        $response["exp_start"] = $exp_start;
//        $response["exp_end"] = $exp_end;
//    }
    
    echo json_encode($response);
?>