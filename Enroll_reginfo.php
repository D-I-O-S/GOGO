<!--메뉴에서 등록정보를 눌렀을 때 카테고리 별 리스트 보여주기(일단 모든 정보 보여줌. 어느 정도까지 보여줄건지에 따라 코드 수정 필요-->

<?php include $_SERVER['DOCUMENT_ROOT']."/db_config.php"; ?>

<?php
    $user_pid = $_POST["user_pid"];
    $code_pid = $_POST["code_pid"];

    $result = mysqli_query($con, "SELECT enroll_pid, category, foodname, exp_start, exp_end, lo1, lo2, lo3, memo FROM Enroll WHERE code_pid = '".$code_pid."'");

    $response = array();
//    $response["success"] = true;

    while($row = mysqli_fetch_array($result)){
        array_push($response, array("enroll_pid"=> $row[0], "category" => $row[1], "foodname" => $row[2], "exp_start" => $row[3], "exp_end" => $row[4], "lo1" => $row[5], "lo2" => $row[6], "lo3" => $row[7], "memo" => $row[8]));
    }

//    while(mysqli_stmt_fetch($statement)){
//        $response["success"] = true;
//        $response["category"] = $category;
//        $response["foodname"] = $foodname;
//        $response["exp_start"] = $exp_start;
//        $response["exp_end"] = $exp_end;
//        $response["location"] = $location;
//        $response["memo"] = $memo;
//    }

    echo json_encode(array("response" => $response));
    
?>