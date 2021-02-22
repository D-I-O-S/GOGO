<?php include $_SERVER['DOCUMENT_ROOT']."/db_config.php";
    //알람을 위한 등록정보 보여주기
    
    $user_pid = $_POST["user_pid"];
    $date = strtotime("+3 days");
    $alarm_date = date("Y-m-d", $date);

    $sql = mq("SELECT * FROM Enroll WHERE user_pid = '".$user_pid."' AND exp_end = '".$alarm_date."'");

    $exist = mysqli_num_rows($sql);

    if($exist)
        $response["success"] = "yes";
    else
        $response["success"] = "no";

    echo json_encode($response);
?>
    