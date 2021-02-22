<!--해당 식재료의 구체 정보 보기-->

<?php include $_SERVER['DOCUMENT_ROOT']."/db_config.php"; ?>

<?php
    $enroll_pid = $_POST["enroll_pid"];

    $statement = mysqli_prepare($con, "SELECT * FROM Enroll WHERE enroll_pid = '".$enroll_pid."'");
    mysqli_stmt_execute($statement);
    mysqli_stmt_bind_result($statement, $enroll_pid, $user_pid,  $code_pid, $category, $foodname, $exp_start, $exp_end, $lo1, $lo2, $lo3, $memo);

    $response = array();
    $response["success"] = false;
    
    while(mysqli_stmt_fetch($statement)){
        $response["success"] = true;
        $response["code_pid"] = $code_pid;
        $response["category"] = $category;
        $response["foodname"] = $foodname;
        $response["exp_start"] = $exp_start;
        $response["exp_end"] = $exp_end;
        $response["lo1"] = $lo1;
        $response["lo2"] = $lo2;
        $response["lo3"] = $lo3;
        $response["memo"] = $memo;
    }
    echo json_encode($response);
?>
    

